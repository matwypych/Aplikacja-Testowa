<!DOCTYPE html>
<html>
<head>
    <title>testownik - wykladowca</title>
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

            <b>Nie możesz się zalogować?</b><br>
            <a>Skontaktuj się z administratorem lub wykładowcą danej placówki aby upewnić się, że zostałeś(łaś) dodany do listy.</a> <br><br>
            <b> Skontaktuj się z nami:</b><br>
            <a>tel. 22 34 70 100</a><br>
            <a>fax. 22 34 70 261</a><br>
            <a>e-mail. informacja@men.gov.pl</a><br>
            <br>
            <br>

        </div>
    </form>
</div>
<script src="pomoc.js"></script>




<?php

include 'connect.php';
?>

<form action="przypomnienie2.php" method="post">
<div class ="center">
    <div style="margin-left: auto; margin-right: auto;background-color: #99CCFF" class = "title">
    <b><h1 style="color:#0000FF">Przypominanie Hasła </h1></b>
    </div>
    <br><br>
    <h3><b>Wpisz login:</b> </h3>
    <br>
<input type="text" id="loginID" name="loginID"> <br>

    <h3><b> Wpisz email: </b></h3>	<br>
<input type="text" id="emailID" name="emailID">
    <br><br><br>


    <button type="submit" value="Dalej">Dalej</button>
        </div>
</form>
