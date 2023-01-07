<div class="row">
            <div class="row frmtitle">
                <H1>DANH SÁCH ĐƠN HÀNG</H1>
            </div>
            
            <form action="index.php?act=listbill" method="post">
                <input type="text" name="kyw" placeholder="Nhập mã đơn hàng">
                <input type="submit" name="listok" value="GO">
            </form>
            
            <div class="row frmcontent">
            <!-- tạo bảng -->
                <div class="row mb10 frmdsloai">     
                    <table> 
                        <tr>
                           
                            <th style="width: 150px;">MÃ ĐƠN HÀNG</th>
                            <th style="width: 202px;">KHÁCH HÀNG</th>
                            <th>SỐ LƯỢNG HÀNG</th>
                            <th>GIÁ TRỊ ĐƠN HÀNG</th>
                            <th>TÌNH TRẠNG ĐƠN HÀNG</th>
                            <th>NGÀY ĐẶT HÀNG</th>
                            <th style="width:150px">THAO TÁC</th>
                            
                        </tr>
                        <?php
                            foreach ($listbill as $bill) {  // đọc xong thì extract ra
                                extract($bill);
                                $kh=$bill["bill_name"];    // nối chuỗi trước, đặt biến khách hàng là kh, và mấy đó là tên cột trong bảng bill
                                $ttdh=get_ttdh($bill["bill_status"]);
                                $countsp=loadall_cart_count($bill["id"]);
                                $format_total= number_format($total,0,',','.').' VNĐ';

                                $xoabill="index.php?act=xoabill&id=".$id;
                                $suabill="index.php?act=suabill&id=".$id;
                                echo '<tr>
                                    
                                        <td>SUN-'.$bill['id'].'</td>
                                        <td>'.$kh.'</td>
                                        <td>'.$countsp.'</td>
                                        <td><strong>'.$format_total.'</strong></td>
                                        <td>'.$ttdh.'</td>
                                        <td>'.$bill['ngaydathang'].'</td>
                                        
                                        <td >
                                        <a href="'.$suabill.'"><input type="button" value="Sửa"></a></td>
                                    </tr>'; // đã đổi bill["total"] thành $format_total, như trên
                            }
                        ?>
                        
                        
                    </table>
                </div>
                <div class="row mb10">
                    <!-- <input type="button" value="Chọn tất cả">
                    <input type="button" value="Bỏ chọn tất cả">
                    <input type="button" value="Xóa các mục đã chọn">
                    <a href="index.php?act=addsp"><input type="button" value="Nhập thêm"></a> -->
                </div>
            </div>
        </div>