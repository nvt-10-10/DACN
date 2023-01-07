<?php
session_start();
if(isset($_SESSION['user'])&&($_SESSION['user']['role']==1)) {
    include "../model/pdo.php";
    include "../model/danhmuc.php";
    include "../model/sanpham.php";
    include "../model/taikhoan.php";
    include "../model/binhluan.php";
    include "../model/cart.php";
    include "header.php";
    //controller

    if(isset($_GET['act'])){
        $act=$_GET['act']; 
        switch ($act) {
                                   /*DANH MỤC*/
            case 'adddm':
                //kiểm tra xem người dùng có click vào nút add hay không
                if(isset($_POST['themmoi']) && ($_POST['themmoi'])){
                    $tenloai=$_POST['tenloai'];
                    $thongbao=insert_danhmuc(trim($tenloai));
                } 
                
                include "danhmuc/add.php";
                break;
            case 'listdm': 

                $listdanhmuc=loadall_danhmuc();
                include "danhmuc/list.php";
                break;
            case 'xoadm':
                if(isset($_POST['checkbox']))
                {
                    foreach($_POST['checkbox'] as $id_dm)
                    delete_danhmuc($id_dm);
                }
                else if(isset($_GET['id'])&&($_GET['id']>0)){
                    delete_danhmuc($_GET['id']);
                }
        
                $listdanhmuc=loadall_danhmuc();
                include "danhmuc/list.php";
                break;

            case 'suadm':
                if(isset($_GET['id'])&&($_GET['id']>0)){
                 
                    $dm=loadone_danhmuc($_GET['id']); 
               }
                include "danhmuc/update.php";
                break;    
            case 'updatedm':
                if(isset($_POST['capnhat'])&&($_POST['capnhat'])){  
                    $tenloai=$_POST['tenloai'];     
                    $id=$_POST['id'];
                 $thongbao=update_danhmuc($id,trim($tenloai));
                    if($thongbao!=null){
                        $dm=loadone_danhmuc( $id); 
                    } else {
                        $dm=null;
                        $thongbao="Cập nhập danh mục thành công";
                    }
                    
                    include "danhmuc/update.php";
                    break;
                }
               

                                   /*  sẢN PHẨM */ 

            case 'addsp':
   
                if(isset($_POST['themmoi']) && ($_POST['themmoi'])){
                    $iddm=$_POST['iddm'];
                    $tensp=$_POST['tensp']; 
                    $giasp=$_POST['giasp']; 
                    $soluong=$_POST['soluong']; 
                    $mota=$_POST['mota'];
                    $hinh=$_FILES['hinh']['name'];  //vì là file nên mình phải làm vậy, và trong ngoặc vuông thì tên của file(name của file) và file này trả về đối tượng mảng nên mình trả về ví dụ ở đây thôi ha và bắt buộc phải là name, nhớ là đây thôi nhá, cìn nếu kích thước thì lấy là size ở chỗ vuông phía sau ak, còn kiểu file thì là type
                    $target_dir = "../upload/";   //(chú ý đường dẫn cho đúng) 2 dòng này lấy trên w3 school về để khia báo thư mục upload của mình, có chữ s phía sau nhưng mình đặt là upload không nên xóa rồi ha
                    $target_file = $target_dir . basename($_FILES["hinh"]["name"]);   //này là bằng với thư mục upload cộng với tên file nè,chỉnh sửa cái phía trong lại theo mình đặt phía trên 
                    // giờ mình chỉ cần upload file đó lên , và mình sử dụng hàm move_upload_file, này dưới tý trang nảy mình tìm ak
                    if (move_uploaded_file($_FILES["hinh"]["tmp_name"], $target_file)) {    //chỉnh sửa tên lại
                       // echo "The file ". htmlspecialchars( basename( $_FILES["hinh"]["name"])). " has been uploaded."; // phần này mình hông cần nên ẩn ha
                    } else {
                       // echo "Sorry, there was an error uploading your file.";
                    }

            
                    $thongbao= insert_sanpham(trim($tensp),$giasp,$soluong,$hinh,$mota,$iddm);;
                } 
                $listdanhmuc=loadall_danhmuc();  
                include "sanpham/add.php";
                break;
            case 'listsp':
                if(isset($_POST['listok']) && ($_POST['listok'])){  
                    $kyw=$_POST['kyw'];
                    $iddm=$_POST['iddm']; 
                } else{
                    $kyw='';    //lúc này mình set giá trị cho nó là rỗng và 0
                    $iddm=0;
                }
               
               
                
                $listdanhmuc=loadall_danhmuc(); // và chỗ này mới thêm, nó có listdanhmuc và listsanpham ha
                $listsanpham=loadall_sanpham($kyw,$iddm); //này mình thay đổi rồi nha 1 bước tối ưu hóa cho nó và bỏ dòng trên ak, sau này làm cho nó gọn, và xóa những câu giống tương tự kiểu vậy bên dưới và thay bằng $listdanhmuc=loadall(); nha
                include "sanpham/list.php";
                break;

            case 'xoasp':
                if(isset($_POST['checkbox']))
                {
                    foreach($_POST['checkbox'] as $id_sp)
                    delete_sanpham($id_sp);
                }
                else if(isset($_GET['id'])&&($_GET['id']>0)){
                    delete_sanpham($_GET['id']);
                }
                $listsanpham=loadall_sanpham("",0);
                include "sanpham/list.php";
                break;

            case 'suasp':
                if(isset($_GET['id'])&&($_GET['id']>0)){
                    $sanpham=loadone_sanpham($_GET['id']); 
                }
                $listdanhmuc=loadall_danhmuc();
                include "sanpham/update.php";
                break;    
            case 'updatesp':
                if(isset($_POST['capnhat'])&&($_POST['capnhat'])){  //khi nó tồn tại và click vào nút cập nhật thì thực hiện ở dưới
                    $id=$_POST['id'];
                    $iddm=$_POST['iddm'];
                    $tensp=trim($_POST['tensp']); // kiểm tra bên trang add.php của sản phẩm nha rồi có thuộc tính nào được mình post qua
                    $price=$_POST['giasp']; //nói chung cái nào input bình thường thì lấy được hết ha 
                    $mota=$_POST['mota'];
                    $soluong=$_POST['soluong'];
                    $img=$_FILES['hinh']['name'];  //vì là file nên mình phải làm vậy, và trong ngoặc vuông thì tên của file(name của file) và file này trả về đối tượng mảng nên mình trả về ví dụ ở đây thôi ha và bắt buộc phải là name, nhớ là đây thôi nhá, cìn nếu kích thước thì lấy là size ở chỗ vuông phía sau ak, còn kiểu file thì là type
                    $target_dir = "../upload/";   //(chú ý đường dẫn cho đúng) 2 dòng này lấy trên w3 school về để khia báo thư mục upload của mình, có chữ s phía sau nhưng mình đặt là upload không nên xóa rồi ha
                    $target_file = $target_dir . basename($_FILES["hinh"]["name"]);   //này là bằng với thư mục upload cộng với tên file nè,chỉnh sửa cái phía trong lại theo mình đặt phía trên 
                    // giờ mình chỉ cần upload file đó lên , và mình sử dụng hàm move_upload_file, này dưới tý trang nảy mình tìm ak
                    if (move_uploaded_file($_FILES["hinh"]["tmp_name"], $target_file)) {    //chỉnh sửa tên lại
                       // echo "The file ". htmlspecialchars( basename( $_FILES["hinh"]["name"])). " has been uploaded."; // phần này mình hông cần nên ẩn ha
                    } else {
                       // echo "Sorry, there was an error uploading your file.";
                    }
                    $thongbao= update_sanpham($id,$iddm,$tensp,$price,$soluong,$mota,$img); 
                    if($thongbao!=null){
                        $sanpham=loadone_sanpham( $id); 
                    } else {
                        $sanpham=null;
                        $thongbao="Cập nhập sản phẩm thành công";
                    }
                    
                }
               
            
                // include "danhmuc/update.php"; ----cái này hay cái dưới cũng được vẫn ra kết quả nha, nhưng có dòng sai thì mình vẫn chưa hiểu lắm
                include "sanpham/update.php";
                break;


          
            case 'dskh':
                $listtaikhoan=loadall_taikhoan(0);   //chỗ này đã xóa ("",0)
                include "taikhoan/list.php";
                break;
            case 'xoatk':
                if(isset($_GET['id'])&&($_GET['id']>0)){
                    delete_taikhoan($_GET['id']);
                }
                $listtaikhoan=loadall_taikhoan(0);   //chỗ này đã xóa ("",0)
                include "taikhoan/list.php";
                break;
            case 'suatk':
                if(isset($_GET['id'])&&($_GET['id']>0)){
                    $tk=loadone_taikhoan($_GET['id']); 
                }
               
                include "taikhoan/update.php";
                break;  

            case 'updatetk':
                if(isset($_POST['capnhat'])&&($_POST['capnhat'])) {
                    $user=$_POST['user'];
                    $pass=$_POST['pass'];
                    $email=$_POST['email'];
                    $address=$_POST['address'];
                    $tel=$_POST['tel'];
                    $id=$_POST['id'];

                    update_taikhoan($id,$user,$pass,$email,$address,$tel);
                    $tk=null;
                   $thongbao="Cập nhập thành công";
                   
                }
                include "taikhoan/update.php";
                break;
                break;
            case 'dsbl':
                $listbinhluan=loadall_binhluan();
                include "binhluan/list.php";
                break;
            case 'xoabl':
                if(isset($_GET['id'])&&($_GET['id']>0)){
                    delete_binhluan($_GET['id']);
                }
                $listbinhluan=loadall_binhluan(0);
                include "binhluan/list.php";
                break;
            case 'thongke':
                $listthongke=loadall_thongke();
                include "thongke/list.php";
                break;
            case 'bieudo':
                $listthongke=loadall_thongke();
                include "thongke/bieudo.php";
                break;
            case 'listbill':
                if(isset($_POST['kyw'])&&($_POST['kyw']!="")) {
                    $kyw=$_POST['kyw'];
                } else {
                    $kyw="";
                }
                $listbill=loadall_bill($kyw,0);
                include "bill/listbill.php";
                break;
            case 'xoabill':
                if(isset($_GET['id'])&&($_GET['id']>0)){
                    delete_bill($_GET['id']);
                }
                $kyw="";
                $listbill=loadall_bill($kyw,0);
                include "bill/listbill.php";
                break;
            case 'suabill':
                if(isset($_GET['id'])&&($_GET['id']>0)){
                    $bill=loadone_bill($_GET['id']);
                   
                    $billct=loadall_cart($_GET['id']); 
            
                }
                include "bill/suabill.php";
                break;  
            case 'updatebill':
                if(isset($_POST['capnhat'])&&($_POST['capnhat'])) {
                    $id=$_POST['id'];
                    $bill_status=$_POST['bill_status'];
   
                  
                    update_bill($id,$bill_status);
                    $bill=loadone_bill($id);  
                    $billct=loadall_cart($id); 
                    $thongbao="Cập nhập thành công";
                    include "bill/suabill.php";
                }
                break;
            default:
                include "home.php";
                break;
        }
    }else {
        include "home.php";
    }


    
    include "footer.php";
} else {
    header('Location: ../index.php');
}
?>