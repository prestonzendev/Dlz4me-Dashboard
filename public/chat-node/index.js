//require('newrelic');
//var app     = require('express')();
var http = require('http').Server();
var io = require('socket.io')(http);
//io.set('origins','http://localhost:8000');
var mysql = require('mysql');
var sanitze = require('sanitizer');
var scriptStart = true;


function fetchCurrentDate() {
    var t = new Date();
    var hours = t.getUTCHours();
    var ampm = hours >= 12 ? 'PM' : 'AM';
    hours = hours % 12;
    if (hours < 10) {
        hours = '0' + hours
    }
    hours = hours ? hours : 12;
    
    t = t.getUTCFullYear() + "-" + ('0' + (t.getUTCMonth() + 1)).slice(-2) + "-" + ('0' + t.getUTCDate()).slice(-2) + " " + (hours) + ":" + ('0' + t.getUTCMinutes()).slice(-2) + ':00';
    return t;
    
//    var now = new Date;
//    var utc_timestamp = Date.UTC(now.getUTCFullYear(),now.getUTCMonth(), now.getUTCDate() , 
//      now.getUTCHours(), now.getUTCMinutes(), now.getUTCSeconds(), now.getUTCMilliseconds());
    
}

var db_config = {
//    host: 'connect2students.cqk2ucg1rkvv.eu-west-1.rds.amazonaws.com',
//    user: 'connect2students',
//    password: 'KboRDT21MoDg',
//    database: 'connect2students'
    host: 'localhost',
    user: 'thomasdating',
    password: 'ht4nU5CU1YJzyUWa',
    database: 'thomasdating'
};
var debug = true;

var connection;
function handleDisconnect() {
    connection = mysql.createConnection(db_config); // Recreate the connection, since
    connection.connect(function (err) {              // The server is either down
        if (err) {                                     // or restarting (takes a while sometimes).
            console.log('error when connecting to db:', err);
            setTimeout(handleDisconnect, 2000); // We introduce a delay before attempting to reconnect,
        } else {
            if (scriptStart) {
                scriptStart = false;
            }
        }
    });
    connection.on('error', function (err) {
        if (err.code === 'PROTOCOL_CONNECTION_LOST') { // Connection to the MySQL server is usually
            handleDisconnect();                         // lost due to either server restart, or a
        } else {                                      // connnection idle timeout (the wait_timeout
            // server variable configures this)
        }
    });
}
handleDisconnect();


try {
    var usernames = {};
    io.on('connection', function (socket) {

        try {
            socket.on('chat message', function (obj) {
                
                var conversationId = obj.conversationId;
                var receiever = obj.receiever;
                var sender = obj.sender;
				var message = sanitze.sanitize(obj.message);
                //console.log('message: ' + message);
				
				/*socket.broadcast.emit('chat message', {
					username: sender,
					receiever: receiever,
					sender: sender,
					message: message
				});*/
				// sender is valid or not 
                connection.query('SELECT * from users where id =?', [sender], function (err, rows, fields) {
                    if (rows.length > 0) {
                        // lets insert this 
                        var data = {sender_id: sender, receiver_id: receiever, message: message};
                        var d = new Date();
                        d = d.getFullYear() + "-" + ('0' + (d.getMonth() + 1)).slice(-2) + "-" + ('0' + d.getDate()).slice(-2) + " " + ('0' + d.getHours()).slice(-2) + ":" + ('0' + d.getMinutes()).slice(-2) + ":" + ('0' + d.getSeconds()).slice(-2);
                         var t = fetchCurrentDate();
                        // WE DO HAVE A CONVERSATION LETS START FROM HERE NOW 
                        
                        connection.query('INSERT INTO chats (`sender_id`, `receiver_id`, `message`, `seen`, `status`, `created`, `modified`) VALUES ("' + data.sender_id + '", "' + data.receiver_id + '", "' + data.message + '", 0, 1,  "' + t + '", "' + t + '")', function (err, result) {
                            if (err)
                                throw err;
                            //var chatcreated = chatresult;
                            connection.query('select first_name, last_name, profilepic from users where id =?', data.sender_id, function (err, profileRows, fields) {
                                // var t = fetchCurrentDate();
                                if (usernames.hasOwnProperty(receiever)) {
                                    var user_socket_length = Object.keys(usernames[receiever]).length;
                                    for (var i = 0; i < user_socket_length; i++) {
                                        console.log('one-to-one-receiver-conversationId' + usernames[receiever][i] + 'message =' + message);
                                        usernames[receiever][i].emit('chat message', {
                                            sender_name: profileRows[0].first_name+' '+profileRows[0].last_name,
                                            profile_pic: 'http://eagermeets.com/storage/app/public/img/profilepic/' + profileRows[0].profilepic,
                                            receiever: receiever,
                                            sender: data.sender_id,
                                            message: message,
                                            created: t
                                        });
                                    }
                                }
                                //if (usernames.hasOwnProperty(sender) && Object.keys(usernames[sender]).length > 1) {
                                if (usernames.hasOwnProperty(sender)) {
                                    //console.log(t);
                                    /*console.log('---------usernames---------');
                                    console.log(usernames);*/
                                    var sender_socket_length = Object.keys(usernames[sender]).length;
                                    for (var i = 0; i < sender_socket_length; i++) {
                                        //console.log('one-to-one-sender-conversationId' + usernames[sender][i] + 'message =' + message);
                                        usernames[sender][i].emit('chat message', {
                                            sender_name: profileRows[0].first_name+' '+profileRows[0].last_name,
                                            profile_pic: 'http://eagermeets.com/public/images/sent.png', // + profileRows[0].profilepic,
                                            receiever: receiever,
                                            sender: data.sender_id,
                                            message: message,
                                            created: t
                                        });
                                    }
                                }

                            });

                        });
                    } else {
                        var data = {result: 'error', message: 'sender is not valid'};
                        socket.emit('notify', data);
                    }
                });
                // receiver is friend of sender
                // seder and recevier are both premium members
                // 
            });
        } catch (err) {
//OH MY GOD SOME EXCEPTION OCCURED
            console.log('Chat Message' + err);
        }


        try {

            socket.on('group notification', function (groupData) {

                var obj = JSON.parse(groupData);
                var action = obj.action;
                if (action == 'userAdded') {
                    var t = fetchCurrentDate();
                    for (var i = 0; i < obj.member.length; i++) {
                        
                        receiver = obj.member[i].id;
                        if (usernames.hasOwnProperty(receiver)) {
                            console.log('sent - group - chat');
                            var receiver_socket_length = Object.keys(usernames[receiver]).length;
                            for (var i = 0; i < receiver_socket_length; i++) {

                                usernames[receiver][i].emit('group notification', {
                                    action: obj.action,
                                    groupId: obj.groupId,
                                    group_message: obj.groupMessage,
                                    groupName: obj.groupName,
                                    conversationValue: obj.conversationValue,
                                    created: t
                                });
                            }
                        }
                    }


                    //LETS TELL THIS NEWLY ADDED USER STORY TO ALL GROUP MEMBERS
                    
                     connection.query('SELECT * from cs_group_members where group_id =?', [obj.groupId], function(err, rows, fields) {
                     if (err)
                     throw err;
                     // NOW LETS SEND THIS MESSAGE TO WHOLE GROUP
                     for (i = 0; i < rows.length; i++) {
                     if (usernames.hasOwnProperty(rows[i].user_id)) {
                     var user_socket_length = Object.keys(usernames[rows[i].user_id]).length;
                     for (var a = 0; a < user_socket_length; a++) {
                     usernames[receiver][i].emit('group notification', {
                     action: 'newUserAdded',
                     group_message: obj.groupMessage,
                     groupId: obj.groupId
                     });
                     }
                     }
                     }
                     
                     });
                     



                }
                else if (action == 'userDeleted') {
                    console.log('Action -> In Deleted');
                    receiver = obj.userId;

                    if (usernames.hasOwnProperty(receiver)) {
                        var receiver_socket_length = Object.keys(usernames[receiver]).length;
                        for (var i = 0; i < receiver_socket_length; i++) {

                            usernames[receiver][i].emit('group notification', {
                                action: obj.action,
                                groupId: obj.groupId
                            });
                        }
                    }
                }

            });
        } catch (groupERR) {


        }


        try {
            socket.on('is_typing', function (typingInfo) {

                var obj = JSON.parse(typingInfo);

                var typing_for_username = obj.typing_for;
                var typist_username = obj.who_is_typing;
                var typing_status = obj.typing_status;
                var typist_name = obj.typist_name;
                if (usernames.hasOwnProperty(typing_for_username)) {
                    var user_socket_length = Object.keys(usernames[typing_for_username]).length;
                    for (var i = 0; i < user_socket_length; i++) {
                        usernames[typing_for_username][i].emit('is_typing', {
                            typing_for: typing_for_username,
                            who_is_typing: typist_username,
                            typing_status: typing_status,
                            'typist_name': typist_name
                        });
                    }
                }
            });
        } catch (isTypingErr) {
            console.log(isTypingErr);
        }


        try {
            socket.on('is_typing_group', function (typingData) {
                console.log('is - typing - group');
                var obj = JSON.parse(typingData);
                var typist_username = obj.who_is_typing;
                var typing_status = obj.typing_status;
                var typist_name = obj.typist_name;
                var group_id = obj.groupId;
                connection.query('SELECT * from cs_group_members where group_id =?', [group_id], function (err, rows, fields) {
                    if (err)
                        throw err;
                    for (i = 0; i < rows.length; i++) {


                        if (usernames.hasOwnProperty(rows[i].user_id)) {
                            console.log('sent - is - typing - group');
                            var user_socket_length = Object.keys(usernames[rows[i].user_id]).length;
                            for (var a = 0; a < user_socket_length; a++) {

                                usernames[rows[i].user_id][a].emit('is_typing_group', {
                                    who_is_typing: typist_username,
                                    typing_status: typing_status,
                                    'typist_name': typist_name,
                                    'group_id': group_id
                                });
                            }
                        }
                    }
                });
            });
        } catch (IsTypingGroupErr) {

        }


        try {

            socket.on('group message', function (msg) {
                console.log('group message');
                var obj = JSON.parse(msg);
                var groupId = obj.groupId;
                var message = sanitze.sanitize(obj.message);
                var conversationId = obj.conversationId;
                var sender = obj.sender;
		var datetime = obj.datetime; 
                var sender_name = obj.sender_name;
                // LETS CHECK IF THIS GROUP IS EXIST OR NOT IN OUR DB
                connection.query('SELECT * from cs_groups where id =?', [groupId], function (err, rows, fields) {

                    // LETS CHECK IF THE SENDER USER IS IN GROUP MEMBERS OR NOT 
                    var groupName = rows[0].name;

                    connection.query('SELECT count(*) as total FROM cs_group_members where group_id = "' + groupId + '" AND user_id = "' + sender + '"', function (err, totalRows, fields) {


                        if (totalRows[0].total > 0)
                        {
                           
                            if (rows.length > 0) {
                                //NOW LETS INSERT THIS MESSAGE TO OUR GROUP TABLE
                                var d = new Date();
                                d = d.getFullYear() + "-" + ('0' + (d.getMonth() + 1)).slice(-2) + "-" + ('0' + d.getDate()).slice(-2) + " " + ('0' + d.getHours()).slice(-2) + ":" + ('0' + d.getMinutes()).slice(-2) + ":" + ('0' + d.getSeconds()).slice(-2);
//                                var t = new Date();
//                                var hours = t.getHours();
//                                var ampm = hours >= 12 ? 'PM' : 'AM';
//                                hours = hours % 12;
//                                if (hours < 10) {
//                                    hours = '0' + hours
//                                }
//                                hours = hours ? hours : 12;
                                //t = t.getFullYear() + "-" + ('0' + (t.getMonth() + 1)).slice(-2) + "-" + ('0' + t.getDate()).slice(-2) + " " + (hours) + ":" + ('0' + t.getMinutes()).slice(-2) + ' ' + ampm;
                                
                                var t = fetchCurrentDate();
                                 
                                connection.query('INSERT INTO cs_chats (`conversation_id`, `sender_id`, `message`, `created`, `modified`) VALUES ("' + conversationId + '","' + sender + '", "' + message + '", "' + t + '", "' + t + '")', function (err, result) {

                                    // WHOOOP OUR CONVERSATION IS NOW IN CHATS TABLE LETS BROADCAST THIS MESSAGE TO REST OF ALL USERS 
                                    // LETS FETCH THE GROUP MEMBERS
                                    connection.query('SELECT * from cs_group_members where group_id =?', [groupId], function (err, rows, fields) {
                                        if (err)
                                            throw err;
                                        profile_pic = '';
                                        connection.query('select profile_pic from cs_user_profiles where id =?', sender, function (err, profileRows, fields) {
                                            if (err)
                                                throw err;
                                            // NOW LETS SEND THIS MESSAGE TO WHOLE GROUP
                                            for (i = 0; i < rows.length; i++) {
                                                if (usernames.hasOwnProperty(rows[i].user_id)) {
                                                    var user_socket_length = Object.keys(usernames[rows[i].user_id]).length;
                                                    for (var a = 0; a < user_socket_length; a++) {
                                                        usernames[rows[i].user_id][a].emit('group message', {
                                                            profile_pic: 'http://52.210.101.126/uploads/user_profile_pics/avatar/' + profileRows[0].profile_pic,
                                                            //profile_pic: 'http://connect2students.com/img/groupimg.png',
                                                            receiever: rows[i].user_id,
                                                            conversation_id: conversationId,
                                                            groupId: groupId,
                                                            group_name: groupName,
                                                            is_admin: rows[i].is_creator,
                                                            sender: sender,
                                                            message: message,
                                                            sender_name: sender_name,
                                                            created: t
                                                        });
                                                    }
                                                }
                                            }
                                        });
                                    });
                                });
                                // NOW LETS TELL OUR CONVERSATION THAT WE ARE FIRST (FOR NEWEST CONVERSATION)
                                connection.query('UPDATE cs_conversations SET `modified` = "' + d + '" WHERE `id` = "' + conversationId + '"  ', function (err, result) {
                                    if (err)
                                        throw err;
                                });
                            }

                        } else {
                            console.log('in else');


                            if (usernames.hasOwnProperty(sender)) {
                                var sender_socket_length = Object.keys(usernames[sender]).length;
                                for (var i = 0; i < sender_socket_length; i++) {

                                    usernames[sender][i].emit('group notification', {
                                        action: 'notExists',
                                        groupId: groupId,
                                        conversationValue: obj.conversationId,
                                        sender_name: sender_name
                                    });
                                }
                            }

                        }

                    });
                });
            });
        } catch (isGroupErr) {
            console.log(isGroupErr);
        }

        try {
            socket.on('add user', function (username) {
                //console.log("Connected > " + username);
                //console.log('==============================');
                if (usernames.hasOwnProperty(username)) {
                    var total_socket_length = Object.keys(usernames[username]).length;
                    socket.username = username;
                    socket.socketIndex = total_socket_length;
                    //console.log('if >> ' + socket.username + '>>>>>' + socket.socketIndex + ">>>" + Object.keys(usernames[username]).length);
                    usernames[username][total_socket_length] = socket;
                } else {

                    socket.username = username;
                    socket.socketIndex = 0;
                    var temp = {};
                    temp[0] = socket;
                    usernames[username] = temp;
                    //console.log('else >>' + socket.username + '>>>>>' + socket.socketIndex);
                }
                
                connection.query('UPDATE cs_user_profiles SET `is_online` = "1" WHERE `id` = "' + socket.username + '"  ', function (err, result) {
                    
                });
                
            });
        } catch (err) {
            console.log(err)
        }

        socket.on('disconnect', function () {
            var socketIndex = socket.socketIndex;
            var disconnectedUser = socket.username;
            //console.log('logout user >>>' + socketIndex + '>>>>>' + disconnectedUser);
            if (typeof disconnectedUser != 'undefined' && typeof socket.socketIndex != 'undefined') {
//                console.log('deleting : '+socket.username);
                var universal_length = Object.keys(usernames[socket.username]).length;

                if (Object.keys(usernames[socket.username]).length == 1) {
//                    connection.connect(config, function(err) {
//                           var request = new connection.Request();
//                           request.query("update user_profiles set online_status = 0 where id=" + socket.username, function(err, recordset) {
//                               console.log(socket.username + ' is offline');
//                               io.emit('user_online', {profie_id: socket.username, status: 0});
//                           });
//                    });
                    delete usernames[socket.username];
                } else {
                    delete usernames[socket.username][socket.socketIndex];
                    var j = 0;
                    var socketHolder = {};
                    for (var i = 0; i < universal_length; i++) {
                        if (typeof usernames[socket.username][i] !== 'undefined') {
                            usernames[socket.username][i].socketIndex = j;
                            socketHolder[j] = usernames[socket.username][i];
                            j++;
                        } else {
                            //console.log(i+'th position is deleted');
                        }
                    }
                    usernames[socket.username] = socketHolder;
                }


            }
        });
    });
} catch (err) {
    console.log('server side err : ' + err);
}
http.listen(8080, function () {
    console.log('listening on *:8080');
});

function insertChat(userConversationId, data) {

    connection.query('INSERT INTO cs_chats (`conversation_id`, `sender_id`, `receiver_id`, `message`) VALUES ("' + userConversationId + '", "' + data.sender_id + '", "' + data.receiver_id + '", "' + data.message + '")', function (err, result) {
        if (err)
            throw err;
//                            var data = {result: 'success', message: message};
//                            socket.emit('notify', data);

        if (usernames.hasOwnProperty(receiever)) {
            var user_socket_length = Object.keys(usernames[receiever]).length;
            for (var i = 0; i < user_socket_length; i++) {
                usernames[receiever][i].emit('chat message', {
                    receiever: receiever,
                    sender: socket.username,
                    message: message
                });
            }
        }
        //if (usernames.hasOwnProperty(sender) && Object.keys(usernames[sender]).length > 1) {
        if (usernames.hasOwnProperty(sender)) {
            var sender_socket_length = Object.keys(usernames[sender]).length;
            for (var i = 0; i < sender_socket_length; i++) {

                usernames[sender][i].emit('chat message', {
                    receiever: receiever,
                    sender: socket.username,
                    message: message
                });
            }
        }

    });
}