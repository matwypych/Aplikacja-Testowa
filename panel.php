<!DOCTYPE html>
<html>
<head>
<title>testownik - administrator</title>
<meta charset="utf-8" name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href= "Styleadmin.css" type="text/css"/>
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">

</head>
<body>
<button onclick="document.getElementById('pomocId').style.display='block'" class = "help" style = "background-color: #EEEEEE; padding: 10px 15px; width: 9%; font-size: 15px; color: #990000; font-size: 18px;><a href="#"><i class="material-icons">help_outline</i> Pomoc</a></button>
<div id="pomocId" class="modal">

  <form class="modal-content animate" action="/action_page.php" method="post">

    <div class="container">

      <h2 style = "color : red; text-align:center">Pomoc</h2> <br>

      <b>Nie możesz przejść dalej?</b> <br>
      <a>Upewnij się, że poprawnie uzupełniłeś wszystkie pola</a><br><br>
      <b>Nie możesz wgrać pliku z pytaniami?</b><br>
      <a>Sprawdź czy plik, który wybrałeś jest poprawny</a><br><br>
      <b>Nie możesz wydrukować raportu?</b><br>
      <a>Spróbuj ponownie otworzyć pdf</a><br>
      <a>Sprawdź swoje połączenie z internetem</a><br>
      <a>Upewnij się czy, że problem nie leży po stronie drukarki</a><br><br>
	  <b>Nie możesz wykonać testu?</b><br>
	  <a>Najprawdopodobniej test jeszcze się nie rozpoczął. Skontaktuj się z wykładowcą.</a><br><br>
	  <b>Nie możesz zobaczyć swojego wyniku?</b><br>
	  <a>Taka sytuacja może mieć miejsce tuż po zakończeniu testu, kiedy wyniki jeszcze się zapisują. Jeżeli po dluższym czasie nadal będziesz miał/miała ten problem, skontaktuj się z wykładowcą</a><br><br><br>
	  <b> Skontaktuj się z nami:</b><br>
      <a>tel. 22 34 70 100</a><br>
      <a>fax. 22 34 70 261</a><br>
      <a>e-mail. informacja@men.gov.pl</a><br>

    </div>
  </form>
</div>
<script src="pomoc.js"></script>

<br><br>
<div class = "wyloguj">

	<form action="wylogowanie.php" method="POST">
	<button class = "button" type="submit" style = "background-color: #AAAAAA; padding: 10px 15px; width: 10%; font-size: 15px; color: black; font-size: 17px;" type="submit" >Wyloguj <i class="material-icons">power_settings_new</i></button>
	</form>
</div>


<?php
include 'connect.php';

// trzeba pamietac aby za kazdym razem sprawdzac czy uzytkownik jest zalogowany oraz czy ma odpowiednie uprawnienia nadane
// nadane przez zmienną sesyjną do przeglądania danych rzeczy

if (isset ($_SESSION['zalogowany']) )
	{

			if ($_SESSION['typ_konta'] == 1)
			{
				echo '<div class="container">
					<div class = "admin" >
					<div class = "center">
				<form action="dodawanieWykladowcow.php" method="POST">
					<button  style = "background-color: #006600" type="submit" >Dodaj wykładowcę</button>
				</form>
				<br><br>
				<form action="edytujWykladowce.php" method="POST">
					<button  style = "background-color: #006600" type="submit" >Edytuj wykładowcę</button>
				</form>
					<br><br>
				<form action="dodawanieTestu.php" method="POST">
					<button style = "background-color: #006633" type="submit">Stwórz test</button>
				</form>
					<br><br>
				<form action="mojeTesty.php" method="POST">
					<button style = "background-color: #009900" type="submit">Moje testy</button>
				</form>
					<br><br>
				<form action="grupyStudentow.php" method="POST">
					<button style = "background-color: #009933" type="submit">Grupy studentów</button>
				</form>
					<br><br>
				<form action="historyczneOceny.php" method="POST">
					<button style = "background-color: #009933" type="submit">Historyczne oceny studenta</button>
				</form>
					<br><br>
				<form action="dodawaniePytan.php" method="POST">
					<button  style = "background-color: #339966" type="submit" >Dodaj Pytania</button>
				</form>
					<br><br>
				<form action="dodawanieStudentow.php" method="POST">
				<button  style = "background-color: #339966" type="submit" >Dodaj Studentów</button>
				</form>
					<br>
					</div>
					</div>
				</div>';

			}
			else if($_SESSION['typ_konta'] == 2)
			{
				echo '<div class="container">
					<div class = "center">

				<form action="dodawanieTestu.php" method="POST">
					<button style = "background-color: #000099" type="submit">Stwórz test</button>
				</form>
				    <br><br>
				<form action="mojeTesty.php" method="POST">
					<button style = "background-color: #0033CC" type="submit">Moje testy</button>
				</form>
					<br><br>
				<form action="grupyStudentow.php" method="POST">
					<button style = "background-color: #0066CC" type="submit">Grupy studentów</button>
				</form>
				<br><br>
				<form action="historyczneOceny.php" method="POST">
					<button style = "background-color: #0066DD" type="submit">Historyczne oceny studenta</button>
				</form>
					<br><br>
				<form action="dodawaniePytan.php" method="POST">
					<button style = "background-color: #6699FF" type="submit">Dodaj Pytania</button>
				</form>
				<br><br>
				<form action="zmianaDanychWykladowca.php" method="POST">
					<button style = "background-color: #6699FF" type="submit">Zmien swoje hasło</button>
				</form>
				<br><br>
				<form action="dodawanieStudentow.php" method="POST">
				<button  style = "background-color: #009999" type="submit" >Dodaj Studentów</button>
				</form>
					<br><br>
					</div>
					</div>';
					
					if(isset($_GET['err']))
				{
					switch ($_GET['err'])
					{
						case 1;
							echo '<div class ="center">
								<a style = "color: red; font-size: 23px;">Błędne stare hasło!</a>
								</div>';
						break;
						case 2;
							echo '<div class ="center">
								<a style = "color: green; font-size: 23px;">Haslo zostało zmienione!</a>
								</div>';
						break;			
					}
				}


			}
			else if($_SESSION['typ_konta'] == 3)
			{
				echo '<div class="container">
					<div class = "center">
				<form action="moje_testy.php" method="POST">
					<button style = "background-color: #CC9900";" type="submit">Moje testy</button>
				</form>
					<br><br>
				<form action="moje_oceny.php" method="POST">
					<button style = "background-color: #CC6600";" type="submit">Moje oceny</button>
				</form>
					<br><br>
				<form action="moja_historia.php" method="POST">
					<button style = "background-color: #CC3300";" type="submit">Historia testów</button>
				</form>
				<br><br>
				<form action="zmianaDanychStudent.php" method="POST">
					<button style = "background-color: #CC2000";" type="submit">Zmień swoje hasło</button>
				</form>
					<br><br>
					</div>
					</div>';
					
				$dane= mysqli_query($conn, "SELECT DISTINCT Imie,Nazwisko,haslo FROM uzytkownicy where uczelnia_id= '".$_SESSION['uczelnia_id']."' and nr_indeksu='".$_SESSION['nr_indeksu']."' ");
						
					 $wynik = mysqli_fetch_assoc($dane);// dopóki istnieją użytkownicy ... 
						
							$Imie=$wynik['Imie'];
							$Nazwisko=$wynik['Nazwisko'];
							$haslo=$wynik['haslo'];
							
							if($haslo == md5($Nazwisko))
							{
								echo '<div class ="center">
										<a href = "zmianaDanychStudent.php" style = "color: red; font-size: 23px;"> Koniecznie zmien hasło !</a>
									</div>';
									
							}
							
							
				if(isset($_GET['err']))
				{
					switch ($_GET['err'])
					{
						case 1;
							echo '<div class ="center">
								<a style = "color: red; font-size: 23px;">Błędne stare hasło!</a>
								</div>';
						break;
						case 2;
							echo '<div class ="center">
								<a style = "color: green; font-size: 23px;">Hasło zostało zmienione!</a>
								</div>';
						break;			
					}
				}
			

			}
	}
	else
	{
		echo '<a href="index.php">Zaloguj się  &nbsp;|  </a>';
	}
?>
