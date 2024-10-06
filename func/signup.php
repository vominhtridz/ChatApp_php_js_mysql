<?php
ob_start();
session_start();
if(isset($_SESSION['loggedIn'])){
  header('location: home.php');
  exit();
}
  $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING); // Hoặc FILTER_SANITIZE_FULL_SPECIAL_CHARS
  $password = $_POST['password']; // Cần được hash trước khi lưu
  $fullname = filter_input(INPUT_POST, 'fullname', FILTER_SANITIZE_STRING); // Lọc dữ liệu fullname
  $hash = password_hash($password, PASSWORD_DEFAULT);
  $Vietnames = "/[àáạảãâầấậẩẫăằắặẳẵèéẹẻẽêềếệểễìíịỉĩòóọỏõôồốộổỗơờớợởỡùúụủũưừứựửữỳýỵỷỹđ]/u";
  // check validation
  if(empty($username) || trim($username) !== $username || preg_match($Vietnames, $username)){
    echo 'username có dấu hoặc khoảng cách <br>';
    exit();
  }
  if(empty($password)){
    echo'không bỏ trống Mật khẩu <br>';
    exit();
  }
  if(empty($fullname)){
    echo'không bỏ trống họ và tên <br>';
    exit();
  }
  include($_SERVER['DOCUMENT_ROOT'] .'/website/func/FileImage.php');
  include($_SERVER['DOCUMENT_ROOT'] .'/website/database.php');
  include($_SERVER['DOCUMENT_ROOT'] .'/website/func/RegisterFunc.php');
  // create file image
  $FileResult = CreateFileImage();
  if(!is_null($FileResult)){
     $RegiResult = RegisterFunc($conn,$username, $fullname, $FileResult, $hash);
  }
 
    mysqli_close($conn);

ob_end_flush();
?>