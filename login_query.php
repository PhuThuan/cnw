<?php
	session_start();
	
	require_once 'connect.php';
	
	if(ISSET($_POST['login'])){
		if($_POST['username'] != "" || $_POST['password'] != ""){
			$username = $_POST['username'];
			$password =md5($_POST['password']) ;
		//	$password =$_POST['password'];
			$sql = "SELECT * FROM `user_info` WHERE `email`=? AND `password`=? ";
			$query = $conn->prepare($sql);
			$query->execute(array($username,$password));
			$row = $query->rowCount();
			$fetch = $query->fetch();

			if($row > 0 && $fetch['admin']==1 ){
				$_SESSION['admin'] = $fetch['admin'];
				printf($_SESSION['admin']);
				header("location:admin/adminindex.php");
			}
			else if($row > 0) {
				$_SESSION['user'] = $fetch['id'];
				printf($_SESSION['user']);
				header("location:index.php");
			}
			 else
			{
				echo "
				<script>alert('Invalid username or password')</script>
				<script>window.location = 'login.php'</script>
				";
			}
		}else{
			echo "
				<script>alert('Please complete the required field!')</script>
				<script>window.location = 'index.php'</script>
			";
		}
	}
?>