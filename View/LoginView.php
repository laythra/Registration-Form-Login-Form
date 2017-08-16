<!DOCTYPE html>
<html>
<head>
	<title>Login form</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

</head>
<body>

<div class = "container">
	<h1 style = "padding-top: 70px; " class = "text-center">Loging-in page</h1>
	<form method = "post" action = "<?php echo $_SERVER['PHP_SELF'];?>">
		<p>
			<div class = "col-md-6">
				<div class = "form-group">
					<h2>Sign in</h2>
				</div>
			</div>
		</p>
		<br><br><br><br>
			<div><?php

		 if(isset($_POST['Login'])) {
			if(isset($errors)){// echo "Do we get here? ";
			if($errorsCount > 0){?>
               <p>You have <?php echo $errorsCount ?> Errors</p>
<?php			}

			  foreach($errors as $error){			
			if (count($error) != 0) {
				?>
				<div class = "form-group">
					<div class = "alert alert-danger" role = "alert">
					<strong>Error!</strong> <?php echo $error[0]; ?>
					</div>
				</div>

			<?php }
			}
		}
			} ?>
			</div>

			<p>
				<div class = "col-md-6">
					<div class = "form-group">
						<div class = "input-group">
							<span class = "input-group-addon"><span class = "glyphicon glyphicon-envelope"></span></span>
							<input type = "text" name = "emaill" class = "form-control" placeholder = "Email Address"> 
						</div>
					</div>
				</div>
			</p>
		<br><br>
			<p>
				<div class = "col-md-6">
					<div class = "form-group">
						<div class = "input-group">
							<span class = "input-group-addon"><span class = "glyphicon glyphicon-lock"></span></span>
							<input type = "password" name = "pword" class = "form-control" placeholder = "password">
						</div>
					</div>
				</div>
			</p>
			<div class = "form-group">
				<input type = "submit" name = "Login" class = "btn btn-block btn-primary" value = "Sign-Up">
			</div>
	</form>
</div>
</body>
</html>