<?php

$servername = "vinogradnistvo-mysql-1";
$username = "root";
$password = "superVarnoGeslo";
$dbname = "vinogradnistvo";

try {

    $conn = new PDO(
        "mysql:host=$servername;dbname=$dbname",
        $username,
        $password
    );

    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

} catch(PDOException $e) {

    die("Napaka pri povezavi: " . $e->getMessage());

}

?>