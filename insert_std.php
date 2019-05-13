<?php
     #1. Database ìnormation
     $server = "localhost";
     $account = "root";
     $password = "";
     $database = "dbstudent";
     
     #2. Declare Connection String
     $conn = mysqli_connect($server, $account, $password, $database);
     
     #3. Test Connection
     if($conn == null){
         die("Error: Connection Fails");
     }else{
        // echo ("Congratulation!");
     }

    if( isset($_POST['submit']) ){
        $id = $_POST['txtID'];
        $name = $_POST['txtName'];
        $email = $_POST['txtEmail'];
        $phone = $_POST['txtPhone'];
        $address = $_POST['txtAddress'];
        $gender = $_POST['gender'];
        $dob = $_POST['txtDob'];
        // $query = "SELECT * FROM tb";
        $sql = "INSERT INTO tbstudent(std_id, std_name,std_gender,std_email,std_phone,std_address,std_dob)
         VALUES ('$id', '$name', '$gender', '$email', '$phone', '$address', '$dob' )";
         
        mysqli_query($conn, $sql);

    }

    

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Form</title>
</head>

<body>
    <form method="post" action="insert_std.php">
        <div>
            ID: <input type="text" placeholder="Enter your ID" name="txtID">
        </div>
        <div>
            Name: <input type="text" placeholder="Enter your name" name="txtName">
        </div>
        <div>
            Date of birth: <input type="date" name="txtDob">
        </div>
        <div>
            Email: <input type="text" placeholder="Enter your email" name="txtEmail">
        </div>
        <div>
            Phone: <input type="text" placeholder="Enter your phone" name="txtPhone">
        </div>
        <div>
            Address: <input type="text" placeholder="Enter your address" name="txtAddress">
        </div>

        <div>
                <input type="radio" checked  name="gender" value="0">
                    <label for="Male">Male</label><br>
                <input type="radio" name="gender" value="1">
                    <label for="Female">Female</label><br>
        </div>
        <button type="submit" name="submit">Send</button>
    </form>
    <iframe src="show_std.php" width="50%" height="400px"></iframe>
    
</body>
</html>
<?php
    $conn->close();
?>