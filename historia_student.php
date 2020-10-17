<!DOCTYPE html>
<html>
<head>
<title>testownik - historyczne oceny</title>
<meta charset="utf-8" name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href= "Style.css" type="text/css"/>
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
		<form action="panel.php" method="POST">
			<button class = "button" type="submit" style = "background-color: #008CBA; padding: 10px 15px; width: 10%; font-size: 15px; color: black; font-size: 17px;" type="submit" ><i class="material-icons">menu</i> Menu</button>
		</form>	


		<form action="wylogowanie.php" method="POST">
			<button class = "button" type="submit" style = "background-color: #AAAAAA; padding: 10px 15px; width: 10%; font-size: 15px; color: black; font-size: 17px;" type="submit" > <i class="material-icons">power_settings_new</i>Wyloguj</button>
		</form>
	</div>




<?php
include 'connect.php';




if (isset ($_SESSION['zalogowany']) )
	{
		
			if ($_SESSION['typ_konta'] == 1)
			{
				echo '	
	<div class ="center">
	<div style="margin-left: auto; margin-right: auto; background-color: #006600" class = "title">
		<h2>Oceny studenta</h2>
	</div>	
</div>';

				if(isset($_POST['sprawdzanie']))	// jesli kliknelismy dodaj wykladowce to
				{
					
					
					$Id = $_POST['idPost1'];
					$Imie = $_POST['imiePost1'];
					$Nazwisko = $_POST['nazwiskoPost1'];
					
						$result=mysqli_query($conn,"select testy.nazwa_testu, oceny.id_testu, oceny.ocena from testy, oceny where test_id=id_testu and oceny.id_studenta='$Id'");

							echo'<div class ="center">
												<br><br><br>
												<table style = "border-color:#006600;">
												<tr>
												<th>Nazwa testu</th>
												<th>Id testu</th>
												<th>Ocena</th>
												</tr>
												</div>
												';
												
							while ($row = mysqli_fetch_assoc($result)) 
							{
								$zmienna1=$row["nazwa_testu"];
								$zmienna2=$row["id_testu"];
								$zmienna3=$row["ocena"];
								echo'
														<div class ="center">
															<tr>
																<td>'; echo $zmienna1; echo '</td>
																<td>'; echo $zmienna2; echo '</td>
																<td>'; echo $zmienna3; echo '</td>
															</tr>
															</div>										
																			
														';
								}
							echo '<div class ="center">
												</table>
														</div>
														<br><br>';
														
														echo '<html>
									<br><br>
									<div class = "center">
									<form action="historyczneOceny.php" method="post">

									  <button class = "button" name="Powrot do panelu" id="Powrot" value="Powrot" type="submit" style = "background-color: #006600; padding: 10px 15px; width: 10%; font-size: 15px; color: black; font-size: 17px;" >Powrót</button>
									</form>
									</div>
									</html>';

						
				}
			
			}
			if ($_SESSION['typ_konta'] == 2)
			{
				echo '	
	<div class ="center">
	<div style="margin-left: auto; margin-right: auto; background-color: blue" class = "title">
		<h2>Oceny studenta</h2>
	</div>	
</div>';
				
				if(isset($_POST['sprawdzanie']))	// jesli kliknelismy dodaj wykladowce to
				{
					
					
					$Id = $_POST['idPost1'];
					$Imie = $_POST['imiePost1'];
					$Nazwisko = $_POST['nazwiskoPost1'];
					
						$result=mysqli_query($conn,"select testy.nazwa_testu, oceny.id_testu, oceny.ocena from testy, oceny where test_id=id_testu and oceny.id_studenta='$Id'");

							echo'<div class ="center">
												<br><br><br>
												<table style = "border-color:blue;">
												<tr>
												<th>Nazwa testu</th>
												<th>Id testu</th>
												<th>Ocena</th>
												</tr>
												</div>
												';
												
							while ($row = mysqli_fetch_assoc($result)) 
							{
								$zmienna1=$row["nazwa_testu"];
								$zmienna2=$row["id_testu"];
								$zmienna3=$row["ocena"];
								echo'
														<div class ="center">
															<tr>
																<td>'; echo $zmienna1; echo '</td>
																<td>'; echo $zmienna2; echo '</td>
																<td>'; echo $zmienna3; echo '</td>
															</tr>
															</div>										
																			
														';
								}
							echo '<div class ="center">
												</table>
														</div>
														<br><br>';

				
					echo '<html>
									<br><br>
									<div class = "center">
									<form action="historyczneOceny.php" method="post">

									  <button class = "button" name="Powrot do panelu" id="Powrot" value="Powrot" type="submit" style = "background-color: #blue; padding: 10px 15px; width: 10%; font-size: 15px; color: black; font-size: 17px;" >Powrót</button>
									</form>
									</div>
									</html>';
				
				}
			
			}
	}
					

?>
