<?php
$searching = false;
include ($_SERVER['DOCUMENT_ROOT']. '/website/database.php');
session_start();
if(!$_SESSION['uid']){
  header('location: login.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang chủ</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">
    <div class="flex flex-col justify-center font-[sans-serif] sm:h-screen p-4">
        <div class="max-w-md w-full mx-auto border border-gray-300 rounded-2xl p-4">
            <!--header  -->
            <div class="flex relative justify-between items-center  cursor-pointer " >
            <div class="flex items-center">
                <div class="relative inline-block">
                <img 
                src="./uploads/<?php
                if(isset($_SESSION['img'])){
                  echo $_SESSION['img'];
  
                }
                else{
                  echo "user.png";
                }
                ?>" class="w-12 h-12 rounded-full border-2 border-blue-600 p-0.5 " alt="">
                <span class="h-3 w-3 rounded-full border border-white bg-green-500 block absolute top-1 right-0"></span>
            </div>
            <div>
                <?php include './func/fullname.php' ?>
                <?php include './func/OperatingStatus.php' ?>
            </div>
            </div>
            <a href="logout.php" class="px-6 py-2 rounded-md shadow bg-blue-500 text-white font-medium">Đăng xuất</a>
        </div>
        <!-- search -->
        <?php include './Search.php'?>
          <!-- other people -->
        <?php include './func/RenderOtherUsers.php'?>
    </div>
    </div>
</body>
</html>
<?php
// Check if the user is logged in
if (!isset($_SESSION['loggedIn'])) {
  header('Location: login.php');
  exit();
} 
?>