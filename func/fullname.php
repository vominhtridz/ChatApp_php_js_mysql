<p class="px-2 font-bold text-[15px] leading-5"><?php
if(isset($_SESSION['fullname'])){
echo $_SESSION['fullname'];
}
else{
echo "user";
}
?></p>