<?php 
include "config.php";
session_start();

if(isset($_SESSION['admin'])){


    echo "<script> window.location.href = 'index.php' </script>";


}

if(isset($_POST['login'])){
	$email = $_POST['email'];
    $pass = $_POST['pass'];
    
    $query = "SELECT * FROM `admin` WHERE `adminEmail` = '$email' AND `adminPassword` = '$pass' ";
    $res = mysqli_query($conn,$query);

	if(mysqli_num_rows($res) == 1 ){

		$user = mysqli_fetch_assoc($res);
		
		$adminName = $user['adminName'];
		$adminImage = $user['adminImg'];
		$_SESSION['admin'] = $adminName;
		$_SESSION['adminImg'] = $adminImage;
	
		echo "<script> alert('Login Successfully !') </script>";
			echo "<script> window.location.href = 'index.php' </script>";

		
		}else{
			$error = "Please Enter Correct email and Password";
	
		}
		
		
	

}


?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>Login V1</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->
</head>
<body>
	
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<div class="login100-pic js-tilt" data-tilt>
					<img src="images/img-01.png" alt="IMG">
				</div>

				<form class="login100-form validate-form" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
					<span class="login100-form-title">
						Admin Login
					</span>

					<div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
						<input class="input100" value="<?php echo isset($_POST['email']) ? $_POST['email'] : ''; ?>" type="text" name="email" placeholder="Email">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-envelope" aria-hidden="true"></i>
						</span>
					</div>

					<div class="wrap-input100 validate-input" data-validate = "Password is required">
						<input class="input100" value="<?php echo isset($_POST['pass']) ? $_POST['pass'] : ''; ?>" type="password" name="pass" placeholder="Password">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-lock" aria-hidden="true"></i>
						</span>
					</div>
					<p class="text-danger" style="color: red;" ><?php echo @$error?></p>
					
					<div class="container-login100-form-btn">
						<button class="login100-form-btn" type="submit" name="login">
							Login
						</button>
					</div>

					<div class="text-center p-t-12">
		
					</div>
				</form>
			</div>
		</div>
	</div>
	
	

	
<!--===============================================================================================-->	
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/tilt/tilt.jquery.min.js"></script>
	<script >
		$('.js-tilt').tilt({
			scale: 1.1
		})
	</script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>

</body>
	</html>