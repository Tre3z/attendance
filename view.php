<?php
$title = 'view records';
require "incluides/header.php"; 
require "db/conn.php";

if(isset($_GET['id'])){
    $id = $_GET['id'];
    $result = $crud->getAttendanceDetails($id);
} else{
  include 'incluides/errormessage.php';
}

?>

<div class="card" style="width: 18rem;"> 
  <div class="card-body">
    <h5 class="card-title">
      <?php echo $result['firstname'] . ' ' . $result['lastname'] ?>;
    </h5>
    <h6 class="card-subtitle mb-2 text-muted"> 
        <?php echo $result['name'] ?>;
    </h6>
    <h6 class="card-subtitle mb-2 text-muted"> date of birth:
        <?php echo $result['dateofbirth']?>;
    </h6>
    <h6 class="card-subtitle mb-2 text-muted"> email:
        <?php echo $result['emailaddress']?>;
    </h6>
    <h6 class="card-subtitle mb-2 text-muted"> number phone:
        <?php echo $result['contactnumber']?>;
    </h6>
  </div>
  <br>
  <a href="viewrecords.php" class="btn btn-info">Back to list</a>
  <a href="edit.php?id=<?php echo $result['attendee_id'] ?>" class="btn btn-warning">edit</a>
  <a onclick="return confirm('Are you sure to delete this record?');" href="delete.php?id=<?php echo $result['attendee_id'] ?>" class="btn btn-danger">delete</a>


<br>
<br>
<br>
<?php require "incluides/footer.php"; ?> 