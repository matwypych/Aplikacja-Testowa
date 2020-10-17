<?php
$query="select * from testy where test_id='$id_test'";
$result=mysqli_query($conn,$query);
	while ($row = mysqli_fetch_assoc($result)) {
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
	?>