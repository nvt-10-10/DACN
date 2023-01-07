<?php
    session_start();
    include "model/pdo.php";
    include "model/danhmuc.php";
    include "model/sanpham.php";
    include "model/taikhoan.php";
    include "model/cart.php";
    include "view/header.php";
    include "global.php";
    
    $thongbao=null;
    $number_page=1;

    if(!isset($_SESSION['mycart'])) $_SESSION['mycart']=[];

    $spnew = loadall_sanpham_home();    //khi đã lấy hàm này từ bên sanpham.php(model) thì mình sang home bỏ vào
    $dsdm = loadall_danhmuc();
    $dstop10 = loadall_sanpham_top10(); // xong view ở trong home

    if((isset($_GET['act']))&&($_GET['act']!="")){
        $act=$_GET['act'];
        switch ($act) {
            case 'sanpham':
                if(isset($_POST['kyw'])&&($_POST['kyw']!="")){   //kyw là cái name trong cái form search
                    $kyw=$_POST['kyw'];
                } else {
                    $kyw="";
                }
                if(isset($_GET['iddm'])&&($_GET['iddm']>0)) {
                    $iddm=$_GET['iddm'];
                    
                }else {
                    $iddm=0;
                }
                $dssp=loadall_sanpham($kyw,$iddm);
                $tendm=load_ten_dm($iddm);
                include "view/sanpham.php";
                break;
            case 'sanphamct':
                if(isset($_GET['idsp'])&&($_GET['idsp']>0)) {
                    $id=$_GET['idsp'];
                    $onesp=loadone_sanpham($id);
                    extract($onesp);
                    view($id,$luotxem);
                    $sp_cung_loai=load_sanpham_cungloai($id,$iddm);
                    include "view/sanphamct.php";
                }else {
                    include "view/home.php";
                }
                
                break;
            case 'dangky':
                if(isset($_POST['dangky'])&&($_POST['dangky'])) {
                    $email=$_POST['email'];
                    $user=$_POST['user'];
                    $pass=$_POST['pass'];
                    
                    $thongbao=insert_taikhoan($email,$user,$pass);
                }
                include "view/taikhoan/dangky.php";
                break;
            case 'dangnhap':
                if(isset($_POST['dangnhap'])&&($_POST['dangnhap'])) {
                    $user=$_POST['user'];
                    $pass=$_POST['pass'];
                    $checkuser=checkuser($user,$pass);
                    if(is_array($checkuser)) {
                        $_SESSION['user']=$checkuser;
                        // $thongbao="Bạn đã đăng nhập thành công !";  // khi gọi file mới thì biến này không thấy đâu, nên tắt
                        header('Location: index.php');  // này là load lại trang(mới, ưng trang gì cũng được), còn include là chèn trang
                        
                    } else {
                        $thongbao="Tài khoản không chính xác @_@. Vui lòng kiểm tra tên tài khoản và mật khẩu hoặc đăng ký để tạo người dùng!";
                    } 
                }
                include "view/taikhoan/dangky.php";
                break;
            case 'edit_taikhoan':
                if(isset($_POST['capnhat'])&&($_POST['capnhat'])) {
                    $user=$_POST['user'];
                    $pass=$_POST['pass'];
                    $email=$_POST['email'];
                    $address=$_POST['address'];
                    $tel=$_POST['tel'];
                    $id=$_POST['id'];
                    $name=$_POST['name'];
                    $thongbao=update_taikhoan($id,$user,$pass,$email,$address,$tel,$name);
                    $_SESSION['user']=checkuser($user,$pass);
                    // header('Location: index.php?act=edit_taikhoan');
                }
                include "view/taikhoan/edit_taikhoan.php";
                break;
            case 'quenmk':
                if(isset($_POST['guiemail'])&&($_POST['guiemail'])) {
                    $email=$_POST['email'];
                    $checkemail=checkemail($email);
                    if(is_array($checkemail)) {
                        $thongbao="Mật khẩu của bạn là: ".$checkemail['pass'];
                    } else {
                        $thongbao="Email này không tồn tại";
                    }
                }
                include "view/taikhoan/quenmk.php";
                break;  
            case 'thoat':   // này là hủy session thôi
                session_unset();                        // muốn trở về thì dùng header()
                header('Location: index.php');   
                include "view/gioithieu.php";
                break;
            case 'addtocart':
                if(isset($_SESSION['user'])){

                
                // add thông tin sp từ cái form add to cart đến session
                if(isset($_POST['addtocart'])&&($_POST['addtocart'])) {
                    $check=true;
                    $id=$_POST['id'];
                    $name=$_POST['name'];
                    $img=$_POST['img'];
                    $price=$_POST['price'];
                    if(isset($_POST['soluong_cart'])==false)
                    {
                        $soluong_cart=1;
                    } else{
                        $soluong_cart=$_POST['soluong_cart'];
                    }
                    for($i=0;$i<sizeof( $_SESSION['mycart']);$i++){
                        if($_SESSION['mycart'][$i][0]==$id){

                            $_SESSION['mycart'][$i][4]=$soluong_cart;
                            $_SESSION['mycart'][$i][5]=$soluong_cart*$price;
                            $check=false;
                            break;
                        }
                    }
                    $ttien=$soluong_cart*$price;
                    $spadd=[$id,$name,$img,$price,$soluong_cart,$ttien];
                    if($check){
                        array_push($_SESSION['mycart'],$spadd); 
                    }
                    include "view/cart/viewcart.php";
                    
                }} 
                else if(!isset($_SESSION['user'])){  
                    $thongbao="Vui lòng đăng ký để thêm sản phẩn phẩm vào giỏ hàng!!!";
                    include "view/taikhoan/dangky.php";
                }
             
                include "view/cart/viewcart.php";
               
                break;
            
            case 'page':
                if(isset($_GET['number_page'])) {
                    $number_page=$_GET['number_page']; 
                $spnew=loadall_sanpham_page($number_page);}
                include "view/home.php";
                break;
            case 'delcart':
                if(isset($_GET['idcart'])) {
                    array_splice($_SESSION['mycart'],$_GET['idcart'],1,); 
                     // này là xóa từng cái--cái đầu là xóa trong mảng, thứ 2 là vị trí, thứ 3 là bao nhiêu phần tử
                } else {
                    $_SESSION['mycart']=[];     // này là xóa tất cả, làm trống giỏ hàng
                }  
                include "view/cart/viewcart.php";
                // header('Location: index.php?act=viewcart');
                break;
            case 'viewcart':
                include "view/cart/viewcart.php";
                break;
            case 'bill':
                include "view/cart/bill.php";
                break;
            case 'billconfirm':
                // 3 bước tạo bill
                if(isset($_POST['dongydathang'])&&($_POST['dongydathang'])) {
                    if(isset($_SESSION['user'])) $iduser=$_SESSION['user']['id'];
                    else $id=0;
                    $name=$_POST['name'];
                    $email=$_POST['email'];
                    $address=$_POST['address'];
                    $tel=$_POST['tel'];
                    $pttt=$_POST['pttt'];    // này có trong type radio bên bill.php(pt thanh toán)
                    $ngaydathang=date('h:i:sa d/m/Y');
                    $tongdonhang=tongdonhang();
                    // tạo bill
                    $idbill=insert_bill($iduser,$name,$email,$address,$tel,$pttt,$ngaydathang,$tongdonhang);

                    //insert into (bảng)cart: $_SESSION['mycart'] & idbill --(lấy dữ liệu từ session với cái session['mycart']) và cái idbill này
                    
                    foreach ($_SESSION['mycart'] as $cart) {
                        $sanpham=loadone_sanpham($cart[0]);
                        $soluong=$sanpham['soluong']-$cart[4];
                        update_soluong($cart[0],$soluong);
                        insert_cart($cart[0],$cart[1],$cart[3],$cart[4],$cart[5],$idbill); //này như cái spadd trên kia
                    }
                    //tạo xong mua rồi thì xóa session ha
                    $_SESSION['mycart']=[];     
                }
                $bill=loadone_bill($idbill);
                $billct=loadall_cart($idbill);
                // $billct=loadone_bill($idbill);
                // $bill=loadall_cart($idbill);  //bill chi tiết
                include "view/cart/billconfirm.php";
                break;
            case 'mybill':
                //$listbill=loadall_bill($_SESSION['user']['id']);

                $listbill=loadall_bill_mydh($_SESSION['user']['id']);
                include "view/cart/mybill.php";
                break;
            case 'gioithieu':
                include "view/gioithieu.php";
                break;
            case 'lienhe':
                include "view/lienhe.php";
                break;
            case 'gopy':
                include "view/gopy.php";    
                break;
            case 'hoidap':
                include "view/hoidap.php";  // ta tạo thêm file hoidap.php nữa nha, này demo thôi
                break;
            default:
                include "view/home.php";
                break;
        }
    } else {
        include "view/home.php";
    }
    include "view/footer.php";
?>