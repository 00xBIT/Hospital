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
        <a href="index.php"><h2>Расписание</h2></a>
        <h3>Редактирование записи на прием</h3>
        <div>
            <form method="post" action="index.php?action=<?=$_GET['action']?>&id=<?=$_GET['id']?>">
            <label>
                Дата приема
                <br>
                <input type="date" name="date" value="<?=date('Y-m-d', $timetableItem['datetime'])?>" class="form-item" autofocus required>
            </label>
            <br>
            <label>
                Время приема
                <br>
                <input type="time" name="time" value="<?=date('H:i', $timetableItem['datetime'])?>" class="form-item" required>
            </label>
            <br>
            <p>Записать на прием к Доктору - Пациента:</p>
            <label>
                Доктор
                <br>
                <select name="doctorId" required>
                <?php foreach($doctors as $item): ?>
                    <option label="<?=$item['firstName'].' '.
                                      $item['lastName'].' ('.
                                      $item['specialtyId'].')'?>"
                            <?php echo ($timetableItem['doctorId'] == $item['id']) ? "selected": ""?>>
                                      <?=$item['id']?></option>
                <?php endforeach ?>
                </select>
            </label>
            <br>
            <label>
                Пациент
                <br>
                <select name="patientId" required>
                <?php foreach($patients as $item): ?>
                    <option label="<?=$item['firstName'].' '.
                                      $item['lastName']?>"
                            <?php echo ($timetableItem['patientId'] == $item['id']) ? "selected": ""?>>
                                      <?=$item['id']?></option>
                <?php endforeach ?>
                </select>
            </label>
            <br>
            <br>
            <input type="submit" value="Сохранить" class="btn">
            </form>
        </div>
        <footer>
                <p>Расписание<br>2018</p>
        </footer>
    </div>
</body>
</html>