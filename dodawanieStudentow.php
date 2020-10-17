<!DOCTYPE html>
<html>
<head>
<title>testownik - administrator</title>
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
      <a>Upewnij się, czy problem nie leży po stronie drukarki</a><br><br>
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
           
		   if ($_SESSION['typ_konta'] == 1 )
			{
							
					echo '
							<div class ="center">
								<div style="margin-left: auto; margin-right: auto;" class = "title">		
										<h2>Dodaj Studentów</h2>
								</div>	
							</div>
					
			        <br><br>
					<form enctype="multipart/form-data" action="dodajStudentow.php" method="POST">
						
							<div class="center">
							
								<h3 style="margin-left: 480px; margin-right: 480px; background-color: #EEEEEE; border-style: ridge; border-color: green";>Dodaj studentów z pliku z USOS!</h3>
							
							<br>
								<input style ="width: 30%"  type="text"  id= "grupaIdPOST" name="grupaIdPOST" placeholder="Id grupy do umieszczenia studentów" required>
							</div>

							<div class="center">	
								<input type="hidden" name="MAX_FILE_SIZE" value="512000" />							
								<input style ="width: 40%;margin-left:480px" type="file" id="sciezkaDoPlikuPOST" name="sciezkaDoPlikuPOST" placeholder="Sciezka do pliku"  required>
								
							</div>						  
							<br>
							<div class = "center">
								<br><br>
								<button type="submit" id = "dodawanieStudentow" name="dodawanieStudentow" style = "background-color: green; width: 12%" type="submit">Dodaj</button>
							</div>
						
					</form> ';
					
            }
		   
			if ($_SESSION['typ_konta'] == 2 )
			{
							
					echo '
							<div class ="center">
								<div style="margin-left: auto; margin-right: auto; background-color: #0066CC" class = "title">		
										<h2>Dodaj Studentów</h2>
								</div>	
							</div>
					
			        <br><br>
					<form enctype="multipart/form-data" action="dodajStudentow.php" method="POST">
						
							<div class="center">
							
								<h3 style="margin-left: 480px; margin-right: 480px; background-color: #EEEEEE; border-style: ridge; border-color: blue";>Dodaj studentów z pliku z USOS!</h3>
							
							<br>
								<input style ="width: 30%"  type="text"  id= "grupaIdPOST" name="grupaIdPOST" placeholder="Id grupy do umieszczenia studentów" required>
							</div>

							<div class="center">	
								<input type="hidden" name="MAX_FILE_SIZE" value="512000" />							
								<input style ="width: 40%;margin-left:480px" type="file" id="sciezkaDoPlikuPOST" name="sciezkaDoPlikuPOST" placeholder="Sciezka do pliku"  required>
								
							</div>						  
							<br>
							<div class = "center">
								<br><br>
								<button type="submit" id = "dodawanieStudentow" name="dodawanieStudentow" style = "background-color: #3399FF; width: 12%" type="submit">Dodaj</button>
							</div>
						
					</form> ';
					
            }
			
      if(isset($_GET['err']))
	  {
		  switch ($_GET['err'])
		{
			case 1:
				echo ' <div class ="center">
						<a style = "color: green; font-size: 23px; font-weight: bold;">Poprawnie dodano studentów, sprawdz grupy!</a>
						</div>';
				break;
			case 2:
			echo ' <div class ="center">
						<a style = "color: red; font-size: 23px; font-weight: bold;">Dodawianie studentow nie powiodło się, sprawdź format pliku!</a>
						</div>';
			break;
		}
	  }
	}
	
?>
