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
        <a href="index.php"><h2>Специальности</h2></a>
        <h3>Добавление новой специальности</h3>
        <div>
            <form method="post" action="index.php?action=<?=$_GET['action']?>&id=<?=$_GET['id']?>">
                <label>
                    Название
                    <br>
                    <input type="text" name="title" value="<?=$specialty['title']?>" class="form-item" autofocus required>
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