<?php 
   
    if(is_array($tk)) {    //bỏ sanpham vào đây 
        extract($tk);
        $tensp=$name;
    }
?>
<div class="row">
            <div class="row frmtitle">
   
            <h1>CẬP NHẬT TÀI KHOẢN</h1>
            </div>
            <div class="row frmcontent">
            <form action="index.php?act=updatetk" method="post" enctype="multipart/form-data"> 
                <div class="row mb10">
                    Tài khoản<br>
                    <input type="text" name="user" value="<?=trim($user) ?>" readonly>  
                </div>
                <div class="row mb10">
                    Mật khẩu<br>
                    <input type="password"  style="    width: 100%;
    border: 1px #CCC solid;
    padding: 5px 10px;
    border-radius: 5px;" name="pass" value="<?=$pass?>">
                </div>
             
                <div class="row mb10">
                    Email<br>
                    <input type="text" name="email" value="<?=$email?>"readonly>
                   
                </div>
                <div class="row mb10">
                    Địa chỉ<br>
                    <input type="text" name="address" value="<?=trim($address) ?>" readonly>  
                </div>
                <div class="row mb10">
                    Số điện thoại<br>
                    <input type="text" name="tel" value="<?=trim($tel) ?>" readonly>  
                </div>

  
                
                <div class="row mb10">
                    <input type="hidden" name="id" value="<?=$id?>">     <!--thêm này để nó lưu cái id của sản phẩm-->
                    <input type="submit" name="capnhat" value="Cập nhật">   <!-- này thì nó xóa tất cả các chữ đang nhập trên chỗ tên loại và kể cả id ngầm tự động -->
                    <input type="reset" value="Nhập lại">
                    <a href="index.php?act=dskh"><input type="button" value="Danh sách"></a>
                </div>
                <?php
                    if(isset($thongbao)&&($thongbao!="")) echo $thongbao; // $thongbao này là để xuất ra những khi mình add trong danh mục ấy, vì nó đi kèm với include danhmuc/add.php nè thấy hông, còn bên kia cũng vậy, tạo 1 cái thông báo khi update, nhớ nhen
                ?>

            </form>
            </div>
        </div>