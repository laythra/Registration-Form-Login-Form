<?php
error_reporting(E_ALL);
ini_set('display_errors','On');
require "sql.php";
include 'Controller/EmailController.php';
$controller  =  new EmailController();

if(!isset($_POST) || count($_POST) === 0){
	$viewData = $controller->registrationPage();
	extract($viewData);
	include 'View/EmailView.php';
}else{
	$viewData = $controller->processForm();
	extract($viewData);
	include 'View/EmailView.php';
} ?>