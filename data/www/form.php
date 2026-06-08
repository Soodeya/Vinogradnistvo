<?php

include 'db.php';

$ime = $_POST['ime'];
$email = $_POST['email'];
$telefon = $_POST['telefon'];
$sporocilo = $_POST['sporocilo'];

$sql = "INSERT INTO stranka
(ime, email, telefon)

VALUES
('$ime', '$email', '$telefon', '$sporocilo')";

$conn->exec($sql);

$id_stranka = $conn->lastInsertId();

$sql2 = "INSERT INTO rezervacija
(sporocilo, id_stranka)

VALUES
('$sporocilo', '$id_stranka')";

$conn->exec($sql2);

header("Location: kontakt.php?success=1");
exit();

?>