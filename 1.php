<?php   //file này khởi tạo và gán giá trị

session_start();                //  muốn sử dụng SESSION phải khai báo session_start
$_SESSION['mycart']=array();
$sp1=[1,"sanpham1",100,2];
$sp2=[2,"sanpham2",300,5];
$cart=[];    // khai báo đây là 1 cái mảng tên là cart, kiểu nó zậy=> xong xuống dưới hiểu   
$cart[]=$sp1;  // đây là add sp1 zô trước
$cart[]=$sp2;  // tiếp tục nó add biến mảng thứ 2 zô
$_SESSION['mycart']=$cart;  // này là gắn giá trị mảng cho 1 biến session
echo '<h1>Session đã tạo</h1>';
echo '<a href="2.php">Show dữ liệu Session</a>';

?>