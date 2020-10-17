<!DOCTYPE html>
<html>
<head>
<title>testownik - student</title>
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

	<div class = "wyloguj">
	<br><br>
		<form action="panel.php" method="POST">
			<button class = "button" type="submit" style = "background-color: #008CBA; padding: 10px 15px; width: 10%; font-size: 15px; color: black; font-size: 17px;" type="submit" ><i class="material-icons">menu</i> Menu</button>
		</form>	


		<form action="wylogowanie.php" method="POST">
			<button class = "button" type="submit" style = "background-color: #AAAAAA; padding: 10px 15px; width: 10%; font-size: 15px; color: black; font-size: 17px;" type="submit" > <i class="material-icons">power_settings_new</i>Wyloguj</button>
		</form>
	</div>
	
	<div class ="center">
	<div style="margin-left: auto; margin-right: auto; background-color: #FF9933" class = "title">		
		<h2>Historia moich testów</h2>
	</div>	
</div>

<br><br>

<?php
include "connect.php";
$conn=$_SESSION["con"];
$id=$_SESSION["id"];
$query="select oceny.id, testy.nazwa_testu from oceny, testy where oceny.id_testu=testy.test_id and oceny.id_studenta='$id'";
$ile_reksow=0;
$result=mysqli_query($conn,$query);

echo'<div class ="center">
						<table style = "border-color:#FF9933;">
						<tr>
						<th>Nazwa testu</th>
						<th>Id testu</th>
						</tr>
						</div>
						';
	while ($row = mysqli_fetch_assoc($result)) {
		$zmienna1=$row["nazwa_testu"];
		$zmienna2=$row["id"];

        echo'
							
								
								<div class ="center">
									<tr>
										<td>'; echo $zmienna1; echo '</td>
										<td>'; echo $zmienna2; echo '</td>
									</tr>
									</div>
											<br>		
								';
$ile_reksow++;	
}
echo '<div class ="center">
						</table>
								</div>';
if($ile_reksow==0) {
header('Location: brak_testow.php');
}


function konczymy() {
	global $conn;
	$efekt=$_POST["tescik"];
	$que=mysqli_query($conn,"select * from oceny where id='$efekt'");
	if($que && mysqli_num_rows($que)>0) {
		$_SESSION["tescik"]=$_POST["tescik"];
		 header('Location: historia_testow.php');
	}
	else  {
		echo "<script>alert('Wpisz poprawne id!')</script>;";
	}

	
}

if(array_key_exists('koniec',$_POST)){
   konczymy();
}

?>

<!doctype html>

<html lang="en">
<head>
  <meta charset="utf-8">

  <title>The HTML5 Herald</title>
  <meta name="description" content="The HTML5 Herald">
  <meta name="author" content="SitePoint">


</head>

<body>
<br><br>					 
	<div class ="center">
<form action="" method="post">
    <h3 style="margin-left: 200px; margin-right: 200px; font-weight: bold; background-color: #EEEEEE">Podaj id testu, ktorego historię chcesz zobaczyć</h3><br>

  <input style ="width: 10%" type="text" id="tescik" name="tescik"><br><br>
   <button class = "button" style = "background-color: #FF9933" type="submit" name="koniec" id="koniec" value="koniec">Dalej</button>
</form>
      </div>

</body>
</html>
<?php
$_SESSION["odpNR"]=0;
$_SESSION["uzytkownika"]=array();
	
	

?>
