<?php
include '../connect.php';

session_start();

$id=0;


if (isset($_SESSION['idsp'])) {
    $id = $_SESSION['idsp'];
   
}
$user_id = 0;
if (isset($_SESSION['user'])) {
    $user_id = $_SESSION['user'];
}

if (isset($_SESSION['admin']) && $_SESSION['admin'] == 1) {




    if (isset($_POST['submit'])) {

        $cart_query = $conn->prepare("UPDATE `sanpham`
             set `loai`= ? and `noibat`= ? and `name`= ?and `sl`= ? and `price`= ? and `discount`= ? WHERE `id`=?");
        $cart_query->execute([$_POST['id2'], $_POST['id3'], $_POST['id4'], $_POST['id5'], $_POST['id6'], $_POST['id7'], $id]);
  
        unset($_SESSION['idsp']);

?>
        <script>
            window.location = 'adminindex.php';
        </script>
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
            <?php

        print_r($id);
            $cart_query = $conn->prepare('SELECT * FROM sanpham where id=?');
            $cart_query->execute([$id]);
            while ($row = $cart_query->fetch()) {
            ?>
                <form action="update.php" method="post">


                    <p><label><?php echo $row['loai'] ?> <input type="text" value="<?php echo $row['loai'] ?>" name="id2"></label></p>
                    <p><label><?php echo $row['noibat']?><input type="text" value="<?php echo $row['noibat'] ?>" name="id3"></label><p>
                    <p><label><?php echo $row['name'] ?> <input type="text" value="<?php echo $row['name'] ?>" name="id4"></label></p>
                    <p><label><?php echo $row['sl'] ?><input type="text" value="<?php echo $row['sl'] ?>" name="id5"></label></p>
                    <p><label><?php echo $row['price'] ?> <input type="text" value="<?php echo $row['price'] ?>" name="id6"></label></p>
                    <p><label><?php echo $row['discount'] ?> <input type="text" value="<?php echo $row['discount'] ?>" name="id7"></label></p>
                    <p><label><?php echo $row['image1'] ?> <input type="file" value="<?php echo $row['image1'] ?>" name="id8"></label></p>
                    <p><label><?php echo $row['image2'] ?> <input type="file" value="<?php echo $row['image2'] ?>" name="id9"></label></p>
                    <p><input type="submit" name="submit"></p>

                <?php
            }


            //  while ($row = $cart_query->fetch()) {
                ?>
                <?php
                //     }
                ?>



                </table>
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