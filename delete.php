<?php
include 'DBConnect.php';
if (!isset($_GET['std_id'])){
    header('location: show_std.php');
}
$variable = $_GET['std_id'];
$sql = "DELETE FROM tbstudent WHERE std_id='$variable'";
mysqli_query($conn, $sql);
header('location: show_std.php');
?>