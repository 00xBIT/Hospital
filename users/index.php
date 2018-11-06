<?php
    require_once("../database.php");
    require_once("../models/users.php");
    require_once("../models/roles.php");
    require_once("../models/specialtys.php");

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
            users_new($link, $_POST['firstName'], $_POST['lastName'], $_POST['roleId'], $_POST['specialtyId']);
            header("Location: index.php");
        }
        
        $user = ["firstName" => "", "lastName" => "",
                 "roleId" => "1", "specialtyId" => "1"];
        $roles = roles_all($link);
        $specialtys = specialtys_all($link);
        include("../views/user_editor.php");
    }
    // EDIT
    else if($action == "edit")
    {
        if(!isset($_GET['id']))
            header("Location: index.php");
        $id = (int)$_GET['id'];

        if(!empty($_POST) && $id > 0){
            users_edit($link, $id, $_POST['firstName'], $_POST['lastName'],
                       $_POST['roleId'], $_POST['specialtyId']);
            header("Location: index.php");
        }

        $user = users_get($link, $id);
        $roles = roles_all($link);
        $specialtys = specialtys_all($link);
        include("../views/user_editor.php");
    }
    // DELETE
    else if($action == "delete")
    {
        $id = $_GET['id'];
        $specialty = users_delete($link, $id);
        header("Location: index.php");
    }

    else
    {
        // FILTER
        if(isset($_GET['filter']))
        {
            $filter = $_GET['filter'];
            
            $role = "";
            if ($filter == "doctors")
                $role = "Доктор";
            else if ($filter == "patients")
                $role = "Пациент";

            $users = users_all($link, $role);
        }
        else
        {
            $users = users_all($link);
        }
        
        include("../views/users.php");
    }
?>