<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" enctype="multipart/form-data">
        <input type="text" name="username" placeholder="username"> 
        <input type="password" name="password" placeholder="password">
        <input type="text" name="fullname" placeholder="name">
        <input type="file" name="image" id="image">
        <button type="submit">Gửi</button>
    </form>
</body>
</html>

<?php
$arr = ['Võ Minh Trí', 'Nguyễn Văn Công', 'Nguyễn Văn Thịnh','Nguyễn Kiên', 'nguyễn trung trực'];
$search_name = 'V';

$results = []; // Store matched results here
foreach ($arr as $name) {
    if (strpos($name, $search_name) !== false) {
        $results[] = $name; // Add matching names to the results array
    }
}
    // ";
    //     } else if(in_array($queryResult['fullname'], $arrResult)) {
    //         echo "
    //         <a href='chat.php?id=$id' class='bg-white flex my-2 p-2 rounded-md flex-wrap items-center w-full justify-between cursor-pointer'>
    //             <div class='flex gap-2 items-center'>
    //                 <img src='$fileImage' class='w-12 h-12 rounded-full border-2 border-blue-600 p-0.5' />
    //                 <div>
    //                     <p class='text-[15px] text-gray-800 leading-3 font-bold'>$fullname</p>
    //                     <p class='text-xs text-gray-500 mt-0.5'>
    //                         <p class='font-bold text-gray-700 text-sm whitespace-nowrap leading-3'>
    //                             $lastPerson <span class='text-sm font-normal'>$lastMess</span>
    //                         </p>
    //                     </p>
    //                 </div>
    //             </div>
    //             <span class='h-4 w-4 rounded-full border border-white $status block'></span>
    //         </a>
    //         ";
            
    //     }
if (!empty($results)) {
    echo "Users found: " . implode(', ', $results);
} else {
    echo "No users found";
}
?>
