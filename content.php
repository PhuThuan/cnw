 <?php require_once "connect.php"; ?>
 <?php
    session_start();
    $user_id = 0;
    if (isset($_SESSION['user'])) {
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
        }
    } elseif (!isset($_SESSION['user']) && isset($_POST['add_to_cart'])) {
    ?>
     <script>
         alert("Bạn cần phải đăng nhập trước khi thêm vào giỏ hàng")
     </script>

 <?php
    }

    ?>
 <html>

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
     <?php include_once 'header.php'; ?>
     <div class="mx-auto">
         <div id="content-form">
             <form action="" method="POSt" id="search">
                 <input type="text" name="txtsearch" />
                 <input type="submit" name="search" value="Search" />
             </form>
         </div>

     </div>
     <div class="row">
         <div class="col-lg-12 ">
             <?php

                if (isset($_POST["search"])) {
                    $s = $_POST["txtsearch"];
                    if ($s == "") {
                        echo "vui long nhap vao";
                    } else {
                        $data = $conn->query("SELECT * FROM sanpham WHERE name LIKE'%$s%'");
                        $d = $data->fetchAll();

                        foreach ($d as $row) {
                ?>

                         <?php
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
                            } else if ($row['price'] > 800000 && $row['price'] <= 900000) {
                                $gia = "800-900";
                            } else {
                                $gia = 0;
                            }
                            $dis;
                            $noibat = "noibat";

                            ?>
                         <div class="col-lg-3 spham produkt_gruppe_div" <?php if ($row['discount'] != 0) {
                                                                            $dis = 'data-brand_name2="discount"';
                                                                            echo $dis;
                                                                        } ?> data-money="<?php echo $gia; ?>" data-brand_name="<?php echo $row['loai']; ?>" data-brand_name1="<?php if ($row['noibat'] == 1) echo $noibat; ?>">

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
                        } ?>
         </div>
     </div>
     <?php
                    }
                } ?><?php include_once 'footer.php'; ?>
 </body>

 </html>