<?php
    require_once("../database.php");
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
            specialtys_new($link, $_POST['title']);
            header("Location: index.php");
        }
        
        $specialty = ["title" => ""];
        include("../views/specialty_editor.php");
    }
    // EDIT
    else if($action == "edit")
    {
        if(!isset($_GET['id']))
            header("Location: index.php");
        $id = (int)$_GET['id'];

        if(!empty($_POST) && $id > 0){
            specialtys_edit($link, $id, $_POST['title']);
            header("Location: index.php");
        }

        $specialty = specialtys_get($link, $id);
        include("../views/specialty_editor.php");
    }
    // DELETE
    else if($action == "delete")
    {
        $id = $_GET['id'];
        $specialty = specialtys_delete($link, $id);
        header("Location: index.php");
    }

    else
    {
        $specialtys = specialtys_all($link);
        include("../views/specialtys.php");
    }
?>