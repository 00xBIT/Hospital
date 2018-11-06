<?php

function users_all($link, $role = "")
{
    // Запрос
    $query = "SELECT users.id,
                     users.firstName,
                     users.lastName,
                     roles.title AS \"roleId\",
                     specialtys.title AS \"specialtyId\"
              FROM users
              JOIN roles ON users.roleId=roles.id
              JOIN specialtys ON users.specialtyId=specialtys.id";

    if ($role)
        $query .= " WHERE roles.title='" . $role . "'";

    $result = mysqli_query($link, $query);

    if(!$result)
        die(mysqli_error($link));

    // Извлечение из БД
    $n = mysqli_num_rows($result);
    $users = array();

    for ($i = 0; $i < $n; $i++)
    {
        $row = mysqli_fetch_assoc($result);
        $users[] = $row;
    }

    return $users;
}

function users_get($link, $id)
{
    // Запрос
    $query = sprintf("SELECT * FROM users WHERE id=%d", (int)$id);
    $result = mysqli_query($link, $query);

    if(!$result)
        die(mysqli_error($link));

    // Извлечение из БД
    $user = mysqli_fetch_assoc($result);

    return $user;
}

function users_new($link, $firstName, $lastName, $roleId, $specialtyId)
{
    // Подготовка
    $firstName = trim($firstName);
    $lastName = trim($lastName);
    $roleId = (int)$roleId;
    $specialtyId = (int)$specialtyId;

    // Проверка
    if ($firstName == '')
        return false;
    if ($lastName == '')
        return false;
    if ($roleId == 0)
        return false;
    // Специальность указывается только для докторов
    if ($roleId != 1)
        $specialtyId = 1;
    if ($specialtyId == 0)
        return false;

    // Запрос
    
    $t = "INSERT INTO users (firstName, lastName, roleId, specialtyId) VALUES ('%s', '%s', '%d', '%d')";

    $query = sprintf($t, mysqli_real_escape_string($link, $firstName),
                         mysqli_real_escape_string($link, $lastName),
                         $roleId,
                         $specialtyId);

    $result = mysqli_query($link, $query);

    if (!$result)
        die(mysqli_error($link));

    return true;
}

function users_edit($link, $id, $firstName, $lastName, $roleId, $specialtyId)
{
    // Подготовка
    $id = (int)$id;
    $firstName = trim($firstName);
    $lastName = trim($lastName);
    $roleId = (int)$roleId;
    $specialtyId = (int)$specialtyId;

    // Проверка
    if ($id == 0)
        return false;
    if ($firstName == '')
        return false;
    if ($lastName == '')
        return false;
    // Специальность указывается только для докторов
    if ($roleId != 1)
        $specialtyId = 1;
    if ($specialtyId == 0)
        return false;

    // Запрос
    $sql = "UPDATE users
            SET firstName='%s',
                lastName='%s',
                roleId='%s',
                specialtyId='%d'
            WHERE id='%d'";

    $query = sprintf($sql, mysqli_real_escape_string($link, $firstName),
                           mysqli_real_escape_string($link, $lastName),
                           $roleId,
                           $specialtyId,
                           $id);

    echo '<script language="javascript">';
    echo 'alert("query: ';
    echo $query;
    echo ' ")';
    echo '</script>';

    $result = mysqli_query($link, $query);

    if (!$result)
        die(mysqli_error($link));

    return mysqli_affected_rows($link);
}

function users_delete($link, $id)
{
    $id = (int)$id;

    // Проверка
    if ($id == 0)
        return false;

    // Запрос
    $query = sprintf("DELETE FROM users WHERE id='%d'", $id);

    $result = mysqli_query($link, $query);

    if (!$result)
        die(mysqli_error($link));

    return mysqli_affected_rows($link);
}