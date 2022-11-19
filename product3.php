<?php require_once "connect.php";?>
 <?php
   $quanngan = 'quanngan';
   $quandai = 'quandai';

   $selectsanpham = "SELECT * FROM `sanpham`";
   $select_product  = $conn->query($selectsanpham);
   
   
   
   



   foreach ($select_product as $row) {
         if ($row['loai'] == $quanngan ||  $row['loai'] == $quandai) {
            $gia;
            if ($row['price'] > 100000 && $row['price'] <= 200000) {
               $gia = "100-200";
            } else  if ($row['price'] > 200000 && $row['price'] <= 300000) {
               $gia = "200-300";
            } else  if ($row['price'] > 300000 && $row['price'] <= 400000) {
               $gia = "300-400";
            } else  if ($row['price'] > 400000 && $row['price'] <= 500000) {
               $gia = "400-500";
            } else  if ($row['price'] > 500000 && $row['price'] <= 600000) {
               $gia = "500-600";
            } else if ($row['price'] > 600000 && $row['price'] <= 700000) {
               $gia = "600-700";
            } else if ($row['price'] > 700000 && $row['price'] <= 800000) {
               $gia = "700-800";
            } else if($row['price'] > 800000 && $row['price'] <= 900000){
               $gia = "800-900";
            }
            else{
               $gia=0;
            }
            $dis;
            $noibat="noibat";
            
   ?>
          <div class="col-lg-3 spham produkt_gruppe_div" <?php if($row['discount']!=0){
               $dis='data-brand_name2="discount"'; echo $dis;
            }?> data-money="<?php echo $gia; ?>" data-brand_name="<?php echo $row['loai']; ?>" data-brand_name1 ="<?php if( $row['noibat']==1) echo $noibat; ?>">

             <img src="img/sanpham/<?php echo $row['image1']; ?>" alt="" class="d-block w-100 mx-auto hinh" onmouseover="this.src='img/sanpham/<?php echo $row['image2']; ?>';" onmouseout="this.src='img/sanpham/<?php echo $row['image1']; ?>';" />

             <div class="name"><?php echo $row['name']; ?></div>

             <div class="sl">số lượng <?php echo $row['sl']; ?></div>
             <div class="gia row text-center">

                <?php if ($row['discount'] != 0) {
                  ?>
                   <div class="discount col">-<?php echo $row['discount']; ?>%</div>
                <?php
                  } ?>





                <div class="price col">$<?php echo $row['price']; ?></div>
                <?php if ($row['discount'] != 0) {
                     $aa = (int)($row['price'] / ((100 - $row['discount']) / 100));
                  ?>
                   <div class="giacu col">$<?php echo $aa; ?></div>
                <?php
                  } ?>



             </div>
             <input type="number" min="1" max="<?php echo $row['sl']; ?>" name="product_quantity" value="1">
             <input type="hidden" name="sanpham_image" value="<?php echo $row['image1']; ?>">
             <input type="hidden" name="sanpham_name" value="<?php echo $row['name']; ?>">
             <input type="hidden" name="sanpham_price" value="<?php echo $row['price']; ?>">
             <input type="submit" value="Thêm vào giỏ" name="add_to_cart" class="btn">
             </form>
          </div>
 <?php
         }
      }
   ;

   ?>

 </div>

 </div>
 </div>