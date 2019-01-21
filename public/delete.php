<?php
require_once "connect.php";
require_once 'library/FlashMessages.php';

$msg = new FlashMessages();
$msg->display();

if($_SERVER["REQUEST_METHOD"]=="GET"){

	$db     = Database::getInstance();
    $db     = $db->getConnection();

	$id=$_REQUEST['id'];
	$result = $db->prepare("DELETE FROM products WHERE id='$id'") or die("failed".mysql_error());
	$result->execute();

	echo 'Produkt został usunięty.';

};?>
