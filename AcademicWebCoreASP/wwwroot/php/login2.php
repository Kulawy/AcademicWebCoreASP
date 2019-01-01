
<?php
if (isset($_COOKIE['s_id']))
{
	session_id($_COOKIE['s_id']);
	echo($_COOKIE['s_id']);
}
session_start();
?>
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
        <a href="#navigation_bar"><img src="../_img/banner.png" width="100%" height="auto" alt="page banner" /></a>
        <nav id="navigation_bar">
            <ul>
                <li><a href="index.html">Home</a></li>
                <li><a href="catalog.html">Catalog</a></li>
                <li><a href="aboutBeer.html">About Beers</a></li>
                <li><a href="about.php">About Page</a></li>
                <li class="active"><a href="contact.html">Contact</a></li>
                <li><a href="additionalnfoForm.html">Tell us about yourself</a></li>
                <li id="log_in"><a href="logIn.html">Register</a></li>
            </ul><br />
        </nav>
    </header>
    <section>
		<div style="text:center;">
			<?php
			    $login = $_POST["login"];
                $password=$_POST["password"];
                $zakodowane = base64_encode($password);
                $zdekodowane = base64_decode($zakodowane);
		
				$conn = mysqli_connect('localhost', 'root', '', 'site_users');
				if($conn->connect_errno > 0){
                  die('Unable to connect to database [' . $conn->connect_error . ']');
                }
				$sql='SELECT u_login from accounts WHERE u_login=' . '\'' . $login . '\'' . ' AND u_password=' . '\'' . $password . '\'';
				
				$result = mysqli_query($conn,$sql);
				
				$succes = $result->num_rows >0;
				if ($succes)
				{	
				print("Witaj $login, zostałeś zalogowany.");
				
				$sql='SELECT id from accounts WHERE u_login='.'\''.$login.'\'';
				$result = mysqli_query($conn,$sql);
				$row = mysqli_fetch_assoc($result);
				
				if (!isset($_COOKIE['s_id']))
                {
	               setcookie('s_id',session_id(),time()+3600);
                }
				
				$_SESSION['user_id']=$row['id'];
		
				}
				else
				{
					print("<p>Zły login lub hasło.</p>");
				}
				
				
				mysqli_close($conn);
			
			?>
		</div>
    </section>
    <footer>
        <details>
            <summary>Copyright &copy; 2018 Jakub Geroń, Marcin Krawczyk - Studenci PWr</summary>
            <p>pictures are taken from googl search but edited</p>
        </details>
    </footer>
    <script type="text/javascript" src="scriptContact.js"></script>
</body>

</html>