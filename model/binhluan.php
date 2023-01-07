<?php
    function insert_binhluan($noidung,$iduser,$idpro,$ngaybinhluan) {
        $sql="insert into binhluan(noidung,iduser,idpro,ngaybinhluan) values('$noidung','$iduser','$idpro','$ngaybinhluan')"; //đây là phần được bê từ index.php ở case adddm
        pdo_execute($sql);
    }

    function loadall_binhluan() {
        $sql="select * from binhluan bl 
        inner join taikhoan tk on tk.id = bl.iduser
        inner join sanpham sp on sp.id=bl.idpro 
        order by bl.ngaybinhluan desc";  
        $listbl=pdo_query($sql);    // $listdanhmuc thấy này hông, kết quả trả về đấy, nào có kết quả trả về thì return nhớ chưa
        return $listbl;    
    }

    function loadall_binhluan_sp($idpro) {
        $sql="select * from binhluan bl inner join taikhoan tk on tk.id = bl.iduser 
        where bl.idpro='$idpro'  order by bl.id desc";
        $listbl=pdo_query($sql);    // $listdanhmuc thấy này hông, kết quả trả về đấy, nào có kết quả trả về thì return nhớ chưa
        return $listbl;    
    }

    function delete_binhluan($id) {       // chỗ này($id) mình đặt tên gì cũng được ha
        $sql="delete from binhluan where id=".$id;
        pdo_execute($sql);
    }
?>