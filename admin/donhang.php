<?php
include '../connect.php';

session_start();
$user_id = 0;
if (isset($_SESSION['user'])) {
    $user_id = $_SESSION['user'];
}
if (isset($_SESSION['admin']) && $_SESSION['admin'] == 1) {
    if (isset($_GET['capnhat'])) {
       
        $id=$_GET['capnhat'];
        $a = $conn->prepare("UPDATE `bill` SET trangthai = 1 WHERE id = ?");
        $a->execute([$id]);
       
        ?><script>
         window.location = 'donhang.php';
    </script><?php
    }
    if (isset($_GET['delete'])) {
       
        $id=$_GET['delete'];
        $a = $conn->prepare("DELETE from `detailbill` WHERE id_bill = ?");
        $a->execute([$id]);
        $a = $conn->prepare("DELETE from `bill` WHERE id = ?");
        $a->execute([$id]);
       
        ?><script>
         window.location = 'donhang.php';
    </script><?php
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

        <?php require_once "adminheader.php"; ?>
        <div class="admin-shopping-cart">
        <table>
               <thead>
                  <th>ID</th>
                  <th>TÊN</th>
                  <th>ĐỊA CHỈ</th>
                  <th>SDT</th>
                  <th>TRẠNG THÁI</th>
                  <th>TỔNG TIỀN</th>
                  <th>CHI TIẾT</th>
                  <th>CẬP NHẬT</th>
                  <th>XÓA</th>
               </thead>
               
        <?php
        $sql = 'SELECT bill.id,bill.prices,bill.diachi,bill.sdt,bill.trangthai,user_info.name FROM `bill`,`user_info` where bill.user_id=user_info.id ';
        $cart_query = $conn->prepare($sql, [PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY]);
        $cart_query->execute([]);
        while ($row = $cart_query->fetch()) {
        ?>

<tr>
                     <td><?php echo $row['id']; ?></td>
                     <td><?php echo $row['name']; ?></td>
                     <td><?php echo $row['diachi']; ?></td>
                     <td><?php echo $row['sdt']; ?></td>
                     <td><?php if($row['trangthai']==0) {
                        echo("Chưa xử lý");
                     }
                     else{
                        echo("đã xử lý");
                     } 
                     ?></td>
                     <td><?php echo $row['prices']; ?></td>
                     <td><a href="donhang-chitiet.php?id=<?php echo $row['id']; ?>" class="delete-btn">Chi tiết</a></td>
                     <td><a href="donhang.php?capnhat=<?php echo $row['id']; ?>" name="capnhat"class="delete-btn" >Cập nhật trạng thái</a></td>
                     <td><a href="donhang.php?delete=<?php echo $row['id']; ?>" class="delete-btn" onclick="return confirm('remove item from cart?');">Xóa</a></td>
</tr>



        <?php }
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