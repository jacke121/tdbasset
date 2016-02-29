<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>你好</title>
        <link href="//fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">
    </head>
    <body>

        <h2>User's List</h2>
        <ul id="user-list">
        </ul>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/socket.io/1.3.6/socket.io.min.js"></script>

        <script>
            //js获取项目根路径，如： http://localhost:8083/uimcardprj
            function getRootPath(){
                //获取当前网址，如： http://localhost:8083/uimcardprj/share/meun.jsp
                var curWwwPath=window.document.location.href;
                //获取主机地址之后的目录，如： uimcardprj/share/meun.jsp
                var pathName=window.document.location.pathname;
                var pos=curWwwPath.indexOf(pathName);
                //获取主机地址，如： http://localhost:8083
                var localhostPaht=curWwwPath.substring(0,pos);
                //获取带"/"的项目名，如：/uimcardprj
                var projectName=pathName.substring(0,pathName.substr(1).indexOf('/')+1);
                if(projectName!="tdbasset"){
                    projectName="";
                }
                return(localhostPaht+projectName);
            };
            var socket = io(getRootPath()+':8082');

            socket.on("test-channel:App\\Events\\UserRegisteredEvent", function(message){
                console.log(message);

                // Appending user to user's list
                var ul = document.getElementById("user-list");
                var li = document.createElement("li");
                li.appendChild(document.createTextNode(message.user_id+message.user));
                ul.appendChild(li);

            });
        </script>
    </body>
</html>
