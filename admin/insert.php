<?php
include '../connect.php';

session_start();
$user_id = 0;
if (isset($_SESSION['user'])) {
    $user_id = $_SESSION['user'];
}
if (isset($_SESSION['admin']) && $_SESSION['admin'] == 1) {



 
    if(isset($_POST['submit'])){
         
             $cart_query = $conn->prepare("INSERT INTO `sanpham` (`id`, `loai`, `noibat`, `name`, `sl`, `price`, `discount`, `image1`, `image2`) values(?,?,?,?,?,?,?,?,?)");
             $cart_query->execute([$_POST['id1'],$_POST['id2'],$_POST['id3'],$_POST['id4'],$_POST['id5'],$_POST['id6'],$_POST['id7'],$_POST['id8'],$_POST['id9']]);
             
           

?><script>window.location = 'insert.php'</script>
<?php

}



?>


    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>EASY</title>
        <link href="https://fonts.googleapis.com/css2?family=Rubik+Glitch&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="../css/index.css">
        <link rel="stylesheet" href="css/admin.css">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"></script>
        <script src="https://code.jquery.com/jquery-3.5.0.js"></script>
        <script type="text/javascript" src="http://code.jquery.com/jquery-latest.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    </head>

    <body>
       
        <a href="adminindex.php"><button>Thoát </button></a>
        <div class="admin-shopping-cart">    
<form action="insert.php" method="post">

               <p><label> <input type="text" name="id1"></label></p>
              <p><label> <input type="text" name="id2"></label></p>
            <p><label> <input type="text" name="id3"></label></p>
                       <p><label> <input type="text" name="id4"></label></p>
              <p><label> <input type="text" name="id5"></label></p>
              <p><label> <input type="text" name="id6"></label></p>
              <p><label> <input type="text" name="id7"></label></p>
              <p><label> <input type="file" name="id8"></label></p>
              <p><label> <input type="file" name="id9"></label></p>
               <p><input type="submit" name="submit" ></p>
              <?php 
              
  
        
       //  while ($row = $cart_query->fetch()) {
         ?>   
         <?php
    //     }
?>

         
        </div>
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