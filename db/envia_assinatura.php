<?php
session_start();
if (!$_SESSION['usuario']) {
    header('Location: ./login.html');
    exit();
}

$id = $_POST['id'];
$sql = "UPDATE  check_teste SET imgBase64=:imgBase64 WHERE id=:id";


$conn = new PDO('mysql:host=localhost;dbname=checkgg', "root", "");
$stmt = $conn->prepare($sql);
$stmt->bindValue(":imgBase64", $_POST["imgBase64"]);
$stmt->bindValue(":id", $_POST["id"]);
$stmt->execute();
$affected_rows = $stmt->rowCount();
echo $affected_rows;
?>