<?php
include 'connect.php';
session_start();
if (isset($_SESSION['user'])) {
    $user_id = $_SESSION['user'];}
?>
<!DOCTYPE html>
<html lang="en">

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

    <?php include_once 'header.php';
    ?>
   <?php
                    $sql = 'SELECT * FROM user_info where id=?';
                    $cart_query = $conn->prepare($sql, [PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY]);
                    $cart_query->execute([ $user_id]);

                    while ($row = $cart_query->fetch()) {
                    ?><div class="taikhoan">
                    <table >
                    <tr><td><label for="name">NAME</label></td><td><input id='name' value=' <?php echo $row['name']; ?>'></td>  </tr>
                        <tr><td><label for="name">EMAIL CỦA BẠN</label></td><td><input value=' <?php echo $row['email']; ?>'></td>  </tr>
                        <tr><td><label for="name">MẬT KHẨU</label></td><td><input type='password' value=' <?php echo $row['password']; ?>'></td>  </tr>
                        <tr><td><label for="name">ĐỊA CHỈ </label></td><td><input value=' <?php echo $row['address']; ?>'></td>  </tr>
                        <tr><td><label for="name">SỐ ĐIỆN THOẠI</label></td><td><input value=' <?php echo $row['SDT']; ?>'></td>  </tr>
                    <table>  </div>
                       <?php
                    }
                    ?>

        <?php include_once 'footer.php'; ?>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
        <script src="js/index.js">
        </script>
        <script src="js/shopall.js"></script>

</body>

</html>