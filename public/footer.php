<style>
	#footer{
	width: 70%;
	margin: auto;
	margin-bottom: 30px;
}
.kat a{
	padding: 5px;
}
h3{
	font-family: 'Amatic SC', cursive;
	padding: 20px;
}
.kat{
	text-align: right;
}

.box form input{
	width: 97%;
	float: left;
	margin: 5px;
	padding: 10px;
}

.box form textarea{
	width: 97%;
	margin: 5px;
	padding: 10px;
}

.pics{
	text-align: left;
}

.pics a{
	padding: 3px;
	}

#button-submit{
	display: inline-block;
	margin: 0 auto;
}

.box form #button-submit input {
    text-transform: uppercase;
    padding: 8px;
    background: transparent;
    border: 1px solid #0fa8e7;
    width: 100px;
    height: 40px;
    color: #0fa8e7;
}


@media only screen and (max-width: 992px) {

form input{
	width: 97%;
    margin-left: 2%
}

form textarea{
	width: 97%;}

.pics img{
	width: 40px;
	height: 40px;
}	

.box form input{
	width: 96%;}

}

@media only screen and (max-width: 767px) {


.box form input{
	width: 96%;
    margin-left: 2%
}

.box form textarea{
	width: 96%;}

.kat{
	display: none;
}

#content a{
  float: none;
}
.pics{
	text-align: center;
}

}

</style>



<div id="footer">
        <?php if(!isset($_SESSION['role']) || empty($_SESSION['role'])) {?>
      <div class="row">
        <div class="col-lg-3 col-md-4 col-xs-12">
          <div class="kat">
          <h3>Na skróty</h3>
            <a href="index.php">index</a>
            <a href="index.php?value=plytyglowne">płyty główne</a>
              <a href="index.php?value=procesory">procesory</a>
            <a href="index.php?value=kartygraficzne">karty graficzne</a>
            <a href="index.php?value=ram">pamięć ram</a>
            <a href="index.php?value=zasilacze">zasilacze</a>
            <a href="index.php?value=obudowy">obudowy</a>
            <a href="index.php?value=dyski">dyski</a>
            <a href="index.php?value=chlodzenie">chłodzenie</a>
            <a href="index.php?value=join">rejestracja</a>
          </div>
         </div>
         <div class="col-lg-5 col-md-4 col-xs-12">
         <div class="box">
         <h3>Masz pytanie? Pisz!</h3>
      <?php
      if (count($_POST))
      {
        $email = 'fyczana48@gmail.com';
        $subject = 'E-mail ze strony Konfigurator PC';
        $message = 'Twoja wiadomość została poprawnie wysłana. <br/>Postaramy sie odpowiedzieć jak najszybciej.';
        $error = 'Twoja wiadomość została poprawnie wysłana. <br/>Postaramy sie odpowiedzieć jak najszybciej.';
        $charset = 'UTF-8';  
        
        $header =
          'MIME-Version: 1.0' . "\r\n"; 
          'From: Your name <info@address.com>' . "\r\n";
          'Content-type: text/html; charset=UTF-8' . "\r\n"; 
        $body = '';
        foreach ($_POST as $name => $value)
        {
          if (is_array($value))
          {
            for ($i = 0; $i < count($value); $i++)
            {
              $body .= "$name=" . (get_magic_quotes_gpc() ? stripslashes($value[$i]) : $value[$i]) . "\r\n";
            }
          }
          else $body .= "$name=" . (get_magic_quotes_gpc() ? stripslashes($value) : $value) . "\r\n";
        }
        echo mail($email, $subject, $body, "From: $header") ? $message : $error;
      }
      else
      {
      ?>         
          <form action="?" method="post">
            <input type="email" name="email" placeholder="E-mail" required/>
            <input type="text" name="subject" placeholder="Temat" required /><br/>
            <textarea name="massage" placeholder="Twoje pytanie" cols="" rows="4" required></textarea><br/>
            <div id="button-submit"><input type="submit" value="Wyślij"/></div>
          </form> 
      <?php
      }
      ?>         
         </div>
         </div>
         <div class="col-lg-4 col-md-4 col-xs-12">
          <div class="pics">
          <h3>Dołącz do nas</h3>
            <a href="#"><img src="img/conIc/fb.png"></a>
            <a href="#"><img src="img/conIc/tw.png"></a>
            <a href="#"><img src="img/conIc/inst.png"></a>
          </div>
          </div> 
          <?php   
        }
        else if($_SESSION['role'] == 'customer' && $_SESSION['zalogowany'] == 'true') {
        ?>
      <div class="row">
        <div class="col-lg-3 col-md-4 col-xs-12">
          <div class="kat">
          <h3>Na skróty</h3>
              <a href="customer.php">index</a>
              <a href="customer.php?value=plytyglowne">płyty główne</a>
              <a href="customer.php?value=procesory">procesory</a>
              <a href="customer.php?value=kartygraficzne">karty graficzne</a>
              <a href="customer.php?value=ram">pamięć ram</a>
              <a href="customer.php?value=zasilacze">zasilacze</a>
              <a href="customer.php?value=obudowy">obudowy</a>
              <a href="customer.php?value=dyski">dyski</a>
              <a href="customer.php?value=chlodzenie">chłodzenie</a>
              <a href="customer.php?value=join">rejestracja</a>
          </div>
         </div>
         <div class="col-lg-5 col-md-4 col-xs-12">
         <div class="box">
         <h3>Masz pytanie? Pisz!</h3>
      <?php
      if (count($_POST))
      {
        $email = 'fyczana48@gmail.com';
        $subject = 'E-mail ze strony Konfigurator PC';
        $message = 'Twoja wiadomość została poprawnie wysłana. <br/>Postaramy sie odpowiedzieć jak najszybciej.';
        $error = 'Twoja wiadomość została poprawnie wysłana. <br/>Postaramy sie odpowiedzieć jak najszybciej.';
        $charset = 'UTF-8';  
        
        $header =
          'MIME-Version: 1.0' . "\r\n"; 
          'From: Your name <info@address.com>' . "\r\n";
          'Content-type: text/html; charset=UTF-8' . "\r\n"; 
        $body = '';
        foreach ($_POST as $name => $value)
        {
          if (is_array($value))
          {
            for ($i = 0; $i < count($value); $i++)
            {
              $body .= "$name=" . (get_magic_quotes_gpc() ? stripslashes($value[$i]) : $value[$i]) . "\r\n";
            }
          }
          else $body .= "$name=" . (get_magic_quotes_gpc() ? stripslashes($value) : $value) . "\r\n";
        }
        echo mail($email, $subject, $body, "From: $header") ? $message : $error;
      }
      else
      {
      ?>
        <form action="?" method="post">
              <input type="email" name="email" placeholder="E-mail" required/>
              <input type="text" name="subject" placeholder="Temat" required /><br/>
              <textarea name="massage" placeholder="Twoje pytanie" cols="" rows="4" required></textarea><br/>
              <div id="button-submit"><input type="submit" value="Wyślij"/></div>
        </form>
      <?php
      }
      ?>
     </div>
         </div>
         <div class="col-lg-4 col-md-4 col-xs-12">
          <div class="pics">
          <h3>Dołącz do nas</h3>
        <a href="#"><img src="img/conIc/fb.png"></a>
        <a href="#"><img src="img/conIc/tw.png"></a>
        <a href="#"><img src="img/conIc/inst.png"></a>
      </div>
      </div> 
      </div>
        <?php
        }else if( $_SESSION['role'] == 'seller' ) {?>
        <div class="row">
        <div class="col-lg-6 col-md-6 col-xs-12">
          <div class="kat">
          <h3>Na skróty</h3>
              <a href="seller.php">index</a>
              <a href="seller.php?value=plytyglowne">płyty główne</a>
              <a href="seller.php?value=procesory">procesory</a>
              <a href="seller.php?value=kartygraficzne">karty graficzne</a>
              <a href="seller.php?value=ram">pamięć ram</a>
              <a href="seller.php?value=zasilacze">zasilacze</a>
              <a href="seller.php?value=obudowy">obudowy</a>
              <a href="seller.php?value=dyski">dyski</a>
              <a href="seller.php?value=chlodzenie">chłodzenie</a>
              <a href="seller.php?value=join">rejestracja</a>
          </div>
         </div>
         <div class="col-lg-6 col-md-6 col-xs-12">
          <div class="pics">
          <h3>Media społecznościowe</h3>
        <a href="#"><img src="img/conIc/fb.png"></a>
        <a href="#"><img src="img/conIc/tw.png"></a>
        <a href="#"><img src="img/conIc/inst.png"></a>
      </div>
      </div> 
      </div>
        <?php
        }?>
  </div>

</div>


