<?php

$mysqli = new mysqli('localhost', 'a1001239_user', 'buddl0J@', 'a1001239_location')
or die(mysqli_error($mysqli));
$mysqli->connect('localhost', 'a1001239_user', 'buddl0J@', 'a1001239_location','3306');

if(isset($_POST['Name']))
{
    $Name = $_POST['Name'];
    $Location = $_POST['Location'];
    $sql = "INSERT INTO `data` (`Name`, `Location`) VALUES ('$Name', '$Location')";
    $mysqli->query($sql) or die($mysqli->error);

    header("location: index.php");
}

//Select data from database
$result = $mysqli->query("select * from data") or die($mysqli->error);

//Delete data from database
if(isset($_GET['delete'])) 
{
    $ID = $_GET['delete'];
    $mysqli->query("delete from data where ID=$ID") or die($mysql->error);

    header("location: index.php");
}

//Redirect back to index.php


?>