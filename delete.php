<?php 
require "db/conn.php";
if (!$_GET['id']){
    include 'incluides/errormessage.php';
    header("location: viewrecords.php");
} else{
    //get id values
    $id = $_GET['id'];

    //call the delete

    $result = $crud->deleteAttende($id);

    //redirect to list
    if($result)
    {
        header("location: viewrecords.php");
    }
    else{
        include 'incluides/errormessage.php';
    }
}
?>