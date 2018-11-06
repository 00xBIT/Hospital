<?php

function specialtys_all($link)
{
    // Запрос
    $query = "SELECT * FROM specialtys ORDER BY id DESC";
    $result = mysqli_query($link, $query);

    if(!$result)
        die(mysqli_error($link));

    // Извлечение из БД
    $n = mysqli_num_rows($result);
    $specialtys = array();

    for ($i = 0; $i < $n; $i++)
    {
        $row = mysqli_fetch_assoc($result);
        $specialtys[] = $row;
    }

    return $specialtys;
}

function specialtys_get($link, $id)
{
    // Запрос
    $query = sprintf("SELECT * FROM specialtys WHERE id=%d", (int)$id);
    $result = mysqli_query($link, $query);

    if(!$result)
        die(mysqli_error($link));

    // Извлечение из БД
    $specialty = mysqli_fetch_assoc($result);

    return $specialty;
}

function specialtys_new($link, $title)
{
    // Подготовка
    $title = trim($title);

    // Проверка
    if ($title == '')
        return false;

    // Запрос
    $t = "INSERT INTO specialtys (title) VALUES ('%s')";

    $query = sprintf($t, mysqli_real_escape_string($link, $title));

    $result = mysqli_query($link, $query);

    if (!$result)
        die(mysqli_error($link));

    return true;
}

function specialtys_edit($link, $id, $title)
{
    // Подготовка
    $id = (int)$id;
    $title = trim($title);

    // Проверка
    if ($id == 0)
        return false;

    if ($title == '')
        return false;

    // Запрос
    $sql = "UPDATE specialtys SET title='%s' WHERE id='%d'";

    $query = sprintf($sql, mysqli_real_escape_string($link, $title), $id);

    $result = mysqli_query($link, $query);

    if (!$result)
        die(mysqli_error($link));

    return mysqli_affected_rows($link);
}

function specialtys_delete($link, $id)
{
    $id = (int)$id;

    // Проверка
    if ($id == 0)
        return false;

    // Запрос
    $query = sprintf("DELETE FROM specialtys WHERE id='%d'", $id);

    $result = mysqli_query($link, $query);

    if (!$result)
        die(mysqli_error($link));

    return mysqli_affected_rows($link);
}