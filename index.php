<!DOCTYPE html>
<html>
<head>
<title>testownik - logowanie</title>
<meta charset="utf-8" name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href= "Style.css" type="text/css"/>
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">

</head>
<body>
<!-- pomoc -->
<button onclick="document.getElementById('pomocId').style.display='block'" class = "help" style = "background-color: #EEEEEE; padding: 10px 15px; width: 9%; font-size: 15px; color: #990000; font-size: 18px;><a href="#"><i class="material-icons">help_outline</i> Pomoc</a></button>
<div id="pomocId" class="modal">
  
  <form class="modal-content animate" action="/action_page.php" method="post">
  
    <div class="container">
	
      <h2 style = "color : red; text-align:center">Pomoc</h2> <br>   
	  
      <b>Nie możesz się zalogować?</b><br>
      <a>Skontaktuj się z administratorem lub wykładowcą danej placówki aby upewnić się, że zostałeś(łaś) dodany do listy.</a> <br><br>
      <b> Skontaktuj się z nami:</b><br>
      <a>tel. 22 34 70 100</a><br>
      <a>fax. 22 34 70 261</a><br>
      <a>e-mail. informacja@men.gov.pl</a><br>
      <br>
      <br>
      
    </div>
  </form>
</div>

<script src="pomoc.js"></script>
<!-- pomoc-koniec -->
		      
<div class ="center">
<h1>Witaj w panelu logowania!</h1>
<h2>Logowanie:</h2>
    <b><a href="przypomnienie.php" style="color:#0000FF">Przypomnij hasło</a></b>
</div>

<br><br>

<?php
		
if(isset($_GET['err']))
	{
		switch ($_GET['err'])
		{
			case 1;
				echo ' <div class ="center">
						<a style = "color: red; font-size: 23px;">W LOGINIE WYSTĘPUJĄ NIEDOZWOLONE ZNAKI!</a>
						</div>';
				break;
			case 2;
				echo '<div class ="center">
						<a style = "color: red; font-size: 23px;"> W HAŚLE WYSTĘPUJĄ NIEDOZWOLONE ZNAKI!</a>
					  </div>';
				break;
			case 3;
				echo '<div class ="center">
						<a style = "color: red; font-size: 23px;">W HAŚLE NIE MA MAŁYCH LITER!</a>
					  </div>';
				break;
			case 4;
				echo '<div class ="center">
						<a style = "color: red; font-size: 23px;">W HAŚLE NIE MA CYFR!</a>
					  </div>';
				break;
			case 5;
				echo '<div class ="center">
						<a style = "color: red; font-size: 23px;">W HAŚLE NIE MA DUŻYCH LITER!</a>
					  </div>';
				break;
			case 6;
				echo '<div class ="center">
						<a style = "color: red; font-size: 23px;">LOGIN NIE ISTNIEJE!</a>
					  </div>';
				break;
			case 7;
				echo '<div class ="center">
						<a style = "color: red; font-size: 23px;">HASŁO JEST ZA KRÓTKIE!</a>
					  </div>';
				break;
			case 8;
				echo '<div class ="center">
						<a style = "color: red; font-size: 23px;">LOGIN JEST ZA KRÓTKI!</a>
					  </div>';
				break;
			case 9;
				echo '<div class ="center">
						<a style = "color: red; font-size: 23px;">HASŁA SĄ RÓŻNE.</a>
					  </div>';
				break;
			case 10;
				echo '<div class ="center">
						<a style = "color: red; font-size: 23px;">NIE MA TAKIEGO UŻYTKOWNIKA!</a>
					  </div>';
				break;
			case 12;
				echo '<div class ="center">
						<a style = "color: red; font-size: 23px;">Konto użytkownika zostało zablokowane.</a>
					  </div>';
				break;
			case 13;
				echo '<div class ="center">
						<a style = "color: red; font-size: 23px;">HASŁO JEST NIEPRAWIDŁOWE!</a>
					  </div>';
				break;
		}
	}	
?>

<form action="logowanie.php" method="POST">
    <div class="container">
        <div class="center">
      <label for="uname"><b>Login</b></label>
      <input type="text" name="loginPost" placeholder="Wpisz login" required>
       </div>
       <br>
        <div class="center">
      <label for="psw"><b>Hasło</b></label>
      <input type="password" name="hasloPost" placeholder="Wpisz hasło"  required>
        </div>
        <div class = "center">
            <label>
                <input type="checkbox" checked="checked" name="remember" ><b> Zapamiętaj mnie</b>
        </label>
        <br><br>
      <button type="submit" id = "logowanie" name="logowanie">Zaloguj</button>
        </div>
	  <br><br>

    </div>
</form>

</body>
</html>

