<?php
include '../connect.php';

session_start();
$user_id = 0;
if (isset($_SESSION['user'])) {
    $user_id = $_SESSION['user'];
}
if (isset($_SESSION['admin']) && $_SESSION['admin'] == 1) {





    if (isset($_GET['remove'])) {
        $remove_id = $_GET['remove'];
        $conn->exec("DELETE FROM `user_info`WHERE id = '$remove_id'");
        header('location:taikhoan.php');
    }

    if (isset($_POST['update_tk'])) {
        $update_quantity = md5($_POST['password_new']);
        $update_id = $_POST['update_id'];
        $a = $conn->prepare("UPDATE `user_info` SET password = ? WHERE id = ?");
        $a->execute([$update_quantity, $update_id]);
        $message[] = 'cart quantity updated successfully!';
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

            <h1 class="heading">TÀI KHOẢN</h1>
            <a href="insert-taikhoan.php"> <button class="themsp">THÊM TÀI KHOẢN</button></a>

            <form action="" method="post">

                <table class="text-center">
                    <thead>
                        <th>ID</th>
                        <th>TÊN</th>
                        <th>USER</th>
                        <th>ADMIN</th>
                        <!-- <th>PASSWORD</th> -->
                        <th>ĐỔI MẬT KHẨU</th>
                        <th>XÓA</th>
                    </thead>
                    <?php
                    $sql = 'SELECT * FROM user_info ';
                    $cart_query = $conn->prepare($sql, [PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY]);
                    $cart_query->execute();

                    while ($row = $cart_query->fetch()) {
                    ?> <tr>
                            <td><?php echo $row['id']; ?></td>
                            <td><?php echo $row['name']; ?></td>
                            <td><?php echo $row['email']; ?></td>
                            <td><?php echo $row['admin']; ?></td>
                            <!-- <td>// echo $row['password']; ?></td> -->
                            <td><a class="btn btn-primary" data-bs-toggle="collapse" href="#collapseExample<?php echo $row['id']; ?>" role="button" aria-expanded="false" aria-controls="collapseExample">Đổi mật khẩu</a></td>
                            <td><a href="taikhoan.php?remove=<?php echo $row['id']; ?>" class="delete-btn" onclick="return confirm('remove item from user?');">remove</a></td>
                            <td>
                                <div class="collapse row g-3" id="collapseExample<?php echo $row['id'];
                                                                                    $message[] = 'taikhoan quantity updated successfully!'; ?>">

                                    <form method="post" action="">
                                        <input type="hidden" name="update_id" value="<?php echo $row['id']; ?>">
                                        <input type="password" name="password_new">
                                        <input type="submit" name="update_tk" value="update" class="option-btn">

                                    </form>
                                </div>
        </div>
        </td>
        </tr>
    <?php







                    }



    ?>

    </tbody>
    </table>





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