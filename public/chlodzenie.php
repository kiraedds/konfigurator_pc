
<div id="chlodzenie">
    <div class="table">
        <?php
        include('connect.php');

        $db     = Database::getInstance();
        $db     = $db->getConnection();

        echo'<table cellpadding=\"2\" border=1>';

        $result = $db->query('SELECT p.id, p.name, p.description, p.price, i.src FROM products p, images i where p.id=i.product_id and type="chlodzenie"');
        $result->execute();

        while($r = $result->fetch(PDO::FETCH_ASSOC)) {
            echo'<table>';
            echo "<tr>";
            echo "<td style='width:20%' colspan='2'>".$r['name'];
            if(!isset($_SESSION['role']) || empty($_SESSION['role'])) {?>
                </br><a href="index.php?value=join">Zaloguj sie, aby dodać do koszyka</a>
                <?php
            }
            else if($_SESSION['role'] == 'customer' && $_SESSION['zalogowany'] == 'true') {
                ?>
                </br><a href="customer.php?value=cartAction&action=addToCart&id=<?php echo $r["id"]; ?>">Dodaj do koszyka</a>
                <?php
            }
            else if( $_SESSION['role'] == 'seller' ) {
            }
            echo "<td style='width:45%' rowspan='2'>".$r['description']."</td>";
            echo "<td rowspan='4'><div id='img'><img src='images/".$r['src']."'></div></td>";
            echo "</tr>";
            echo "<tr>";

            echo "</tr>";
            echo "<tr>";
            echo "<td rowspan='2'>".$r['price']."</td>";
            echo "</tr>";
            echo'</table>';
        }
        echo'</table>';?>

    </div>
</div>