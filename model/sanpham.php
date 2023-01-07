<?php       // đây là phần tối ưu hóa controller, tập trung các câu sql đó thành những function

    function insert_sanpham($tensp,$giasp,$soluong,$hinh,$mota,$iddm) {
        $query="select count(*) from sanpham where name='$tensp' and iddm='$iddm'";
        if (pdo_check($query)==false){
            return "Tên sản phẩm đã tồn tại";
        }  else {
            $sql="insert into sanpham(name,price,soluong,img,mota,iddm) values('$tensp','$giasp','$soluong','$hinh','$mota','$iddm')"; // trong đây tên riêng trong này nha, hông phải biến ngoài kia tên gì trong này tên đó đâu, ví dụ ở ngoài kia insert sử dụng biên khác trong này khác cũng được nha, nhưng mà nên sử dụng trùng đi//đây là phần được bê từ index.php ở case adddm
            $count = pdo_execute($sql);
            return "Thêm sản phẩm thành công";
        }
    }

    function delete_sanpham($id) { 
              // chỗ này($id) mình đặt tên gì cũng được ha
        $sql="delete from binhluan where idpro=".$id;
        pdo_execute($sql);
        $sql="delete from sanpham where id=".$id;
        pdo_execute($sql);
    }
    function loadall_sanpham_top10() {   //------load sản phẩm ở trang home
        $sql="select * from sanpham where 1 order by luotxem desc limit 0,10"; // lấy 9 sản phẩm mới nhất lên
        $listsanpham=pdo_query($sql);
        return $listsanpham;    
    }
    
    function loadall_sanpham_home() {   //------load sản phẩm ở trang home
        $sql="select * from sanpham where 1 order by id desc limit 0,9"; // lấy 9 sản phẩm mới nhất lên 
        $listsanpham=pdo_query($sql);
        return $listsanpham;    
    }
    function loadall_sanpham_page($number_page) {
           //------load sản phẩm ở trang home
        $number_page=($number_page-1)*9;
        $sql="select * from sanpham where 1 order
         by id desc limit ".$number_page.",9"; // lấy 9 sản phẩm mới nhất lên 
        $listsanpham=pdo_query($sql);
        return $listsanpham;    
    }


    function load_page(){
        $query="select count(*) from  sanpham";
        
        $number_page=pdo_query_value($query) ;
        if($number_page%9!=0)
            $number_page=$number_page/9+1;
        else 
            $number_page=$number_page/9;
        settype($number_page,"integer");
        return $number_page;
    }

    function loadall_sanpham($kyw="",$iddm=0) {  //sau khi bỏ thêm 2 cái $ kia vào thì sửa nhẹ lại tý là xong 
        $sql="select * from sanpham where 1";   //cho đk là 1 là đúng ak và kiểm tra
        if($kyw!="") {  //kiểm tra nó khác rỗng thì nối cái chuỗi query(sql) zô
            $sql.=" and name like'%".$kyw."%'";   //kiểm tra nó có tên $kyw không và đấy là câu lệnh trong sql
        }
        //và nhớ bao nhiêu biến thì bao nhiêu điều kiện
        if($iddm>0) {  //kiểm tra nó khác rỗng thì nối cái chuỗi query(sql) zô
            $sql.=" and iddm ='".$iddm."'";   
        }
        $sql.=" order by id desc";   //sql chấm bằng($sql.=) là mình nối chuỗi này zô nè, và nhớ cách chỗ order nó ra chứ hông nó nối là lỗi, và nhớ qui định trong sql nối chuỗi là sql chấm bằng nháy đôi cách ra tý
        $listsanpham=pdo_query($sql);    // $listdanhmuc thấy này hông, kết quả trả về đấy, nào có kết quả trả về thì return nhớ chưa
        return $listsanpham;    
    }

    function load_ten_dm($iddm) { // dòng này nè, ngó câu dưới trước đi
        if($iddm>0) {
        $sql="select * from danhmuc where id=".$iddm; // $id chỗ này là lấy từ trên dòng đem xuống đấy 
        $dm=pdo_query_one($sql);
        extract($dm);
        return $name;    // $dm thấy này hông, kết quả trả về đấy, nào có kết quả trả về thì return nhớ chưa
        } else {
            return "";
        }       
    }

    function loadone_sanpham($id) { // dòng này nè, ngó câu dưới trước đi
        $sql="select * from sanpham where id=".$id; // $id chỗ này là lấy từ trên dòng đem xuống đấy 
        $sp=pdo_query_one($sql);
        return $sp;    // $dm thấy này hông, kết quả trả về đấy, nào có kết quả trả về thì return nhớ chưa
    }

    function load_sanpham_cungloai($id, $iddm) { 
        $sql="select * from sanpham where iddm=".$iddm." AND id <> ".$id." order by luotxem desc limit 0,10";  // này chỉ cần chỉnh khác id thì ra cùng loại ha, lấy giống phía trên
        $listsanpham=pdo_query($sql);
        return $listsanpham;    
    }



    function update_soluong($id,$soluong){
        $sql="update sanpham set soluong='.$soluong.' where id=".$id;
        pdo_execute($sql);
    } 

    function update_sanpham($id,$iddm,$tensp,$giasp,$soluong,$mota,$hinh) {  
        
        $query="select count(*) from sanpham where name='$tensp' and iddm='$iddm'";
        if (pdo_check($query)==false){
            return "Tên sản phẩm đã tồn tại";
        }  else {
            if($hinh!="")
            $sql="update sanpham set soluong='$soluong', iddm='".$iddm."', name='".$tensp."', price='".$giasp."', mota='".$mota."', img='".$hinh."' where id=".$id;
        else
            $sql="update sanpham set soluong='$soluong', iddm='".$iddm."', name='".$tensp."', price='".$giasp."', mota='".$mota."' where id=".$id;
        pdo_execute($sql);
        return  "Cập nhập sản phẩm thành công";
        }
        
        // này lấy từ bên index.php sanpham
       
    }
    function view($id,$luotxem){
        $luotxem+=1;
        $query="update sanpham set luotxem='$luotxem' where id='$id'";
        pdo_execute($query);
    }
?>