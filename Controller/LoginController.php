<?php
	include "RegistrationController.php";
	class LoginController extends RegistrationController {

		public function __construct() {

		}


		public function processForm(){
			$this->fillFormData();
			$errors = $this->validateData();
			$errorsCount = $this->checkErrorsLength($errors);

			if($errorsCount == 0){
				header('Location: http://localhost/Task/Email.html');
				exit();
			}

			return [
				'errors' => $errors,
				'errorsCount' => $errorsCount,
				'formData'    => $_POST,
			];
		}

		protected function fillFormData() {
			if (isset($_POST['emaill'])) {
				$this->email = $_POST['emaill'];
			}
			if (isset($_POST['pword'])) {
				$this->password = $_POST['pword'];
			}
		}


		protected function validateData(){
        	$errors = [];

        	if(isset($_POST['Login'])) {
				$errors['email'] = $this->checkEmail();
				$errors['password'] = $this->checkPassword();
			}

			return $errors;
        }



		public function checkPassword() {

			global $conn;
			$errors = array();
			if (!isset($this->password)) {
				$errors[] = "Please define a password.";
			}
			return $errors;
		}

		public function checkEmail() {
			global $conn;

			$errors = array();

			if ($this->email == "") {
				$errors[] = "Please enter an email.";
			}

			if (!filter_var($this->email, FILTER_VALIDATE_EMAIL)) {
				$errors[] = "The email you entered is invalid.";
			}

			$sql = "SELECT password from users where email = '$this->email'";
			$pass = mysqli_query($conn, $sql);
			$pass = mysqli_fetch_array($pass);
			if (!password_verify($this->password, $pass['password'])) {
				$errors[] = "The username or password is incorrect";
			}
			
			// $sql = "SELECT email, password FROM users WHERE email = '$this->email' AND password = '$this->password'";
			/*
			if (mysqli_affected_rows($conn) == 0) {
				$errors[] = "The username or password is incorrect";
			}
			*/

			return $errors;
		}
	}
