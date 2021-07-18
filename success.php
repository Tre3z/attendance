    <?php
    $title = 'success';
    require "incluides/header.php"; 
    require "db/conn.php";

    if(isset($_POST['submit'])){
      $fname = $_POST['firstname'];
      $lname = $_POST['lastname'];
      $dob = $_POST['dob'];
      $email = $_POST['email'];
      $phone = $_POST['phone'];
      $specialty = $_POST['specialty'];
      //
      $isSuccess = $crud->insertAttendees($fname, $lname, $dob, $email, $phone, $specialty);

      if($isSuccess){
        include 'incluides/successmessage.php';
      }
      else {
        include 'incluides/errormessage.php';
      }
    }
    ?>


<!--

<div class="card" style="width: 18rem;"> 
  <div class="card-body">
    <h5 class="card-title">
      <?php //echo $_GET['firstname'] . ' ' . $_GET['lastname']; ?>;
    </h5>
    <h6 class="card-subtitle mb-2 text-muted">
        <?php //echo $_GET['specialty'] ?>;
    </h6>
    <h6 class="card-subtitle mb-2 text-muted">
        <?php //echo $_GET['dob']?>;
    </h6>
    <h6 class="card-subtitle mb-2 text-muted">
        <?php //echo $_GET['email']?>;
    </h6>
    <h6 class="card-subtitle mb-2 text-muted"> number phone:
        <?php //echo $_GET['phone']?>;
    </h6>
  </div>
---->

<div class="card" style="width: 18rem;"> 
  <div class="card-body">
    <h5 class="card-title">
      <?php echo $_POST['firstname'] . ' ' . $_POST['lastname'] ?>;
    </h5>
    <h6 class="card-subtitle mb-2 text-muted"> specialty:
        <?php echo $_POST['specialty'] ?>;
    </h6>
    <h6 class="card-subtitle mb-2 text-muted"> date of birth:
        <?php echo $_POST['dob']?>;
    </h6>
    <h6 class="card-subtitle mb-2 text-muted"> email:
        <?php echo $_POST['email']?>;
    </h6>
    <h6 class="card-subtitle mb-2 text-muted"> number phone:
        <?php echo $_POST['phone']?>;
    </h6>
  </div>



<br>
<br>
<br>
<?php require "incluides/footer.php"; ?> 
