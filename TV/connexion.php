<?php
$sname="localhost";
$unmae="root";
$password="";

$data_name="datatv";
$conn =   mysqli_connect($sname,$unmae,$password,$data_name);
if (!$conn){
    echo "connexion failed";
}
