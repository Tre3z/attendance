<?php
    $title = 'edit record';
    require "incluides/header.php"; 
    require "db/conn.php";


    $results = $crud->getSpecialities();

    if(!isset($_GET['id'])){
       // echo 'error';
       include 'incluides/errormessage.php';
       header("location: viewrecords.php");
    } else{
            $id = $_GET['id'];
            $attendee = $crud->getAttendanceDetails($id);
    

    ?>

    <!----aaaaaaa------>   

    
    <h1 class="text-center">Edit record</h1>
    
<!------->

    <form method="post" action="editpost.php">
       <input type="hidden" name="id" value="<?php echo $attendee['attendee_id']  ?>"></input> 
  <div class="mb-3">
    <label for="firstname" class="form-label">first name</label>
    <input type="text" class="form-control" value="<?php echo $attendee['firstname'] ?>" id="firstname" placeholder="Enter your first name" name="firstname"> 
  </div>

  <div class="mb-3">
    <label for="lastname" class="form-label">last name</label>
    <input type="text" class="form-control" value="<?php echo $attendee['lastname'] ?>" id="lastname" placeholder="Enter your last name" name="lastname"> 
  </div>

  <div class="mb-3">
    <label for="dob" class="form-label">Date of birth</label>
    <input type="text" class="form-control" value="<?php echo $attendee['dateofbirth'] ?>" id="dob" name="dob"> 
  </div>

    <div>
    <label for="specialty" class="form-label">area of expertise</label>
     <select class="form-control"  id="specialty" name="specialty">
      <?php while($r = $results->fetch(PDO::FETCH_ASSOC)) {?>
          <option selected value="<?php echo $r['specialty_id'] ?>"  <?php if ($r['specialty_id'] == 
          $attendee['specialty_id']) echo 'selected' ?>>
          <?php echo $r['name']; ?>
        </option>
            <?php }?>
    </select>
    </div>

  <div class="form-group">
      <label for="email">Email address</label>
      <input type="email" class="form-control" value="<?php echo $attendee['emailaddress'] ?>" id="email" aria-describedby="emailhelp" name="email">
      <small id="emailhelp" class="form-text text-muted">we'll never share your email address</small>
 </div>

 <div class="form-group">
      <label for="phone">Contact number</label>
      <input type="text" class="form-control" value="<?php echo $attendee['contactnumber'] ?>" id="phone" aria-describedby="phonehelp" name="phone">
      <small id="phonehelp" class="form-text text-muted">we'll never share your number</small>
 </div>

 
 <div class="d-grid gap-2">
  <button type="submit" name="submit" class="btn btn-success btn-lg">Save changes</button>
  </div>
</form>

<?php }?> 
 <br>
 <br>
 <br>
 <?php require "incluides/footer.php"; ?> 
