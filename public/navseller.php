<link href="css/style2.css" rel="stylesheet" type="text/css" >
<?php
session_start();
if(!isset($_SESSION['role']) || empty($_SESSION['role'])) {?>
<div class="row">
    <div class="col-lg-3 col-md-3 col-xs-12">
        <div class="logo"><a href="index.php"><img src="img/logo.png"/></a><br></div>
    </div>


    <div class="col-lg-4 col-md-2 col-xs-12">
        <div>
          <div class="drop">
              <div class="option active placeholder" data-value="index.php">
                Menu
              </div>
              <div class="option" data-value="plytyglowne">
                  <a href="index.php?value=plytyglowne">Płyty główne</a>
              </div>
              <div class="option" data-value="procesory">
                  <a href="index.php?value=procesory">Procesory</a>
              </div>
              <div class="option" data-value="kartygraficzne">
                  <a href="index.php?value=kartygraficzne">Karty graficzne</a>
              </div>
              <div class="option" data-value="ram">
                  <a href="index.php?value=ram">Ram</a>
              </div>
              <div class="option" data-value="zasilacze">
                  <a href="index.php?value=zasilacze">Zasilacze</a>
              </div>
              <div class="option" data-value="obudowy">
                  <a href="index.php?value=obudowy">Obudowy</a>
              </div>
              <div class="option" data-value="dyski">
                  <a href="index.php?value=dyski">Dyski SSD</a>
              </div>
              <div class="option" data-value="chlodzenie">
                  <a href="index.php?value=chlodzenie">Chłodzenie</a>
              </div>
          </div>
        </div>
        <div id="menu">
          <div class="menu">
            <a href="customer.php">Produkty</a>
          </div>
        </div>
      
    </div>

    <div class="col-lg-5 col-md-7 col-xs-12">

        <div>
            <form id="logowanie" action="login.php" method="post">
                <input type="text" placeholder="LOGIN" name="login">
                <input type="password" placeholder="HASŁO" name="password">
                <input type="submit" name="ZALOGUJ" value="ZALOGUJ">
                <a href="index.php?value=join">Zarejestruj się</a>
            </form>
        </div>
    </div>

    <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
    <script  src="js/index.js"></script>

</div>

          <?php   

}
        else if($_SESSION['role'] == 'customer' && $_SESSION['zalogowany'] == 'true') {
        ?>

<div class="row">
    <div class="col-lg-4 col-md-3 col-xs-12">
        <div class="logo"><a href="customer.php"><img src="img/logo.png"/></a><br></div>
    </div>


    <div class="col-lg-4 col-md-4 col-xs-12">
        <div>
          <div class="drop">
              <div class="option active placeholder" data-value="customer.php">
                Menu
              </div>
              <div class="option" data-value="Kategorie:">
                <a href="" style="color: black">Kategorie:</a>
              </div>
              <div class="option" data-value="plytyglowne">
                  <a href="customer.php?value=plytyglowne">Płyty główne</a>
              </div>
              <div class="option" data-value="procesory">
                  <a href="customer.php?value=procesory">Procesory</a>
              </div>
              <div class="option" data-value="kartygraficzne">
                  <a href="customer.php?value=kartygraficzne">Karty graficzne</a>
              </div>
              <div class="option" data-value="ram">
                  <a href="customer.php?value=ram">Ram</a>
              </div>
              <div class="option" data-value="zasilacze">
                  <a href="customer.php?value=zasilacze">Zasilacze</a>
              </div>
              <div class="option" data-value="obudowy">
                  <a href="customer.php?value=obudowy">Obudowy</a>
              </div>
              <div class="option" data-value="dyski">
                  <a href="customer.php?value=dyski">Dyski SSD</a>
              </div>
              <div class="option" data-value="chlodzenie">
                  <a href="customer.php?value=chlodzenie">Chłodzenie</a>
              </div>
              <div class="option" data-value="koszyk">
                <a href="customer.php?value=viewCart">Twój koszyk</a>
              </div>
              <div class="option" data-value="ustawienia">
                <a href="customer.php?value=settings">Ustawienia</a>
              </div>
          </div>
        </div>
        <div id="menu">
          <div class="menu">
            <a href="customer.php">Produkty</a>
          </div>
          <div class="menu">
            <a href="customer.php?value=viewCart">Twój koszyk</a>
          </div>
          <div class="menu">
            <a href="customer.php?value=settings"><img src="img/gear.png"/></a>
          </div>
        </div>
    
    </div>

    <div class="col-lg-3 col-md-5 col-xs-12">
      <div id="zalogowany">
        <div class="log">
          <?php
              if(isset($_SESSION['login'])) {
                echo "<p>Użytkownik: ".$_SESSION['login']."</p>";}
              else{
                echo "Jesteś niezalogowany!";
              }

          ?>
        </div>
        <div class="log">  
            <a href="logout.php">Wyloguj</a>
        </div>
       </div>

    <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
    <script  src="js/index.js"></script>

</div>

        <?php
        }
        else if( $_SESSION['role'] == 'seller' ) { ?>
<div class="row">
    <div class="col-lg-4 col-md-3 col-xs-12">
        <div class="logo"><a href="seller.php"><img src="img/logo.png"/></a><br></div>
    </div>


    <div class="col-lg-4 col-md-4 col-xs-12">
        <div>
          <div class="drop">
              <div class="option active placeholder" data-value="seller.php">
                Menu
              </div>
              <div class="option" data-value="Produkty">
                <a href="seller.php?value=added">Produkty</a>
              </div>
              <div class="option" data-value="add">
                <a href="seller.php?value=add">Dodaj produkty</a>
              </div>
              <div class="option" data-value="orders">
                <a href="seller.php?value=orders">Zamówienia</a>
              </div>
              <div class="option" data-value="users">
                <a href="seller.php?value=users">Użytkownicy</a>
              </div>
              <div class="option" data-value="settings">
                <a href="seller.php?value=settings">Ustawienia</a>
              </div>
          </div>
          <div class="drop">
              <div class="option" data-value="Kategorie:">
                <a href="" style="color: black">Kategorie:</a>
              </div>
              <div class="option" data-value="plytyglowne">
                  <a href="seller.php?value=plytyglowne">Płyty główne</a>
              </div>
              <div class="option" data-value="procesory">
                  <a href="seller.php?value=procesory">Procesory</a>
              </div>
              <div class="option" data-value="kartygraficzne">
                  <a href="seller.php?value=kartygraficzne">Karty graficzne</a>
              </div>
              <div class="option" data-value="ram">
                  <a href="seller.php?value=ram">Ram</a>
              </div>
              <div class="option" data-value="zasilacze">
                  <a href="seller.php?value=zasilacze">Zasilacze</a>
              </div>
              <div class="option" data-value="obudowy">
                  <a href="seller.php?value=obudowy">Obudowy</a>
              </div>
              <div class="option" data-value="dyski">
                  <a href="seller.php?value=dyski">Dyski SSD</a>
              </div>
              <div class="option" data-value="chlodzenie">
                  <a href="seller.php?value=chlodzenie">Chłodzenie</a>
              </div>
            </div>
          </div>    
        
        <div id="menu">
          <div class="menu">
            <a href="seller.php?value=added">Produkty</a>
          </div>
          <div class="menu">
            <a href="seller.php?value=add">Dodaj</a>
          </div>
          <div class="menu">
            <a href="seller.php?value=orders">Zamówienia</a>
          </div>
          <div class="menu">
            <a href="seller.php?value=users">Użytkownicy</a>
          </div>
          <div class="menu">
            <a href="seller.php?value=settings"><img src="img/gear.png"/></a>
          </div>
        </div>
   	
    </div>

    <div class="col-lg-3 col-md-5 col-xs-12">
      <div id="zalogowany">
        <div class="log">
          <?php
              if(isset($_SESSION['login'])) {
                echo "<p>Użytkownik: ".$_SESSION['login']."</p>";}
              else{
                echo "Jesteś niezalogowany!";
              }?>
        </div>
        <div class="log">  
            <a href="logout.php">Wyloguj</a>
        </div>
	     </div>

    <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
    <script  src="js/index.js"></script>

</div>

        <?php
        }?>