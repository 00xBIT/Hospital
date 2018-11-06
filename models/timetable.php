<?php

function timetable_all($link)
{
    // Запрос
    $query = "SELECT * FROM timetable ORDER BY id DESC";

    $result = mysqli_query($link, $query);

    if(!$result)
        die(mysqli_error($link));

    // Извлечение из БД
    $n = mysqli_num_rows($result);
    $timetable = array();

    for ($i = 0; $i < $n; $i++)
    {
        $row = mysqli_fetch_assoc($result);
        $timetable[] = $row;
    }

    return $timetable;
}