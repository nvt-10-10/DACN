<div class="row">
            <div class="row frmtitle">
                <H1>DANH SÁCH THỐNG KÊ</H1>
            </div>
            
            <div class="row frmcontent">
            <!-- tạo bảng -->
                <div class="row mb10 frmdsloai">     
                    <table> 
                        <tr>
                            
                            <th>MÃ DANH MỤC</th>
                            <th>TÊN DANH MỤC</th>
                            <th>SỐ LƯỢNG</th>
                            <th>GIÁ CAO NHẤT</th>
                            <th>GIÁ THẤP NHẤT</th>
                            <th>GIÁ TRUNG BÌNH</th>
                        </tr>
                        <?php 
                            foreach ($listthongke as $thongke) {
                                extract($thongke);   //extract ngay để nó có giá trị
                                $format_max= number_format($maxprice,0,',','.').' vnđ';
                                $format_min= number_format($minprice,0,',','.').' vnđ';
                                $format_avg= number_format($avgprice,0,',','.').' vnđ';
                                echo '<tr>
                                        <td>'.$madm.'</td>
                                        <td>'.$tendm.'</td>
                                        <td>'.$countsp.'</td>
                                        <td>'.$format_max.'</td>
                                        <td>'.$format_min.'</td>
                                        <td>'.$format_avg.'</td>
                                    </tr>'; // đã đổi $maxprice,$ minprice, $avgprice =>$format_max,$format_min,$format_avg
                            }
                        ?>
                        
                        
                    </table>
                </div>
                <div class="row mb10">
                    <a href="index.php?act=bieudo"><input type="button" value="Xem biểu đồ"></a>
                </div>
            </div>
        </div>

