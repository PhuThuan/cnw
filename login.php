<?php session_start(); ?>
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
<?php include_once"header.php"?>
			<?php if (isset($_SESSION['message'])) : ?>
				<div class="alert alert-<?php echo $_SESSION['message']['alert'] ?> msg"><?php echo $_SESSION['message']['text'] ?></div>
				<script>
					(function() {
						// removing the message 3 seconds after the page load
						setTimeout(function() {
							document.querySelector('.msg').remove();
						}, 3000)
					})();
				</script>
			<?php
			endif;
			// clearing the message
			unset($_SESSION['message']);
			?>
			<div class="col-md-12 text-center registration mx-auto" style="width: 50%;">
				<div class="col-md-12">
					<form action="login_query.php" method="POST">
						<h4 class="text-success">ĐĂNG NHẬP</h4>
						<hr style="border-top:1px groovy #000;">
						<div class="form-group">
							<label>Username</label>
							<input type="text" class="form-control" name="username" />
						</div>
						<div class="form-group">
							<label>Password</label>
							<input type="password" class="form-control" name="password" />
						</div>
						<br />
						<div class="form-group">
							<button class="btn btn-primary form-control" name="login">Login</button>
						</div>
						<a href="registration.php">Registration</a>
					</form>
				</div>
			</div>
				<?php include_once"footer.php"?>
</body>

</html>