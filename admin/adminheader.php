<header>

    <div class="container text-center ">
        <div class="row align-items-start " id="menu">
            <a class=" col-lg-1 navbar-brand" href="index.php">
                <img src="../img/logo.jpg" alt="" width="30" height="24">
            </a>
            
                
       
            <a href="sanpham.php" class="col-lg-1">SẢN PHẨM</a>
            <a href="donhang.php" class="col-lg-2">ĐƠN HÀNG</a>
       

            <?php




         $user_id = 0;
         if (isset($_SESSION['user'])) {
            $admin_id = $_SESSION['admin'];
            //    $sql="SELECT * FROM user_info WHERE id='$user_id'";

            //  $sth = $conn->query($sql);
            //    // $sth->execute([$user_id]);


            $sql = 'SELECT * FROM user_info WHERE admin = :id';
            $sth = $conn->prepare($sql, [PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY]);
            $sth->execute(['id' => $admin_id]);
            // $red = $sth->fetchAll();
            while ($row = $sth->fetch()) {


         ?>
         
            <div class="col-lg-2 ">
                <a href="#" class="col-lg-1"> <?php echo $row['name'];  ?></a>
                

            </div>
            <?php
               }
            }


                  ?>
 <div class="col-lg-1 ">
 <a href="#" class="col-lg-1"><a href="../logout.php ">logout</a>
            </div>
            
            <div class="col-lg-1 ">
                <a href="../content.php" class="col-lg-1">TÌM KIẾM</a>
            </div>
           
        </div>
    </div>
</header>