<div class="row">
   
            <div class="row frmtitle">
                <H1>DANH SÁCH LOẠI HÀNG</H1>
            </div>
            
            <div class="row frmcontent">
            <!-- tạo bảng -->
                <div class="row mb10 frmdsloai">     
                    <table> 
                        <tr>
                            <th></th>
                            <th>MÃ LOẠI</th>
                            <th>TÊN LOẠI</th>
                            <th></th>
                        </tr>
                        <form action="" method="post">
                        <?php 
                       
                            foreach ($listdanhmuc as $danhmuc) {
                                extract($danhmuc);
                                $suadm="index.php?act=suadm&id=".$id;
                                $xoadm="index.php?act=xoadm&id=".$id; 
                                
                                echo '<tr>      
                                        <td><input type="checkbox" value="'.$id.'" name="checkbox[]" > </td>
                                 
                                        <td>'.$id.'</td>
                                        <td>'.$name.'</td>
                                        <td><a href="'.$suadm.'"><input type="button" value="Sửa"></a> <a href="'.$xoadm.'"><input type="button" value="Xóa"></a></td>
                                    </tr>';
                            }
                        ?>
                        
                        
                    </table>
                </div>
                <div class="row mb10">

                <input  type="submit" value="Xóa các danh mục đã chọn" formaction="index.php?act=xoadm">
               
                    <a href="index.php?act=adddm"><input type="button" value="Nhập thêm"></a>
                </div>
                        </form>
            </div>
        </div>