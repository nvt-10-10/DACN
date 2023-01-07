
<div class="row mb ">
            <div class="boxtrai mr">
                <div class="row">
                    <div class="banner">
                        <!-- <img src="view/images/banner.jpg" alt=""> -->
                        <!-- Slideshow container -->
                        <div class="slideshow-container">

                        <!-- Full-width images with number and caption text -->
                        <div class="mySlides fade">
                        <div class="numbertext">1 / 4</div>
                        <img src="view/images/banner1.jpg" style="width:100%">
                        <!-- <div class="text">Caption Text</div> -->
                        </div>

                        <div class="mySlides fade">
                        <div class="numbertext">2 / 4</div>
                        <img src="view/images/banner2.jpg" style="width:100%">
                        <!-- <div class="text">Caption Two</div> -->
                        </div>

                        <div class="mySlides fade">
                        <div class="numbertext">3 / 4</div>
                        <img src="view/images/banner3.jpg" style="width:100%">
                        <!-- <div class="text">Caption Three</div> -->
                        </div>

                        <div class="mySlides fade">
                        <div class="numbertext">4 / 4</div>
                        <img src="view/images/banner4.jpg" style="width:100%">
                        <!-- <div class="text">Caption Four</div> -->
                        </div>

                        <!-- Next and previous buttons -->
                        <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
                        <a class="next" onclick="plusSlides(1)">&#10095;</a>
                        </div>
                        <br>

                        <!-- The dots/circles -->
                        <div style="text-align:center">
                        <span class="dot" onclick="currentSlide(1)"></span>
                        <span class="dot" onclick="currentSlide(2)"></span>
                        <span class="dot" onclick="currentSlide(3)"></span>
                        <span class="dot" onclick="currentSlide(4)"></span>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="sanphamhome">
                    <?php       // đọc dữ liệu từ mảng ra
                        $i=0;       // khai báo $i=0
                        foreach ($spnew as $sp) {
                            extract($sp);         // extract lấy tên cột, tên biến để nó show ra
                            $linksp="index.php?act=sanphamct&idsp=".$id;
                            $hinh=$img_path.$img;
                            if(($i==2)||($i==5)||($i==8)){
                                $mr="";
                            } else {
                                $mr="mr";
                            }
                            //<p>'.$price.' đ</p> ---đã bỏ đoạn này và mình tự tạo ngắt khoảng cho 2 echo dưới, mình thêm echo ' và dấu kết(';)
                            echo '<div class="boxsp '.$mr.'"><p></p>
                                    <div class="row img"><a href="'.$linksp.'"><img src="'.$hinh.'" alt=""></a></div>
                                    
                                    
                                    <a href="'.$linksp.'">'.$name.'</a>';
                                    echo '<p></p>';
                                    echo number_format($price,0,',','.').' vnđ';
                                    
                                echo'<div class="row btnaddtocart">
                                    <form action="index.php?act=addtocart" method="post">
                                        <input type="hidden" name="id" value="'.$id.'">
                                        <input type="hidden" name="name" value="'.$name.'">
                                        <input type="hidden" name="img" value="'.$img.'">
                                        <input type="hidden" name="price" value="'.$price.'"><p></p>
                                        <input type="submit" name="addtocart" value="Thêm vào giỏ hàng"><p></p>
                                    </form>
                                    </div>
                                </div>';
                                            // echo với html thì nên nháy đơn
                            $i+=1;
                        }
                    ?>
                    </div>
                    <div>
                            <ul style="">

                        <?php
                        $n=load_page();
                        if($n>1)
                        for($i=1;$i<=$n;$i++)
                           if($i==$number_page)
                              echo  '<a style="color:black" href="index.php?act=page&number_page='.$i.'"><li style="display:inline-block;font-size: 20px; padding: 8px 16px ; ">'.$i.'</li></a>';
                           else 
                           echo  '<a style="color:#ccc" href="index.php?act=page&number_page='.$i.'"><li style="display:inline-block;font-size: 20px; padding: 8px 16px ; ">'.$i.'</li></a>';
                        ?>
                    
                           
                      
                        </ul>
                    </div>
                </div> 
            </div>
            <div class="boxphai">
                <?php include "boxright.php";?>
            </div>
        </div>