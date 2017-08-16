<!DOCTYPE html>
<html>
<head>

	<title>Registration Form</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>

<body>
<div class = "container">
	<h1 style = "padding-top: 70px; " class = "text-center">Registration page</h1>

	<form method = "post" action="<?php echo $_SERVER['PHP_SELF']?>">
		<div class = "col-md-12">
			<div class = "form-group">
				<h2>Sign up</h2>
			</div>
		</div>

		<div><?php

		 if(isset($_POST['Register'])) {
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
		<div class = "form-group">
			<hr />
		</div>
		<div class = "col-md-12">
			<div class = "form-group">
				<div class = "input-group">
					<span class = "input-group-addon"><span class = "glyphicon glyphicon-user"></span></span>
					<input type = "text" name = "username" class = "form-control" placeholder = "username" value="<?php echo isset($formData['username'])?$formData['username']:''?>">
				</div>
			</div>
		</div>



		<div class = "col-md-12">
			<div class = "form-group">
				<div class = "input-group">
					<span class = "input-group-addon"><span class = "glyphicon glyphicon-envelope"></span></span>
					<input type = "text" name = "email" class = "form-control" placeholder = "Email Address"  value="<?php echo isset($formData['email'])?$formData['email']:''?>">
				</div>
			</div>
		</div>

		<div class = "col-md-12">
			<div class = "form-group">
				<div class = "input-group">
					<span class = "input-group-addon"><span class = "glyphicon glyphicon-lock"></span></span>
					<input type = "password" name = "password" class = "form-control" placeholder = "password">
				</div>
			</div>
		</div>

		<div class = "col-md-12">
			<div class = "form-group">
				<div class = "input-group">
					<span class = "input-group-addon"><span class = "glyphicon glyphicon-lock"></span></span>
					<input type = "password" name = "confPassword" class = "form-control" placeholder = "Confirm password">
				</div>
			</div>
		</div>

		<div class = "form-group">
			<input type = "submit" name = "Register" class = "btn btn-block btn-primary" value = "Sign-Up">
		</div>


	</form>
</div>

</body>
</html>