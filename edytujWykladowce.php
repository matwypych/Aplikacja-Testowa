<!DOCTYPE html>
<html>
<head>
<title>testownik - dodaj wykładowcę</title>
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
<!-- pomoc-koniec -->
<!-- wyloguj -->

<br><br>		      
<div class = "wyloguj">

		<form action="panel.php" method="POST">
			<button class = "button" type="submit" style = "background-color: #008CBA; padding: 10px 15px; width: 10%; font-size: 15px; color: black; font-size: 17px;" type="submit" ><i class="material-icons">menu</i> Menu</button>
		</form>	


		<form action="wylogowanie.php" method="POST">
			<button class = "button" type="submit" style = "background-color: #AAAAAA; padding: 10px 15px; width: 10%; font-size: 15px; color: black; font-size: 17px;" type="submit" > <i class="material-icons">power_settings_new</i>Wyloguj</button>
		</form>
</div>

<!-- wyloguj-koniec -->

<div class ="center">
	<div style="margin-left: auto; margin-right: auto;" class = "title">
		
		<h2>Edytuj wykładowcę</h2>
	</div>	
</div>
<br><br>
<div class ="center">
	<h2>Lista Wykładowców</h2>

</div>


<?php
include 'connect.php';


if (isset ($_SESSION['zalogowany']) )
	{
		
			if ($_SESSION['typ_konta'] == 1)
			{
			// pokaz wszystkich wykladowcow z uczelni ktorej jest admin 
					
					
					
					$dane= mysqli_query($conn, "SELECT DISTINCT Imie,Nazwisko,email,grupa_id,id FROM uzytkownicy where uczelnia_id= '".$_SESSION['uczelnia_id']."' and typ_konta=2 ");    

							
					while ($wynik = mysqli_fetch_assoc($dane)) // dopóki istnieją użytkownicy ... 
						{  
						
							$Imie=$wynik['Imie'];
							$Nazwisko=$wynik['Nazwisko'];
							$email=$wynik['email'];
							$GrupaId=$wynik['grupa_id'];
							$id=$wynik['id'];

							echo '
							<form action="edytujWyklad.php" method="POST">
								<div class="container">
						
									<div class="center">
									<input style ="width: 5%"  type="text" name="idPost1" placeholder="nr." value="'; echo $id; echo '"required>
									<input style ="width: 20%"  type="text" name="imiePost1" placeholder="Imię" value="'; echo $Imie; echo '"required>
									<input style ="width: 20%"  type="text" name="nazwiskoPost1" placeholder="Nazwisko" value="' ; echo $Nazwisko; echo '" required>
									<input style ="width: 30%"  type="text" name="emailPost1" placeholder="E-mail" value="' ; echo $email; echo '" required>
									<input style ="width: 10%"  type="text" name="grupaIdPost1" placeholder="grupa" value="' ; echo $GrupaId; echo '">
									<button type="submit" id = "edytowanie" name="edytowanie" style = "background-color: green; width: 12%" type="submit"> Edytuj</button>
									</div>
								</div>
							</form>';
						
					
				
						}

				
			}
	}
					

?>
