<!DOCTYPE html>
<html>
    <head>
        <title>Laravel</title>
        <link href="//fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">
    </head>
    <body>

        <h2>User's List</h2>
        <ul id="user-list">
        </ul>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/socket.io/1.3.6/socket.io.min.js"></script>

        <script>
            //js��ȡ��Ŀ��·�����磺 http://localhost:8083/uimcardprj
            function getRootPath(){
                //��ȡ��ǰ��ַ���磺 http://localhost:8083/uimcardprj/share/meun.jsp
                var curWwwPath=window.document.location.href;
                //��ȡ������ַ֮���Ŀ¼���磺 uimcardprj/share/meun.jsp
                var pathName=window.document.location.pathname;
                var pos=curWwwPath.indexOf(pathName);
                //��ȡ������ַ���磺 http://localhost:8083
                var localhostPaht=curWwwPath.substring(0,pos);
                //��ȡ��"/"����Ŀ�����磺/uimcardprj
                var projectName=pathName.substring(0,pathName.substr(1).indexOf('/')+1);
                if(projectName!="tdbasset"){
                    projectName="";
                }
                return(localhostPaht+projectName);
            };
            var socket = io(getRootPath()+':3000');

            socket.on("test-channel:App\\Events\\UserRegisteredEvent", function(message){
                console.log(message);

                // Appending user to user's list
                var ul = document.getElementById("user-list");
                var li = document.createElement("li");
                li.appendChild(document.createTextNode(message.user));
                ul.appendChild(li);

            });
        </script>
    </body>
</html>
