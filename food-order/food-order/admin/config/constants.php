<?php

//Session Start
session_start();
//Create Constants to store non repeatitve values.
define('SITEURL','http://localhost/food-order/');
define('LOCALHOST','localhost');
define('DB_USERNAME','root');
define('DB_PASSWORD','');
define('DB_NAME','food-order');

$conn= mysqli_connect(LOCALHOST, DB_USERNAME, DB_PASSWORD) or die(myqli_error());//Database Connection
 $db_select=mysqli_select_db($conn, DB_NAME)or die(myqli_error());// Selecting Database
 ?>