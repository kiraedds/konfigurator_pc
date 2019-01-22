<?php
require_once "connect.php";
require_once 'library/FlashMessages.php';

$msg = new FlashMessages();
$msg->display();

if($_SERVER["REQUEST_METHOD"]=="GET"){

	$db     = Database::getInstance();
    $db     = $db->getConnection();

	$id=$_REQUEST['id'];
	$result = $db->query("UPDATE orders SET status='wysłano' where id='$id'");
	$result->execute();

	//$msg->success('Zmieniono status zamówienia');
	echo 'Zmieniono status zamówienia';

};?>

