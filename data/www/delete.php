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

$sql = "DELETE FROM rezervacija WHERE id = ?";

$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id);
$stmt->execute();

$stmt->close();
$conn->close();

header("Location: index.php");
exit;
?>