
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chat</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">
    <div id= ''class="flex justify-center items-center h-screen  font-sans">
        <div  class="w-full bg-gray-50  relative h-3/4 max-w-md bg-white shadow-md rounded flex flex-col">
            <div class="flex py-2 pr-4 pl-2 shadow bg-white  flex-wrap items-center w-full justify-between cursor-pointer">
              
            <?php
            include './func/UserChat.php'
            ?>
            
            <div class="flex-1 h-full  overflow-y-auto mb-10 w-full p-6  " id="chatbox">
                
                
            </div>
          

            <form id="chatform" action="#" method="post" class="absolute left-0 right-0 bottom-0  flex space-x-4 bg-white p-2">
                <input type="text" class="incoming_id" name="incoming_id" 
                value="
                <?php $url="http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
                $url_components = parse_url($url);
                parse_str($url_components['query'], $params);
                $userid = $params['id'];
                echo $userid;?>" hidden>
            <input id="messageInput" name="messageInput" type="text" class="input-field flex-grow px-4 py-2 border rounded-lg" placeholder="Type your message...">
                <button type="submit" class="bg-blue-500 text-white px-6 py-2 rounded-lg">gửi</button>
            </form>
        </div>
    </div>

<script src="./js/chat.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</body>
</html>

