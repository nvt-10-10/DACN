<div class="row mb ">
    <div class="boxtrai mr">
        
        <form action="index.php?act=billconfirm" method="post">
            <div class="row mb">
                <div class="boxtitle">THÔNG TIN ĐẶT HÀNG</div>
                <div class="row boxcontent billform">
                    <table>
                        <?php 
                            if(isset($_SESSION['user'])) {
                                $name=$_SESSION['user']['name'];    // chỗ này phpmyadmin mình đặt là user
                                $address=$_SESSION['user']['address'];
                                $email=$_SESSION['user']['email'];
                                $tel=$_SESSION['user']['tel'];
                            } else {
                                $name="";
                                $address="";
                                $email="";
                                $tel="";
                            }
                        ?>
                        <tr>
                            <td>Người đặt hàng</td>
                            <td><input type="text" name="name" value="<?=$name?>" required></td>
                        </tr>
                        <tr>
                            <td>Ðịa chỉ</td>
                            <td><input type="text" name="address" value="<?=$address?>" required></td>
                        </tr>
                        <tr>
                            <td>Email</td>
                            <td><input type="text" name="email" value="<?=$email?>" required></td>
                        </tr>
                        <tr>
                            <td>Ðiện thoại</td>
                            <td><input type="text" name="tel" value="<?=$tel?>" required></td>
                        </tr>
                    </table>
                </div>
            </div>
            <div class="row mb">
                <div class="boxtitle">PHƯƠNG THỨC THANH TOÁN</div>
                <div class="row boxcontent_thanhtoan">
                    
                        <tr>
                            <td><input type="radio" name="pttt" value="Trả tiền khi nhận hàng" checked>Trả tiền khi nhận hàng</td>
                            <td><input type="radio" name="pttt" value="Chuyển khoản ngân hàng">Chuyển khoản ngân hàng</td>
                            <td><input type="radio" name="pttt"value="Thanh toán Online">Thanh toán Online</td>
                        </tr>
                    
                </div>
            </div>
            <div class="row mb">
                <div class="boxtitle">THÔNG TIN GIỎ HÀNG</div>
                <div class="row boxcontent cart">
                    <table>
                        
                        <?php  viewcart(0);?>
                    </table>
                </div>
            </div>
            <div class="row mb bill">
                <input type="submit" value="ĐỒNG Ý ĐẶT HÀNG" name="dongydathang">
            </div>
        </form>
            
    </div>
    <div class="boxphai">
        <?php include "view/boxright.php";?>
    </div>
</div>

                