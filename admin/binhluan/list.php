<div class="row">
            <div class="row frmtitle">
                <H1>DANH SÁCH BÌNH LUẬN</H1>
            </div>
            
            <div class="row frmcontent">
            <!-- tạo bảng -->
                <div class="row mb10 frmdsloai">     
                    <table> 
                        <tr>
                    
                            <th>STT</th>
                            <th>Nội dung bình luận</th>
                            <th>Tài khoản</th></th>
                            <th>Sản phẩm</th>
                            <th>Ngày bình luận</th>
                            <th></th>
                        </tr>
                        <?php 
                            $stt=0;
                            foreach ($listbinhluan as $binhluan) {
                                extract($binhluan);
                                $suabl="index.php?act=suabl&id=".$binhluan[0];
                                $xoabl="index.php?act=xoabl&id=".$binhluan[0]; 
                                
                                echo '<tr>      
                                 
                                        <td>'.++$stt.'</td>
                                        <td>'.$noidung.'</td>
                                        <td>'.$binhluan[6].'</td>
                                        <td>'.$binhluan[14].'</td>
                                        <td>'.$ngaybinhluan.'</td>
                                        <td><a href="'.$xoabl.'"><input type="button" value="Xóa"></a></td>
                                    </tr>';
                                    
                            }
                        ?>
                        
                        
                    </table>
                </div>
                <div class="row mb10">
                    <!-- <input type="button" value="Chọn tất cả">
                    <input type="button" value="Bỏ chọn tất cả">
                    <input type="button" value="Xóa các mục đã chọn"> -->
                </div>
            </div>
        </div>