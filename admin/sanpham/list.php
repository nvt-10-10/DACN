<div class="row">
            <div class="row frmtitle mb">
                <H1>DANH SÁCH SẢN PHẨM</H1>
            </div>
            
            <!-- mình nên tạo 1 cái form (method post) để lọc sản phẩm , và phía trên chỗ thẻ div class row frmtitle (mb) thêm chữ mb để nó cách ra tý  -->
            <form action="index.php?act=listsp" method="post">
                        <input type="text" name="kyw">  <!-- này đặt tên là keyword -->
                        <!-- và có 1 select box và tên là iddm và chỗ dưới này copy bên add/sanpham qua đấy-->
                        <select name="iddm">   <!-- chỗ này load ra select box ha, và trong này nó có những option -->
                            <!-- nó show ra đây này, show 1 cái danh sách trong mảng ra 1 cái gì đó thì mình dùng foreach (fo ịt) ha-->
                            <option value="0" selected>Tất cả</option>
                            <?php   //và cái listdanhmuc này phải có từ controller bên index.php và bên đó mình cũng gọi lun cái danh mục ra trước loadall_sanpham
                                foreach ($listdanhmuc as $danhmuc) {     // foreach có ô vuông ấy cho dễ viết và nhớ sửa lại tên nha
                                    extract($danhmuc);     //chỗ này sau khi đọc thì mình extract cái danh mục này ra
                                    echo '<option value="'.$id.'">'.$name.'</option>';  // và echo 1 cái option ra , nhớ html thì có dấu nháy đơn rồi copy cái option nảy paste lên, này đưa zô giá trị name là '.$id.', chú ý nháy đơn nháy đôi
                                }
                            ?>
                        </select>
                        <input type="submit" name="listok" value="GO">
            </form>
            <form action="" method="post">
            <div class="row frmcontent">
            <!-- tạo bảng -->
                <div class="row mb10 frmdsloai">  
                    
                    <table> 
                        <tr>
                            <th></th>
                            <th>MÃ LOẠI</th>
                            <th>TÊN SẢN PHẨM</th>
                            <th>HÌNH</th>
                            <th>GIÁ</th>
                            <th>SỐ LƯỢNG</th>
                            <th>LƯỢT XEM</th>
                            <th></th>
                        </tr>
                        <?php 
                       
                          
                       
                  
                       
                            foreach ($listsanpham as $sanpham) {
                                extract($sanpham);
                                $suasp="index.php?act=suasp&id=".$id;
                                $xoasp="index.php?act=xoasp&id=".$id;
                                $hinhpath="../upload/".$img;    //chỗ này đường dẫn hình(hinhpath ha) và xuống kiểm tra nó có tồn tại hay không
                                if(is_file($hinhpath)){     //kiểm tra xem có tồn tại hông rồi mình cho hình nó =
                                    $hinh="<img src='".$hinhpath."' height='80'>";
                                }else{
                                    $hinh="No photo(không có hình)";
                                }
                                // này mình đưa cái img để hiển thị lên hean

                                $number_format_gia= number_format($price,0,',','.').' vnđ';
                                //những phần trong echo(ví dụ: $img, $price) là tên của cái cột trong cái bảng database/phpmyadmin, nhưng chỗ img đó đã sửa thành chữ $hinh do làm lại phía trên rồi nha
                                echo '<tr>      
                                        <td><input type="checkbox" value="'.$id.'" name="checkbox[]" > </td>
                                        <td>'.$id.'</td>
                                        <td>'.$name.'</td>
                                        <td>'.$hinh.'</td>   
                                        <td>'.$number_format_gia.'</td>
                                        <td>'.$soluong.'</td>
                                        <td>'.$luotxem.'</td>
                                        <td><a href="'.$suasp.'"><input type="button" value="Sửa"></a> <a href="'.$xoasp.'"><input type="button" value="Xóa"></a></td>
                                    </tr>'; // đã đổi $price thành $number_format_gia, như trên
                            }
                        ?>
                        
                        
                    </table>
                </div>
               

            
                <div class="row mb10">
                 

                    <!-- <input  type="submit" value="Chọn tất cả" formaction="index.php?act=listsp&&check=on">
                    <input  type="submit" value="Bỏ chọn tất cả" formaction="index.php?act=listsp"> -->
                    <input  type="submit" value="Xóa sản phẩm đã chọn" formaction="index.php?act=xoasp">
                    <a href="index.php?act=addsp"><input type="button" value="Nhập thêm"></a>
                </div>
                </form>
            </div>
        </div