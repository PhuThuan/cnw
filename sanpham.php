
<?php 
include 'connect.php';?>
<div class="products">

   <h1 class="heading">latest products</h1>

   <div class="box-container">

   <?php
      $select_product = $conn->query("SELECT * FROM `sanpham`");
    
         foreach ($select_product as $row){

   ?>
      <form method="post" class="box" action="">
         <img src="images/<?php echo $row['image1']; ?>" alt="">
         <div class="name"><?php echo $row['name']; ?></div>
         <div class="price">$<?php echo $row['price']; ?>/-</div>
         <div class="sl">số lượng <?php echo $row['sl']; ?></div>
         <input type="number" min="1" max="100" name="product_quantity" value="1">
         <input type="hidden" name="product_image" value="<?php echo $row['image1']; ?>">
         <input type="hidden" name="product_name" value="<?php echo $row['name']; ?>">
         <input type="hidden" name="product_price" value="<?php echo $row['price']; ?>">
         <input type="submit" value="add to cart" name="add_to_cart" class="btn">
      </form>
   <?php
      };
   ?>

   </div>

</div>