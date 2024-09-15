<?php
require_once 'Database.php';
$db = new Database();
session_start();
$_SESSION['user_id'] = 1;
?>

<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="assets/css/styles.css" rel="stylesheet">
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <title>Хранилище SQL-запросов</title>
</head>
<body>
<div class="container mt-5">
    <h1>Хранилище SQL-запросов</h1>
    <table class="table">

        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Пользователь</th>
            <th scope="col">Название</th>
            <th scope="col">Текст запроса</th>
        </tr>
        </thead>
        <tbody>
        <?php
        $sql = "SELECT users.name, requests.id, requests.request_name, requests.request_text 
                    FROM requests 
                    JOIN users 
                    ON requests.user_id = users.id 
                    ORDER BY users.name";

        $result = $db->pdo->query($sql);

        foreach ($result as $row) { ?>
            <tr>
                <td> <?php echo $row['id'] ?> </td>
                <td> <?php echo $row['name'] ?> </td>
                <td> <?php echo $row['request_name'] ?> </td>
                <td> <?php echo $row['request_text'] ?> </td>
            </tr>
        <?php } ?>
        </tbody>
    </table>
    <a href="request.php" class="btn btn-primary mr-3">Выполнить запрос</a>
    <a href="request_form_insert.php" class="btn btn-danger">Добавить запрос</a>
    <a href="request_form_update.php" class="btn btn-danger">Редактировать запрос</a>
</div>
</body>
</html>
