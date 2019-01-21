<div id="add">
    <?php

    require_once "connect.php";
    require_once 'library/FlashMessages.php';

    if($_SERVER["REQUEST_METHOD"]=="POST"){

        $db     = Database::getInstance();
        $db     = $db->getConnection();
        $tmp = 'x';
        $result = $db->prepare( "INSERT INTO products (`name`,`type`,`colour`,`size`,`description`,`price`) VALUES (:name, :type, :colour, :size, :description, :price )" );
        $result->bindParam( ':name', $_POST['name'] );
        $result->bindParam( ':type', $_POST['type'] );
        $result->bindParam( ':colour', $tmp );
        $result->bindParam( ':size', $tmp );
        $result->bindParam( ':description', $_POST['description'] );
        $result->bindParam( ':price', $_POST['price'] );
        $result->execute();
        $product_id = $db->lastInsertId();


        if (isset($_FILES['image']['name'])) {
            $info = pathinfo($_FILES['image']['name']);
            $ext = $info['extension'];
            $newname = $_FILES['image']['name'];
            $target = 'images/'.$newname;
            move_uploaded_file( $_FILES['image']['tmp_name'], $target);

            $result = $db->prepare( "INSERT INTO images (`product_id`, `src`) VALUES (:id, :src)" );
            $result->bindParam( ':id', $product_id );
            $result->bindParam( ':src', $newname );
            $result->execute();
        }
        header( 'Location:seller.php?value=added' );
        die();
    }


    else{
        echo'<form name="formularz" action=add.php method="post" ENCTYPE="multipart/form-data">
	<label>KATEGORIA</label>
    <select style="width: 75%" name="type" placeholder="Nazwa produktu" required>        
        <option>procesory</option>
        <option>plyty_glowne</option>
        <option>karty_graficzne</option>
        <option>pamiec_ram</option>
        <option>zasilacze</option>
        <option>dyski_ssd</option>
        <option>obudowy</option>
        <option>chlodzenie</option>
      
    </select></br>
	<input type="text" name="name" placeholder="Nazwa produktu" required></br>
    <textarea cols="50" rows="6" name="description" placeholder="Opis" required></textarea></br>
	<input type="text" name="price"  value="zł" placeholder="Cena" required></br>
    <input type="file" name="image" required/><br/>
    <input type="submit" name="upload" value="Wyślij plik"/>
	</form>';

    }

    ?></div>


