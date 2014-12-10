<?php

error_reporting(E_ALL);
ini_set("display_errors", 1);

include_once "models/Page_Data.class.php";
$pageData = new Page_Data();
$pageData->title = "PHP/MySQL blog";
$pageData->addCSS("css/blog.css");
$pageData->content = include_once "views/admin/admin-navigation.php";

$dbInfo = "mysql:host=localhost;dbname=simple_blog";
$dbUser = "root";
$dbPassword = "romana";
$db = new PDO($dbInfo, $dbUser, $dbPassword);
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$navigationIsClicked = isset($_GET['page']);
if($navigationIsClicked){
	$contrl = $_GET['page'];
}else{
	$contrl = "entries"; 
}

$pageData->content .=include_once "controllers/admin/$contrl.php";

$page = include_once "views/page.php";
echo $page;

?>