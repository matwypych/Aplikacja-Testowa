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
	<button style = "background-color: #AAAAAA; padding: 10px 15px; width: 10%; font-size: 15px; color: black" type="submit" >Wyloguj</button>
	</form>
</div>

<!-- wyloguj-koniec -->


								

<?php
include 'connect.php';


if (isset ($_SESSION['zalogowany']) )
	{
	
			
			if ($_SESSION['typ_konta'] == 1)
			{		
					echo '	<div class ="center">
								<div style="margin-left: auto; margin-right: auto;" class = "title">		
									<h2>Grupy studentów</h2>
								</div>	
							</div>
						<br><br>';
						
					$dane = mysqli_query($conn, "SELECT DISTINCT Imie,Nazwisko,nr_indeksu,grupa_id FROM uzytkownicy where uczelnia_id= '".$_SESSION['uczelnia_id']."' and typ_konta=3 ");    
					
					echo'<div class ="center">
						<table >
						<tr>
						<th>Imię</th>
						<th>Nazwisko</th>
						<th>Nr indeksu</th>
						<th>Grupa</th>
						</tr>
						</div>
						';
						
					while ($wynik = mysqli_fetch_assoc($dane)) // dopóki istnieją użytkownicy ... 
						{  
							$Imie=$wynik['Imie'];
							$Nazwisko=$wynik['Nazwisko'];
							$Nr_indeksu=$wynik['nr_indeksu'];
							$grupy=$wynik['grupa_id'];
							
							echo'
							<div class ="center">
								
									<tr>
										<td>'; echo $Imie; echo '</td>
										<td>'; echo $Nazwisko; echo '</td>
										<td>'; echo $Nr_indeksu; echo '</td>
										<td>'; echo $grupy; echo '</td>
									</tr>
								</div>
													
								';
				
						}
						echo '<div class ="center">
						</table>
								</div>';
			
			}
			else if ($_SESSION['typ_konta'] == 2)
			{
				echo '	<div class ="center">
								<div style="margin-left: auto; margin-right: auto; background-color: #0066CC" class = "title">		
									<h2>Grupy studentów</h2>
								</div>	
							</div>
						<br><br>';
				$dane = mysqli_query($conn, "SELECT DISTINCT Imie,Nazwisko,nr_indeksu,grupa_id FROM uzytkownicy where uczelnia_id= '".$_SESSION['uczelnia_id']."' and typ_konta=3 and grupa_id='".$_SESSION['grupa_id']."' ");   

					echo'<div class ="center">
						<table style = "border-color:#0066CC;">
						<tr>
						<th>Imię</th>
						<th>Nazwisko</th>
						<th>Nr indeksu</th>
						<th>grupy</th>
						</tr>
						</div>
						';		
						
				while ($wynik = mysqli_fetch_assoc($dane)) // dopóki istnieją użytkownicy ... 
						{  
							$Imie=$wynik['Imie'];
							$Nazwisko=$wynik['Nazwisko'];
							$Nr_indeksu=$wynik['nr_indeksu'];
							$grupy=$wynik['grupa_id'];
							
							echo'
							<div class ="center">
								
									<tr>
										<td>'; echo $Imie; echo '</td>
										<td>'; echo $Nazwisko; echo '</td>
										<td>'; echo $Nr_indeksu; echo '</td>
										<td>'; echo $grupy; echo '</td>
									</tr>
								</div>
													
								';
				
						}
						echo '<div class ="center">
						</table>
								</div>';
				
			}
			
	}
					

?>
