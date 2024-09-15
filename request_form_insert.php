<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="assets/css/styles.css" rel="stylesheet">
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <title>Добавление запроса</title>
</head>
<body>
<div class="container border border-dark p-5 mt-5">

    <h1 class="text-center d-block">Добавление запроса</h1>

    <form action="actions/request_insert.php" id="request_form_insert" method="post" class="container mb-3 form-check">

        <label class="d-block mb-0 font-weight-bold">Название запроса</label>
        <small class="d-block mb-1">*Поле обязательно для заполнения </small>
        <input type="text" class="w-100 mb-3" name="request_name" placeholder="Название запроса" required>

        <label class="d-block mb-0 font-weight-bold">Текст запроса</label>
        <small class="d-block mb-1">*Поле обязательно для заполнения </small>
        <textarea class="d-block w-100" name="request_text" rows="10" required placeholder="Текст запроса"></textarea>

        <button type="submit" class="btn btn-danger mt-3">Добавить</button>


        <div id="result_insert" class="alert mt-3 p-2 ">

        </div>

    </form>
    <a href="index.php" class="container d-block btn btn-primary ">На главную</a>
</div>



<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
<script src="assets/js/scripts.js"></script>

</body>
</html>