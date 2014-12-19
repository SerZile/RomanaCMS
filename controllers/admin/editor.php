<?php

include_once "models/Blog_Entry_Table.class.php";
$entryTable = new Blog_Entry_Table($db);

$editorSubmitted = isset($_POST['action']);
if($editorSubmitted){
	$buttonClicked = $_POST['action'];

	$save = ($buttonClicked === 'save');
	$id = $_POST['id'];
	$insertNewEntry = ($save and $id === '0');
	$deleteEntry = ($buttonClicked === 'delete');
	$updateEntry = ($save and $insertNewEntry === false);
	$title = $_POST['title'];
	$entry = $_POST['entry'];

	if($insertNewEntry){
		$entryTable->saveEntry($title, $entry);	
	}elseif($updateEntry){
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