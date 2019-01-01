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
    <link rel="stylesheet" type="text/css" href="../css/styleAboutPage.css">
    <!--[if lt IE 9]>
        <script src="//html5shiv.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
</head>

<body>
    <header>
        <a href="#navigation_bar"><img src="../_img/banner.png" width="100%" height="auto" alt="page banner" /></a>
        <nav id="navigation_bar">
            <ul>
                <li><a href="../html/index.html">Home</a></li>
                <li><a href="../html/catalog.html">Catalog</a></li>
                <li><a href="../html/aboutBeer.html">About Beers</a></li>
                <li class="active"><a href="../html/about.html">About Page</a></li>
                <li><a href="../html/contact.html">Contact</a></li>
                <li><a href="../html/additionalnfoForm.html">Tell us about yourself</a></li>
                <li id="log_in"><a href="logIn.html">Register</a></li>
            </ul><br />
        </nav>
    </header>
    <section>
        <div id="beer_photo">
            <a href="https://www.google.pl/search?q=piwko&rlz=1C1CHZL_plPL716PL716&source=lnms&tbm=isch&sa=X&ved=0ahUKEwiY7vX5kvrdAhUxw4sKHdOAA6kQ_AUIDigB&biw=1396&bih=686">
                <img id="piwo_paliwo" src="../_img/img.png" height=300 width=400 alt="image of beer" />
            </a>
        </div>
		<div>
		<?php
		  if (isset($_SESSION["user_id"]))
		  {
			  $conn = mysqli_connect('localhost', 'root', '', 'site_users');
			  if($conn->connect_errno > 0){
                  die('Unable to connect to database [' . $conn->connect_error . ']');
                }
			  $sql_login = 'SELECT u_login from accounts where id='.'\''.$_SESSION['user_id'].'\'';
			  $result = mysqli_query($conn,$sql_login);
			  $row = mysqli_fetch_assoc($result);
			  $login = $row['u_login'];
			  
				
			  print("<p>Tajne piwo specjalnie dla $login .</p>");
		      print("<a href='logout.php'>Logout</a>");
			  
			  mysqli_close($conn);
		  
		  }
			
		?>
		</div>
		
        <div id="around_text">
            <article>

                <h1 style="font-weight: bold">Strona poświęcona jednemu z najznakomitszych rodzajów trunków - PIWU</h1>
                <p id="first_p_about"> Piwo to jakże szlachetny trunek. Doceniany przez wielu skamoszy. </p>
                <p id="second_p_about">
                    <mark>Piwo</mark> – napój alkoholowy otrzymywany w wyniku fermentacji alkoholowej brzeczki piwnej.
                    Brzeczka ta stanowi wodny wyciąg ze słodu browarnego z dodatkiem chmielu i ewentualnie innych
                    surowców.
                    W szerokim znaczeniu, zwłaszcza historycznym, piwem określa się napój fermentowany oparty na
                    zbożowym surowcu.
                    Piwo to najstarszy i najczęściej spożywany napój alkoholowy oraz trzeci pod względem popularności
                    po wodzie i herbacie napój na świecie.
                </p>

                <a href="history.docx" download="history.docx">Pobierz Plik o historii piwa jeśli jesteś ciekawy</a><br><br>
            </article>
        </div>
        <aside>
        <a name="koniec_strony" style="text-align:center">Skończyło się? Otwórz kolejne ;)</a>
        <br>
        Reklama Piwerek
        </aside>
        <br><br>
    </section>

    <footer>
        <details>
            <summary>Copyright &copy; 2018 Jakub Geroń, Marcin Krawczyk - Studenci PWr</summary>
            <p>pictures are taken from googl search but edited</p>
        </details>
    </footer>
</body>

</html>