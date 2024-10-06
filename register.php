<?php
session_start();
if(isset($_SESSION['uid'])){
  header('location: home.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng kí</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">
 
    <div  class="flex flex-col justify-center font-[sans-serif] sm:h-screen p-4">
      <div   class="registerForm max-w-md w-full mx-auto border border-gray-300 rounded-2xl p-8">
        <div class="text-center text-2xl font-bold mb-4">
         Đăng kí
        </div>
        <form  autocomplete="off"  action="#" method="POST" enctype="multipart/form-data">
          <p class="error-text px-4 py-2 bg-red-50 hidden font-bold text-red-500 text-lg"></p>
          <div class="space-y-2">
            <div>
              <label class="text-gray-800 text-sm font-medium mb-2 block">User Name</label>
              <input required name="username" type="text" class="text-gray-800 bg-white border border-gray-300 w-full text-sm px-4 py-3 rounded-md outline-blue-500" placeholder="Nhập tên người dùng" />
            </div>
            <div>
              <label class="text-gray-800 text-sm font-medium mb-2 block">Họ và tên</label>
              <input required name="fullname" type="text" class="text-gray-800 bg-white border border-gray-300 w-full text-sm px-4 py-3 rounded-md outline-blue-500" placeholder="Nhập họ và tên" />
            </div>
        
            <div>
              <label class="text-gray-800 text-sm font-medium mb-2 block">Mật khẩu</label>
              <input required id="password" name="password" type="password" class="text-gray-800 bg-white border border-gray-300 w-full text-sm px-4 py-3 rounded-md outline-blue-500" placeholder="Nhập Mật khẩu" />
            </div>
            <div>
              <label class="text-gray-800 text-sm font-medium mb-2 block">Ảnh</label>
              <input required id="image" name="image" type="file" class="text-gray-800 bg-white  w-full text-sm  rounded-md outline-blue-500"  />
            </div>

            <div class="flex items-center">
              <input required id="remember-me" name="remember-me" type="checkbox" class="h-4 w-4 shrink-0 text-blue-600 focus:ring-blue-500 border-gray-300 rounded" />
              <label for="remember-me" class="text-gray-800 ml-3 block text-sm">
               Tôi chấp nhận các  <a href="javascript:void(0);" class="text-blue-600 font-semibold hover:underline ml-1">Điều khoản và Điều kiện</a>
              </label>
            </div>
          </div>

          
            <input value="Đăng Kí" type="submit" id="register" class="w-full cursor-pointer mt-4 py-3 px-4 text-sm tracking-wider font-semibold rounded-md text-white bg-blue-600 hover:bg-blue-700 focus:outline-none">
              
            </input>
          
          <p class="text-gray-800 text-sm font-medium mt-6 text-center">Bạn đã có tài khoản? <a href="/website/login.php" class="text-blue-600 font-semibold hover:underline ml-1">Đăng nhập ở đây</a></p>
        </form>
      </div>
    </div>
    <script src="./js/signup.js"></script>
</body>
</html>
