<?php 
require "db/conn.php";
//--------------------------->
$id = $_POST['id'];
if(isset($_POST['submit'])){
    $fname = $_POST['firstname'];
    $lname = $_POST['lastname'];
    $dob = $_POST['dob'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $specialty = $_POST['specialty'];


    $result = $crud->editAttendee($id,$fname, $lname, $dob, $email, $contact, $specialty);

    if($result){
        header("location: index.php");
    }
    else{
        include 'incluides/errormessage.php';
    }
}

else{
    include 'incluides/errormessage.php';
}
//----------------------------->




?>