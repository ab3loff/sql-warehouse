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

$sql = $db->pdo->query($row['request_text']);

$result = $sql->fetchAll(PDO::FETCH_ASSOC);

?>


<!--
Нет проверки на тип запроса, поэтому предположим,
что только выполнение SELECT запроса с выводом в виде таблицы
-->

    <thead>
        <tr>
            <?php foreach (array_keys($result[0]) as $key) { ?>   <!-- так проходит выборка названий столбцов -->
                <th><?= $key ?></th>
            <?php } ?>
        </tr>
    </thead>
    <tbody>

            <?php foreach ($result as $key => $value) { ?>
                <tr>
                    <?php foreach ($value as $key => $value) { ?>
                <td><?= $value ?></td>
            <?php } ?>
                </tr>
            <?php }; ?>

    </tbody>






