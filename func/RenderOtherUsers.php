<?php
include $_SERVER['DOCUMENT_ROOT'].'/website/func/RenderLastMess.php';

// Query to fetch users
$query = "SELECT * FROM users";
$result = mysqli_query($conn, $query);
$numrows = mysqli_num_rows($result);
$currUserid = $_SESSION['uid'];
// Iterate over the users
while($queryResult = mysqli_fetch_assoc($result) ) {
    if($queryResult['id'] != $_SESSION['uid']){
        $fullname = $queryResult['fullname'];
        $fileImage = empty($queryResult['imageFile']) || $queryResult['imageFile'] == null ? './uploads/user.png': './uploads/' . $queryResult['imageFile'];
        $status = $queryResult['status'] == 1 ? 'bg-green-500' : 'bg-gray-500';
        $id = $queryResult['id'];

        // Find the last message from the current user
        $lastMess = '';
        $lastPerson = '';
        
        // Use a different variable for the inner loop
        for ($j = 0; $j < count($arr); $j++) {
            if($arr[$j]['sender_id'] == $currUserid  && $arr[$j]['receiver_id'] == $id){
                $lastMess = $arr[$j]['content'];
                $lastPerson = 'Bạn';
                break;
            }
            else if ($arr[$j]['sender_id'] == $id  && $arr[$j]['receiver_id'] == $currUserid){
                $lastMess = $arr[$j]['content'];
                $lastPerson = 'Đối tác';
                break;
            }
        }

        // Output user information and last message
           if(!$searching){
             echo "
            <a href='chat.php?id=$id' onclick class='bg-white flex my-2 p-2 rounded-md flex-wrap items-center w-full justify-between cursor-pointer'>
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
?>
