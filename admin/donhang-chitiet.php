<?php
include '../connect.php';

session_start();

$user_id = 0;
if (isset($_SESSION['user'])) {
    $user_id = $_SESSION['user'];
}

if (isset($_SESSION['admin']) && $_SESSION['admin'] == 1) {
    if (isset($_GET["id"])) {
        $id = 0;
        $id = $_GET["id"];
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
        <a href="donhang.php"><button>Thoát </button></a>
        <br>
        <?php
        $cart_query = $conn->prepare('SELECT bill.diachi,bill.sdt,user_info.name FROM bill,user_info WHERE bill.id=? and bill.user_id=user_info.id');
        $cart_query->execute([$id]);
        while ($row = $cart_query->fetch()) {
           ?>TÊN KHÁCH HÀNG: <?php echo($row['name']);?><br>
           ĐỊA CHỈ:  <?php echo($row['diachi']);?><br>
          SỐ ĐIỆN THOẠI: <?php  echo($row['sdt']);?><br>
     
   

        <div class="admin-shopping-cart">
            <table>
                <thead>
                    <th>TÊN SẢN PHẨM</th>
                    <th>SỐ LƯỢNG</th>
                    <th>Giá</th>
                </thead>



                <?php
   }
                $cart_query = $conn->prepare('SELECT * FROM detailbill WHERE id_bill=?');
                $cart_query->execute([$id]);
                while ($row = $cart_query->fetch()) {
                   
                ?>
                <tr>
    <td>
                    <?php echo $row['name'];?>
    </td>
    <td>
                    <?php echo $row['quantity'];?>
    </td>
    <td>
                    <?php echo $row['price'];?>
    </td>
                </tr>




                <?php
                }
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