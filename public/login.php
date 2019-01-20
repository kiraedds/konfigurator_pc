<?php


if (!session_id()) @session_start();


if ( ( ! isset( $_POST['login'] ) ) || ( ! isset( $_POST['password'] ) ) ) {
	header( 'Location: index.php' );
	exit();
}

require_once 'connect.php';
require_once 'library/FlashMessages.php';

$user = login( $_POST['login'], $_POST['password']);
$msg = new FlashMessages();
$msg->display();

if ( $user ) {
	$_SESSION['sessCustomerID']    	= $user->id;
	$_SESSION['login']    = $user->login;
	$_SESSION['password'] = $user->password;
	$_SESSION['name']     = $user->firstname;
	$_SESSION['role']     = $user->role;

	if ( $_SESSION['role'] == 'seller' ) {
		//$stat = 'sprzedajacy';
		$_SESSION['zalogowany'] = true;
		header( 'Location:seller.php' );
	} else if ( $_SESSION['role'] == 'customer' ) {
		//$stat = 'kupujacy';
		$_SESSION['zalogowany'] = true;
		header( 'Location:customer.php' );
	}	die;
}

$msg->warning('Podano nieprawidłowy login lub hasło');
header( 'Location:index.php' );
die;

function login( $login, $password ) {
	$db     = Database::getInstance();
    $db     = $db->getConnection();

	$result = $db->prepare( "SELECT * FROM users WHERE login = :login AND password = :password" );
	$result->bindParam( ':login', $login );
	$result->bindParam( ':password', $password );
	$result->execute();

	return $result->fetch( PDO::FETCH_OBJ );
}

?>


