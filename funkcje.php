<?php
function nastepny()
{
$_SESSION["uzytkownika"][$_SESSION["odpNR"]]=$_POST["odp"];
	if(is_null($_SESSION["uzytkownika"][$_SESSION["odpNR"]])) {
	$_SESSION["uzytkownika"][$_SESSION["odpNR"]]="N";
	}
	global $ile_pytan;
   if($_SESSION["odpNR"]< $ile_pytan-1){
	$_SESSION["odpNR"]++;
   }	
	else {
   alert("To juz ostatnie pytanie!");
   }
	
	}
   
   
   
  

   

if(array_key_exists('dalej',$_POST)){
   nastepny();
}

function poprzedni()
{
if($_SESSION["odpNR"] > 0)
{
   $_SESSION["odpNR"]--;
}
else {
alert("To jest pierwsze pytanie!");
}
}

if(array_key_exists('wstecz',$_POST)){
   poprzedni();
}

function alert($message) {
      
    echo "<script>alert('$message');</script>"; 
} 



	function zakonczenie() {
		global $ile_pytan;
		if($ile_pytan-1==$_SESSION["odpNR"]){
		$_SESSION["uzytkownika"][$_SESSION["odpNR"]]=$_POST["odp"];
	$i=0;
	$wynik=0;
global $poprawna;
global $trudnosc;
$strink="";
foreach ($_SESSION["uzytkownika"] as $value)
{
	
 if($value==$poprawna[$i]) {
		$wynik+=$trudnosc[$i];
		
	}
	
	$strink.="-";
	if($value===NULL) {
	$strink.="N";
	}
	else {
	$strink.=$value;
	}
	if($i+1==count($_SESSION["uzytkownika"])) {
		$strink.="-";
	}	
	
	$i++;

}
	

$max_wynik=0;	
foreach ($trudnosc as $value2){
$max_wynik+=$value2;
}

//rocent=0;
$procent=($wynik*100)/$max_wynik;

if($procent >=50 &&  $procent<75){
$ocena=3;
}



else if($procent >=75 && $procent<90){
$ocena=4;
}

else if($procent >=90){
$ocena=5;
}

else {
$ocena=2;
}


global $id_studenta;
global $id_test;

global $conn;
echo $id_studenta;
mysqli_query($conn,"insert into oceny values (NULL,'$id_studenta','$id_test','$ocena','$strink')");
$_SESSION["koncowa"]=1;

header("Location: zadanie_wykonane.php");





}
else {
echo "<script>alert('Przejrzyj wszystkie pytania!');</script>";
}
	}
if(array_key_exists('zakoncz',$_POST)){
   zakonczenie();
}

?>