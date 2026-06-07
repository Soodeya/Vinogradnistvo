<?php
$servername = "podatkovna-baza";
$username = "root";
$password = "superVarnoGeslo";
$dbname = "vinogradnistvo";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Napaka pri povezavi z bazo.");
}

$conn->set_charset("utf8mb4");

$id = $_GET["id"];

// Če je obrazec poslan, posodobimo restavracijo
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $ime = $_POST["ime"];
    $telefon = $_POST["telefon"];
    $email = $_POST["email"];
    $sporocilo = $_POST["sporocilo"];


    $sql = "UPDATE stranka
            SET 
                ime = ?,
                telefon = ?,
                email = ?,
                sporocilo = ?,
            WHERE id = ?";

    $stmt = $conn->prepare($sql);

    $stmt->bind_param(
        "ssss",
        $ime,
        $telefon,
        $email,
        $sporocilo,
    );

    $stmt->execute();

    $stmt->close();
    $conn->close();

    header("Location: index.php");
    exit;
}

// Preberemo podatke obstoječe restavracije
$sqlRestavracija = "SELECT *
                    FROM restavracija
                    WHERE id = ?";

$stmtRestavracija = $conn->prepare($sqlRestavracija);
$stmtRestavracija->bind_param("i", $id);
$stmtRestavracija->execute();

$resultRestavracija = $stmtRestavracija->get_result();
$restavracija = $resultRestavracija->fetch_assoc();

$stmtRestavracija->close();
?>