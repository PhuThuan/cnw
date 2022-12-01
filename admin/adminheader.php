<header>

    <div class="container text-center ">
        <div class="row align-items-start " id="menu">
            <a class=" col-lg-1 navbar-brand" href="adminindex.php">
                <img src="../img/logo.jpg" alt="" width="30" height="24">
            </a>
            
                
       
            <a href="donhang.php" class="col-lg-2">ĐƠN HÀNG</a>
            <a href="taikhoan.php" class="col-lg-2">TÀI KHOẢN</a>

            <?php




        
            $admin_id = $_SESSION['admin'];
    

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
            


                  ?>
 <div class="col-lg-1 ">
 <a href="#" class="col-lg-1"><a href="../logout.php ">logout</a>
            </div>
            
            
           
        </div>
    </div>
</header>