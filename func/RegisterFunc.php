<?php 
function RegisterFunc( $conn,$username, $fullname, $FileResult, $hash){
  //heck User exits
  $sql_queryuser = "SELECT * FROM users WHERE username = '$username'";
    $result = mysqli_query($conn, $sql_queryuser);
  if (mysqli_num_rows($result) > 0) {
        echo "Tài khoản đã được đăng kí";
        exit();
  }
  else {
    try {
          // Khởi tạo câu lệnh chuẩn bị (prepared statement)
          if ($FileResult !== NULL) {
              // Nếu có file được upload
              $sql_insert = "INSERT INTO users (username, password, fullname, imageFile) VALUES (?, ?, ?, ?)";
              $stmt = $conn->prepare($sql_insert);
              $stmt->bind_param("ssss", $username, $hash, $fullname, $FileResult);
          } else {
              // Nếu không có file được upload
              $sql_insert = "INSERT INTO users (username, password, fullname, imageFile) VALUES (?, ?, ?, NULL)";
              $stmt = $conn->prepare($sql_insert);
              $stmt->bind_param("sss", $username, $hash, $fullname); // Không có `imageFile`
          }
          // Thực thi truy vấn
          if ($stmt->execute()) {
              echo "success";
            } else {
                echo "Lỗi khi thêm người dùng.";
                return false;
            }
          
      } catch (mysqli_sql_exception $e) {
          // In ra lỗi nếu có
          echo "Xuất hiện lỗi: " . $e->getMessage() . "<br/>";
          return false;
      }
  }
}
?>