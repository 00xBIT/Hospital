<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>Портал</title>
    <link rel="stylesheet" href="../style.css" />
</head>
<body>
    <div class="container">
        <a href="../index.php"><h1>Портал Расписание</h1></a>
        <h2>Пользователи</h2>
        <div>
            <a href="index.php?action=add&id=0">Добавить пользователя</a>
            <br>
            Отобразить:
            <a href="index.php?action=show&filter=all">всех</a>
            <a href="index.php?action=show&filter=doctors">только докторов</a>
            <a href="index.php?action=show&filter=patients">только пациентов</a>
            <table class="managementTable">
                <tr>
                    <th>Имя</th>
                    <th>Фамилия</th>
                    <th>Роль</th>
                    <th>Специальность</th>
                    <th></th>
                    <th></th>
                </tr>
                <?php foreach($users as $item): ?>
                <tr>
                    <td><?=$item['firstName']?></td>
                    <td><?=$item['lastName']?></td>
                    <td><?=$item['roleId']?></td>
                    <td><?=$item['specialtyId']?></td>
                    <td>
                        <a href="index.php?action=edit&id=<?=$item['id']?>">Редактировать</a>
                    </td>
                    <td>
                        <a href="index.php?action=delete&id=<?=$item['id']?>">Удалить</a>
                    </td>
                </tr>
                <?php endforeach ?>
            </table>
        </div>
        <footer>
                <p>Расписание<br>2018</p>
        </footer>
    </div>
</body>
</html>