<?php

$haslo1=$_POST['haslo1ID'];
$haslo2=$_POST['haslo2ID'];
include "connect.php";
$login2=$_SESSION["login2"];
$email2=$_SESSION["email2"];


if($haslo1==$haslo2) {
	mysqli_query($conn,"UPDATE uzytkownicy SET haslo = md5('$haslo1') WHERE login ='$login2' and email='$email2'");
	
	header('Location: haslo_zmienione.php');
}
else {
	require "przypomnienie3.php";
echo '<div class ="center">
	<a style = "color: red; font-size: 23px;"> Hasła są niezgodne!</a>
     </div>';
}


?>
