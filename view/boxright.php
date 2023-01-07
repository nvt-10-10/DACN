<div class="row mb ">
                    <div class="boxtitle">TÀI KHOẢN</div>
                    <div class="boxcontent formtaikhoan">
                        <?php
                            if(isset($_SESSION['user'])) {
                                extract($_SESSION['user']);
                        ?>
                            <div class="row mb10">
                                Xin chào<br>
                                <?=$user?>
                            </div>
                            <div class="row mb10">
                                <li>
                                    <a href="index.php?act=mybill">Đơn hàng của tôi</a>
                                </li>
                             
                                <li>
                                    <a href="index.php?act=edit_taikhoan">Cập nhật tài khoản</a>
                                </li>
                                <?php if($role==1){ ?>
                                <li>
                                    <a href="admin/index.php">Quản lý</a>
                                </li>
                                <?php }?>
                                <li>
                                    <a href="index.php?act=thoat">Đăng xuất</a>
                                </li>
                            </div>

                        <?php
                            } else {
                        ?>
                        <form action="index.php?act=dangnhap" method="post">
                            <div class="row mb10">
                                Tên đăng nhập<br>
                                <input type="text" name="user" required>
                            </div>
                            <div class="row mb10">
                                Mật khẩu<br>

                                <input type="password" name="pass" required>
                            </div>
                            <div class="row mb10">
                                <input type="checkbox" name=""> Ghi nhớ tài khoản?</div>
                                <div class="row mb10">
                            <!-- <?php 
                               
                            ?> -->
                            </div>
                            <div class="row mb10">
                                <input type="submit" value="Đăng nhập" name="dangnhap">
                            </div>
                        </form>
                        <li>
                            <a href="index.php?act=quenmk">Quên mật khẩu</a>
                        </li>
                        <li>
                            <a href="index.php?act=dangky">Đăng ký thành viên</a>
                        </li>
                        <?php }?>
                    </div>
                </div>
                <div class="row mb">
                    <div class="boxtitle">DANH MỤC</div>
                    <div class="boxcontent2 menudoc">
                        <ul>
                            <?php
                                foreach ($dsdm as $dm) {
                                    extract($dm);
                                    $linkdm="index.php?act=sanpham&iddm=".$id;
                                    echo '<li>
                                            <a href="'.$linkdm.'">'.$name.'</a>
                                        </li>';
                                }
                            ?>
                      
                        </ul>
                    </div>
                    <div class="boxfooter searbox">
                        <form action="index.php?act=sanpham" method="post">
                            <input placeholder="Từ khóa sản phẩm..." type="text" name="kyw"><p></p>
                            <input type="submit" name="timkiem" value="Tìm kiếm">
                        </form>
                    </div>
                </div>
                <div class="row">
                    <div class="boxtitle">TOP 10 YÊU THÍCH</div>
                    <div class="row boxcontent">
                        <?php
                            foreach ($dstop10 as $sp) {
                                extract($sp);   // khi sử dụng mảng thì extract nó ra, thì mới dùng được tên cột là tên biến để hiển thị
                                $linksp="index.php?act=sanphamct&idsp=".$id;
                                $img=$img_path.$img;
                                echo '<div class="row mb10 top10">
                                        <a href="'.$linksp.'"><img src="'.$img.'" alt=""></a>
                                        <a href="'.$linksp.'">'.$name.'</a>
                                    </div>';
                            }
                        ?>
          
                    </div>
                </div>