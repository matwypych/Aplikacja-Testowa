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
<script src="test.js"></script>
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
           
			if ($_SESSION['typ_konta'] == 1)
			{
			// pokaz wszystkich wykladowcow z uczelni ktorej jest admin 
					
					echo '
					
					<div class ="center">
						<div style="margin-left: auto; margin-right: auto;" class = "title">		
						<h2>Dodaj Test</h2>
						</div>	
					</div>
					<form enctype="multipart/form-data" action="dodajTest.php" method="POST">

						<div class="container">
						
						 <div class="center">						  
							<input style ="width: 30%" type="text"  id ="test0" name="czasPost" placeholder="Czas(minuty)"  required>
							
						 </div>
						<div class="center">
							<input style ="width: 30%"  type="text" id ="test1" name="liczbaPytanPost" placeholder="Liczba pytań" required>
						 </div>
						 <div class="center">
                            <input style ="width: 30%"  type="text"  id ="test2" name="nazwaTestuPost" placeholder="Nazwa testu" required>
						</div>
						<div class="center">
                            <input style ="width: 30%"  type="text"  id= "test3" name="przedmiotPost" placeholder="Nazwa przedmiotu" required>
						</div>
						<div class="center">
                            <input style ="width: 30%"  type="text"  id= "test4" name="dataKoncowaPost" placeholder="Data koncowa (dd-mm-yyyy)" required>
						</div>
						<div class="center">
                            <input style ="width: 30%"  type="text"  id ="test5" name="dostepnoscGrupPost" placeholder="Dostepnosc dla grup (-gr-gr-gr-)" required>
						</div>
						<div class="center">
                            <input style ="width: 30%"  type="text"  id ="test6" name="wykladowcaIdPost" placeholder="Id wykladowcy" required>
						 </div><br>

						 <div class="center">						  
							<h3 style="margin-left: 50px; margin-right: 50px; font-weight: bold; background-color: #EEEEEE">Format pliku:</h2>
								
							<h3 style="margin-left: 50px; margin-right: 50px;  background-color: #EEEEEE">id Wykladowcy-id uczelni-id grup-tresc-odpA-odpB-odpC-OdpD-Porawna odpowiedź(1-4)-trudnosc(1-3)</h3>
				 		</div>
						 <br>
						 
						 <div class="center">	
								<input type="hidden" name="MAX_FILE_SIZE" value="512000" />							
								<input style ="width: 40%;margin-left:480px" type="file" id="sciezkaPlikuPost" name="sciezkaPlikuPost" placeholder="Sciezka do pliku">
								
							</div>		

				<div class = "center">
				<br><br>
					<button type="submit" onclick="myFunction()" name="dodawanieTestu" style = "background-color: green; width: 12%" >Dodaj</button>
					<p id="p01"></p>
				</div>
						</div>
						
							</form>';
					
            }
            if ($_SESSION['typ_konta'] == 2)
			{
					echo '
							<div class ="center">
									<div style="margin-left: auto; margin-right: auto; background-color: #0066CC" class = "title">		
										<h2>Dodaj Test</h2>
									</div>	
							</div>
					
						<form enctype="multipart/form-data" action="dodajTest.php" method="POST">

						<div class="container">
						
						 <div class="center">						  
							<input style ="width: 30%" type="text"  id ="test0" name="czasPost" placeholder="Czas(minuty)"  required>
							
						 </div>
						<div class="center">
							<input style ="width: 30%"  type="text" id ="test1" name="liczbaPytanPost" placeholder="Liczba pytań" required>
						 </div>
						 <div class="center">
                            <input style ="width: 30%"  type="text"  id ="test2" name="nazwaTestuPost" placeholder="Nazwa testu" required>
						</div>
						<div class="center">
                            <input style ="width: 30%"  type="text"  id= "test3" name="przedmiotPost" placeholder="Nazwa przedmiotu" required>
						</div>
						<div class="center">
                            <input style ="width: 30%"  type="text"  id= "test4" name="dataKoncowaPost" placeholder="Data koncowa (dd-mm-yyyy)" required>
						</div>
						<div class="center">
                            <input style ="width: 30%"  type="text"  id ="test5" name="dostepnoscGrupPost" placeholder="Dostepnosc dla grup (gr-gr-gr)" required>
						</div>

						 <div class="center">						  
							<h3 style="margin-left: 50px; margin-right: 50px; font-weight: bold; background-color: #EEEEEE">Format pliku:</h2>
								
							<h3 style="margin-left: 50px; margin-right: 50px;  background-color: #EEEEEE">id Wykladowcy-id uczelni-id grup-tresc-odpA-odpB-odpC-OdpD-Porawna odpowiedź(1-4)-trudnosc(1-3)</h3>
				 		</div>
					 	<br>
					 
						 <div class="center">	
								<input type="hidden" name="MAX_FILE_SIZE" value="512000" />							
								<input style ="width: 40%;margin-left:480px" type="file" id="sciezkaPlikuPost" name="sciezkaPlikuPost" placeholder="Sciezka do pliku">
								
							</div>	

				<div class = "center">
				<br><br>
					<button type="submit" onclick="myFunction()" name="dodawanieTestu" style = "background-color: #3399FF; width: 12%" >Dodaj</button>
					<p id="p01"></p>
				</div>
						</div>
						
							</form>';
					
			}
	}
	if(isset($_GET['err']))
	{
		switch ($_GET['err'])
		{
			case 1;
				echo ' <div class ="center">
						<a style = "color: red; font-size: 23px;">Za mało pytań w bazie! Wybierz mniejszą ilość pytań</a>
						</div>';
				break;
			case 2;
				echo '<div class ="center">
						<a style = "color: red; font-size: 23px;"> Brak wykladowcy o podanym id w bazie!</a>
					  </div>';
				break;
			case 3;
				echo '<div class ="center">
						<a style = "color: red; font-size: 23px;">Wszystkie pola musza zostac wypelnione!</a>
					  </div>';
				break;
			case 4;
				echo '<div class ="center">
						<a style = "color: red; font-size: 23px;">Dodano test do bazy!</a>
					  </div>';
				break;
			case 5;
				echo '<div class ="center">
						<a style = "color: red; font-size: 23px;">Brak wykladowcy o podanym id w bazie!</a>
					  </div>';
				break;
			case 6;
				echo '<div class ="center">
						<a style = "color: red; font-size: 23px;">Wszystkie pola musza zostac wypelnione!</a>
					  </div>';
				break;
			case 7;
				echo '<div class ="center">
						<a style = "color: green; font-size: 23px;">Dodano poprawnie test </a>
					  </div>';
				break;
		}
	}
	
	
?>
