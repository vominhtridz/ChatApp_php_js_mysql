<p class="px-2 font-medium text-[12px] leading-3"><?php
if($_SESSION['status'] == true){
echo "Đang hoạt động";
}
else{
echo "Ngoại tuyến";
}
?></p>