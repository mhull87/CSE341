<?php
$id = $_POST['id'];
$name = $_POST['name'];
$use = $_POST['use'];

include $_SERVER['DOCUMENT_ROOT'].'/bugout/common/header.php';

if (isset($message))
{
  echo $message;
}

echo $addtobagitem;

include $_SERVER['DOCUMENT_ROOT'].'/bugout/common/footer.php';
?>