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



<?php
include 'connect.php';

//linie do debugowania pokazuja bledy mysqli
//ini_set('display_errors',1); 
//error_reporting(E_ALL);

if(isset ($_SESSION['zalogowany']))
{
	if(isset($_POST['dodawaniePytan']))
	{
        // $sciezkaDoPliku  = "testowePytania.txt";



        // if(!file_exists($sciezkaDoPliku))
        // {
        //     echo "nie ma takiego pliku";
        // }
        // else
        // {   
            $plik = fopen($_FILES['sciezkaDoPlikuPOST']['tmp_name'], "r");

            $wykladowca_id;
            $uczelnia_id;
            $grupa_id;
            $tresc;
            $odpA;
            $odpB;
            $odpC;
            $odpD;

            while(!feof($plik))
            {
                $linia = fgets($plik);
                if(!empty(trim($linia)))
                {
                   
                    $pytanie = explode("-",$linia);
                    if(count($pytanie) == 10)
                    {
                        $emptyflag = false;
                        for ($i=0; $i < 10 ; $i++) { 
                            if(empty($pytanie[$i]))
                            {
                                $emptyflag = true;
                            }
                        }

                        if(!$emptyflag)
                        {
                            
                            if(is_numeric($pytanie[0]) && is_numeric($pytanie[1]) && is_numeric($pytanie[2]) && is_numeric(trim($pytanie[9])))
                            {
                                $dodanie = mysqli_query($conn, "INSERT INTO pytania (id, wykladowca_id, uczelnia_id, grupa_id, tresc, odpA, odpB, odpC, odpD, poprawna, trudnosc) 
                                VALUES (NULL, '$pytanie[0]', '$pytanie[1]', '$pytanie[2]', '$pytanie[3]' , '$pytanie[4]', '$pytanie[5]', '$pytanie[6]',
                                '$pytanie[7]', '$pytanie[8]', '$pytanie[9]')");
			
		                        if($dodanie)
		                        {           
			                    echo '<div class ="center">
                                        <div style="margin-left: auto; margin-right: auto; background-color: white;" class = "title">
					                          <b style = "color: green; font-size: 23px; font-weight: bold;"> Dodano pytanie do bazy</b>
				                        </div>
				                        <br><br>
				                        <form action="panel.php" method="POST"> 
				                        <button class = "button"  type="submit" style = "width: 11%;font-weight: bold; type="submit" >Powrót </button>
				                        </form>
				                 </div>
				                <br>
				                ';
		                        }
                                else
                                {
			                    echo $conn->error;
		                        }      
                            }
                            else
                            {
                                echo ' <br><div class ="center">
                                    <div style="margin-left: auto; margin-right: auto; background-color: white;" class = "title">
					            <b style = "color: red; font-size: 23px; font-weight: bold;"> Sprawdź format pliku! Nie wszystkie z koniecznych wartości są numeryczne.</b>
					             </div>
					             <br><br>
					             <form action="panel.php" method="POST">
					             <button class = "button"  type="submit" style = "width: 11%;font-weight: bold; type="submit" >Powrót </button>
					             </form>
				                </div>';
                                echo "<br>
<br>
				                ";
                            }
                        }
                        else
                        {
                            echo ' <br><div class ="center">
                                         <div style="margin-left: auto; margin-right: auto; background-color: white;" class = "title">
					            <b style = "color: red; font-size: 23px; font-weight: bold;"> Sprawdź format pliku! Każde pole musi zostać wypełnione.</b>
					            </div>
				                
				                <br><br>	
				                <form action="panel.php" method="POST">		                
				                <button class = "button"  type="submit" style = "width: 11%;font-weight: bold; type="submit" >Powrót </button>
				                </form>
				                </div>';
                            echo "<br>";
                        }
                        
                    }
                    else
                    {
                        echo ' <br><div class ="center">
                                    <div style="margin-left: auto; margin-right: auto; background-color: white;" class = "title">
					            <b style = "color: red; font-size: 23px; font-weight: bold; background-color: white;"> Sprawdź format pliku! Za mało pól.</b>
					            </div>
					            <br><br>
					            <form action="panel.php" method="POST">
					            <button class = "button"  type="submit" style = "width: 11%;font-weight: bold; type="submit" >Powrót </button>
					            </form>
				                </div>
				                <br>
				                
				                ';
                    }

                    
                    
                }
                
            }
        //}

    }
}


?>
