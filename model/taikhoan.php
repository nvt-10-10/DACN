<?php
    function loadall_taikhoan($role) {
        $sql="select * from taikhoan where role=0 and user_status=1 order by id desc ";
        $listtaikhoan=pdo_query($sql);   
        return $listtaikhoan;    
    }

    function loadone_taikhoan($id) { // dòng này nè, ngó câu dưới trước đi
        $sql="select * from taikhoan where id=".$id; // $id chỗ này là lấy từ trên dòng đem xuống đấy 
        $dm=pdo_query_one($sql);
        return $dm;    
    }

    function insert_taikhoan($email,$user,$pass) {
        $query="select count(*) from taikhoan where email='$email'";
        if(pdo_check($query)==false)
            return "Email đã tồn tại";
        
            //đây là phần được bê từ index.php ở case adddm
            $sql="insert into taikhoan(email,user,pass) values('$email','$user','$pass')"; // trong đây tên riêng trong này nha, hông phải biến ngoài kia tên gì trong này tên đó đâu, ví dụ ở ngoài kia insert sử dụng biên khác trong này khác cũng được nha, nhưng mà nên sử dụng trùng đi//đây là phần được bê từ index.php ở case adddm

            $count = pdo_execute($sql);
            return "Đã đăng ký thành công. Vui lòng đăng nhập để bình luận hoặc đặt hàng !";
        
    }

    function delete_taikhoan($id){
        $sql="update taikhoan set user_status=0 where id=".$id;
        pdo_execute($sql);
    }

    function checkuser($user,$pass) { // dòng này nè, ngó câu dưới trước đi
        $sql="select * from taikhoan where user_status=1 and user='".$user."' AND pass='".$pass."'"; // $id chỗ này là lấy từ trên dòng đem xuống đấy 
        $sp=pdo_query_one($sql);
        return $sp;    // $dm thấy này hông, kết quả trả về đấy, nào có kết quả trả về thì return nhớ chưa
    }

    function checkemail($email) { // dòng này nè, ngó câu dưới trước đi
        $sql="select * from taikhoan where email='".$email."'"; // $id chỗ này là lấy từ trên dòng đem xuống đấy 
        $sp=pdo_query_one($sql);
        return $sp;    // $dm thấy này hông, kết quả trả về đấy, nào có kết quả trả về thì return nhớ chưa
    }

    
    function update_taikhoan($id,$user,$pass,$email,$address,$tel,$name) {
             // này lấy từ bên index.php sanpham
        $query="select count(*) from taikhoan where email='$email' and id<>'$id'";
        if(pdo_check($query)==false)
            return "Email đã tồn tại";
 
        $sql="update taikhoan set user='".$user."', pass='".$pass."', email='".$email."', address='".$address."', tel='".$tel."' , name='".$name."'  where id=".$id;
        pdo_execute($sql);
        return "Cập nhập tài khoản thành công";
    }
?>