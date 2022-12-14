var querystring = require("querystring");
var fs = require("fs");

function start(response, postData) {
    console.log("Le gestionnaire 'start' est appelé.");
    var body = '<html>'+
    '<head>'+
    '<meta http-equiv="Content-Type" '+
    'content="text/html; charset=UTF-8" />'+
    '</head>'+
    '<body>'+
    '<form action="/upload" method="post">'+
    '<textarea name="text" rows="20" cols="60"></textarea>'+
    '<input type="submit" value="Envoyer" />'+
    '</form>'+
    '</body>'+
    '</html>';
    response.writeHead(200, {"Content-Type": "text/html"});
    response.write(body);
    response.end();
}

function upload(response, postData) {
    console.log("Le gestionnaire 'upload' est appelé.");
    response.writeHead(200, {"Content-Type": "text/plain"});
    response.write("Vous avez envoyé : " + querystring.parse(postData).text);
    response.end();
}

function show(response, postData) {
    console.log("Le gestionnaire 'show' est appelé.");
    fs.readFile("C:/node/m1-nodejs/232ad-16611033802378-1920.png", "binary", function(error, file) {
        if(error) {
            response.writeHead(500, {"Content-Type": "text/plain"});
            response.write(error + "\n");
            response.end();
        } else {
            response.writeHead(200, {"Content-Type": "image/png"});
            response.write(file, "binary");
            response.end();
        }
    });
}

exports.start = start;
exports.upload = upload;
exports.show = show;
