<?php
$carted_products = [];
if(isset($_SESSION['inCart'])){
	$carted_products = $_SESSION['inCart'];
}
?>