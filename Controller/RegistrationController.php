<?php
	class RegistrationController {
		public $username;
		public $email;
		public $password;
		private $confirmPassword;

		public function __construct() {

		}

		public function registrationPage(){
			//TODO: implement
			return [];
		}

		public function processForm(){
			$this->fillFormData();
			$errors = $this->validateData();
			$errorsCount = $this->checkErrorsLength($errors);

			if($errorsCount == 0){
				//insert statement
				// $sql = "INSERT INTO users($this->username, $this->email, $this->password)";
				$this->addUserToDB();
				header('Location: http://localhost/Task/index.html');
				exit();
			}

			return [
				'errors' => $errors,
				'errorsCount' => $errorsCount,
				'formData'    => $_POST,
			];
		}
      
        protected function fillFormData(){
        	if (isset($_POST['username'])) {
				$this->username = $_POST['username'];
			}
			if (isset($_POST['email'])) {
				$this->email = $_POST['email'];
			}
			if (isset($_POST['password'])) {
				$this->password = $_POST['password'];
			}
			if (isset($_POST['confPassword'])) {
				$this->confirmPassword = $_POST['confPassword'];
			}
        }

        protected function validateData(){
        	$errors = [];

        	if(isset($_POST['Register'])) {
				$errors['email'] = $this->checkEmail();
				$errors['name'] = $this->checkName();
				$errors['password'] = $this->checkPassword();
				$errors['confPassword'] = $this->checkConfPass();
			}

			return $errors;
        }

        protected function checkErrorsLength($errors){
        	$count=0;
        	foreach($errors as $error){
        		$count += count($error);
        	}

        	return $count;
        }

        protected function addUserToDB(){
        		 global $conn;
        		 $this->password = password_hash($this->password, PASSWORD_BCRYPT);
				 $sql = "INSERT INTO users(username, email, password) values('$this->username', '$this->email', '$this->password')";
				 mysqli_query($conn, $sql);
				 if (!mysqli_query($conn, $sql)) {
				 	echo mysqli_error($conn);
				 }
        }

        
		protected function checkName() {
			global $conn;
			$errors = array();
			if ($this->username == "") {
				$errors[] = "Please enter a username";
			}
			$sql = "SELECT USERNAME FROM users WHERE USERNAME = '$this->username'";
			mysqli_query($conn, $sql);

			if (mysqli_affected_rows($conn) != 0) {
				$errors[] = "The username already exists within our database, please choose something different";
			}

			return $errors;

		}
		

		public function checkEmail() {
			// $myEmail = $this->email;
			global $conn;
			$errors = array();
			if ($this->email == "") {
				$errors[] = "Please enter an email.";
			}

			if (!filter_var($this->email, FILTER_VALIDATE_EMAIL)) {
				$errors[] = "The email you entered is invalid.";
			}

			$sql = "SELECT EMAIL FROM users WHERE EMAIL = '$this->email'";
			$result = mysqli_query($conn, $sql);
			if (mysqli_affected_rows($conn) != 0) {
				$errors[] = "The email you entered is already registerd within our website.";
			}

			return $errors;
		}


		public function checkPassword() {
			$errors = array(); 
			if ($this->password == "") {
				$errors[] = "Please define a password.";
			}

			if ($this->password != $this->confirmPassword) {
				$errors[] = "Your password must match";
			}

			if (strlen($this->password) < 8) {
				$errors[] = "The password is too short! Try something beyond 7 letters";
			}

			if (!preg_match("#[0-9]+#", $this->password)) {
				$errors[] = "The password must at least contain one number!";
			}

			if (!preg_match("#[a-zA-Z]+#", $this->password)) {
				$errors[] = "The password must at least contain one number!";
			}

			return $errors;

		}

		public function checkConfPass()	 {
			$errors = array();

			if (!isset($this->confirmPassword)) {
			$errors[] = "Please enter your password again for confirmation";
			}
			return $errors;
		}




	}