<?php 
$hostname = "127.0.0.1";  
$username = "root";  
$password = "";  
$dbname = "BE21_CR4_RamyElshorafa_BigLibrary";  

$connect = new mysqli($hostname, $username, $password, $dbname);  

if(!$connect) {
     die ("Connection failed ") ;
     }