<?php
if(isset($_SESSION['loggedIn'])){
    header('location: login.php');
    exit();
}
session_start();
include('database.php');
$userid = $_SESSION['uid'];
$query = "UPDATE users SET status = 0 WHERE id = $userid";
mysqli_query($conn, $query);
session_unset();
session_regenerate_id(true);
session_destroy();
header('location: login.php');
exit();
?>