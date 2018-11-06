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
        <h2>Специальности</h2>
        <div>
            <a href="index.php?action=add&id=0">Добавить специальность</a>
            <table class="managementTable">
                <tr>
                    <th>Название</th>
                    <th></th>
                    <th></th>
                </tr>
                <?php foreach($specialtys as $item): ?>
                <tr>
                    <td><?=$item['title']?></td>
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