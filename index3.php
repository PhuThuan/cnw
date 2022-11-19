
<?php 
    $sql="select id, name from sanpham";
    $data = $conn->query($sql);
?>
<?php
    foreach($data as $row){
?>
    <p><?php echo $row['id']?> </p>
<?php
    }
?>
<html >
<link >
    <body>
    <a href="index1.php" class="col-lg-1">shop all</a>
            <div class="col-lg-1">tops
    </body>
</html>