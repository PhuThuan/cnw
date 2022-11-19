<?php
session_start();
$user_id = $_SESSION['user'];

include 'connect.php';
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


<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>EASY</title>
   <link href="https://fonts.googleapis.com/css2?family=Rubik+Glitch&display=swap" rel="stylesheet">
   <link rel="stylesheet" href="css/index.css">
   <link rel="stylesheet" href="css/style.css">
   <link rel="preconnect" href="https://fonts.googleapis.com">
   <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"></script>
   <script src="https://code.jquery.com/jquery-3.5.0.js"></script>
   <script type="text/javascript" src="http://code.jquery.com/jquery-latest.js"></script>
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
</head>

<body>
<?php require_once "header.php";
?>
<!-- <header>
      <div class="container text-center ">
         <div class="row align-items-start "id="menu">
            <a class=" col-lg-1 navbar-brand" href="index.html">
               <img src="../img/logo.png" alt="" width="30" height="24">
            </a>
            <a href="shopall.html" class="col-lg-1">shop all</a>
            <div class="col-lg-1">tops
            </div>
            <div class="col-lg-1">bottoms
            </div>
            <div class="col-lg-1">outerwear
            </div>
            <div class="col-lg-3">
            </div>
            <div class="col-lg-2 ">
               dang nhap/
               dang ky
            </div>
            <div class="col-lg-1 ">
               tim kiem
            </div>
            <div class="col-lg-1 ">
               gio hang
            </div>
         </div>
      </div>
   </header> -->


   <!-- banner -->
   <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
      <div class="carousel-inner">
         <div class="carousel-item active">
            <img src="img/1/slideshow_1.webp" id="banner" class="d-block w-100" alt="...">
         </div>
         <div class="carousel-item">
            <img src="img/1/slideshow_2.webp" id="banner" class="d-block w-100" alt="...">
         </div>
         <div class="carousel-item">
            <img src="img/1/slideshow_3.webp" id="banner" class="d-block w-100" alt="...">
         </div>
      </div>
      <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
         <span class="carousel-control-prev-icon" aria-hidden="true"></span>
         <span class="visually-hidden">Previous</span>
      </button>
      <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
         <span class="carousel-control-next-icon" aria-hidden="true"></span>
         <span class="visually-hidden">Next</span>
      </button>
   </div>
   <!-- banner -->
   <div class="container text-center sanpham">
      <div class="row align-items-start">
         <div class="col-lg-4 ">
            <img src="img/2/block_home_category1_new.webp" class="d-block w-100 mx-auto" alt="...">
         </div>
         <div class="col-lg-4 ">
            <img src="img/2/block_home_category2_new.webp" class="d-block w-100 mx-auto" alt="...">
         </div>
         <div class="col-lg-4 ">
            <img src="img/2/block_home_category3_new.webp" class="d-block w-100 mx-auto" alt="...">
         </div>
      </div>
   </div>
   <img src="img/show_block_home_category_image_3_new.webp" class=" d-block w-100 mx-auto" alt="...">


   <div class="marquee">
      <p > STREETWEAR BRAND  </p> 
   </div>


   <!-- san pham -->
   <div class="container text-center">
      <div class="row">

         <!-- <div class="products">

      <h1 class="heading">latest products</h1>

      <div class="box-container"> -->
         
          
           <?php include_once'product.php'?>
           

         </div>

      </div>
   </div>

   <div class="marquee">
      <p > STREETWEAR BRAND  </p> 
   </div>
   <?php require_once "footer.php";?>

  
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
   </script>
<script src="js/index.js" >

</script>
</body>

</html>