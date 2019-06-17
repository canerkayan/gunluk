<?php
//DB details
$dbHost = 'localhost';
$dbUsername = 'teknogoz_gunluk';
$dbPassword = 'R@6(HbZv9,{N';
$dbName = 'teknogoz_gunluk';

//Create connection and select DB
$db = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);

if ($db->connect_error) {
    die("Unable to connect database: " . $db->connect_error);
}

date_default_timezone_set('Europe/Istanbul');