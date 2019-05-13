<!DOCTYPE html>
<?php
    #1. Connect to database
    include "DBConnect.php";
    $query = "SELECT * FROM tbstudent";
    
    #2. Excute query
    $rs = mysqli_query($conn, $query);
    $count = mysqli_num_rows($rs);

    include 'header.php';
?>

        
        <div class="container">
        <table class="table table-hover" border="1" width="50%">
                <thead>
                  <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Gender</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Address</th>
                    <th>Date of birth</th>
                    <th>Action</th>
                  </tr>
                </thead>
            <h2>Student List</h2>
            <?php
             if($count == 0){
                die("Nothing in database!");
            }else{
                while($fields = mysqli_fetch_array($rs)){
            ?>
                <tbody>
                  <tr>
                    <td><?=$fields['std_id']?></td>
                    <td><?=$fields['std_name']?></td>
                    <td>
                        <?php 
                            if($fields['std_gender'] == 0){
                                echo 'Male';
                            } else {
                                echo 'Female';
                            }
                            
                        ?>
                    </td>
                    <td><?=$fields['std_email']?></td>
                    <td><?=$fields['std_phone']?></td>
                    <td><?=$fields['std_address']?></td>
                    <td><?=$fields['std_dob']?></td>
                    <td col="2">
                        <a href="edit.php?std_id=<?= $fields['std_id'] ?>">Edit</a>
                        <a href="delete.php?std_id=<?= $fields['std_id']?>">Delete</a>
                    </td>
                  </tr>  
                </tbody>
            <?php } } ?>
        
        </table>
        </div>


 <?php 
    include 'footer.php';
    $conn->close();
 ?>