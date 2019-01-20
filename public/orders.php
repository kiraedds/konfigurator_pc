<div id="orders">

  <?php 
    include('connect.php');

    $db     = Database::getInstance();
    $db     = $db->getConnection();  


    $result = $db->query('SELECT users.firstname, users.lastname, users.address, users.phone, users.email, orders.id, products.name, order_items.quantity, orders.status, products.price FROM (((users INNER JOIN orders ON users.id=orders.user_id INNER JOIN order_items ON orders.id=order_items.order_id)) INNER JOIN products ON products.id=order_items.product_id)');

    $result->execute();

?><div class="dane"><?php
    echo'<table>';

      echo "<tr>"; 
        echo "<th>ID</th> <th colspan='4'>Dane zamawiającego</th> <th>Produkt</th> <th>Ilość</th> <th>Cena</th> <th>Status</th> <th>Zmień</th> <th>Usuń</th>";
      echo "</tr>";
      echo "<tr>"; 
        while($r = $result->fetch(PDO::FETCH_ASSOC)) { 
      echo "<tr>";
        echo "<td>".$r['id']."</td>";
        echo "<td>".$r['firstname']."</td>";
        echo "<td>".$r['lastname']."</td>";
        echo "<td>".$r['address']."</td>";
        echo "<td>".$r['phone']."</td>";
        echo "<td>".$r['name']."</td>";
        echo "<td>".$r['quantity']."</td>";
        echo "<td>".$r['price']."</td>";       
      
        echo "<td>".$r['status']."</td>";?>
        <td><a href="seller.php?value=status&id=<?php echo $r["id"]; ?>">Zmień status</a></td>
        <td><a href="seller.php?value=deleteorder&id=<?php echo $r["id"]; ?>">Usuń</a></td><?php        
      echo "</tr>";
        }
    echo'</table>';
?>
</div>