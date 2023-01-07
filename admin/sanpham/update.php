<?php 
   
    if(is_array($sanpham)) {    //bỏ sanpham vào đây 
        extract($sanpham);
        $tensp=$name;
    }
        $hinhpath="../upload/".$img;    
        if(is_file($hinhpath)){     
            $hinh="<img src='".$hinhpath."' height='80'>";
        }else{
            $hinh="No photo(không có hình)";
        }
    $iddm1=$iddm;
    $idsp=$id;
    $listdanhmuc=loadall_danhmuc();
?>

<div class="row">
            <div class="row frmtitle">
                <h1>CẬP NHẬT LOẠI HÀNG HÓA</h1>
            </div>
            <div class="row frmcontent">
            <form action="index.php?act=updatesp" method="post" enctype="multipart/form-data">  <!-- nếu form sản phẩm như này hoặc form sản phẩm nào khác nó có input là type="file" thì các bạn phải bổ sung thêm thuộc tính là enctype="multipart/form-data" /trong w3 school, phần PHP File Upload -->
                <div class="row mb10">
                    <!-- Mã sản phẩm<br>
                        <input type="text" name="masp" disabled>  chọn thành phần bị vô hiệu hóa (disabled), này mình cho nó tự động tăng id nên không cần nhập, thường sử dụng cho các thành phần của form. -->
                    <select name="iddm">   <!-- chỗ này load ra select box ha, và trong này nó có những option -->
                        <!-- nó show ra đây này, show 1 cái danh sách trong mảng ra 1 cái gì đó thì mình dùng foreach (fo ịt) ha-->
                
                        <?php   //và cái listdanhmuc này phải có từ controller bên index.php và bên đó mình cũng gọi lun cái danh mục ra trước loadall_sanpham
                            foreach ($listdanhmuc as $danhmuc) {     // foreach có ô vuông ấy cho dễ viết và nhớ sửa lại tên nha
                                extract($danhmuc);     //chỗ này sau khi đọc thì mình extract cái danh mục này ra
                                if($id==$iddm1)   $s="selected"; else $s="";   //đặt tên biến $s để gán thôi
                                echo '<option value="'.$id.'" '.$s.'>'.$name.'</option>'; //này if else 2 câu thì khỏi cần ngoặc nhọn hoặc cách như này
                            }
                        ?>
                    </select>
                </div>
 
                     
                <div class="row mb10">
                    Tên sản phẩm<br>
                    <input type="text" name="tensp" value="<?=trim($tensp)?>"  >
                </div>
                <div class="row mb10">
                    Giá<br>
                    <input type="text" name="giasp" required  pattern="[0-9]{0,}"  value="<?=$price?>"  >
                </div>

                <div class="row mb10" >
                    Số lượng<br>
                    <input type="text" name="soluong" required  pattern="[0-9]{0,}" value="<?=$soluong?>"  > 
                </div>
                   
           
                <div class="row mb10">
                    Hình<br>
                    <?=$hinh?> <br>
                    <input type="file" name="hinh" accept="image/*">
                   
                  
                </div>
                <div class="row mb10">
                    Mô tả<br>
                    <textarea name="mota" cols="30" rows="10"><?=$mota?></textarea>
                </div>
                <div class="row mb10">
                    <input type="hidden" name="id" value="<?=$idsp?>">     <!--thêm này để nó lưu cái id của sản phẩm-->
                    <input type="submit" name="capnhat" value="Cập nhật">   <!-- này thì nó xóa tất cả các chữ đang nhập trên chỗ tên loại và kể cả id ngầm tự động -->
                    <input type="reset" value="Nhập lại">
                    <a href="index.php?act=listsp"><input type="button" value="Danh sách"></a>
                </div>
                <?php
                    if(isset($thongbao)&&($thongbao!="")) echo $thongbao; // $thongbao này là để xuất ra những khi mình add trong danh mục ấy, vì nó đi kèm với include danhmuc/add.php nè thấy hông, còn bên kia cũng vậy, tạo 1 cái thông báo khi update, nhớ nhen
                ?>

            </form>
            </div>
        </div>