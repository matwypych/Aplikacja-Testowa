<?php

include 'connect.php';


if (isset ($_SESSION['zalogowany']) )
	{
		
			if ($_SESSION['typ_konta'] == 1)
			{

				if(isset($_POST['dodawanie']))	// jesli kliknelismy dodaj wykladowce to
				{
					
					$imie = $_POST['imiePost'];
					$nazwisko = $_POST['nazwiskoPost'];
					$email = $_POST['emailPost'];
				
					$sprawdz = '/^[a-zA-Z0-9.\-_]+@[a-zA-Z0-9\-.]+\.[a-zA-Z]{2,4}$/';

					if(preg_match($sprawdz, $email))
					{
						$login = $imie . "." . $nazwisko;

						$check = mysqli_query($conn, "SELECT id from uzytkownicy WHERE login='$login' AND Nazwisko='$nazwisko'
						 AND email='$email' AND uczelnia_id='$_SESSION[uczelnia_id]'");

						 echo $conn->error;

						if(mysqli_num_rows($check) == 0)
						{
							mysqli_query($conn, "INSERT INTO `uzytkownicy` (`id`, `login`, `haslo`, `typ_konta`, `Imie`, `Nazwisko`, `email`, `uczelnia_id`, `nr_indeksu`, `grupa_id`) 
							VALUES (NULL, '" . $login . "', '".md5($nazwisko)."', '2', '" . $imie . "', '" . $nazwisko . "', '" . $email . "', '".$_SESSION['uczelnia_id']."', NULL, NULL);");
							header("Location: dodawanieWykladowcow.php");
							echo 'Dodano poprawnie wykladowce';
						}
						else
						{
							echo header("Location: dodawanieWykladowcow.php?err=2");
						} 
						
						
					} else header("Location: dodawanieWykladowcow.php?err=1");
				
				
				}
			}
	}



?>