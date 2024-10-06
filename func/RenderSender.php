
<?php
    include $_SERVER['DOCUMENT_ROOT'] .'/website/database.php';
    session_start();
    $currUserid = $_SESSION['uid'];
    $incoming_id = mysqli_real_escape_string($conn, $_POST['incoming_id']);
    $RoomExits = "SELECT * FROM messages 
                    WHERE (sender_id = '$incoming_id' OR sender_id = '$currUserid') 
                    AND (receiver_id = '$incoming_id' OR receiver_id = '$currUserid') 
                    ";

    $checkExits = mysqli_query($conn,$RoomExits);
    
    
    if (mysqli_num_rows($checkExits) > 0) {
    $Room = mysqli_fetch_assoc($checkExits)['chat_room_id'];
    $RoomExits = "SELECT * from messages WHERE chat_room_id = '$Room'
                ";
    $result = mysqli_query($conn,$RoomExits);
     if ($result) {
        while ($value = mysqli_fetch_assoc($result)) {
            $sender = $value['sender_id'];
            $received = $value['receiver_id'];
            $message = $value['content'];
            $create_at = $value['create_at'];

            if ($currUserid == $sender) {
                echo "<div class='space-y-2 flex flex-col items-end'>
                        <div>
                            <p class='bg-blue-500 text-white px-4 py-2 text-sm leading-4 rounded-full shadow border border-blue-50'>$message</p>
                            <span class='text-[9px] flex justify-end pr-2 leading-4 italic text-right font-sans text-black' style='font-size: 12px;'>$create_at</span>
                        </div>
                      </div>";
            } 
            elseif ($incoming_id == $sender) {
                echo "<div class='space-y-2 flex flex-col items-start'>
                        <div>
                            <p class='bg-gray-500 text-white px-4 py-2 text-sm leading-4 rounded-full shadow border border-gray-50'>$message</p>
                            <span class='text-[9px] flex justify-start pl-2 leading-4 italic text-left font-sans text-black' style='font-size: 12px;'>$create_at</span>
                        </div>
                      </div>";
            }
        }
    } else {
        echo "Lỗi truy vấn: " . mysqli_error($conn);
    }
}
?>
