<!-- <div class="products">

      <h1 class="heading">latest products</h1>

      <div class="box-container"> -->
<?php require_once "connect.php"; ?>
<?php

$user_id = $_SESSION['user'];
if (isset($_POST['add_to_cart'])) {

   $product_name = $_POST['sanpham_name'];
   $product_price = $_POST['sanpham_price'];
   $product_image = $_POST['sanpham_image'];
   $product_quantity = $_POST['product_quantity'];

   $select_cart =  $conn->query(" SELECT * FROM `cart` WHERE name = '$product_name' AND user_id = '$user_id'");

   if ($select_cart > 0) {
      $message[] = 'product already added to cart!';
   } else {
      $conn->exec("INSERT INTO `cart`(user_id, name, price, image, quantity) VALUES('$user_id', '$product_name', '$product_price', '$product_image', '$product_quantity')");
      $message[] = 'product added to cart!';
   }
};

?>

<?php

$selectsanpham = "SELECT * FROM `sanpham`";
$select_product  = $conn->query($selectsanpham);

foreach ($select_product as $row) {
   if ($row['id'] <= 8) {
?>
      <div class="col-lg-3 spham ">
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
         <form method="post" class="box" action="">
         <input type="number" min="1" max="<?php echo $row['sl']; ?>" name="product_quantity" value="1">
         <input type="hidden" name="sanpham_image" value="<?php echo $row['image1']; ?>">
         <input type="hidden" name="sanpham_name" value="<?php echo $row['name']; ?>">
         <input type="hidden" name="sanpham_price" value="<?php echo $row['price']; ?>">
         <input type="submit" value="Thêm vào giỏ" name="add_to_cart" class="btn">
         </form>
      </div>
<?php
   }
};
?>

</div>

</div>
</div>