<?php

include_once "models/Blog_Entry_Table.class.php";
$entryTable = new Blog_Entry_Table($db);

$editorSubmitted = isset($_POST['action']);
if($editorSubmitted){
	$buttonClicked = $_POST['action'];	
	$insertNewEntry = ($buttonClicked === 'save');
	$deleteEntry = ($buttonClicked === 'delete');
	$id = $_POST['id'];
	
	if($insertNewEntry){

		$title = $_POST['title'];
		$entry = $_POST['entry'];

		$entryTable->saveEntry($title, $entry);

	}elseif($deleteEntry){
		$entryTable->deleteEntry($id);
	}
}

$entryRequested = isset($_GET['id']);
if($entryRequested){
	$id = $_GET['id'];
	$entryData = $entryTable->getEntry($id);
	$entryData->entry_id = $id;
}


$editorOutput = include_once "views/admin/editor-html.php";
return $editorOutput;



?>