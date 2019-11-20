//var app     = require('express')();
var http    = require('http').Server();
var io      = require('socket.io')(http);
/*app.get('/', function(req, res) {
    res.sendFile(__dirname + '/index.html');
});*/

try{
    var usernames = {};
    io.on('connection', function(socket) {
        //console.log(Object.keys(usernames));
        socket.on('chat message', function(msg) {
            var obj         = JSON.parse(msg);
            var username    = obj.username;
            var message     = obj.message;
            var chat = eval ("(" + message + ")");
            var scriptMsg = chat.Message.description;
            var realMsg = scriptMsg.toString();
            // Code to check for key is avialable or important 
            if(usernames.hasOwnProperty(username)){
                console.log('Recieved : '+username);
                usernames[username].emit('chat message', {
                    username: socket.username,
                    message: message
                });
            }
            //io.emit('chat message', {username: socket.username,message: msg});
        });


        /*socket.on('Database Update', function(msg) {
            io.emit('Database Update', msg);
        });*/

        socket.on('post_publish', function(data) {
            io.emit('post_publish', {
                post_info: data
            });
        });
        
        socket.on('comment', function(data) {
            console.log('comment posted ');
            io.emit('comment', {
                comment_info: data
            });
        });
        
        socket.on('add user', function(username) {
            if(usernames.hasOwnProperty(username)){
//                console.log(username+' active');
            }else{
                socket.username         = username;
                usernames[username]     = socket;
                console.log(username+' joined.');
            }
            //io.emit('User Added Notification', username);
        });
        socket.on('disconnect', function(){
            var disconnectedUser    = socket.username;
            if(typeof disconnectedUser !='undefined'){
                delete usernames[socket.username];
                console.log(disconnectedUser+' left.');
            }
        });
    });
}catch(err){
    console.log('server side err : '+err);
}
http.listen(3000, function() {
    console.log('listening on *:3000');
});