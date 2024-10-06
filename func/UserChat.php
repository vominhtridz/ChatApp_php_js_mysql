
<?php
include $_SERVER['DOCUMENT_ROOT'] .'/website/database.php';
session_start();
$url="http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
$url_components = parse_url($url);
parse_str($url_components['query'], $params);
$userid = $params['id'];
$query = "SELECT * FROM users WHERE id = $userid";
$result = mysqli_query($conn, $query);
$user = mysqli_fetch_assoc($result);
$image = $user['imageFile'] != null || !empty($user['imageFile']) ?$user['imageFile'] : 'user.png' ;
$fullname = $user['fullname'];
$status = $user['status'] == 1 ? 'Đang hoạt động' : 'Ngoại tuyến';
$status1 = $user['status'] == 1 ? 'bg-green-500' : 'bg-gray-600';
echo "<div class='flex gap-2 items-center'>
<a href='home.php' class=''>
<svg xmlns='http://www.w3.org/2000/svg' class='h-6 w-6 text-blue-500' fill='none' viewBox='0 0 24 24' stroke='currentColor' stroke-width='2'>
<path stroke-linecap='round' stroke-linejoin='round' d='M15 19l-7-7 7-7' />
</svg>
</a>
<img src='./uploads/$image' class='w-12 h-12 rounded-full border-2 border-blue-600 p-0.5' />
<div>
<p class='text-[18px] text-gray-800 leading-4 font-bold'>$fullname</p>
<p class='text-xs text-gray-500 mt-0.5'>$status</p>
</div>

</div>
<span class='h-4 w-4  rounded-full border border-white $status1 block '></span>
</div> ";
?>
