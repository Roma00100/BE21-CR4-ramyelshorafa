<?php 
$hostname = "127.0.0.1";  
$username = "root";  
$password = "";  
$dbname = "crud_example";  

$connect = new mysqli($hostname, $username, $password, $dbname);  

if(!$connect) {
     die ("Connection failed ") ;
     }