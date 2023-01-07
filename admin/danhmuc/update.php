<?php 

    if(is_array($dm)){
        
        extract($dm);
        $tenloai=$name;
    } 
        

?>
<div class="row">
            <div class="row frmtitle">
                <h1>CẬP NHẬT LOẠI HÀNG HÓA</h1>
            </div>
            <div class="row frmcontent">
                <form action="index.php?act=updatedm" method="post">

                    <div class="row mb10">
                        Tên loại<br>
                        <input type="text" name="tenloai" value="<?=trim($tenloai)?>"> <!-- chỗ này value show giá trị nào đó ra vị trí cụ thể thì bỏ vào <'? trong này nha, có thể viết như vậy với php?'> -->
                    </div>
                    <div class="row mb10">
                        <input type="hidden" name="id" value="<?php if(isset($id)&&($id>0)) echo $id;?>">
                        <input type="submit" name="capnhat" value="Cập nhật">
                        <input type="reset" value="Nhập lại">
                        <a href="index.php?act=listdm"><input type="button" value="DANH SÁCH"></a>
                    </div>
                    <?php
                        if(isset($thongbao)&&($thongbao!="")) echo $thongbao;
                    ?>

                </form>
            </div>
        </div>