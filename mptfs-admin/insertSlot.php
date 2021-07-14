<?php

include('../includes/connection.inc.php');

// Insert Data in Database
$name = mysqli_real_escape_string($conn, $_POST['name']);
$slots = mysqli_real_escape_string($conn, $_POST['slots']);
$city = mysqli_real_escape_string($conn, $_POST['city']);
$place = mysqli_real_escape_string($conn, $_POST['place']);
$date = strtotime($_POST['date']);
$fdate = mysqli_real_escape_string($conn, date("Y-m-d", $date));


// $duplicate = mysqli_query($conn, "SELECT *FROM slots where slot_name='$name'");

// if (mysqli_num_rows($duplicate) > 0) {
//     echo json_encode(array("statusCode" => 201));
// } else {
$slotDetails = mysqli_query($conn, "SELECT *FROM slots where slot_name='" . $_POST['name'] . "' AND slot_date='" . $fdate . "' AND city_code='" . $_POST['city'] . "' AND place_code='" . $_POST['place'] . "'");

if (mysqli_num_rows($slotDetails) > 0) {
	echo 2;
} else {

	$sql = "INSERT INTO slots (slot_name, slot_date, free_slot, city_code, place_code) values ('$name', '$fdate', '$slots','$city', '$place')";

	if (mysqli_query($conn, $sql)) {
		echo true;
	} else {
		echo false;
	}
}
// }
