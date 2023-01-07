<?php

session_start();
if(isset($_SESSION['mycart'])){
  

    foreach ($_SESSION['mycart'] as $k  => $v) {
          // vì là biến mảng nên phải foreach
       echo $k;
       echo $v;
        
    }

    echo '<h1>Session đã show </h1>';
} else {
    echo '<h1>Session đã hủy nè </h1>';
}

echo '<a href="1.php">Khởi tạo</a>';
echo '<a href="3.php">Hủy Session</a>'; // và có 2 cách để hủy -----(1) session_unset(); là xóa tất
                                        //  cả các giá trị của session
                                        //--(2) session_destroy(); là xóa lun cái session đó
?>