//var app     = require('express')();
var http    = require('http').Server();
var io      = require('socket.io')(http);
/*app.get('/', function(req, res) {
    res.sendFile(__dirname + '/index.html');
});*/

try{
    var usernames = {};
    io.on('connection', function(socket) {
        socket.on('chat message', function(msg) {
            var obj         = JSON.parse(msg);
            var username    = obj.username;
            var sender      = obj.sender;
            var message     = obj.message;
            // Code to check for key is avialable or important 
            if(usernames.hasOwnProperty(username)){
                var user_socket_length  = Object.keys(usernames[username]).length;
                for(var i = 0;i<user_socket_length;i++){
                    usernames[username][i].emit('chat message', {
                        username: socket.username,
                        sender:sender,
                        message: message
                    });
                }
            }
            if(usernames.hasOwnProperty(sender) && Object.keys(usernames[sender]).length>1){
                var sender_socket_length  = Object.keys(usernames[sender]).length;
                for(var i = 0;i<sender_socket_length;i++){
                    if(socket.socketIndex!=i){
                        usernames[sender][i].emit('chat message', {
                            username: socket.username,
                            sender: socket.username,
                            message: message
                        });
                    }
                }
            }
        });
        socket.on('is_typing', function(typingInfo) {
            var obj                     = JSON.parse(typingInfo);
            var typing_for_username     = obj.typing_for;
            var typist_username         = obj.who_is_typing;
            var typing_status           = obj.typing_status;
            var typist_name             = obj.typist_name;
            if(usernames.hasOwnProperty(typing_for_username)){
                var user_socket_length  = Object.keys(usernames[typing_for_username]).length;
                for(var i = 0;i<user_socket_length;i++){
                    usernames[typing_for_username][i].emit('is_typing', {
                        typing_for: typing_for_username,
                        who_is_typing:typist_username,
                        typing_status: typing_status,
                        'typist_name':typist_name
                    });
                }
            }
        });
        socket.on('post_publish', function(data) {
            io.emit('post_publish', {
                post_info: data
            });
        });
        
        socket.on('comment', function(data) {
//            console.log('comment posted ');
            io.emit('comment', {
                comment_info: data
            });
        });
        socket.on('add user', function(username) {
            if(usernames.hasOwnProperty(username)){
                var total_socket_length = Object.keys(usernames[username]).length;
//                console.log(total_socket_length);
                socket.username           = username;
                socket.socketIndex        = total_socket_length;
                usernames[username][total_socket_length]        = socket;
            }else{
                socket.username         = username;
                socket.socketIndex      = 0;
                var temp                = {};
                temp[0]                 = socket;
               // console.log('Newly socket id = '+temp[0].id +' For : '+username);
                usernames[username]     = temp;
            }
//            console.log(Object.keys(io.sockets));
            //io.emit('User Added Notification', username);
        });
        socket.on('disconnect', function(){
            var socketIndex         = socket.socketIndex;
            var disconnectedUser    = socket.username;
            if(typeof disconnectedUser !='undefined' && typeof socket.socketIndex !='undefined'){
//                console.log('deleting : '+socket.username);
                var universal_length    = Object.keys(usernames[socket.username]).length;
                if(Object.keys(usernames[socket.username]).length==1){
                    delete usernames[socket.username];
                    //console.log('Complete socket is deleted');
                }else{
                    delete usernames[socket.username][socket.socketIndex];
                    var j               = 0;    
                    var socketHolder    = {};
                    for(var i=0;i<universal_length;i++){
                        if(typeof usernames[socket.username][i] !=='undefined'){
                            usernames[socket.username][i].socketIndex   = j;
                            socketHolder[j]   = usernames[socket.username][i];
                            j++;
                        }else{
                            //console.log(i+'th position is deleted');
                        }
                    }
                    usernames[socket.username]  = socketHolder;
                }
            }
        });
    });
}catch(err){
    console.log('server side err : '+err);
}
http.listen(3000, function() {
    console.log('listening on *:3000');
});