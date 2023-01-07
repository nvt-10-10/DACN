
<div class="row mb ">
    <div class="boxtrai mr">

        <div class="row mb">
       
            <div class="boxtitle">ĐƠN HÀNG CỦA BẠN</div>
            <div class="row boxcontent cart">
              <table>
                    <tr>
                        <th>MÃ ĐƠN HÀNG</th>
                        <th>NGÀY ĐẶT</th>
                        <th>SỐ LƯỢNG MẶT HÀNG</th>
                        <th>TỔNG GIÁ TRỊ ĐƠN HÀNG</th>
                        <th>TÌNH TRẠNG ĐƠN HÀNG</th>
                    </tr>
                    <?php
                        if(is_array($listbill)) {
                            foreach ($listbill as $bill) {
                                extract($bill);
                                $ttdh=get_ttdh($bill['bill_status']);
                                $countsp=loadall_cart_count($bill['id']);
                                $format_total_mybill= number_format($total,0,',','.').' vnđ';
                                echo '<tr>
                                        <td>SUN-'.$bill['id'].'</td>
                                        <td>'.$bill['ngaydathang'].'</td>
                                        <td>'.$countsp.'</td>
                                        <td>'.$format_total_mybill.'</td>
                                        <td>'.$ttdh.'</td>
                                    </tr>'; // $bill['total'] đã đổi thành $format_total_mybill
                            }
                        }
                    ?>
                    
              </table>
                   
            </div>
        </div>
       
    </div>
    <div class="boxphai">
        <?php include "view/boxright.php";?>
    </div>
</div>