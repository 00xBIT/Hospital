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
        <h2>Расписание</h2>
        <div>
            <a href="index.php?action=add&id=0">Добавить запись на прием</a>
            <table class="managementTable">
                <tr>
                    <th>Дата</th>
                    <th>Время</th>
                    <th>Специальность</th>
                    <th>Врач</th>
                    <th>Пациент</th>
                    <th></th>
                    <th></th>
                </tr>
                <?php foreach($timetable as $item): ?>
                <tr>
                    <td><?=date('Y-m-d', $item['datetime'])?></td>
                    <td><?=date('h-i', $item['datetime'])?></td>
                    <td>-</td>
                    <td><?=$item['doctorId']?></td>
                    <td><?=$item['patientId']?></td>
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