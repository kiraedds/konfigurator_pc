<style>
#img img {
    border: 1px solid #ddd;
    border-radius: 4px;
    padding: 5px;
    width: 150px;
}
#img img:hover {
    box-shadow: 0 0 2px 1px rgba(0, 140, 186, 0.5);
}

table{
  border: 0;
}

</style>

<div id="added">
<div class="table">
  <?php
    include('connect.php');

    $db     = Database::getInstance();
    $db     = $db->getConnection();

  echo'<table cellpadding=\"2\" border=0>';
      $result = $db->prepare('SELECT p.*, i.src FROM products p, images i where p.id= i.product_id'); 
      $result->execute();

  echo "<tr>"; 
    echo "<th>ID</th> <th>Nazwa</th> <th>Rodzaj</th> <th>Kolor</th> <th>Rozmiar</th> <th>Opis</th> <th>Cena</th> <th>Zdjęcie</th> <th>Usuń</th>";
  echo "</tr>";
    while($r = $result->fetch(PDO::FETCH_ASSOC)) { 
      echo "<tr>";
          echo "<td>".$r['id']."</td>";
          echo "<td>".$r['name']."</td>"; 
          echo "<td>".$r['type']."</td>";
          echo "<td>".$r['colour']."</td>";
          echo "<td>".$r['size']."</td>";
          echo "<td>".$r['description']."</td>";
          echo "<td>".$r['price']."</td>";
          echo "<td><div id='img'><img src='images/".$r['src']."'></div></td>";?>
          <td><a href="seller.php?value=delete&id=<?php echo $r["id"]; ?>">Usuń</a></td>
      <?php     
      echo "</tr>";
    }
  echo'</table>';?>

</div>
</div>




