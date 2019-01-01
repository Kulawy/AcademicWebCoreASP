<?php
// Start the session
if (isset($_COOKIE['s_id']))
{
	session_id($_COOKIE['s_id']);
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
                <li><a href="../html/index.html">Home</a></li>
                <li><a href="../html/catalog.html">Catalog</a></li>
                <li><a href="../html/aboutBeer.html">About Beers</a></li>
                <li><a href="../html/about.html">About Page</a></li>
                <li class="active"><a href="contact.html">Contact</a></li>
                <li><a href="additionalnfoForm.html">Tell us about yourself</a></li>
                <li id="log_in"><a href="logIn.html">Register</a></li>
            </ul><br />
        </nav>
    </header>
    <section>
	<p> Zostałeś wylogowany. </p>
	<?php
	if (isset($_COOKIE['s_id']))
    {
	   
	   unset($_COOKIE['s_id']);
    }
		setcookie("s_id", "", time()-3600);
		session_unset();
		session_destroy();
	?>
	   
    
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