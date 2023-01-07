<div class="row">
            <div class="row frmtitle">
                <H1>DANH SÁCH TÀI KHOẢN</H1>
            </div>
            
            <div class="row frmcontent">
            <!-- tạo bảng -->
                <div class="row mb10 frmdsloai">     
                    <table> 
                        <tr>
                           
                            <th>STT</th>
                            <th>TÊN ĐĂNG NHẬP</th>
                        
                            <th>EMAIL</th>
                            <th>ĐỊA CHỈ</th>
                            <th>ĐIỆN THOẠI</th>
                          
                            <th></th>
                        </tr>
                        <?php 
                            $stt=1;
                            foreach ($listtaikhoan as $taikhoan) {
                                extract($taikhoan);
                                $suatk="index.php?act=suatk&id=".$id;
                                $xoatk="index.php?act=xoatk&id=".$id; 
                                
                                echo '<tr>      
                                
                                        <td>'.$stt.'</td>
                                        <td>'.$user.'</td>
                                      
                                        <td>'.$email.'</td>
                                        <td>'.$address.'</td>
                                        <td>'.$tel.'</td>
                                    
                                        <td><a href="'.$suatk.'"><input type="button" value="Sửa"></a> <a href="'.$xoatk.'"><input type="button" value="Vô hiệu hóa"></a></td>
                                    </tr>';
                                    $stt++; 
                                }
                        ?>
                        
                        
                    </table>
                </div>
                <div class="row mb10">
                    <!-- <input type="button" value="Chọn tất cả">
                    <input type="button" value="Bỏ chọn tất cả">
                    <input type="button" value="Xóa các mục đã chọn">
                    <a href="index.php?act=adddm"><input type="button" value="Nhập thêm"></a> -->
                </div>
            </div>
        </div>