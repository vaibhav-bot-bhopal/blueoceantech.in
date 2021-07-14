<?php

include('../includes/connection.inc.php');

$id = $_POST['id'];

$id = implode($id, ",");

$sql = "DELETE FROM cities WHERE city_id IN ({$id})";

if (mysqli_query($conn, $sql)) {
    mysqli_query($conn, "SET @count := 0");
    mysqli_query($conn, "UPDATE cities SET slot_id = @count:= @count + 1");
    mysqli_query($conn, "ALTER TABLE cities AUTO_INCREMENT = 1");
    echo true;
} else {
    echo false;
}
