<?php
include("config.php");
session_start();
if(!isset($_SESSION['csms_username'])){
	header('Location: index.php');
}
?>