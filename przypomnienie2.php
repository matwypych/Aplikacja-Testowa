<?php
include "connect.php";
$login=$_POST['loginID'];
$email=$_POST['emailID'];
$_SESSION["login2"] = $login;
$_SESSION["email2"] = $email;
$result=mysqli_query($conn,"select haslo from uzytkownicy where login='$login' and email='$email'");

if ($result = mysqli_num_rows($result) > 0) {
require "przypomnienie3.php";

} else {
   
	require "przypomnienie.php";
	echo '<div class ="center">
		<a style = "color: red; font-size: 23px;"> Nie ma takiego konta!</a>
		</div>';
}


    



?>
