<?php 
require_once 'connect_file/connect.php';
$id = $_GET['id'];
$ref = $_POST["reference"];
$type = $_POST["type"];
$name = $_POST["name"];
$desc = $_POST["desc"];
$owner = $_POST["owner"];
$reference = $_POST['refs'];
$date = date('d/m/Y');

$insert_ticket = "INSERT INTO `tickets`(`titre`, `date`, `details`, `client_id`, `owner`, `reference`) VALUES (:name, :date, :desc, :id, :owner, :reference)";
$stmt = $pdo->prepare($insert_ticket);
$stmt->bindValue(':id', $id, PDO::PARAM_INT);
$stmt->bindValue(':name', $name, PDO::PARAM_STR);
$stmt->bindValue(':date', $date, PDO::PARAM_INT);
$stmt->bindValue(':desc', $desc, PDO::PARAM_STR);
$stmt->bindValue(':owner', $owner, PDO::PARAM_STR);
$stmt->bindValue(':reference', $reference, PDO::PARAM_STR);
$stmt->execute();

header('Location: /client_details.php?id='.$id);