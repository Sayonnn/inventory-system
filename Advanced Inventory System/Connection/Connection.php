<?php
$DBHOST = "localhost";
$DBUSER = "root";
$DBPASS = "!Sayon19!";
$DBNAME = "inventory_system";
$Opencon = new mysqli($DBHOST,$DBUSER,$DBPASS,$DBNAME);

if ($Opencon->connect_error) {
   die("Connection Error". $Opencon->connect_error);
}