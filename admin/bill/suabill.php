<?php 

    if(is_array($bill)&& isset($billct)){
        extract($billct);
        extract($bill);
    } 
    $kh=$bill["bill_name"];    // nối chuỗi trước, đặt biến khách hàng là kh, và mấy đó là tên cột trong bảng bill
    $ttdh=get_ttdh($bill["bill_status"]);
    $countsp=loadall_cart_count($bill["id"]);
    $format_total= number_format($total,0,',','.').' VNĐ';
    $mabill="SUN-";

    
    // <td>SUN-'.$bill['id'].'</td>
    // <td>'.$kh.'</td>
    // <td>'.$countsp.'</td>
    // <td><strong>'.$format_total.'</strong></td>
    // <td>'.$ttdh.'</td>
    // <td>'.$bill['ngaydathang'].'</td>
?>
<div class="row">
            <div class="row frmtitle">
                <h1>CẬP NHẬT ĐƠN HÀNG</h1>
            </div>
            <div class="row frmcontent">
                <form action="index.php?act=updatebill" method="post">

                    <div class="row mb10">
                        Mã đơn hàng<br>
                        <input type="text"  value="<?= $mabill,$bill['id']?>" readonly> <!-- chỗ này value show giá trị nào đó ra vị trí cụ thể thì bỏ vào <'? trong này nha, có thể viết như vậy với php?'> -->
                    </div>

                    

                    <div class="row mb10">
                       Khách hàng<br>
                        <input type="text" value="<?=trim($bill_name)?>" readonly> <!-- chỗ này value show giá trị nào đó ra vị trí cụ thể thì bỏ vào <'? trong này nha, có thể viết như vậy với php?'> -->
                    </div>

                    <div class="row mb10">
                        Số lượng mặt hàng<br>
                        <input type="text" value="<?=trim($countsp)?>" readonly> <!-- chỗ này value show giá trị nào đó ra vị trí cụ thể thì bỏ vào <'? trong này nha, có thể viết như vậy với php?'> -->
                    </div>
                    <div class="row mb10">
                        Giá trị đơn hàng<br>
                        <input type="text" value="<?=trim($format_total)?>" readonly> <!-- chỗ này value show giá trị nào đó ra vị trí cụ thể thì bỏ vào <'? trong này nha, có thể viết như vậy với php?'> -->
                    </div>
                    <div class="row mb10">
                        Ngày đặt hàng<br>
                        <input type="text"  value="<?=trim($ngaydathang)?>" readonly> <!-- chỗ này value show giá trị nào đó ra vị trí cụ thể thì bỏ vào <'? trong này nha, có thể viết như vậy với php?'> -->
                    </div>
                    <div class="row mb10">
                       Tình trạng đơn hàng<br>
                       <select name="bill_status">
                        <?php
                        if($bill["bill_status"]==0){
                            echo '<option value="0" selected>Đơn hàng mới</option>';
                        } else {
                            echo '<option value="0" >Đơn hàng mới</option>';
                        }
                        ?>

<?php
                        if($bill["bill_status"]==1){
                            echo ' <option value="1" selected>Đang xử lý</option>';
                        } else {
                            echo ' <option value="1">Đang xử lý</option>';
                        }
                        ?>

<?php
                        if($bill["bill_status"]==2){
                            echo '<option value="2" selected>Đang giao hàng</option>';
                        } else {
                            echo '<option value="2">Đang giao hàng</option>';
                        }
                        ?>

<?php
                        if($bill["bill_status"]==3){
                            echo '<<option value="3" selected>Đã giao hàng</option>';
                        } else {
                            echo '<option value="3">Đã giao hàng</option>';
                        }
                        ?>
</select>
                  </div>
                    
                    <div class="row mb10">
                        
                    <input type="hidden" name="id" value="<?=$bill["id"]?>">
                        <input type="submit" name="capnhat" value="Cập nhật">
                        <input type="reset" value="Nhập lại">
                        <a href="index.php?act=listbill"><input type="button" value="DANH SÁCH"></a>
                    </div>
                    <?php
                        if(isset($thongbao)&&($thongbao!="")) echo $thongbao;
                    ?>
                    <div class="row mb" style="padding: 8px 0 0px 0">
                <div class="boxtitle">CHI TIẾT ĐƠN HÀNG</div>
                <div class="row boxcontent cart">
                    <table>
                        
                        <?php
                            bill_chi_tiet($billct);
                        ?>
                    </table>
                </div>    
            </div>

                </form>
            </div>
        </div>