<?php

include 'connect.php';

//linie do debugowania pokazuja bledy mysqli
ini_set('display_errors',1); 
error_reporting(E_ALL);

if(isset ($_SESSION['zalogowany']))
{
	if(isset($_POST['dodawanieTestu']))
	{
			
		///ZAKRES ZMIENNYCH/////
		$czas = $_POST['czasPost'];
		$liczbaPytan = $_POST['liczbaPytanPost'];
		$nazwaTestu = $_POST['nazwaTestuPost'];
		$przedmiot = $_POST['przedmiotPost'];
		$dataKoncowa = $_POST['dataKoncowaPost'];
		$dostepnoscGrup = $_POST['dostepnoscGrupPost'];

		//$sciezkaDoPliku = "testowePytania.txt";
		//////////////////////////
		// $czas = 30;
		// $liczbaPytan = 3;
		// $nazwaTestu = "przyrka";
		// $przedmiot = "przyroda";
		// $dataKoncowa = "30-03-2020";
		// $dostepnoscGrup = "2-3-4";
		
		if ($_SESSION['typ_konta'] == 1)//dodawanie testu w przypadku admina
		//if (true)
		{
			// dla admina trzeba zdefiniowac wykladowce
			//któremy przypisujemy test

			$wykladowca_id = $_POST['wykladowcaIdPost'];
			//$wykladowca_id = 4;
		}
		else 
		{
			$wykladowca_id = $_SESSION['wykladowca_id'];
		}

		//sprawdzenie czy id wykladowcy istnieje w bazie
		$daneUzytkownicy = mysqli_query($conn, "SELECT id FROM uzytkownicy WHERE typ_konta = 2");
			
			
		$result = mysqli_query($conn, "SELECT id FROM pytania where wykladowca_id= ".$wykladowca_id);
				
		$danePytania = array();
		while($row = mysqli_fetch_array($result, MYSQLI_NUM))
		{
    	$danePytania[] = $row[0];
		}

		if(!file_exists($_FILES['sciezkaPlikuPost']['tmp_name']))
		{
			//sprawdzenie liczby pytan
			if($liczbaPytan > count($danePytania))
			{
				 header("Location: dodawanieTestu.php?err=1");
			}
			else if(mysqli_num_rows($daneUzytkownicy)<1)
			{
				 header("Location: dodawanieTestu.php?err=2");
			}				
			//sprawdzenie czy pola sa wypelnione
			else if(empty($czas) || empty($nazwaTestu) || empty($przedmiot) || empty($dataKoncowa) || empty($dostepnoscGrup))
			{					
				 header("Location: dodawanieTestu.php?err=3");
			}
			else
			{
				
				$wylosowanePytania = array_rand($danePytania, $liczbaPytan);//losowanie pytan do tablicy
				$listaPytan = "-";
				for($i = 0; $i < count($wylosowanePytania); $i++)
				{
					$temp = $wylosowanePytania[$i];
					$listaPytan .= "$danePytania[$temp]-";//lista pytan w stringu oddzielonych "-"
				}
				$uczelniaId = $_SESSION['uczelnia_id'];
				$dodanie = mysqli_query($conn, "INSERT INTO testy (test_id, wykladowca_id, czas, liczba_pytan, lista_pytan, nazwa_testu, przedmiot, data_koncowa, dostepnosc_grup, uczelnia_id) 
				VALUES (NULL, $wykladowca_id, '$czas', '$liczbaPytan', '$listaPytan' , '$nazwaTestu', '$przedmiot', '$dataKoncowa', '$dostepnoscGrup', '$uczelniaId')");

				

				
				
				 header("Location: dodawanieTestu.php?err=4");
			
			
			}
		}
		else
		{
			if(mysqli_num_rows($daneUzytkownicy)<1)
			{
				 header("Location: dodawanieTestu.php?err=5");
			}				
			//sprawdzenie czy pola sa wypelnione
			else if(empty($czas) || empty($nazwaTestu) || empty($przedmiot) || empty($dataKoncowa) || empty($dostepnoscGrup))
			{					
				 header("Location: dodawanieTestu.php?err=6");
			}
			else
			{
				
				//if(!file_exists($sciezkaDoPliku))
        		//{
            	//	echo "nie ma takiego pliku";
        		//}
        		//else
        		//{   
					//$plik = fopen($sciezkaDoPliku, "r");
					$plik = fopen($_FILES['sciezkaPlikuPost']['tmp_name'], "r");

            		$wykladowca_id;
            		$uczelnia_id;
            		$grupa_id;
            		$tresc;
            		$odpA;
            		$odpB;
            		$odpC;
					$odpD;
					$poprawna;
					$trudnosc;
					
					$liczbaPytan = 0;
					$listaPytan = "-";
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
											//echo "Dodano pytanie do bazy danych";
							

											$top = mysqli_query($conn, "SELECT id FROM pytania ORDER BY id DESC LIMIT 1");
											
						
											while($row = mysqli_fetch_array($top, MYSQLI_NUM))
											{
												$danePytania = $row[0];
												$listaPytan .= "$danePytania-";//lista pytan w stringu oddzielonych "-"
												$liczbaPytan++;
											}	


		        						}
                						else
                						{
			        						echo $conn->error;
		        						}   
									}
									else
                            		{
                                		echo "sprawdz format pliku, ktoras z koniecznych wartosci nie jest numeryczna<br>";
                            		}
								}
								else
                        		{
                            		echo "sprawdz forma pliku kaze pole musi zostac wypelnione<br>";
                        		}
							}
							else
                    		{
                        		echo "sprawdz format pliku, za malo pol<br>";
                    		}

        
                			
						}
						
                		
        
					}
					$uczelniaId = $_SESSION['uczelnia_id'];
					$dodanie = mysqli_query($conn, "INSERT INTO testy (test_id, wykladowca_id, czas, liczba_pytan, lista_pytan, nazwa_testu, przedmiot, data_koncowa, dostepnosc_grup, uczelnia_id) 
					VALUES (NULL, $wykladowca_id, '$czas', '$liczbaPytan', '$listaPytan' , '$nazwaTestu', '$przedmiot', '$dataKoncowa', '$dostepnoscGrup', '$uczelniaId')");
					header("Location: dodawanieTestu.php?err=7");
				//}
			}
			
			
			
		}

		
	
	}
}
?>	
	