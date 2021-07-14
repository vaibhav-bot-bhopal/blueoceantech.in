<?php

include('../includes/connection.inc.php');

$sql = "SELECT *FROM slots WHERE slot_id = {$_POST['slot_id']}";

// echo die($sql);

$results = mysqli_query($conn, $sql);

if (mysqli_num_rows($results) > 0) {
    while ($row = mysqli_fetch_assoc($results)) {
        if ($row['status'] == 0) {
            $sql_update_1 = "UPDATE slots SET status = 1 WHERE slot_id = {$_POST['slot_id']}";
            mysqli_query($conn, $sql_update_1);
            echo true;
        } else if ($row['status'] == 1) {
            $sql_update_2 = "UPDATE slots SET status = 0 WHERE slot_id = {$_POST['slot_id']}";
            mysqli_query($conn, $sql_update_2);
            echo true;
        }
    }
}
