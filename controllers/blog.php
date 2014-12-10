<?php

include_once "models/Blog_Entry_Table.class.php";
$entryTable = new Blog_Entry_Table($db);
$entries = $entryTable->getAllEntries();
//$oneEntry = $entries->fetchObject();
//$test = print_r($oneEntry, true);

$blogOutput = include_once "views/list-entries-html.php";

return $blogOutput;
?>