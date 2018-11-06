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
            //users_new($link, $_POST['firstName'], $_POST['lastName'], $_POST['roleId'], $_POST['specialtyId']);
            header("Location: index.php");
        }
        
        // $user = ["firstName" => "", "lastName" => "",
        //          "roleId" => "1", "specialtyId" => "1"];
        // $roles = roles_all($link);
        // $specialtys = specialtys_all($link);
        $doctors = users_all($link, "Доктор");
        $patients = users_all($link, "Пациент");
        include("../views/timetable_editor.php");
    }
    else
    {
        $timetable = timetable_all($link);
        include("../views/timetable.php");
    }
?>