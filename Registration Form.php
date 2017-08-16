<?php
error_reporting(E_ALL);
ini_set('display_errors','On');
require "sql.php";
include 'Controller/RegistrationController.php';
$controller  =  new RegistrationController();

if(!isset($_POST) || count($_POST) === 0){
	$viewData = $controller->registrationPage();
	extract($viewData);
	include 'View/registrationView.php';
}else{
	$viewData = $controller->processForm();
	extract($viewData);
	include 'View/registrationView.php';
} ?>



