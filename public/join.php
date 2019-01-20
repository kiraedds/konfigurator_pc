<style>
.btn-warning {
    background-color: #58b7ef;
    border-color: #5794f0;
    font-family: Verdana;
    font-size: 15px;
}

tr:nth-child(even){
	background: none;
}
tr:hover {
	background: none;
}
}
</style>

<div id="join">
<?php

require_once "connect.php";
//require_once 'library/FlashMessages.php';

//$msg = new FlashMessages();
//$msg->display();



if($_SERVER["REQUEST_METHOD"]=="POST"){

	$db     = Database::getInstance();
    $db     = $db->getConnection();

	$result = $db->prepare("INSERT into users (email,login,password,firstname,lastname,phone,address,role) VALUES (:email, :login, :password, :firstname, :lastname, :phone, :address, :role )" );

	$result->bindParam( ':email', $_POST['email'] );
	$result->bindParam( ':login', $_POST['login'] );
	$result->bindParam( ':password', $_POST['password'] );
	$result->bindParam( ':firstname', $_POST['firstname'] );
	$result->bindParam( ':lastname', $_POST['lastname'] );
	$result->bindParam( ':phone', $_POST['phone'] );
	$result->bindParam( ':address', $_POST['address'] );
	$result->bindParam( ':role', $role='customer');
	$result->execute();
header( 'Location:index.php' );
	die();
	}

else{

	echo'
	<h1>Rejestracja</h1></br>';
echo
'
<form name="formularz" action=join.php method="post">
	<table>
	<tr>	
		<td><label>Imię (pełne)</label></td>
		<td><input type="text" name="firstname" required></br></td>
	</tr>
	<tr>	
		<td><label>Nazwisko</label></td>
		<td><input type="text" name="lastname" required></br></td>
	</tr>
	<tr>	
		<td><label>Adres</label></td>
		<td><input type="text" name="address" required></br></td>
	</tr>
	<tr>	
		<td><label>Telefon</label></td>
		<td><input type="tel" name="phone" required></br></td>
	</tr>
	<tr>	
		<td><label>E-mail</label></td>
		<td><input type="email" name="email" required></br></td>
	</tr>
	<tr>	
		<td><label>Login</label></td>
		<td><input type="text" name="login" required></br></td>
	</tr>
	<tr>	
		<td><label>Hasło</label></td>
		<td><input type="password" name="password" required></br></td>
	</tr>

	
	<tr>
		<td></td>
		<td><input type="submit" value="Zarejestruj" class="btn btn-warning" style="font-size: 15px;"></td>
	</tr>
	</form>
	</table>';

}



$conn = null;


?></div>
