<?php 
require "controller/UserController.php";
require "controller/LogiqueController.php";
require "controller/TransactionController.php";

if(isset($_GET['c']) and isset($_GET['a'])){
	// code...
	$controller = $_GET['c'];
	$action = $_GET['a'];

if(class_exists($controller) and method_exists($controller, $action)){
	$diako = new $controller();
	$diako->$action();
}else{
	echo "404";
}
}

 ?>