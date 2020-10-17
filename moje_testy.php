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
<br><br>
<div class = "wyloguj">

    <form action="panel.php" method="POST">
        <button class = "button" type="submit" style = "background-color: #008CBA; padding: 10px 15px; width: 10%; font-size: 15px; color: black; font-size: 17px;" type="submit" ><i class="material-icons">menu</i> Menu</button>
    </form>


    <form action="wylogowanie.php" method="POST">
        <button class = "button" type="submit" style = "background-color: #AAAAAA; padding: 10px 15px; width: 10%; font-size: 15px; color: black; font-size: 17px;" type="submit" > <i class="material-icons">power_settings_new</i>Wyloguj</button>
    </form>
</div>

<div class ="center">
    <div style="margin-left: auto; margin-right: auto; background-color: #FF9933" class = "title">
        <h2>Moje testy</h2>
    </div>
</div>


<?php
include "connect.php";
$conn=$_SESSION["con"];
$grupa=$_SESSION["grupa_id"];
$uczelniawa=$_SESSION["uczelnia_id"];
$query="select test_id, nazwa_testu from testy where dostepnosc_grup like '%-{$grupa}-%' and uczelnia_id=$uczelniawa";
$result=mysqli_query($conn,$query);
$id_stud=$_SESSION["id"];
$ile_rekordow=0;

echo'<div class ="center">
						<table style = "border-color:#FF9933;">
						<tr>
						<th>Nazwa testu</th>
						<th>Id testu</th>
						</tr>
						</div>
						';
while ($row = mysqli_fetch_assoc($result))
{
    $zmienna1=$row["nazwa_testu"];
    $zmienna2=$row["test_id"];
    $pierwszy="select id from oceny where id_studenta='$id_stud' and id_testu='$zmienna2'";
    $result_pierwszy=mysqli_query($conn,$pierwszy);
    if(mysqli_num_rows($result_pierwszy)==0){
        echo'
							
								
								<div class ="center">
									<tr>
										<td>'; echo $zmienna1; echo '</td>
										<td>'; echo $zmienna2; echo '</td>
									</tr>
									</div>
											<br>	
																
       ';

        $ile_rekordow++;
        }
    }
        echo '<div class ="center">
						</table>
								</div>';


if($ile_rekordow==0)
{header('Location: brak_testow.php');
}


function konczymy() {

    global $conn;
    $efekt=$_POST["tescik"];
    $_SESSION["tescik"]=$efekt;
    $que=mysqli_query($conn,"select * from testy where test_id='$efekt'");


    $res=mysqli_query($conn, "select * from testy where test_id=$efekt");
    while($row=mysqli_fetch_array($res))
    {
        $duration=$row["czas"];
        $uczelnia_id=$row["uczelnia_id"];
    }


    if($que && mysqli_num_rows($que)>0 && $uczelnia_id==$_SESSION["uczelnia_id"]) {

        header('Location: rozwiaz_test.php');
    }
    else  {
        echo "<script>alert('Wpisz poprawne id!')</script>";
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
<div class=" center">
    <br><br>
    <form action="" method="post">
        <h3 style="margin-left: 200px; margin-right: 200px; font-weight: bold; background-color: #EEEEEE">Podaj id testu, który chcesz wykonać</h3><br>

        <input style ="width: 10%" type="text" id="tescik" name="tescik"><br><br>
        <button style ="background-color: #FF9933" type="submit" name="koniec" id="koniec" value="koniec">Dalej</button>
    </form>
</div>


</body>
</html>
<?php
$_SESSION["koncowa"]=0;
$_SESSION["odpNR"]=0;
$_SESSION["uzytkownika"]=array();



?>
