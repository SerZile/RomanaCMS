<?php

error_reporting(E_ALL);
ini_set("display_errors", 1);

include_once "models/Page_Data.class.php";
$pageData = new Page_Data();
$pageData->title = "PHP/MySQL blog";
$pageData->addCSS("css/blog.css");
$pageData->content = "<h1>YES!</h1>";

$page = include_once "views/page.php";
echo $page;

?>