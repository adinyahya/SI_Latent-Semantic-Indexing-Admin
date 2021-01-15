<?php
$servername = "localhost";
$username = "root";
$password = "";
$dboper = "dbsroar";


$con = new mysqli($servername, $username, $password, $dboper);
if ($con->connect_error) 
{
	die("Connect Error: " . $con->connect_error);
}
else
{
   
}

?>