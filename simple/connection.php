<?php

$dbhost = "localhost";
$dbuser = "braden";
$dbpass = "admin123";
$dbname = "tcabs663_tcabs";

if(!$con = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname))
{

	die("failed to connect!");
}
