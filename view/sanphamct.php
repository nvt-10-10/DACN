
<div class="row mb ">
            <div class="boxtrai mr">
            <div class="row mb">
                <?php
                    extract($onesp);
                ?>
                    <div class="boxtitle"><?=$name?></div>
                    <div class="row boxcontent1">
                        <?php 
                            
                            $img=$img_path.$img;
                            echo '<img src="'.$img.'"><br><br><br>';    // nhớ echo thì dấu nháy đơn
                            echo $mota;
                                  
                            echo '<p></p>';
                            echo number_format($price,0,',','.').' vnđ';
                                echo'<div class="row btnaddtocart">
                                    <form action="index.php?act=addtocart" method="post">
                                    Số Lượng
                                    <input type="number" name="soluong_cart" value="1" min="1" max="'.$soluong.'">
                                        <input type="hidden" name="soluong" value="'.$soluong.'">
                                        <input type="hidden" name="id" value="'.$id.'">
                                        <input type="hidden" name="name" value="'.$name.'">
                                        <input type="hidden" name="img" value="'.$img.'">
                                        <input type="hidden" name="price" value="'.$price.'"><p></p>
                                        <input type="submit" name="addtocart" value="Thêm vào giỏ hàng"><p></p>
                                    </form>
                                </div>';    // này bỏ vào nhưng mất hình khi thêm vào giỏ hàng
                                  
                        ?>        
                    </div>
            </div>
            <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
            <script>
                $(document).ready(function(){                           // mấy này trong 3wschool
                    $("#binhluan").load("view/binhluan/binhluanform.php", {idpro: <?=$id?>}); // id product(tên)
                });
            </script>
            <div class="row" id="binhluan">
                
            </div> -->
            <div class="row">
                <iframe src="view/binhluan/binhluanform.php?idpro=<?=$id?>" frameborder="0" width="100%" height="300px"></iframe>
            </div>
            <div class="row mb">
                <div class="boxtitle">SẢN PHẨM CÙNG LOẠI</div>
                <div class="row boxcontent">
                       <?php
                        foreach ($sp_cung_loai as $sp_cung_loai) {
                            extract($sp_cung_loai);
                            $linksp="index.php?act=sanphamct&idsp=".$id;
                            echo '<li><a href="'.$linksp.'">'.$name.'</a></li>';
                        } 
                       ?> 
                </div>
            </div> 
    
            </div>
            <div class="boxphai">
                <?php include "boxright.php";?>
            </div>
        </div>
