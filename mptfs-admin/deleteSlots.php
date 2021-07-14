<?php

include('../includes/connection.inc.php');

$id = $_POST['id'];

$id = implode($id, ",");

$sql = "DELETE FROM slots WHERE slot_id IN ({$id})";

if (mysqli_query($conn, $sql)) {
    mysqli_query($conn, "SET @count := 0");
    mysqli_query($conn, "UPDATE slots SET slot_id = @count:= @count + 1");
    mysqli_query($conn, "ALTER TABLE slots AUTO_INCREMENT = 1");
    echo true;
} else {
    echo false;
}
