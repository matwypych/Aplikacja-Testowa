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
		<h2>Historia testów</h2>
	</div>	
</div>
</body>
<br><br><br>


<?php
include "connect.php";
$id_oceny=$_SESSION["tescik"];

$tresc=array();
$odpA=array();;
$odpB=array();
$odpC=array();
$odpD=array();
$poprawna=array();
$uzytkownika=array();
$wazne=array();


$query="select * from oceny where id='$id_oceny'";
$result=mysqli_query($conn,$query);

while ($row = mysqli_fetch_assoc($result)) {
	$id_testu=$row["id_testu"];
	$odpowiedzi=$row["odpowiedzi"];
	
}




$query3="select * from testy where test_id='$id_testu'";
$result3=mysqli_query($conn,$query3);

while ($row = mysqli_fetch_assoc($result3)) {
	$pytania=$row["lista_pytan"];

}
	$dlugosc=strlen($pytania);
	for($i=0; $i<$dlugosc; $i++) {
	if(	$pytania[$i-1] == '-' && $pytania[$i+1]=="-") {
	$wazne[]=$pytania[$i];
	}
	else if($pytania[$i-1] == '-' && $pytania[$i] !='-' && $pytania[$i+1] != '-' && $pytania[$i+2] == '-')
	{
		$temp=substr($pytania, $i,2);
		$wazne[]=$temp;
		$i++;
	}
	else if($pytania[$i-1] == '-' && $pytania[$i] !='-' && $pytania[$i+1] != '-' && $pytania[$i+2] == '-')
	{
		$temp=substr($pytania, $i,2);
		$wazne[]=$temp;
		$i++;
	}

	else if($pytania[$i-1] == '-' && $pytania[$i] !='-' && $pytania[$i+1] != '-' && $pytania[$i+2] != '-' && $pytania[$i+3] == '-')
	{
		$temp=substr($pytania, $i,3);
		$wazne[]=$temp;
		$i=$i+2;
	}
	else if($pytania[$i-1] == '-' && $pytania[$i] !='-' && $pytania[$i+1] != '-' && $pytania[$i+2] != '-' && $pytania[$i+3] != '-' && $pytania[$i+4] == '-')
	{
		$temp=substr($pytania, $i,4);
		$wazne[]=$temp;
		$i=$i+3;
	}
	}
	
	



$dlugosc=strlen($odpowiedzi);

for($i=0; $i<$dlugosc-1; $i++) {
	if($odpowiedzi[$i+1] =="-" && $odpowiedzi[$i-1] =="-") {
		
		$uzytkownika[]=$odpowiedzi[$i];
	}
	
	
}




foreach ($wazne as $value)
 {
	 $query4="select * from pytania where id='$value'";
	 $result4=mysqli_query($conn,$query4);
	 while ($row2 = mysqli_fetch_assoc($result4)) {
		$tresc[]=$row2["tresc"];
		$odpA[]=$row2["odpA"];
		$odpB[]=$row2["odpB"];
		$odpC[]=$row2["odpC"];
		$odpD[]=$row2["odpD"];
		$poprawna[]=$row2["poprawna"];
		$trudnosc[]=$row2["trudnosc"];

}
		
	}


	$i=0;

	foreach ($tresc as &$value) {

        echo'<form style="margin-left: 300px; margin-right: 300px;background-color: #EEEEEE">
<div class="center">
<br>
	 <h3><b>';echo "Pytanie nr ".($i+1);echo' </b></h3>
	<h4><u>';echo $tresc[$i];echo'</u></h4>
</div>
<div class="all-divs">
<h6 style="margin-left: auto; margin-right: auto;">
<p>';echo "A) " .$odpA[$i] ;echo '</p>
<p>';echo "B) " .$odpB[$i] ;echo '</p>
<p>';echo "C) " .$odpC[$i] ;echo '</p>
<p>';echo "D) " .$odpD[$i] ;echo '</p>
	
</h6>
</div>



';

        if($uzytkownika[$i]==$poprawna[$i]) {
            echo'<div class="center">
           <h3>';echo "Twoja odpowiedź to <b> $poprawna[$i]</b> - miałeś rację!"; '</h3>
</div>
        ';
        }
        else if($uzytkownika[$i]=="N") {
            echo'<div class="center">
            <h3>';echo "Nie udzielono odpowiedzi na to pytanie.";'</h3>
</div>
        ';
        }
        else {
            echo'<div class="center">
           <h3>';echo "Twoja odpowiedź to <b>$uzytkownika[$i]</b> , niestety poprawna odpowiedź to <b>$poprawna[$i]</b>" . "<br>";
        }
        echo "<br>" . "<br>";

        $i++;

    }


?>
<br>
</body>
<html>
<div class="center" >
<form action="panel.php" method="post">
    <button class = "button" style = "background-color: #FF9933"  type="submit" name="Powrot do panelu" id="koniec" value="Powrot"><b>Powrót</b></button>

</form>
</div>
</html>
