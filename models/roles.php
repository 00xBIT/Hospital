<?php

function roles_all($link)
{
    // Запрос
    $query = "SELECT * FROM roles ORDER BY id DESC";
    $result = mysqli_query($link, $query);

    if(!$result)
        die(mysqli_error($link));

    // Извлечение из БД
    $n = mysqli_num_rows($result);
    $roless = array();

    for ($i = 0; $i < $n; $i++)
    {
        $row = mysqli_fetch_assoc($result);
        $roles[] = $row;
    }

    return $roles;
}

function roles_get($link, $id)
{
    // Запрос
    $query = sprintf("SELECT * FROM roles WHERE id=%d", (int)$id);
    $result = mysqli_query($link, $query);

    if(!$result)
        die(mysqli_error($link));

    // Извлечение из БД
    $role = mysqli_fetch_assoc($result);

    return $role;
}