<?php
include 'cart.php';
$cart = new Cart;
include 'connect.php';

    $db     = Database::getInstance();
    $db     = $db->getConnection();


if(isset($_REQUEST['action']) && !empty($_REQUEST['action'])){
    if($_REQUEST['action'] == 'addToCart' && !empty($_REQUEST['id'])){
        $productID = $_REQUEST['id'];
        $query = $db->query("SELECT * FROM products WHERE id = ".$productID);
        $row = $query->fetch(PDO::FETCH_ASSOC);
        $itemData = array(
            'id' => $row['id'],
            'name' => $row['name'],
            'price' => $row['price'],
            'qty' => 1
        );
        
        $insertItem = $cart->insert($itemData);
        $redirectLoc = $insertItem?'customer.php?value=viewCart':'customer.php';
        header("Location: ".$redirectLoc);
    }elseif($_REQUEST['action'] == 'updateCartItem' && !empty($_REQUEST['id'])){
        $itemData = array(
            'rowid' => $_REQUEST['id'],
            'qty' => $_REQUEST['qty']
        );
        $updateItem = $cart->update($itemData);
        echo $updateItem?'ok':'err';die;
    }elseif($_REQUEST['action'] == 'removeCartItem' && !empty($_REQUEST['id'])){
        $deleteItem = $cart->remove($_REQUEST['id']);
        header("Location: customer.php?value=viewCart");
    }elseif($_REQUEST['action'] == 'placeOrder' && $cart->total_items() > 0 && !empty($_SESSION['sessCustomerID'])){
        // wstawianie danych o zamówieniu do bazy
        $insertOrder = $db->prepare("INSERT INTO orders (user_id, total_price, status) VALUES ('".$_SESSION['sessCustomerID']."', '".$cart->total()."', 'w realizacji')");
        $insertOrder->execute();

       if($insertOrder){
            $orderID = $db->lastInsertId();
            $sql = '';
            // pobieranie produktów z koszyka
            $cartItems = $cart->contents();
            foreach($cartItems as $item){
                $sql .= "INSERT INTO order_items (order_id, product_id, quantity) VALUES ('".$orderID."', '".$item['id']."', '".$item['qty']."');";  
            }
            // wstawianie zamówienia do bazy
            $insertOrderItems = $db->exec($sql);
            
            if($insertOrderItems){
                $cart->destroy();
                header("Location: customer.php?value=orderSuccess&id=$orderID");
            }else{
                header("Location: customer.php?value=checkout");
            }
        }else{
            header("Location: customer.php?value=checkout");
        }
    }else{
        header("Location: customer.php");
    }
}else{
    header("Location: customer.php");
}
//print_r($orderID); exit;
?>