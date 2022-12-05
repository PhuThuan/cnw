<?php


session_start();
include 'connect.php';
$user_id=0;
if(isset($_SESSION['user'])){
$user_id = $_SESSION['user'];
$grand_total = 0;

 //$cart_query = $conn->query("SELECT * FROM `cart` where user_id='$user_id'");


 $sql = 'SELECT * FROM cart WHERE user_id = :id';
 $cart_query = $conn->prepare($sql, [PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY]);
 $cart_query->execute(['id' => $user_id]);
 // $red = $sth->fetchAll();
 while ($row = $cart_query->fetch()) {
   $sub_total = ($row['price'] * $row['quantity']);
   $grand_total += $sub_total;
}
$tong=$grand_total;
//$grand_total = $grand_total-10;

if (isset($_POST['update_cart'])) {
   $update_quantity = $_POST['cart_quantity'];
   $update_id = $_POST['cart_id'];
   $conn->exec("UPDATE `cart` SET quantity = '$update_quantity' WHERE id = '$update_id'");
   
}



if (isset($_POST['thanhtoan']) && $_POST['diachi']!=''  && $_POST['sdt']!='') {
   $card_id=0;
   $sql = 'SELECT id FROM cart WHERE user_id = :id';
   $cart_query = $conn->prepare($sql, [PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY]);
   $cart_query->execute(['id' => $user_id]);
   while ($row = $cart_query->fetch()){
      $card_id=$row['id'];
   }
   $diachi=$_POST['diachi'];
   $sdt=$_POST['sdt'];


  //$conn->exec("INSERT INTO `bill`(user_id,card_id,`diachi`,SDT, prices) VALUES('$user_id',`$card_id`,`$diachi`,`$sdt` ,'$grand_total')");
   $bill=$conn->prepare("INSERT INTO `bill`(`user_id`,`diachi`,SDT, prices) VALUES(?,?,?,?)");
   $bill->execute([$user_id,$diachi,$sdt,$grand_total]);


   $sql2 = "SELECT Max(id) as ID FROM bill where user_id=$user_id";
   $result2 = $conn->query($sql2);
   while ($rows = $result2->fetchAll(PDO::FETCH_ASSOC)) {
      foreach ($rows as $item) {
         $idBill = $item['ID'];
      }
   }

   $rs = $conn->query("SELECT * from cart");
   while ($rows = $rs->fetchAll(PDO::FETCH_ASSOC)) {
      foreach ($rows as $item) {
         $name = $item['name'];
         $price = $item['price'];
         $quantity = $item['quantity'];
         $conn->exec("INSERT INTO `detailbill`(name, price, id_bill, quantity) VALUES('$name', '$price', '$idBill', '$quantity')");
      }
     
      $conn->exec("delete from cart where user_id = $user_id ");
      $grand_total =0;

      
      
   }
}
if (isset($_GET['remove'])) {
   $remove_id = $_GET['remove'];
   $conn->exec("DELETE FROM `cart`WHERE id = '$remove_id'");
   header('location:cart.php');
}

if (isset($_GET['delete_all'])) {
   $conn->exec("DELETE FROM `cart` ");
   header('location:cart.php');
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
<?php 
if($grand_total > 0) {
   ?>
         <div class="shopping-cart">

            <h1 class="heading">shopping cart</h1>
            <form action="" method="post">

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

                     foreach ($cart_query as $row) {

                     ?>
                        <tr>
                           <td><img src="img/sanpham/<?php echo $row['image']; ?>" height="100" alt=""></td>
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
                        <td>$<?php echo $tong; ?>/-</td>
                        <td><a href="cart.php?delete_all" onclick="return confirm('delete all from cart?');" class="delete-btn <?php echo ($grand_total > 1) ? '' : 'disabled'; ?>">delete all</a></td>
                     </tr>
                  </tbody>
               </table>
               <?php


               ?>
               <div class="cart-btn"><table>
                  <thead>
                  <th><label>Địa chỉ nhận hàng    <input name=diachi> </label><br></th>
                  <th><label>Số điện thoại của bạn<input name=sdt></label><br></th>
                  </thead>
                  </table>
                  <button name="thanhtoan" value="thanhtoan" class="
                  <?php
                  echo ($grand_total > 1) ? '' : 'd-none';
                  ?>
   ">Thanh toán</a>
               </div>
            </form>

         </div>

<?php
} else {
   echo "<h1>Không có sản phẩm trong giỏ hàng, click <a href='index.php'>vào đây</a> để về trang chủ</h1>";

}
?>



         

      </div>
   </div>
   <?php include_once"footer.php" ?>
</body>

</html>
<?php
}
else
header('location:index.php');
?>