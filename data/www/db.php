<?php

$servername = "podatkovna-baza";
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


if($_SERVER ["REQUEST_METHOD"] === "POST") {
 
$ime = $_POST["ime"];
$telefon = $_POST["telefon"];
$email = $_POST["email"];
$sporocilo = $_POST["sporocilo"];

$sql = "INSERT INTO stranka (ime, telefon, email, sporocilo) VALUES (:ime, :telefon, :email, :sporocilo)";

$stmt = $conn->prepare($sql);
$stmt->execute([
    ":ime" => $ime,
    ":telefon" => $telefon,
    ":email" => $email,
    ":sporocilo" => $sporocilo
]);


echo "Podatki so bili uspešno poslani";
//header("Location: index.php");


//če ne dela to zbriši, če ne prikaže na strani
} else {
    echo "ni bilo ok";
}

?>


