<?php
$title = 'index';
require "incluides/header.php"; 
require "db/conn.php";

$results = $crud->getAttendees();
?>


    <table class="table table-dark">
        <tr>
            <th>#</th>
            <th>First name</th>
            <th>Last name</th>
            <th>specialty</th>
            <th>Actions</th>
        </tr>


        <?php while ($r = $results->fetch(PDO::FETCH_ASSOC)) {?>
            

            <tr>

            <td><?php echo $r['attendee_id'] ?></td>
            <td><?php echo $r['firstname'] ?></td>
            <td><?php echo $r['lastname'] ?></td>
            <td><?php echo $r['name'] ?></td>
            <td>
                <a href="view.php?id=<?php echo $r['attendee_id'] ?>" class="btn btn-primary">View</a>
                <a href="edit.php?id=<?php echo $r['attendee_id'] ?>" class="btn btn-warning">edit</a>
                <a onclick="return confirm('Are you sure to delete this record?');" href="delete.php?id=<?php echo $r['attendee_id'] ?>" class="btn btn-danger">delete</a>
                </td>
        
            </tr>

        <?php }?>
    </table>


<br>
<br>
<br>
<?php require "incluides/footer.php"; ?> 