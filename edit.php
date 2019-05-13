<?php
include 'header.php';
include 'DBConnect.php';


if(isset($_POST['submit'])){
    $id = $_POST['txtID'];
    $name = $_POST['txtName'];
    $email = $_POST['txtEmail'];
    $phone = $_POST['txtPhone'];
    $address = $_POST['txtAddress'];
    $gender = $_POST['gender'];
    $dob = $_POST['txtDob'];

    $sql = "UPDATE tbstudent SET std_id='$id',std_name='$name',std_gender='$gender',
    std_email='$email',std_phone='$phone', std_address='$address', std_dob ='$dob'
    WHERE std_id='$id'";
    mysqli_query($conn, $sql);

}



if (!isset($_GET['std_id'])){
    header('Location: show_std.php');
}

$variable = $_GET['std_id'];
$query = "SELECT * FROM tbstudent WHERE std_id='$variable'";
    #2. Excute query
    $rs = mysqli_query($conn, $query);
    $field = mysqli_fetch_assoc($rs);
        // var_dump($field);
    $check = '';
    $check1 = '';

    if($field['std_gender'] == 0){
        $check = 'checked';
    } else {
        $check1 = 'checked';
    }
?>
<form method="POST" action="edit.php">
    <div>
        ID: <input type="text" readonly value="<?=$field['std_id']?>" name="txtID">
    </div>
    <div>
            Name: <input type="text"  value="<?=$field['std_name']?>" name="txtName">
        </div>
        <div>
            Date of birth: <input type="date" value="<?=$field['std_dob']?>" name="txtDob">
        </div>
        <div>
            Email: <input type="text"  value="<?=$field['std_email']?>" name="txtEmail">
        </div>
        <div>
            Phone: <input type="text"  value="<?=$field['std_phone']?>" name="txtPhone">
        </div>
        <div>
            Address: <input type="text"  value="<?=$field['std_address']?>" name="txtAddress">
        </div>
        <div>
                <input type="radio" <?=$check?>   name="gender" value="0">
                    <label for="Male">Male</label><br>
                <input type="radio" <?=$check1?> name="gender" value="1">
                    <label for="Female">Female</label><br>
        </div>
    <button type="submit" name="submit">Send</button>
</form>

<?php
include 'footer.php';
$conn->close();
?>