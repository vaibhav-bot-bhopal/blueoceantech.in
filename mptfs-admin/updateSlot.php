<?php
include('../includes/connection.inc.php');

$id = mysqli_real_escape_string($conn, $_POST['id']);
$date = strtotime($_POST['date']);
$fdate = mysqli_real_escape_string($conn, date("Y-m-d", $date));
$sname = mysqli_real_escape_string($conn, $_POST['sname']);
$fslots = mysqli_real_escape_string($conn, $_POST['fslots']);

$sql = "UPDATE slots SET slot_name = '$sname', slot_date = '$fdate', free_slot = '$fslots' WHERE slot_id = {$id}";

if (mysqli_query($conn, $sql) or die("SQL Query Failed.")) {
    echo 1;
} else {
    echo 0;
}
