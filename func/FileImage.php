<?php 
function CreateFileImage(){
$target_dir = __DIR__ . "/uploads/"; 
$uploadOk = 1;
$target_file = $target_dir . basename($_FILES["image"]["name"]);
$fileType = strtolower(pathinfo($target_file , PATHINFO_EXTENSION));
// Kiểm tra nếu file đã tồn tại
if (!file_exists($target_file)) {
    $uploadOk = 0;
    return basename($_FILES["image"]["name"]);
}
// Giới hạn loại file (ví dụ chỉ cho phép JPG, PNG, GIF, PDF)
$allowedTypes = ['jpg', 'png', 'jpeg', 'gif', 'pdf'];
if (!in_array($fileType, $allowedTypes)) {
    echo "Chỉ cho phép các định dạng JPG, JPEG, PNG, GIF, và PDF.";
    $uploadOk = 0;
    return null;
}
// Kiểm tra kích thước file (ví dụ không quá 2MB)
if ($_FILES["image"]["size"] > 2000000) {
    echo "File của bạn quá lớn. ";
    $uploadOk = 0;
        return null;
}
// Nếu không có lỗi thì tiến hành upload file
if ($uploadOk == 1) {

    if(move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
        return basename($_FILES["image"]["name"]);
    } 
} else {
    return null;
}
}
?>