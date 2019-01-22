<style>
    .container{
}
    input[type="number"]{width: 20%;}
    .table{
        margin-bottom: 80px;
    }
    table th{
        text-align: left;
    }
    table td{
        text-align: left;
    }
    input[type="number"] {
    width: 30%;
    float: left;
    clear: left;
    }
    #content a {
    float: right;
    }
    h2{
    font-family: 'Amatic SC', cursive;
    }
    .btn-warning {
    background-color: #58b7ef;
    border-color: #5794f0;
    }
    .btn-warning:hover{
    background-color: #3a6fb6;
    border-color: #37b1e3;
    }
    tfoot{
    margin-top: 30px;
    }
</style> 

 <?php
// initializ shopping cart class
include 'cart.php';
$cart = new Cart;
?> 
    <script>
    function updateCartItem(obj,id){
        $.get("customer.php?value=cartAction", {action:"updateCartItem", id:id, qty:obj.value}, function(data){
            if(data == 'ok'){
                location.reload();
            }else{
                alert('Zmieniono ilość produktów w zamówieniu.');
            }
        });
    }
    </script>

<div class="container">
    <h2>Twój koszyk</h2>
    <table class="table">
    <thead>
        <tr>
            <th>Produkt</th>
            <th>Cena</th>
            <th>Ilość</th>
            <th></th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        <?php
        if($cart->total_items() > 0){
            //get cart items from session
            $cartItems = $cart->contents();
            foreach($cartItems as $item){
        ?>
        <tr>
            <td><?php echo $item["name"]; ?></td>
            <td><?php echo $item["price"].' zł'; ?></td>
            <td style="width: 40%"><input type="number" class="form-control text-center" value="<?php echo $item["qty"]; ?>" onchange="updateCartItem(this, '<?php echo $item["rowid"]; ?>')"></td>
            <td><?php echo $item["subtotal"].' zł'; ?></td>
            <td style="width: 15%">
                <a href="customer.php?value=cartAction&action=removeCartItem&id=<?php echo $item["rowid"]; ?>" class="btn btn-danger" onclick="return confirm('Czy na pewno chcesz usunąć te produkty z listy?')"><i class="glyphicon glyphicon-trash"></i></a>
            </td>
        </tr>
        <?php } }else{ ?>
        <tr><td colspan="5"><p style="color: grey">Twój koszyk jest pusty...</p></td>
        <?php } ?>
    </tbody>
    <tfoot>
        <tr style="padding-top: 20px">
            <td><a href="customer.php" class="btn btn-warning" style="float: left;"><i class="glyphicon glyphicon-menu-left"></i> Kontunuuj zakupy</a></td>
            <td colspan="2"></td>
            <?php if($cart->total_items() > 0){ ?>
            <td style="text-align: left"><?php echo $cart->total().' zł'; ?></td>
            <td><a href="customer.php?value=checkout" class="btn btn-success btn-block">Potwierdź zakupy <i class="glyphicon glyphicon-menu-right"></i></a></td>
            <?php } ?>
        </tr>
    </tfoot>
    </table>