<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Piwerko</title>
    <link rel="stylesheet" type="text/css" href="../css/style.css">
    <!--[if lt IE 9]>
                    <script src="//html5shiv.googlecode.com/svn/trunk/html5.js"></script>
                <![endif]-->
    <style>
        
    </style>
</head>

<body>
    <header>
        <a href="#navigation_bar"><img src=../_img/banner.png width="100%" height="auto" alt="page banner" /></a>
        <nav id="navigation_bar">
            <ul>
                <li><a href="index.html">Home</a></li>
                <li><a href="catalog.html">Catalog</a></li>
                <li><a href="aboutBeer.html">About Beers</a></li>
                <li><a href="about.html">About Page</a></li>
                <li class="active"><a href="contact.html">Contact</a></li>
                <li><a href="additionalnfoForm.html">Tell us about yourself</a></li>
                <li id="log_in"><a href="logIn.html">Register</a></li>
            </ul><br />
        </nav>
    </header>
    <section>
		<div style="text:center;">
			<?php
			
			define('PRECEDES',"wczesniej");
			define('FOLLOWS',"pozniej");
			
			$emailAddress=$_POST["address"];
			if(!filter_var($emailAddress, FILTER_VALIDATE_EMAIL)) 
			{
				print( "<p> Podałeś nieprawidłowy adres emailowy, ale nic nie szkodzi. Nie dostaniesz darmowego piwka </p>");
            }
			
			if (!preg_match( "/^\([0-9]{3}\) [0-9]{3}-[0-9]{4}$/",$_POST["phone"]))                                  
            {
              print( "<p> Zły format numeru, prawidłowy to (555) 555-5555</p>                
                  <p>Thank You.</p></body></html>" );
               die();
            }
			$glupoty[0]="Hehe";
			$glupoty[2]="gsdasdasd";
			$glupoty[3]="glupotaasdsad3";
			$glupoty[4]="glupota4";
			foreach($glupoty as $value)
			{
				print( "<p>Kolejna głupota: $value </p>");
			}
			
			$message = $_POST["message"];
			print("<div> Wiadomosc od użytkownika: </div> <p style='border: 2px solid black'>$message</p>");
	        $name=$_POST["fname"];
			$last_name=$_POST["lname"];
			$string_beg="<div>Imie $name jest ";
			$string_mid="";
			$string_end=" w alfabecie niż nazwisko $last_name </div>";
			if ($name<$last_name)
			{
			    $string_mid=PRECEDES;
			}
			else 
			{
				$string_mid=FOLLOWS;
			}
		    print($string_beg.$string_mid.$string_end);
	        
			?>
		</div>
    </section>
    <footer>
        <details>
            <summary>Copyright &copy; 2018 Jakub Geroń, Marcin Krawczyk - Studenci PWr</summary>
            <p>pictures are taken from googl search but edited</p>
        </details>
    </footer>
    <script type="text/javascript" src="../js/scriptContact.js"></script>
</body>

</html>