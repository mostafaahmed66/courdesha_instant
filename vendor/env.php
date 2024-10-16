<?php

$host =  "localhost";
$user = "root";
$password = "";
$dbName = "nise_admin_project";

try {
    $connect = mysqli_connect($host, $user, $password, $dbName);
} catch (Exception $e) {
    echo $e->getMessage();
}
