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
	
	</form>
	
	<div class="center">
        <br><br><br><br>
	<form action="index.php" method="POST">
	<h2> Hasło zostało zmienione, naciśnij przycisk, aby sie zalogować. </h2><br>
	<button class = "button"  type="submit" style = "width: 11%;font-weight: bold; type="submit" >Powrót </button>
	</form>
	</div>
</div>



