<?php
include 'connect.php';
?>

<header>

    <div class="container text-center ">
        <div class="row align-items-start " id="menu">
            <a class=" col-lg-1 navbar-brand" href="index.php">
                <img src="../img/logo.jpg" alt="" width="30" height="24">
            </a>
            <a href="shopall.php" class="col-lg-1">SHOP ALL</a>
            <a href="tops.php" class="col-lg-1">TOPS</a>
            <a href="bottoms.php" class="col-lg-1">BOTTOMS</a>
            <a href="outerwear.php" class="col-lg-1">OUTERWEAR</a>
            <div class="col-lg-3">
            </div>

            <?php




         $user_id = 0;
         if (isset($_SESSION['user'])) {
            $user_id = $_SESSION['user'];
            //    $sql="SELECT * FROM user_info WHERE id='$user_id'";

            //  $sth = $conn->query($sql);
            //    // $sth->execute([$user_id]);


            $sql = 'SELECT * FROM user_info WHERE id = :id';
            $sth = $conn->prepare($sql, [PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY]);
            $sth->execute(['id' => $user_id]);
            // $red = $sth->fetchAll();
            while ($row = $sth->fetch()) {


         ?>
         
            <div class="col-lg-2 ">
                <a href="taikhoan.php" class="col-lg-1"> <?php echo $row['name'];  ?></a>
                <a href="#" class="col-lg-1"><a href="logout.php ">LOGOUT</a>

            </div>
            <?php
               }
            } else {

                  ?>

            <div class="col-lg-2 ">
                <a href="login.php" class="col-lg-1">
                    ĐĂNG NHẬP/</a>
                <a href="registration.php" class="col-lg-1">ĐĂNG KÝ</a>
                </div>
                <?php
               }

                  ?>

           
            <div class="col-lg-1 ">
                <a href="content.php" class="col-lg-1">TÌM KIẾM</a>
            </div>
            <div class="col-lg-1 ">
                <a href="cart.php" class="col-lg-1">GIỎ HÀNG</a>
            </div>
        </div>
    </div>
</header>