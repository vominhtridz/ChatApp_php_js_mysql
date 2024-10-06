<?php
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    include $_SERVER['DOCUMENT_ROOT'] .'/website/database.php';
    session_start();
    $up_comming = trim($_POST['incoming_id']);
    $message = $_POST['messageInput'];
    $currUserid = $_SESSION['uid'];
    $RoomExits = "SELECT * FROM messages 
                    WHERE (sender_id = '$up_comming' OR sender_id = '$currUserid') 
                    AND (receiver_id = '$up_comming' OR receiver_id = '$currUserid') 
                    ";

    $checkExits = mysqli_query($conn,$RoomExits);
    
    // Check Room is exits
    if(mysqli_num_rows($checkExits) > 0){
        try{
        $oldRoom = mysqli_fetch_assoc($checkExits)['chat_room_id'];
        $query = "INSERT INTO messages (sender_id, receiver_id, content, chat_room_id) VALUES ('$currUserid', '$up_comming', '$message', '$oldRoom')";
        $newMessage =  mysqli_query($conn,query: $query);
        exit();
        }
        catch(mysqli_sql_exception $e){
            echo "Xuất hiện lỗi: " . $e->getMessage() . "<br>";
        }
    }
    else {
        $sql = "SELECT count(*) as count FROM messages";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);
        $newRoom =  $row['count']. 1;
        $query = "INSERT INTO messages (sender_id, receiver_id, content, chat_room_id) VALUES ('$currUserid', '$up_comming', '$message', '$newRoom')";
        $CreateChat =  mysqli_query($conn,query: $query);
    }
}
?>