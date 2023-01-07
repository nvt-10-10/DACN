
<div class="row mb ">
    <div class="boxtrai mr">
        <div class="row mb">
       
            <div class="boxtitle">CẬP NHẬT TÀI KHOẢN</div>
            <div class="row boxcontent formtaikhoan">
                <?php 
                    if(isset($_SESSION['user'])&&(is_array($_SESSION['user']))) {
                        extract($_SESSION['user']);

                    }
                ?>
                <form action="index.php?act=edit_taikhoan" method="post">
                <div class="row mb10">
                    Email
                    <input type="email" name="email" value="<?=$email?>" required>
                </div>
                <div class="row mb10">
                    Họ và tên 
                    <input type="text" name="name" value="<?=$name?>" >
                </div>  
                <div class="row mb10">
                    Tên đăng nhập 
                    <input type="text" name="user" value="<?=$user?>" readonly>
                </div>    
                <div class="row mb10">
                    Mật khẩu 
                    <input type="password" name="pass" value="<?=$pass?>" required  minlength="8"
  pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"
  title="
Phải chứa ít nhất một số và một chữ hoa và chữ thường và ít nhất 8 ký tự trở lên">
                </div>
                <div class="row mb10">
                    Địa chỉ 
                    <input type="text" name="address" value="<?=$address?>">
                </div>
                <div class="row mb10">
                    Điện thoai 
                    <input type="text" name="tel" value="<?=$tel?>">
                </div>
                <div class="row mb10">
                    <input type="hidden" name="id" value="<?=$id?>">
                    <input type="submit" value="Cập Nhật" name="capnhat">
                    <input type="reset" value="Nhập Lại">
                </div>    
                <?php
                    if(isset($thongbao)&&($thongbao!="")) {
                        echo $thongbao;
                    }
                ?>
                </form>

            
                
                   
            </div>
        </div>
        
    </div>
    <div class="boxphai">
        <?php include "view/boxright.php";?>
    </div>
</div>