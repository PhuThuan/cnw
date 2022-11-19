<?php

use function PHPSTORM_META\type;

session_start();
$user_id = $_SESSION['user'];

include 'connect.php';
if (isset($_POST['add_to_cart'])) {

   $product_name = $_POST['product_name'];
   $product_price = $_POST['product_price'];
   $product_image = $_POST['product_image'];
   $product_quantity = $_POST['product_quantity'];

   $select_cart =  $conn->query(" SELECT * FROM `cart` WHERE name = '$product_name' AND user_id = '$user_id'");

   if ($select_cart > 0) {
      $message[] = 'product already added to cart!';
   } else {
      $conn->exec("INSERT INTO `cart`(user_id, name, price, image, quantity) VALUES('$user_id', '$product_name', '$product_price', '$product_image', '$product_quantity')");
      $message[] = 'product added to cart!';
   }
};

if (isset($_POST['update_cart'])) {
   $update_quantity = $_POST['cart_quantity'];
   $update_id = $_POST['cart_id'];
   $conn->exec("UPDATE `cart` SET quantity = '$update_quantity' WHERE id = '$update_id'");
   $message[] = 'cart quantity updated successfully!';
}

if (isset($_GET['remove'])) {
   $remove_id = $_GET['remove'];
   $conn->exec("DELETE FROM `cart`");
   header('location:index.php');
}

if (isset($_GET['delete_all'])) {
   $conn->exec("DELETE FROM `cart` ");
   header('location:index.php');
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>EASY</title>
   <link rel="stylesheet" href="css/index.css">
   <link rel="stylesheet" href="css/shopall.css">
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"></script>
   <script src="https://code.jquery.com/jquery-3.5.0.js"></script>
   <script type="text/javascript" src="http://code.jquery.com/jquery-latest.js"></script>
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet">
   <link href="https://getbootstrap.com/docs/5.2/assets/css/docs.css" rel="stylesheet">
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"></script>
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
   <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>


</head>

<body>

   <?php
   require_once "header.php";

   if (isset($message)) {
      foreach ($message as $message) {
         echo '<div class="message" onclick="this.remove();">' . $message . '</div>';
      }
   }
   ?>
   <div id="cart">
      <div class="container">



         <!-- <div class="products">

   <h1 class="heading">latest products</h1>

   <div class="box-container">

 
</div> -->
         <div class="shopping-cart">

            <h1 class="heading">shopping cart</h1>

            <table>
               <thead>
                  <th>image</th>
                  <th>name</th>
                  <th>price</th>
                  <th>quantity</th>
                  <th>total price</th>
                  <th>action</th>
               </thead>
               <tbody>
                  <?php
                  $cart_query = $conn->query("SELECT * FROM `cart` where user_id='$user_id'");
                  $grand_total = 0;
                  foreach ($cart_query as $row) {

                  ?>
                     <tr>
                        <td><img src="img/sanpham/<?php echo $row['image1']; ?>" height="100" alt=""></td>
                        <td><?php echo $row['name']; ?></td>
                        <td>$<?php echo $row['price']; ?>/-</td>
                        <td>
                           <form action="" method="post">
                              <input type="hidden" name="cart_id" value="<?php echo $row['id']; ?>">
                              <input type="number" min="1" name="cart_quantity" value="<?php echo $row['quantity']; ?>">
                              <input type="submit" name="update_cart" value="update" class="option-btn">
                           </form>
                        </td>
                        <td>$<?php echo $sub_total = ($row['price'] * $row['quantity']); ?>/-</td>
                        <td><a href="cart.php?remove=<?php echo $row['id']; ?>" class="delete-btn" onclick="return confirm('remove item from cart?');">remove</a></td>
                     </tr>
                  <?php
                     $grand_total += $sub_total;
                  }
                  ?>
                  <tr class="table-bottom">
                     <td colspan="4">grand total :</td>
                     <td>$<?php echo $grand_total; ?>/-</td>
                     <td><a href="cart.php?delete_all" onclick="return confirm('delete all from cart?');" class="delete-btn <?php echo ($grand_total > 1) ? '' : 'disabled'; ?>">delete all</a></td>
                  </tr>
               </tbody>
            </table>

            <div class="cart-btn">
               <a href="#" class="btn <?php echo ($grand_total > 1) ? '' : 'disabled'; ?>">proceed to checkout</a>
            </div>

         </div>

      </div>
   </div>
</body>

</html>