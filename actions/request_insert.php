<?php
require_once '../Database.php';
$db = new Database();
session_start();
/*
 * Добавление запроса в хранилище
 *
 * Нет регистрации/авторизации пользователя, поэтому
 * все данные передаются от лица dev1
 *
 * Также отсутствует какая-либо валидация данных
 */

$user_id = $_SESSION['user_id'];
$request_name = $_POST['request_name'];
$request_text = $_POST['request_text'];

$sql = "INSERT INTO requests (user_id, request_name, request_text) VALUES (:user_id, :request_name, :request_text)";
$stmt = $db->pdo->prepare($sql);
$result =$stmt->execute([
    'user_id' => $user_id,
    'request_name' => $request_name,
    'request_text' => $request_text
]);

if ($result) {
    echo 'Запрос успешно добавлен';
} else {
    echo 'Запрос не добавлен';
}
?>