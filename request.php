<?php
require_once 'Database.php';
$db = new Database();
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

    <title>Выполнение запроса</title>
</head>
<body>

    <div id="request" class="container mt-5">
        <h1>Выполнение запроса</h1>
        <a href="index.php" class="d-block btn btn-primary">На главную</a>
            <?php
            $sql = "SELECT * FROM requests ORDER BY id";

            $stmt = $db->pdo->prepare($sql);
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            ?>

        <select id="request_select" class="mt-3">
            <option selected disabled>Выберите запрос</option>

            <?php
            foreach ($result as $row) { ?>
                <option value="<?php echo $row['id'] ?>"> <?php echo $row['request_name'] ?> </option>
            <?php }
            ?>

        </select>


    <div id="request_execute" class=" align-items-center container mt-3 border border-dark p-5">
        <span class="d-block fs-3">Текст запроса: </span>
        <span id="result_span" class="d-block fs-3 font-weight-bold"></span>
    </div>

        <button id="request_execute_btn" type="submit" class="btn btn-danger mt-3">Выполнить</button>

        <table id="table" class="table mt-3 border border-dark">

        </table>

    </div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
<script src="assets/js/scripts.js"></script>

</body>
</html>
