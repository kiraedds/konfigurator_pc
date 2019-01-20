<script type="text/javascript">
	function valid()
	{
	if(document.chngpwd.npwd.value!= document.chngpwd.cpwd.value)
	{
	alert("Nowe hasła różnią się");
	document.chngpwd.cpwd.focus();
	return false;
	}
	return true;
	}
</script>


<?php

include("connect.php");
if(isset($_POST['Submit']))
{
	$query = $db->query("SELECT password FROM  users where password='".$_POST['opwd']."' && login='".$_SESSION['login']."'");
	$num=$query->fetch(PDO::FETCH_ASSOC);

		if($num>0 )
		{
		$con = $db->query("UPDATE users SET password='".$_POST['npwd']."' where login='".$_SESSION['login']."'");
		$_SESSION['msg1']="Pomyślnie zmieniono hasło!";
		}
		else
		{
		$_SESSION['msg1']="Stare hasło jest błędne!";
		}
}
?>


<div id="settings">
		<h2>Zmień hasło</h2>
		<form name="chngpwd" action="" method="post" onSubmit="return valid();">
		<input type="password" name="opwd" id="opwd" placeholder="Stare hasło" required><br/>
		<input type="password" name="npwd" id="npwd" placeholder="Nowe hasło" required><br/>
		<input type="password" name="cpwd" id="cpwd" placeholder="Potwierdź nowe hasło" required><br/>
		<input type="submit" name="Submit" value="Zmień hasło" /><br/>
		</form>
		<p style="color:red;"><?php echo $_SESSION['msg1'];?><?php echo $_SESSION['msg1']="";?></p>
</div>
