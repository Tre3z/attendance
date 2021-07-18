    <?php
    $title = 'index';
    require "incluides/header.php"; 
    require "db/conn.php";


    $results = $crud->getSpecialities();

    ?>

    <!----aaaaaaa------>   

    
    <h1 class="text-center">Registration for it conference!</h1>
    
<!------->

    <form method="post" action="success.php">
  <div class="mb-3">
    <label for="firstname" class="form-label">first name</label>
    <input required type="text" class="form-control" id="firstname" placeholder="Enter your first name" name="firstname"> 
  </div>

  <div class="mb-3">
    <label for="lastname" class="form-label">last name</label>
    <input required type="text" class="form-control" id="lastname" placeholder="Enter your last name" name="lastname"> 
  </div>

  <div class="mb-3">
    <label for="dob" class="form-label">Date of birth</label>
    <input required type="text" class="form-control" id="dob" name="dob"> 
  </div>

    <div>
    <label for="specialty" class="form-label">area of expertise</label>
     <select class="form-control"  id="specialty" name="specialty">
      <?php while($r = $results->fetch(PDO::FETCH_ASSOC)) {?>
          <option value="<?php echo $r['specialty_id'] ?>"><?php echo $r['name']; ?></option>
      <?php }?>
    </select>
    </div>

  <div class="form-group">
      <label for="email">Email address</label>
      <input required type="email" class="form-control" id="email" aria-describedby="emailhelp" name="email">
      <small id="emailhelp" class="form-text text-muted">we'll never share your email address</small>
 </div>

 <div class="form-group">
      <label for="phone">Contact number</label>
      <input required type="text" class="form-control" id="phone" aria-describedby="phonehelp" name="phone">
      <small id="phonehelp" class="form-text text-muted">we'll never share your number</small>
 </div>

 
 <div class="d-grid gap-2">
  <button type="submit" name="submit" class="btn btn-dark btn-lg">Submit</button>
  </div>
</form>
 <br>
 <br>
 <br>
 <?php require "incluides/footer.php"; ?> 
