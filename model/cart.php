<?php

    function viewcart($del) {
          // vì mình để khung này trong function nên nó không hiểu, phải khai báo global $img_path
        $tong=0;
        $i=0;
        if($del==1) {
            $xoasp_th='<th>Thao tác</th>';
            $xoasp_td2='<td></td>';
        } else {
            $xoasp_th='';
            $xoasp_td2='';
        }
        echo '<tr>
                <th>Hình</th>
                <th>Sản phẩm</th>
                <th>Đơn giá</th>
                <th>Số lượng</th>
                <th>Thành tiền</th>
                '.$xoasp_th.'
            </tr>';

        foreach ($_SESSION['mycart'] as $cart) {
         
            $hinh=$cart[2];       //vị trí thứ 2 là tên file hình
            $ttien=$cart[3]*$cart[4];
            $tong=$tong+$ttien;         // hoặc $tong+=$ttien;
            if($del==1) {
                $xoasp_td='<td><a href="index.php?act=delcart&idcart='.$i.'"><input type="button" value="Xóa"></a></td>';
            } else {
                $xoasp_td='';
            }
            echo '
                <tr>
                    <td><img src="'.$hinh.'" alt="" height="80px" max-width="60px"></td>
                    <td>'.$cart[1].'</td>
                    <td>'.$cart[3].'</td>
                    <td>'.$cart[4].'</td>
                    <td>'.$ttien.' vnđ</td>
                    '.$xoasp_td.'
                </tr>';
            $i+=1;
        }
        $number_format_tong= number_format($tong,0,',','.').' vnđ'; // nguyên thủy của này là $tong, sáng tạo
        echo '<tr>
                <td colspan="4"><b>Tổng đơn hàng</b></td>
                
                <td>'.$number_format_tong.'</td>
                '.$xoasp_td2.'
            </tr>';
    }

    function bill_chi_tiet($listbill) {     // biến này hông liên quan gì đến biến ngoài 
        // global $img_path;   // vì mình để khung này trong function nên nó không hiểu, phải khai báo global $img_path
        $tong=0;
        $i=0;
        
        echo '<tr>
                <th>Hình</th>
                <th>Sản phẩm</th>
                <th>Đơn giá</th>
                <th>Số lượng</th>
                <th>Thành tiền</th>
            </tr>';

        foreach ($listbill as $cart) {
            $hinh=$cart['img'];       //vị trí thứ 2 là tên file hình
            $tong+=$cart['thanhtien'];         // hoặc $tong+=$ttien;
            
            echo '
                <tr>
                    <td><img src='.$hinh.'" alt="" height="80px"></td>
                    <td>'.$cart['name'].'</td>
                    <td>'.$cart['price'].'</td>
                    <td>'.$cart['soluong'].'</td>
                    <td>'.$cart['thanhtien'].' vnđ</td>
                </tr>';
            $i+=1;
        }
        $number_format_tong= number_format($tong,0,',','.').' vnđ';
        echo '<tr>
                <td colspan="4"><b>Tổng đơn hàng</b></td>
                
                <td>'.$number_format_tong.'</td>
            </tr>';
    }
    function tongdonhang() {
        $tong=0;
        
        foreach ($_SESSION['mycart'] as $cart) {
            $ttien=$cart[3]*$cart[4];
            $tong=$tong+$ttien;         // hoặc $tong+=$ttien;
        
        }
        return $tong;
    }

    function insert_bill($iduser,$name,$email,$address,$tel,$pttt,$ngaydathang,$tongdonhang) {
        $sql="insert into bill(iduser,bill_name,bill_email,bill_address,bill_tel,bill_pttt,ngaydathang,total) values('$iduser','$name','$email','$address','$tel','$pttt','$ngaydathang','$tongdonhang')"; //đây là phần được bê từ index.php ở case adddm
        return pdo_execute_return_lastInsertId($sql);
    }
    function insert_cart($img,$name,$price,$soluong,$thanhtien,$idbill) {
        $sql="insert into cart(img,name,price,soluong,thanhtien,idbill) values('$img','$name','$price','$soluong','$thanhtien','$idbill')"; //đây là phần được bê từ index.php ở case adddm
        return pdo_execute($sql);
    }
    function loadone_bill($id) { // dòng này nè, ngó câu dưới trước đi
        $sql="select * from bill where id=".$id; // $id chỗ này là lấy từ trên dòng đem xuống đấy 
        $bill=pdo_query_one($sql);
        return $bill;    // $dm kết quả trả về, nào có kết quả trả về thì return 
    }
    function loadall_cart($idbill) { 
        $sql="select * from cart where idbill=".$idbill; 
        $bill=pdo_query($sql);  // này đặt tên gì cũng được ($bill ấy)
        return $bill;  
    }
    function loadall_cart_count($idbill) { 
        $sql="select * from cart where idbill=".$idbill; 
        $bill=pdo_query($sql);  // phần này lấy sửa ở phần trên 
        return sizeof($bill);  
    }
    function loadall_bill($kyw="",$iduser=0) { 

        $sql="select * from bill where 1";
        if($iduser>0) $sql.=" AND iduser=".$iduser; // phần này nối chuỗi sql, để hổ trợ cho phần listbill(admin)
        if($kyw!="") $sql.=" AND id like '%".$kyw."%'"; 
        $sql.=" order by id desc";
        $listbill_ad=pdo_query($sql);  // này đặt tên gì cũng được ($bill ấy)
        return $listbill_ad;  
    }
    function loadall_bill_mydh($iduser) { // này mình tự tách riêng ra cho khỏi lỗi

        $sql="select * from bill where iduser=".$iduser;
        $listbill=pdo_query($sql);  // này đặt tên gì cũng được ($bill ấy)
        return $listbill;  
    }

    function get_ttdh($n) {     //n ở đây là 1 số gì đó đặt tên là n
        switch ($n) {
            case '0':
                $tt="Đơn hàng mới";
                break;
            case '1':
                $tt="Đang xử lý";
                break;
            case '2':
                $tt="Đang giao hàng";
                break;
            case '3':
                $tt="Hoàn tất";
                break;
            
            default:
                $tt="Đơn hàng mới";
                break;
        }
        return $tt;
    }
    function get_pttt($s) {     //s ở đây là 1 số gì đó đặt tên là s
        switch ($s) {
            case '1':
                $pt="Trả tiền khi nhận hàng";
                break;
            case '2':
                $pt="Chuyển khoản ngân hàng";
                break;
            case '3':
                $pt="Thanh toán Online";
                break;
            
            default:
                $pt="Trả tiền khi nhận hàng";
                break;
        }
        return $pt;
    }
    function loadall_thongke() {
        $sql="select danhmuc.id as madm, danhmuc.name as tendm, count(sanpham.id) as countsp, min(sanpham.price) as minprice, max(sanpham.price) as maxprice, avg(sanpham.price) as avgprice"; 
        $sql.=" from sanpham left join danhmuc on danhmuc.id=sanpham.iddm";
        $sql.=" group by danhmuc.id order by danhmuc.id desc";
        $listtk=pdo_query($sql);  // này đặt tên gì cũng được ($bill ấy)
        return $listtk;  
    }

    function delete_bill($id) {       // chỗ này($id) mình đặt tên gì cũng được ha
        $sql="delete from bill where id=".$id;
        pdo_execute($sql);
    }

    function update_bill($id,$bill_status){
        $sql="update bill set bill_status='.$bill_status.' where id=".$id;
        pdo_execute($sql);
        return "Cập nhập thành công";

    }
?>