<?php
session_start();
if(isset($_SESSION['loggedIn'])){
  header('location: home.php');
  exit();
}
if($_SERVER['REQUEST_METHOD'] == 'POST'){
  $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING); // Hoặc FILTER_SANITIZE_FULL_SPECIAL_CHARS
  $password = $_POST['password']; // Cần được hash trước khi lưu
  $hash = password_hash($password, PASSWORD_DEFAULT);
  $Vietnames = "/[àáạảãâầấậẩẫăằắặẳẵèéẹẻẽêềếệểễìíịỉĩòóọỏõôồốộổỗơờớợởỡùúụủũưừứựửữỳýỵỷỹđ]/u";
  // check validation
  if(empty($username) || trim($username) !== $username || preg_match($Vietnames, $username)){
    echo 'username có dấu hoặc khoảng cách';
    exit();
  }
  if(empty($password)){
    echo'không bỏ trống Mật khẩu';
    exit();
  }
  include($_SERVER['DOCUMENT_ROOT'] .'/website/database.php');
  $sql = "SELECT * FROM users WHERE username = '$username'";
  $result = mysqli_query($conn, $sql);
  if(mysqli_num_rows($result) > 0){
    $user = mysqli_fetch_assoc($result);
    if(password_verify($password,$hash)){
        $_SESSION['uid'] = $user['id'];
        $_SESSION['fullname'] = $user['fullname'];
        $_SESSION['img'] = $user['imageFile'];
        $_SESSION['loggedIn'] = true;
        $_SESSION['status'] = true;
        $userid = $_SESSION['uid']; 
        $query = "UPDATE users SET status = true WHERE id = $userid";
        mysqli_query($conn, $query);
        echo 'success';
     
        exit();
      }
      else {
        echo 'Sai mật khẩu';
     
      }
  }
  else {
    echo 'tài khoản không tồn tại';
  }
  

    mysqli_close($conn);
}
?>