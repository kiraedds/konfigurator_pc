<div id="users">
<div class="table">
  <?php 
    include('connect.php');

    $db     = Database::getInstance();
    $db     = $db->getConnection();   


  echo'<table cellpadding=\"2\" border=0>';
  $result = $db->query('SELECT id, email, firstname, lastname, phone, address, role FROM users'); 
  $result->execute();

  echo "<tr>"; 
    echo "<th>ID</th> <th>Imię</th> <th>Nazwisko</th> <th>E-mail</th> <th>Telefon</th> <th>Adres</th> <th>Status</th>";
  echo "</tr>";
    while($r = $result->fetch(PDO::FETCH_ASSOC)) { 
      echo "<tr>";
          echo "<td>".$r['id']."</td>";
          echo "<td>".$r['firstname']."</td>"; 
          echo "<td>".$r['lastname']."</td>";
          echo "<td>".$r['email']."</td>";
          echo "<td>".$r['phone']."</td>";
          echo "<td>".$r['address']."</td>";
          echo "<td>".$r['role']."</td>";
          
      echo "</tr>";
    }
  echo'</table>';?>


</div>
</div>