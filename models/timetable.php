<?php

function timetableItems_all($link)
{
    // Запрос
    $query =    "SELECT
                    timetable.id, timetable.datetime,
                    specialtys.title AS docTitle, doc.firstName AS docFirstName, doc.lastName AS docLastName,
                    pat.firstName AS patFirstName, pat.lastName AS patLastName
                FROM
                    timetable
                LEFT OUTER JOIN
                    users AS doc
                ON
                    timetable.doctorId = doc.id
                LEFT OUTER JOIN
                    users AS pat
                ON
                    timetable.patientId = pat.id
                JOIN
                    specialtys
                ON
                    doc.specialtyId = specialtys.id
                ORDER BY
                    timetable.datetime ASC";

    $result = mysqli_query($link, $query);

    if(!$result)
        die(mysqli_error($link));

    // Извлечение из БД
    $n = mysqli_num_rows($result);
    $timetableItems = array();

    for ($i = 0; $i < $n; $i++)
    {
        $row = mysqli_fetch_assoc($result);
        $timetableItems[] = $row;
    }

    return $timetableItems;
}

function timetableItems_get($link, $id)
{
    // Запрос
    $query = sprintf("SELECT * FROM timetable WHERE id=%d", (int)$id);
    $result = mysqli_query($link, $query);

    if(!$result)
        die(mysqli_error($link));

    // Извлечение из БД
    $timetableItem = mysqli_fetch_assoc($result);

    return $timetableItem;
}

function timetableItems_new($link, $date, $time, $doctorId, $patientId)
{
    // Подготовка
    $time = strtotime($_POST['date'].' '.$_POST['time']);
    $doctorId = (int)$doctorId;
    $patientId = (int)$patientId;

    // Проверка
    if ($time == 0)
        return false;
    if ($doctorId == 0)
        return false;
    if ($patientId == 0)
        return false;

    // Запрос
    
    $t = "INSERT INTO timetable (datetime, doctorId, patientId) VALUES ('%d', '%d', '%d')";

    $query = sprintf($t, $time, $doctorId, $patientId);

    $result = mysqli_query($link, $query);

    if (!$result)
        die(mysqli_error($link));

    return true;
}

function timetableItems_edit($link, $id, $date, $time, $doctorId, $patientId)
{
    // Подготовка
    $id = (int)$id;
    $time = strtotime($_POST['date'].' '.$_POST['time']);
    $doctorId = (int)$doctorId;
    $patientId = (int)$patientId;

    // Проверка
    if ($time == 0)
        return false;
    if ($doctorId == 0)
        return false;
    if ($patientId == 0)
        return false;

    // Запрос
    $sql = "UPDATE timetable
            SET datetime='%d',
                doctorId='%d',
                patientId='%d'
            WHERE id='%d'";

    $query = sprintf($sql, $time, $doctorId, $patientId, $id);

    $result = mysqli_query($link, $query);

    if (!$result)
        die(mysqli_error($link));

    return mysqli_affected_rows($link);
}

function timetableItems_delete($link, $id)
{
    $id = (int)$id;

    // Проверка
    if ($id == 0)
        return false;

    // Запрос
    $query = sprintf("DELETE FROM timetable WHERE id='%d'", $id);

    $result = mysqli_query($link, $query);

    if (!$result)
        die(mysqli_error($link));

    return mysqli_affected_rows($link);
}