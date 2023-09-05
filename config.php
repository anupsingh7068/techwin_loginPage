<?php 
session_start();

$servername = "localhost";
$username1 ="root";
$password = "";
$dbname = "loginform";
$conn= mysqli_connect($servername,$username1,$password,$dbname);

if(!$conn){

    die("data base is not connect".mysqli_connect_error());
}
