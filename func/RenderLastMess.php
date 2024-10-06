<?php
$queryLastMess = "
    SELECT m.*
    FROM messages m
    INNER JOIN (
        SELECT chat_room_id, MAX(create_at) AS latest_create_at
        FROM messages
        GROUP BY chat_room_id
    ) latest_messages ON m.chat_room_id = latest_messages.chat_room_id 
    AND m.create_at = latest_messages.latest_create_at
";

$result1 = mysqli_query($conn, $queryLastMess);

// First, fetch all rows into an associative array
$arr = mysqli_fetch_all($result1, MYSQLI_ASSOC);
?>