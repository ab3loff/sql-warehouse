<?php
require_once 'Database.php';
$db = new Database();
session_start();

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
    <title>Редактирование запроса</title>
</head>
<body>
<div class="container border border-dark p-5 mt-5">


    <h1 class="text-center d-block">Редактирование запроса</h1>

    <form action="actions/request_update.php" id="request_form_update" method="post" class="container mb-3 form-check">

        <?php
        $sql = "SELECT users.name, requests.id, requests.request_name, requests.request_text 
                    FROM requests
                    JOIN users 
                    ON requests.user_id = users.id
                    WHERE requests.user_id = :user_id
                    ORDER BY requests.id ";

        $stmt = $db->pdo->prepare($sql);
        $stmt->execute([
                'user_id' => $_SESSION['user_id']
        ]);
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        ?>
        <select name="request_id" id="request_select" class="w-100 my-3">
            <?php foreach ($result as $row) { ?>
                <option value="<?php echo $row['id'] ?>"> <?php echo $row['request_name'] ?> </option>
            <?php } ?>
        </select>
        <label class="d-block mb-0 font-weight-bold">Название запроса</label>
        <small class="d-block mb-1">*Поле обязательно для заполнения </small>
        <input type="text" class="w-100 mb-3" name="request_name" placeholder="Название запроса" required>

        <label class="d-block mb-0 font-weight-bold">Текст запроса</label>
        <small class="d-block mb-1">*Поле обязательно для заполнения </small>
        <textarea class="d-block w-100" name="request_text" rows="10" required placeholder="Текст запроса"></textarea>

        <button type="submit" class="btn btn-danger mt-3">Редактировать</button>


        <div id="result_update" class="alert mt-3 p-2 ">

        </div>

    </form>
    <a href="index.php" class="container d-block btn btn-primary ">На главную</a>
</div>




<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
<script src="assets/js/scripts.js"></script>

</body>
</html>
