<?php
    require_once("../database.php");
    require_once("../models/users.php");
    require_once("../models/roles.php");
    require_once("../models/specialtys.php");
    require_once("../models/timetable.php");

    $link = db_connect();

    if(isset($_GET['action']))
        $action = $_GET['action'];
    else
        $action = "";

    // ADD
    if($action == "add")
    {
        if(!empty($_POST))
        {
            timetableItems_new($link, $_POST['date'], $_POST['time'],
                                      $_POST['doctorId'], $_POST['patientId']);
            header("Location: index.php");
        }
        
        $timetableItem = ["datetime" => time(),
                          "doctorId" => "1",
                          "patientId" => "1"];
        $doctors = users_all($link, "Доктор");
        $patients = users_all($link, "Пациент");
        //Для корректного отображения времени
        date_default_timezone_set('Asia/Bangkok');
        include("../views/timetable_editor.php");
    }
    // EDIT
    else if($action == "edit")
    {
        if(!isset($_GET['id']))
            header("Location: index.php");
        $id = (int)$_GET['id'];

        if(!empty($_POST) && $id > 0){
            timetableItems_edit($link, $id, $_POST['date'], $_POST['time'],
                                            $_POST['doctorId'], $_POST['patientId']);
            header("Location: index.php");
        }

        $timetableItem = timetableItems_get($link, $id);
        $doctors = users_all($link, "Доктор");
        $patients = users_all($link, "Пациент");
        include("../views/timetable_editor.php");
    }
    // DELETE
    else if($action == "delete")
    {
        $id = $_GET['id'];
        $timetableItem = timetableItems_delete($link, $id);
        header("Location: index.php");
    }
    else
    {
        $timetableItems = timetableItems_all($link);
        include("../views/timetable.php");
    }
?>