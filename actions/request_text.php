<?php
require_once '../Database.php';
$db = new Database();

$id = $_POST['id'];


$sql = "SELECT request_text FROM requests WHERE id = :id";
$stmt = $db->pdo->prepare($sql);
$stmt->execute([
    'id' => $id
]);

$row = $stmt->fetch(PDO::FETCH_ASSOC);
echo $row['request_text'];


