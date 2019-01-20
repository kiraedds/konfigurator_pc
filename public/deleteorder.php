<?php
require_once "connect.php";
require_once 'library/FlashMessages.php';

$msg = new FlashMessages();
$msg->display();

if($_SERVER["REQUEST_METHOD"]=="GET"){

	$db     = Database::getInstance();
    $db     = $db->getConnection();

	$id=$_REQUEST['id'];
	$result = $db->prepare("DELETE FROM orders, order_items USING orders INNER JOIN order_items WHERE orders.id=order_items.order_id and orders.id='$id'") or die("failed".mysql_error());
	$result->execute();

	$msg->warning('Zamówienie zostało usunięte');

};?>
