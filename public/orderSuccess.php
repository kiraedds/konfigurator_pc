<?php
if(!isset($_REQUEST['id'])){
    header("Location: index.php");
}
?>

<div id="orderSuccess">

    <p style="color: green">Zamówienie zostało wysłane do realizacji. Numer zamówienia: #<?php echo $_GET['id']; ?></p>
</div>
