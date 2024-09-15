<?php
require_once '../Database.php';
$db = new Database();

$sql = 'UPDATE requests SET request_name = :request_name, request_text = :request_text WHERE id = :id';
$stmt = $db->pdo->prepare($sql);
$stmt->execute([
    'request_name' => $_POST['request_name'],
    'request_text' => $_POST['request_text'],
    'id' => $_POST['request_id']
]);

if ($stmt) {
    echo 'Запрос успешно обновлен';
} else {
    echo 'Запрос не обновлен';
}
?>
