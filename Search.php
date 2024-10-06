<form id="search" method="POST" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" class="flex rounded-md my-2 border-2 border-blue-500 overflow-hidden w-full mx-auto font-[sans-serif]">
    <input type="text" id="mess" name="mess" placeholder="Tìm kiếm bằng tên..." class="w-full outline-none bg-white text-gray-600 text-sm px-4 py-1.5" />
    <button type='submit' class="flex items-center justify-center bg-[#007bff] px-5">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 192.904 192.904" width="16px" class="fill-white">
            <path d="m190.707 180.101-47.078-47.077c11.702-14.072 18.752-32.142 18.752-51.831C162.381 36.423 125.959 0 81.191 0 36.422 0 0 36.423 0 81.193c0 44.767 36.422 81.187 81.191 81.187 19.688 0 37.759-7.049 51.831-18.751l47.079 47.078a7.474 7.474 0 0 0 5.303 2.197 7.498 7.498 0 0 0 5.303-12.803zM15 81.193C15 44.694 44.693 15 81.191 15c36.497 0 66.189 29.694 66.189 66.193 0 36.496-29.692 66.187-66.189 66.187C44.693 147.38 15 117.689 15 81.193z"></path>
        </svg>
    </button>
</form>

<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    include $_SERVER['DOCUMENT_ROOT'] . '/website/func/RenderLastMess.php';
    $searching = true;
    $message = strtolower($_POST['mess']);
    $query = 'SELECT * FROM users';
    $resultquery = mysqli_query($conn, $query);
    $allResults = mysqli_fetch_all($resultquery, MYSQLI_ASSOC);

    $arrResult = []; // Mảng lưu kết quả khớp
    foreach ($allResults as $value) {
        $lower_fullname = strtolower($value['fullname']);
        if (strpos($lower_fullname, $message) !== false) {
            $arrResult[] = $value['fullname']; // Thêm tên đã khớp vào mảng kết quả
        }
    }

    echo '<a href="home.php" class=" text-sm font-bold hover:text-base" > -> back home</a>';

    $currUserid = $_SESSION['uid'];
    foreach ($allResults as $queryResult) {
        if ($queryResult['id'] != $currUserid) {
            $fullname = $queryResult['fullname'];
            $fileImage = empty($queryResult['imageFile']) || $queryResult['imageFile'] == null ? './uploads/user.png' : './uploads/' . $queryResult['imageFile'];
            $status = $queryResult['status'] == 1 ? 'bg-green-500' : 'bg-gray-500';
            $id = $queryResult['id'];

            // Kiểm tra mảng tin nhắn để tìm tin nhắn cuối cùng giữa hai người
            $lastMess = '';
            $lastPerson = '';

            // Biến $arr cần chứa danh sách tin nhắn giữa hai người
            if (isset($arr)) {
                for ($j = 0; $j < count($arr); $j++) {
                    if ($arr[$j]['sender_id'] == $currUserid && $arr[$j]['receiver_id'] == $id) {
                        $lastMess = $arr[$j]['content'];
                        $lastPerson = 'Bạn';
                        break;
                    } else if ($arr[$j]['sender_id'] == $id && $arr[$j]['receiver_id'] == $currUserid) {
                        $lastMess = $arr[$j]['content'];
                        $lastPerson = 'Đối tác';
                        break;
                    }
                }
            }

            // Hiển thị thông tin người dùng và tin nhắn cuối cùng nếu tên khớp với kết quả tìm kiếm
            if (in_array($fullname, $arrResult)) {
                echo "
                <a href='chat.php?id=$id' class='bg-white flex my-2 p-2 rounded-md flex-wrap items-center w-full justify-between cursor-pointer'>
                    <div class='flex gap-2 items-center'>
                        <img src='$fileImage' class='w-12 h-12 rounded-full border-2 border-blue-600 p-0.5' />
                        <div>
                            <p class='text-[15px] text-gray-800 leading-3 font-bold'>$fullname</p>
                            <p class='text-xs text-gray-500 mt-0.5'>
                                <p class='font-bold text-gray-700 text-sm whitespace-nowrap leading-3'>
                                    $lastPerson <span class='text-sm font-normal'>$lastMess</span>
                                </p>
                            </p>
                        </div>
                    </div>
                    <span class='h-4 w-4 rounded-full border border-white $status block'></span>
                </a>
                ";
            }
            
        }
    }
}
?>
