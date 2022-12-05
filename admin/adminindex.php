<?php
include '../connect.php';

session_start();
$user_id = 0;
if (isset($_SESSION['user'])) {
   $user_id = $_SESSION['user'];
}
if (isset($_SESSION['admin']) && $_SESSION['admin'] == 1) {



   if (isset($_GET['update'])) {
      //   $update_id = $_GET['update'];
      //  $conn->exec("DELETE FROM `cart`WHERE id = '$update_id'");

      $sql = 'SELECT * FROM sanpham WHERE id = :id';
      $sth = $conn->prepare($sql, [PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY]);
      $sth->execute(['id' => $user_id]);
   }


   if (isset($_GET['remove'])) {
      $remove_id = $_GET['remove'];
      $conn->exec("DELETE FROM `sanpham`WHERE id = '$remove_id'");
      header('location:adminindex.php');
   }




?>


   <!DOCTYPE html>
   <html lang="en">

   <head>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>EASY</title>
      <link rel="stylesheet" href="../css/index.css">
      <link rel="stylesheet" href="css/admin.css">
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"></script>
   </head>

   <body>
<?php require_once "adminheader.php"; ?>

      <div class="admin-shopping-cart">

         <h1 class="heading">SẢN PHẨM</h1>
         <a href="insert.php"> <button class="themsp">THÊM SẢN PHẨM</button></a>

         <form action="" method="post">

            <table class="table table-striped">
               <thead>
                  <th>ID</th>
                  <th>LOẠI</th>
                  <th>NỔI BẬT</th>
                  <th>TÊN</th>
                  <th>NỘI DUNG</th>
                  <th>SỐ LƯỢNG</th>
                  <th>DISCOUNT</th>
                  <th>HÌNH 1</th>
                  <th>HÌNH 2</th>
               </thead>
 <?php
               $sql = 'SELECT * FROM sanpham ';
               $cart_query = $conn->prepare($sql, [PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY]);
               $cart_query->execute();

               while ($row = $cart_query->fetch()) {
               ?> <tr>
                     <td><?php echo $row['id']; ?></td>
                     <td><?php echo $row['loai']; ?></td>
                     <td><?php echo $row['noibat']; ?></td>
                     <td><?php echo $row['name']; ?></td>
                     <td><?php echo $row['noidung']; ?></td>
                     <td><?php echo $row['sl']; ?></td>
                     <td><?php echo $row['discount']; ?></td>
                     <td><img src="../img/sanpham/<?php echo $row['image1']; ?>" height="100" alt=""></td>
                     <td><img src="../img/sanpham/<?php echo $row['image2']; ?>" height="100" alt=""></td>
                     <td><a href="update.php?id=<?php echo $row['id']; ?>" 
                                                class="delete-btn">Chỉnh sửa</a></td>
                     <td><a href="adminindex.php?remove=<?php echo $row['id']; ?>" class="delete-btn" onclick="return confirm('remove item from cart?');">remove</a></td>
                  </tr>
 <?php







               }



               ?>

               </tbody>
            </table>





            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
            </script>
            <script src="../js/index.js">

            </script>
   </body>

   </html>
<?php } else {
   header('location:../login.php');
}
?>