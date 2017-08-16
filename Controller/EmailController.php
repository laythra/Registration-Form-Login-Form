<?php
include "RegistrationController.php";
class EmailController extends RegistrationController {

		protected $title;
		protected $content;
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
				// $this->addUserToDB();
				// header('Location: http://localhost/Task/index.html');
				// exit();

				mail($this->email, $this->title, $this->content, "From: me@you.com");
			}

			return [
				'errors' => $errors,
				'errorsCount' => $errorsCount,
				'formData'    => $_POST,
			];
		}
      
        protected function fillFormData(){

			if (isset($_POST['email'])) {
				$this->email = $_POST['email'];
			}
			if (isset($_POST['title'])) {
				$this->title = $_POST['title'];
			}
			if (isset($_POST['content'])) {
				$this->content = $_POST['content'];
			}
        }

        protected function validateData(){
        	$errors = [];

        	if(isset($_POST['Send'])) {
				$errors['email'] = $this->checkEmail();
				$errors['title'] = $this->checkTitle();
				$errors['content'] = $this->checkContent();
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



        
		protected function checkTitle() {
			global $conn;
			$errors = array();
			if (strlen($this->title) > 50) {
				$errors[] = "The title's length is way too long, try something less than 50 letters";
			}

			return $errors;
		}

		protected function checkContent() {

			$errors = array();
			if (($this->content) == "") {
				$errors[] = "You can't send a blank email";
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
			return $errors;
		}
}
?>