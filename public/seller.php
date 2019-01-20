<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>KONFIGURATOR PC</title>
  <link href="css/style.css" rel="stylesheet" type="text/css" >
  <link href="css/bootstrap.min.css" rel="stylesheet">

  <script src="js/jquery-3.0.0.min.js" type="text/javascript"></script>
  <!--script src="js/script.js" type="text/javascript" ></script-->

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <link href="https://fonts.googleapis.com/css?family=Amatic+SC" rel="stylesheet">

</head>


<body>

  <div id="container">
    <nav>
      <?php
        include('navseller.php');
      ?>
    </nav>

  <hr>

    <div id="content">
      <?php
        if(isset($_GET['value'])){
          $value = $_GET['value'];


           if($value=='procesory'){
               include('procesor.php');
           }
           else if($value=='plytyglowne'){
               include('plytyglowne.php');
           }
           else if($value=='kartygraficzne'){
               include('kartygraficzne.php');
           }
           else if($value=='zasilacze'){
               include('zasilacze.php');
           }
           else if($value=='dyski'){
               include('dyski.php');
           }
           else if($value=='ram'){
               include('ram.php');
           }
           else if($value=='chlodzenie'){
               include('chlodzenie.php');
           }
           else if($value=='obudowy'){
               include('obudowy.php');
           }
            else if($value=='add'){
            include('add.php');
            } 
            else if($value=='added'){
            include('added.php');
            }     
            else if($value=='users'){
            include('users.php');
            }     
            else if($value=='delete'){
            include('delete.php');
            }   
            else if($value=='orders'){
            include('orders.php');
            }   
            else if($value=='settings'){
            include('settings.php');
            }     
            else if($value=='status'){
            include('status.php');
            }  
            else if($value=='deleteorder'){
            include('deleteorder.php');
            }                                                       
          }
        else{
          include('contentseller.php');}
      ?>

    <hr> 

      <footer>
        <?php
         include('footer.php');
        ?>
      </footer>
    </div> 
  </div>

</body>
</html>
