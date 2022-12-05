<?php
	session_start();
	require_once 'connect.php';
 ?>
 <?php
	if(ISSET($_POST['register'])){
		if($_POST['firstname'] != "" && $_POST['username'] != "" && $_POST['password'] != "" && $_POST['password'] == $_POST['repassword'] ){
			try{
				$firstname = $_POST['firstname'];
				$username = $_POST['username'];
				// md5 encrypted
				$password = md5($_POST['password']);
			//	$password = $_POST['password'];
				$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				$sql = "INSERT INTO `user_info` VALUES ('', '$firstname', '$username', '$password','','','')";
				$conn->exec($sql);
			}catch(PDOException $e){
				echo $e->getMessage();
			}
			$_SESSION['message']=array("text"=>"","alert"=>"info");
			$conn = null;
			header('location:login.php');
		}else{
			
			echo "
				<script>alert('VUI LÒNG ĐIỀN THÔNG TIN THEO ĐÚNG YÊU CẦU')</script>
				<script>window.location = 'registration.php'</script>
			";
		}
	}
?>