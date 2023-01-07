<div class="row">
    
    <div class="row mb ">
        <div class="boxtrai mr">
            <div class="row mb">
                <div class="boxtitle">CẢM ƠN</div>
                <div class="row boxcontent" style="text-align:center">
                    <h2>Cảm ơn quý khách đã đặt hàng!</h2>
                </div>    
            </div>
            <?php 
                if(isset($bill)&&(is_array($bill))) {
                    extract($bill); //bill bình thường thôi đặt tên này lỡ rồi, bill cũng được nha
                }
                $number_format_total= number_format($total,0,',','.').' VNĐ';
                // ở dưới đã đổi $bill['total'] thành $number_format_total
            ?>
            <div class="row mb">
                <div class="boxtitle">THÔNG TIN ĐƠN HÀNG</div>
                <div class="row boxcontent" style="text-align:center">
                    <li>- Mã đơn hàng: SUN-<?=$bill['id'];?></li><p></p>
                    <li>- Ngày đặt hàng: <?=$bill['ngaydathang'];?></li><p></p> 
                    <li>- Tổng đơn hàng: <?=$number_format_total;?></li><p></p>
                    <?php
                        $pt=$bill['bill_pttt'];
                        // echo '.$pt.'; // phía dưới đã thay đổi từ $bill['bill_pttt'] sang $pt và có thêm hàm get_pttt bên cart.php
                    ?>
                    <li>- Phương thức thanh toán: <?=$pt;?></li> 
                    
                </div>    
            </div>
            <div class="row mb">
                <div class="boxtitle">THÔNG TIN ĐẶT HÀNG</div>
                <div class="row boxcontent billform">
                    <table>
                        <tr>
                            <td>Người đặt hàng</td>
                            <td><?=$bill['bill_name'];?></td>
                        </tr>
                        <tr>
                            <td>Địa chỉ</td>
                            <td><?=$bill['bill_address'];?></td>
                        </tr>
                        <tr>
                            <td>Email</td>
                            <td><?=$bill['bill_email'];?></td>
                        </tr>
                        <tr>
                            <td>Điện thoại</td>
                            <td><?=$bill['bill_tel'];?></td>
                        </tr>
                    </table>
                </div>    
            </div>

            <div class="row mb">
                <div class="boxtitle">CHI TIẾT ĐƠN HÀNG</div>
                <div class="row boxcontent cart">
                    <table>
                        
                        <?php
                            bill_chi_tiet($billct);
                        ?>
                    </table>
                </div>    
            </div>
            
        </div>
        <div class="boxphai">
            <?php include "view/boxright.php";?>
        </div>
    </div>
</div>