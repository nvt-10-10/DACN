        <div class="row">
            <div class="row frmtitle">
                <h1>THÊM MỚI LOẠI HÀNG HÓA</h1>
            </div>
            <div class="row frmcontent">
                <form action="index.php?act=adddm" method="post">
                    
                    <div class="row mb10">
                        Tên loại<br>
                        <input type="text" name="tenloai">
                    </div>
                    <div class="row mb10">
                        <input type="submit" name="themmoi" value="THÊM MỚI">   <!-- này thì nó xóa tất cả các chữ đang nhập trên chỗ tên loại và kể cả id ngầm tự động -->
                        <input type="reset" value="NHẬP LẠI">
                        <a href="index.php?act=listdm"><input type="button" value="DANH SÁCH"></a>
                    </div>
                    <?php
                        if(isset($thongbao)&&($thongbao!="")) echo $thongbao; // $thongbao này là để xuất ra những khi mình add trong danh mục ấy, vì nó đi kèm với include danhmuc/add.php nè thấy hông, còn bên kia cũng vậy, tạo 1 cái thông báo khi update, nhớ nhen
                    ?>

                </form>
            </div>
        </div>