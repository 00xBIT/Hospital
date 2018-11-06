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
        <a href="index.php"><h2>Пользователи</h2></a>
        <h3>Редактирование пользователя</h3>
        <div>
            <form method="post" action="index.php?action=<?=$_GET['action']?>&id=<?=$_GET['id']?>">
            <label>
                Имя
                <br>
                <input type="text" name="firstName" value="<?=$user['firstName']?>" class="form-item" autofocus required>
            </label>
            <br>
            <label>
                Фамилия
                <br>
                <input type="text" name="lastName" value="<?=$user['lastName']?>" class="form-item" required>
            </label>
            <br>
            <label>
                Роль
                <br>
                <select name="roleId" required>
                <?php foreach($roles as $item): ?>
                    <option label="<?=$item['title']?>"><?=$item['id']?></option>
                <?php endforeach ?>
                </select>
            </label>
            <br>
            <label>
                Специальность
                <br>
                <select name="specialtyId">
                <?php foreach($specialtys as $item): ?>
                    <option label="<?=$item['title']?>"><?=$item['id']?></option>
                <?php endforeach ?>
                </select>
            </label>
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