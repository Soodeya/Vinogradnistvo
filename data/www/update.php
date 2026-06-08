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
$sql = "SELECT *
                    FROM stranka
                    WHERE id = ?";

$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id);
$stmt->execute();

$result = $stmt->get_result();
$stranka = $result->fetch_assoc();

$stmt->close();
?>