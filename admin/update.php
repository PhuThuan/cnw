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

    if (isset($_POST['submit']) && ($_POST['submit'])) {
  
        $hinhanh1 = basename($_FILES['id9']['name']);

        $hinhanh2 = basename($_FILES['id10']['name']);
        $noidung=$_POST['id5'];
        $noidung=str_replace("<br>","",$noidung );
        $noidung=str_replace(".",".<br>",$noidung );

        if($hinhanh1!="" && $hinhanh2!=""){
        $cart_query = $conn->prepare("UPDATE `sanpham`
             SET `loai`= ? , `noibat`= ? , `name`= ? ,`noidung`=?, `sl`= ? , `price`= ? , `discount`= ?,`image1`= ?,`image2`= ? where `id`=?");


        $cart_query->execute([$_POST['id2'], $_POST['id3'], $_POST['id4'],$noidung , $_POST['id6'], $_POST['id7'],$_POST['id8']. $hinhanh1, $hinhanh2,$id]);}
        elseif($hinhanh1=="" && $hinhanh2==""){
            $cart_query = $conn->prepare("UPDATE `sanpham`
            SET `loai`= ? , `noibat`= ? , `name`= ? ,`noidung`=?, `sl`= ? , `price`= ? , `discount`= ? where `id`=?");


       $cart_query->execute([$_POST['id2'], $_POST['id3'], $_POST['id4'],  $noidung, $_POST['id6'], $_POST['id7'],$_POST['id8'], $id]);
    }
        
        elseif( $hinhanh1!=""){
            $cart_query = $conn->prepare("UPDATE `sanpham`
             SET `loai`= ? , `noibat`= ? , `name`= ? ,`noidung`=?, `sl`= ? , `price`= ? , `discount`= ?,`image1`= ? where `id`=?");


        $cart_query->execute([$_POST['id2'], $_POST['id3'], $_POST['id4'],  $noidung, $_POST['id6'], $_POST['id7'],$_POST['id8'], $hinhanh1, $id]);
        }
        else{
            $cart_query = $conn->prepare("UPDATE `sanpham`
            SET `loai`= ? , `noibat`= ? , `name`= ? ,`noidung`=?, `sl`= ? , `price`= ? , `discount`= ?,`image2`= ? where `id`=?");


       $cart_query->execute([$_POST['id2'], $_POST['id3'], $_POST['id4'],  $noidung, $_POST['id6'], $_POST['id7'],$_POST['id8'], $hinhanh2, $id]);
        }
    


    
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

        <a href="adminindex.php"><button>Tho??t </button></a>
        <div class="admin-shopping-cart">
            <?php
            
            $cart_query = $conn->prepare('SELECT * FROM sanpham WHERE id=?');
            $cart_query->execute([$id]);
            while ($row = $cart_query->fetch()) {
            ?>
                 <form action="update.php?id=<?php echo $row['id']; ?>" method="post" enctype="multipart/form-data">
                 <table>
                 <tr>
                    <th>LO???I ??O</th>
                    <th> <p><label><?php echo $row['loai']?></label></p></th>
                    <th><input type="text" name="id2" value="<?php echo $row['loai']?>"></label></p></th>
                
                </tr>
                <tr>
                    <th>N???I B???T</th>
                    <th> <p><label><?php echo $row['noibat']?></label></p></th>
                    <th><input type="text" name="id3" value="<?php echo $row['noibat']?>"></label></p></th>
                
                </tr>
                <tr>
                    <th>T??N</th>
                    <th> <p><label><?php echo $row['name']?></label></p></th>
                    <th><input type="text" name="id4" value="<?php echo $row['name']?>"></label></p></th>
                
                </tr> 
                <tr>
                    <th>N???I DUNG</th>
                    <th> <p><label><?php echo $row['noidung']?></label></p></th>
                    <th><input type="text" name="id5" value='<?php echo $row['noidung']?>'style="height:100px ; width: 500px;"></label></p></th>
                
                </tr>
                <tr>
                    <th>S??? L?????NG</th>
                    <th> <p><label><?php echo $row['sl']?></label></p></th>
                    <th><input type="text" name="id6" value="<?php echo $row['sl']?>"></label></p></th>
                
                </tr>  
                <tr>
                    <th>GI?? TI???N</th>
                    <th> <p><label><?php echo $row['price']?></label></p></th>
                    <th><input type="text" name="id7" value="<?php echo $row['price']?>"></label></p></th>
                
                </tr>
                <tr>
                    <th>GI???M GI??</th>
                    <th> <p><label><?php echo $row['discount']?></label></p></th>
                    <th><input type="text" name="id8" value="<?php echo $row['discount']?>"></label></p></th>
                
                </tr>   
                <tr>
                    <th>H??NH ???NH 1</th>
                    <th> <p><label><img src="../img/sanpham/<?php echo $row['image1']?>" height="100"></label></p></th>
                    <th><input type="file" name="id9" id="id9" ></p></th>
                
                </tr>  
                <tr>
                    <th>H??NH ???NH 2</th>
                    <th> <p><label><img src="../img/sanpham/<?php echo $row['image2']?>" height="100"></label></p></th>
                    <th><input type="file" name="id10" id="id10" ></p></th>
                
                </tr> 
                <th><p><input type="submit" name="submit" value="submit"></p></th></tr>
             
                    </form>
                    </table>
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