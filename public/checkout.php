<style>

    .container{width: 100%;margin-bottom:80px;}
    .table{width: 65%;float: left;}
    .shipAddr{width: 30%;float: left;margin-left: 30px;}
    .footBtn{width: 95%;float: left;}
    .orderBtn {float: right;}
    table th{
    text-align: right;
        
    }
    .dane{
    width: 30%;
    float: left;
    margin-left: 30px;
    text-align: left;
    margin-bottom: 30px;
    }
    .btn-warning {
    background-color: #5bc0e8;
    border-color: #37b1e3;
    }
    .btn-warning:hover{
    background-color: #3a6fb6;
    border-color: #37b1e3;
    }

    .footBtn {
    /* width: 95%; */
    float: left;}

    .left{
    float: left;
    }
    .right{
    float: right;
    }

    @media only screen and (max-width: 767px) {

    .table{
        width: 100%
    }
    .dane{
        text-align: center;
        width: 100%;
        font-size: 12px;
    }
}
</style>
<?php
include 'connect.php';
include 'cart.php';

if (!session_id()) @session_start();
$cart = new Cart;

if($cart->total_items() <= 0){
    //header("Location: customer.php");
}

$query = $db->query("SELECT * FROM users WHERE id =".$_SESSION['sessCustomerID']);
$custRow = $query->fetch(PDO::FETCH_ASSOC);
?>

<div class="container">
    <h2>Twoje zamówienie</h2></br>
    <table class="table">
    <thead>
        <tr>
            <th>Produkty</th>
            <th>Cena</th>
            <th>Ilość</th>
            <th>Suma</th>
        </tr>
    </thead>
    <tbody>
        <?php
        if($cart->total_items() > 0){
            $cartItems = $cart->contents();
            foreach($cartItems as $item){
        ?>
        <tr>
            <td><?php echo $item["name"]; ?></td>
            <td><?php echo $item["price"].' zł'; ?></td>
            <td><?php echo $item["qty"]; ?></td>
            <td><?php echo $item["subtotal"].' zł'; ?></td>
        </tr>
        <?php } }else{ ?>
        <tr><td colspan="4"><p>No items in your cart......</p></td>
        <?php } ?>
    </tbody>
    <tfoot>
        <tr>
            <td colspan="3"></td>
            <?php if($cart->total_items() > 0){ ?>
            <td class="text-center"><strong>Suma <?php echo $cart->total().' zł'; ?></strong></td>
            <?php } ?>
        </tr>
    </tfoot>
    </table>
    <div class="dane">
        <p><b>IMIĘ </b><?php echo $custRow['firstname']; ?></p>
        <p><b>NAZWISKO </b><?php echo $custRow['lastname']; ?></p>
        <p><b>E-MAIL </b><?php echo $custRow['email']; ?></p>
        <p><b>TEL. </b><?php echo $custRow['phone']; ?></p>
        <p><b>ADRES </b><?php echo $custRow['address']; ?></p>
    </div>
    <div class="footBtn">
        <div class="left"><a href="customer.php" class="btn btn-warning"><i class="glyphicon glyphicon-menu-left"></i> Kontunuuj zakupy</a></div>
        <div class="right"><a href="customer.php?value=cartAction&action=placeOrder" class="btn btn-success orderBtn">Wyślij zamówienie <i class="glyphicon glyphicon-menu-right"></i></a></div>
    </div>
</div>
