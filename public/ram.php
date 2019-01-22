
<div id="ram">


    <div class="table">
        <?php
        include('connect.php');

        $db     = Database::getInstance();
        $db     = $db->getConnection();

        $minimum = $db->query('SELECT min(p.price) FROM products p where type="pamiec_ram"');
        $minimum->execute();
        $min = $minimum->fetch(PDO::FETCH_ASSOC);

        $maksimum = $db->query('SELECT max(p.price) FROM products p where type="pamiec_ram"');
        $maksimum->execute();
        $max = $maksimum->fetch(PDO::FETCH_ASSOC);

        if(!isset($_SESSION['role']) || empty($_SESSION['role'])) {
            echo "<form name='filt' action='index.php?value=ram' method='post'>";
        }
        else if($_SESSION['role'] == 'customer' && $_SESSION['zalogowany'] == 'true') {
            echo "<form name='filt' action='customer.php?value=ram' method='post'>";
        }
        else if( $_SESSION['role'] == 'seller' ) {
            echo "<form name='filt' action='seller.php?value=ram' method='post'>";
        }
        //echo "<form name='filt' action='index.php?value=procesory' method='post'>";

        echo "<output for='rangeinput'>Przedział cen</output><br>";
        echo "Min:  <input name='rangeinput' id='rangeinput' type='range' min=".$min['min(p.price)']." max=".$max['max(p.price)']." value=".$min['min(p.price)']." onchange='rangevalue.value=value'>";
        echo "<output type='text' name='rangevalue' id='rangevalue' >  "  .$min['min(p.price)']."</output>";
        echo "<br>";
        echo "Max:  <input name='rangeinput2' id='rangeinput2' type='range' min=".$min['min(p.price)']." max=".$max['max(p.price)']." value=".$max['max(p.price)']." onchange='rangevalue2.value=value'>";
        echo "<output name='max' id='rangevalue2'>  "  .$max['max(p.price)']."</output>";
        echo "<br>";

        echo "<tr><td><input type='submit' value='Filtruj' class='btn btn-warning' style='font-size: 15px;'></td></tr>";

        echo "</form>";

        $zl = "zł";

        echo'<table cellpadding=\"2\" border=1>';

        if($_SERVER["REQUEST_METHOD"]=="POST"){

            $min1 = $_POST['rangeinput'];

            $max1 = $_POST['rangeinput2'];

            $result = $db->query('SELECT p.id, p.name, p.description, p.price, i.src FROM products p, images i where p.id=i.product_id and type="pamiec_ram" and p.price >= "'.$min1.'" and p.price <= "'.$max1.'"');
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
                echo "<td rowspan='2'>".$r['price'].$zl."</td>";
                echo "</tr>";
                echo'</table>';
            }
        }
        else{

            $result = $db->query('SELECT p.id, p.name, p.description, p.price, i.src FROM products p, images i where p.id=i.product_id and type="pamiec_ram" ');
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
                echo "<td rowspan='2'>".$r['price'].$zl."</td>";
                echo "</tr>";
                echo'</table>';
            }
        }
        echo'</table>';?>

    </div>
</div>