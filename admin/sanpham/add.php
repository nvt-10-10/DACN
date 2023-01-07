<div class="row">
        <div class="row frmtitle">
            <h1>THÊM MỚI SẢN PHẨM</h1>
        </div>
        <div class="row frmcontent">
            <form action="index.php?act=addsp" method="post" enctype="multipart/form-data">  <!-- nếu form sản phẩm như này hoặc form sản phẩm nào khác nó có input là type="file" thì các bạn phải bổ sung thêm thuộc tính là enctype="multipart/form-data" /trong w3 school, phần PHP File Upload -->
                <div class="row mb10">
                    Danh mục<br>
                        <select name="iddm" required> 
                        '<option value="">...</option>  <!-- chỗ này load ra select box ha, và trong này nó có những option -->
                            <!-- nó show ra đây này, show 1 cái danh sách trong mảng ra 1 cái gì đó thì mình dùng foreach (fo ịt) ha-->
                            <?php 
                                foreach ($listdanhmuc as $danhmuc) {     // foreach có ô vuông ấy cho dễ viết và nhớ sửa lại tên nha
                                    extract($danhmuc);     //chỗ này sau khi đọc thì mình extract cái danh mục này ra
                                    echo '<option value="'.$id.'">'.$name.'</option>';  // và echo 1 cái option ra , nhớ html thì có dấu nháy đơn rồi copy cái option nảy paste lên, này đưa zô giá trị name là '.$id.', chú ý nháy đơn nháy đôi
                                }
                            ?>

                            <!-- <option value=""></option> -->
                        </select>  
                    </div>
                   
                <div class="row mb10">
                    Tên sản phẩm<br>
                    <input type="text" name="tensp" required >
                </div>
                <div class="row mb10" >
                    Số lượng<br>
                    <input type="text" name="soluong" required  pattern="[0-9]{0,}" title=""> 
                </div>
                <div class="row mb10">
                    Giá<br>
                    <input type="text" name="giasp" required  pattern="[0-9]{0,}">
                </div>
                <div class="row mb10">
                    Hình<br>
                    <input type="file" name="hinh" accept="image/*">
                </div>
                <div class="row mb10">
                    Mô tả<br>
                    <textarea name="mota" cols="30" rows="10"></textarea>
                </div>
                <div class="row mb10">
                    <input type="submit" name="themmoi" value="THÊM MỚI">   <!-- này thì nó xóa tất cả các chữ đang nhập trên chỗ tên loại và kể cả id ngầm tự động -->
                    <input type="reset" value="NHẬP LẠI">
                    <a href="index.php?act=listsp"><input type="button" value="DANH SÁCH"></a>
                </div>
                <?php
                    if(isset($thongbao)&&($thongbao!="")) echo $thongbao; // $thongbao này là để xuất ra những khi mình add trong danh mục ấy, vì nó đi kèm với include danhmuc/add.php nè thấy hông, còn bên kia cũng vậy, tạo 1 cái thông báo khi update, nhớ nhen
                ?>

            </form>
        </div>
</div>