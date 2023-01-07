
<div class="row mb ">
    <div class="boxtrai mr">
        <div class="row mb">
       
            <div class="boxtitle">ĐĂNG KÝ THÀNH VIÊN</div>
            <div class="row boxcontent formtaikhoan">
                <form action="index.php?act=dangky" method="post">
                <div class="row mb10">
                    Email
                    <input type="email" name="email" required minlength="3">
                </div>
                <div class="row mb10">
                    Tên đăng nhập 
                    <input type="text" name="user" required  minlength="6">
                </div>    
                <div class="row mb10">
                    Mật khẩu 
                    <input type="password" id="pwd" required  name="pass" minlength="8"
  pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"
  title="
Phải chứa ít nhất một số và một chữ hoa và một ký tự đặc biệt và chữ thường và ít nhất 8 ký tự trở lên">
                   
                </div>    
                    <input type="submit" value="Đăng Ký" name="dangky">
                    <input type="reset" value="Nhập lại">
                </form>

                <h2 class="thongbao">
                <?php
                    if(isset($thongbao)&&($thongbao!="")) {
                        echo $thongbao;
                    }
                ?>
                </h2> 
                   
            </div>
        </div>
        
    </div>
    <div class="boxphai">
        <?php include "view/boxright.php";?>
    </div>
</div>