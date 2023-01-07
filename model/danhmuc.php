<?php       // đây là phần tối ưu hóa controller, tập trung các câu sql đó thành những function


function insert_danhmuc($tenloai) {
    $query="select count(*) from danhmuc where name='$tenloai'";
    if(pdo_check($query)==false){
        return "Tên danh mục tồn tại";
    } else {
        //đây là phần được bê từ index.php ở case adddm
        $sql="insert into danhmuc(name) values('$tenloai')"; 
        $count = pdo_execute($sql);
        return "Thêm danh mục thành công";
    }
    
    
}

    function delete_danhmuc($id) {
        $sql="delete from binhluan where idpro in (select id from sanpham  where iddm= ".$id.")";
        pdo_execute($sql);
        $sql="delete from sanpham where iddm=".$id;
        pdo_execute($sql);
       
        $sql="delete from danhmuc where id=".$id;
        pdo_execute($sql);
    }

    function loadall_danhmuc() {
        $sql="select * from danhmuc order by id desc";
        $listdanhmuc=pdo_query($sql);    // $listdanhmuc thấy này hông, kết quả trả về đấy, nào có kết quả trả về thì return nhớ chưa
        return $listdanhmuc;    
    }

    function loadone_danhmuc($id) { // dòng này nè, ngó câu dưới trước đi
        $sql="select * from danhmuc where id=".$id; // $id chỗ này là lấy từ trên dòng đem xuống đấy 
        $dm=pdo_query_one($sql);
        return $dm;    // $dm thấy này hông, kết quả trả về đấy, nào có kết quả trả về thì return nhớ chưa
    }

    function update_danhmuc($id,$tenloai) {     // vì có 2 tham số nên mình để $id và $tenloai ở trong ngoặc ha
        $query="select count(*) from danhmuc where name='$tenloai'";
        if(pdo_check($query)==true){
            //đây là phần được bê từ index.php ở case adddm
            $sql="update danhmuc set name='".$tenloai."' where id=".$id;
            pdo_execute($sql);
     
        return null;
        } else 
         return "Tên danh mục tồn tại";
      
    }

?>