<?php
include 'connect.php';

//linie do debugowania pokazuja bledy mysqli
ini_set('display_errors',1); 
error_reporting(E_ALL);

if(isset ($_SESSION['zalogowany']))
{
    
	if(isset($_POST['dodawanieStudentow']))
	{
        
        //$sciezkaDoPliku  = $_POST['sciezkaDoPlikuPOST'];
        $grupaId = $_POST['grupaIdPOST'];

        
        if(!file_exists($_FILES['sciezkaDoPlikuPOST']['tmp_name']))
        {
            echo '<div class ="center">
			<b style = "color: red; font-size: 23px;"> Nie ma takiego pliku </b>
		</div>';
        }
        else
        {   
            $plik = fopen($_FILES['sciezkaDoPlikuPOST']['tmp_name'], "r");

            $imie;
            $nazwisko;
            


            $linia = fgets($plik);
            
            while(!feof($plik))
            {
                
                $linia = fgets($plik);
                if(!empty(trim($linia)))
                {
                    $linia = str_replace('"',"",$linia);


                    $pytanie = explode(";",$linia);
                
                    $email = "$pytanie[1].$pytanie[2]@testownik.uni.pl";

                    
                    
                    //sprawdzenie czy jest jakies pole puste
                    $emptyFlag = false;
                    for ($i=0; $i <5 ; $i++) { 
                        if(empty($pytanie[$i]))
                        {
                            $emptyFlag = true;
                        }
                    }


                    if($emptyFlag == false && is_numeric($pytanie[3]) && count($pytanie) == 5)
                    {
                        //sprawdzenie przed dodowaniem duplikatow
                        $checkquery = mysqli_query($conn, "SELECT id FROM uzytkownicy WHERE imie='$pytanie[1]' AND nazwisko='$pytanie[2]' AND 
                        uczelnia_id='$_SESSION[uczelnia_id]' AND nr_indeksu='$pytanie[3]'");

                        //echo $conn->error;

                        if(mysqli_num_rows($checkquery) == 0) 
                        {
                            $dodanie = mysqli_query($conn, "INSERT INTO uzytkownicy (id, login, haslo, typ_konta, imie, nazwisko, email, uczelnia_id, nr_indeksu, grupa_id) 
                            VALUES (NULL, '$email',   '".md5($pytanie[2])."', 3, '$pytanie[1]' , '$pytanie[2]', '$email', '$_SESSION[uczelnia_id]', '$pytanie[3]','$grupaId')");//TODO
                    
                            if($dodanie)
                            {
                                echo '<div class ="center">
                                <b style = " font-size: 23px;"> Dodano studenta do bazy </b>
                                 </div>';
                                 header("Location: dodawanieStudentow.php?err=1");
                            }
                            else
                            {
                                echo $conn->error;
                            }
                        } 
                        else 
                        {
                            echo "Student istnieje w bazie<br>";
                            header("Location: dodawanieStudentow.php?err=2");
                        }



                          
                    }
                    else
                    {
                        echo "bledne dodanie studenta proszę sprawdzić format pliku<br>";
                        header("Location: dodawanieStudentow.php?err=2");
                    }
                    
                    
                }
                
        
            }
			
			
			
			
        }

    }
}


?>
