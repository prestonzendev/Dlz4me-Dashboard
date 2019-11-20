var express     = require('express');
var https       = require('https');
var http        = require('http');
var fs          = require('fs');
var cors        = require('cors');
// This line is from the Node.js HTTPS documentation.
var options     = {
    key: fs.readFileSync('server.key'),
    cert: fs.readFileSync('server.crt')
};
// Create a service (the app object is just a callback).
var app         = express();
app.use(function (req, res, next) {
    res.header("Access-Control-Allow-Origin", "https://www.scootalks.com");
    res.header("Access-Control-Allow-Methods", "GET,PUT,POST,DELETE,OPTIONS");
    res.header("Access-Control-Allow-Headers", "Origin, X-Requested-With, Content-Type, Accept");
    res.header("Access-Control-Allow-Credentials", "true");
    next();
});
var server      = https.createServer(options, app).listen(3000);
var io          = require('socket.io')(server);
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
            //io.emit('User Added Notification', username);
        });
        socket.on('disconnect', function(){
            var socketIndex         = socket.socketIndex;
            var disconnectedUser    = socket.username;
            if(typeof disconnectedUser !='undefined' && typeof socket.socketIndex !='undefined'){
                var universal_length    = Object.keys(usernames[socket.username]).length;
                if(Object.keys(usernames[socket.username]).length==1){
                    delete usernames[socket.username];
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
