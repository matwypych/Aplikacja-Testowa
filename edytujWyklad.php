<?php
include 'connect.php';


if (isset ($_SESSION['zalogowany']) )
	{
		
			if ($_SESSION['typ_konta'] == 1)
			{
				if(isset($_POST['edytowanie']))	// jesli kliknelismy dodaj wykladowce to
				{
					$imie = $_POST['imiePost1'];
					$nazwisko = $_POST['nazwiskoPost1'];
					$email = $_POST['emailPost1'];
					$GrupaId = $_POST['grupaIdPost1'];
					$Id = $_POST['idPost1'];
				
					$sprawdz = '/^[a-zA-Z0-9.\-_]+@[a-zA-Z0-9\-.]+\.[a-zA-Z]{2,4}$/';
					
						if($GrupaId == 0)
						{
								mysqli_query($conn, "UPDATE `uzytkownicy` SET Imie='" . $imie . "', Nazwisko='" . $nazwisko . "', email='" . $email . "' WHERE id ='" . $Id . "'  ");
								header("Location: edytujWykladowce.php");
						}
						
						else
	
					mysqli_query($conn, "UPDATE `uzytkownicy` SET Imie='" . $imie . "', Nazwisko='" . $nazwisko . "', email='" . $email . "', grupa_id='" . $GrupaId . "' WHERE id ='" . $Id . "'  ");
					
						header("Location: edytujWykladowce.php");
								
				}
			
			}
	}
					

?>