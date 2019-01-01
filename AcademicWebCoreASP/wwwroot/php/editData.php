
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
        <a href="#navigation_bar"><img src=../_img/banner.png width="100%" height="auto" alt="page banner" /></a>
        <nav id="navigation_bar">
            <ul>
                <li><a href="../html/index.html">Home</a></li>
                <li><a href="../html/catalog.html">Catalog</a></li>
                <li><a href="../html/aboutBeer.html">About Beers</a></li>
                <li><a href="../html/about.php">About Page</a></li>
                <li class="active"><a href="../html/contact.html">Contact</a></li>
                <li><a href="../html/additionalnfoForm.html">Tell us about yourself</a></li>
                <li id="log_in"><a href="../html/logIn.html">Register</a></li>
            </ul><br />
        </nav>
    </header>
    <section>
		<div style="text:center;">
			<?php
			    $u_id=$_SESSION['user_id'];
			    $login = $_POST["login"];
				$password=$_POST["password"];
				$name=$_POST["name"];
				$lastname=$_POST["lastname"];
				
			    $conn = mysqli_connect('localhost', 'root', '', 'site_users');
				if($conn->connect_errno > 0){
                  die('Unable to connect to database [' . $conn->connect_error . ']');
                }
				
				if (!preg_match('/^[A-Za-z]{1}[A-Za-z0-9]{5,15}$/', $login))
                {
				  mysqli_close($conn);
                  die('wrong login');
                } 
				
				if (strlen($password)<5 && strlen($password)>15)
                {
				  mysqli_close($conn);
                  die('wrong password');
                } 
				
				$rexSafety = "/[\^<,\"@\/\{\}\(\)\*\$%\?=>:\|;#]+/i";
				if (preg_match($rexSafety, $name)) {
				   die('wrong name');
				} 						
				if (preg_match($rexSafety, $lastname)) {
				   die('wrong lastname');
				} 
				
				
				
				$sql = 'UPDATE accounts SET u_login='.'\''.$login.'\''.', u_password='.'\''.$password.'\''.',u_name='.'\''.$name.'\''.',u_lastname='.'\''.$lastname.'\''.' WHERE id='.'\''.$u_id.'\'';
				
				mysqli_query($conn,$sql);

				
				
				mysqli_close($conn);
				
				print('Dane zostaly zaktualizowane');
				
				
				
				
				
				
			
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