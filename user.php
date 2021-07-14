<?php
// Send User Email
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

include('includes/connection.inc.php');
include('log.php');

$name = mysqli_real_escape_string($conn, $_POST['name']);
$email = mysqli_real_escape_string($conn, $_POST['email']);
$address = mysqli_real_escape_string($conn, $_POST['address']);
$phone = mysqli_real_escape_string($conn, $_POST['phone']);
$answer = mysqli_real_escape_string($conn, $_POST['answer']);
$city = mysqli_real_escape_string($conn, $_POST['city']);
$place = mysqli_real_escape_string($conn, $_POST['place']);
$date = mysqli_real_escape_string($conn, $_POST['date']);
$date = strtotime($_POST['date']);
$fdate = mysqli_real_escape_string($conn, date("Y-m-d", $date));
$slot = mysqli_real_escape_string($conn, $_POST['slot']);


$slots = mysqli_query($conn, "SELECT *FROM slots where slot_id='$slot'");

if (mysqli_num_rows($slots) > 0) {
    while ($row = mysqli_fetch_assoc($slots)) {
        if ($row['slot_state'] == $row['free_slot']) {
            echo 0;
            wh_log("This slot is full, Please try another slot." . "\n");
        } else {

            $usrdetails = mysqli_query($conn, "SELECT *FROM participants where name='" . $_POST['name'] . "' AND email='" . $_POST['email'] . "' AND date='" . $fdate . "' AND slot='" . $_POST['slot'] . "'");

            if (mysqli_num_rows($usrdetails) > 0) {
                echo 2;
                wh_log("" . $_POST['email'] . " have already been registered." . "\n");
            } else {


                // Insert data in database
                $sql = "INSERT INTO participants (name, email, address, phone, answer, city, place, date, slot) values ('$name', '$email', '$address', '$phone', '$answer', '$city', '$place', '$fdate', '$slot')";

                if (mysqli_query($conn, $sql)) {
                    echo true;
                    wh_log("" . $_POST['email'] . " have registered successfully." . "\n");
                } else {
                    echo false;
                    wh_log("" . $_POST['email'] . " have not successfully registered." . "\n");
                }


                // Fetch data from database 
                $sql_fetch = "SELECT * FROM participants as p LEFT JOIN slots ON p.slot = slots.slot_id order by p.id desc limit 1";

                $result = mysqli_query($conn, $sql_fetch);

                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        if ($row['slot'] == $row['slot_id']) {
                            $increment = $row['slot_state'] + 1;
                        }
                    }
                }

                // Update Data Into Table
                $sql_update = "UPDATE slots SET slot_state = $increment WHERE slot_id = {$_POST['slot']}";

                if (mysqli_query($conn, $sql_update)) {
                    $sql_mail = mysqli_query($conn, "SELECT *FROM participants as p LEFT JOIN slots ON p.slot = slots.slot_id LEFT JOIN cities ON p.city = cities.city_id  LEFT JOIN places ON p.place = places.place_id WHERE name = '" . $_POST['name'] . "' AND email = '" . $_POST['email'] . "' AND slot ='" . $_POST['slot'] . "' ORDER BY email DESC LIMIT 1");
                    if (mysqli_num_rows($sql_mail) == 0) {
                        echo false;
                    } else {
                        $row = (mysqli_fetch_assoc($sql_mail));
                        $name = $row['name'];
                        $date = strtotime($row['date']);
                        $slot = $row['slot_name'];
                        $city = $row['city_name'];
                        $place = $row['place_name'];


                        require 'PHPMailer/src/Exception.php';
                        require 'PHPMailer/src/PHPMailer.php';
                        require 'PHPMailer/src/SMTP.php';

                        // create object of PHPMailer class with boolean parameter which sets/unsets exception.
                        $mail = new PHPMailer(true);

                        try {
                            $mail->isSMTP(); // using SMTP protocol
                            $mail->Host = 'smtp.gmail.com'; //SMTP host as gmail
                            $mail->SMTPAuth = true; //enable SMTP authentication
                            $mail->Username = 'mptfstigerday@gmail.com'; //sender gmail host
                            $mail->Password = 'pccf@itd2021'; //sender gmail host password
                            $mail->SMTPSecure = 'tls'; //for encrypted connection
                            $mail->Port = 587; //port for SMTP

                            $mail->setFrom('mptfstigerday@gmail.com', "MPTFS Bagh Sakha Registration Confirmation"); // sender's email and name
                            $mail->addAddress('' . $_POST['email'] . ''); //receiver's email and name

                            $mail->Subject = 'MPTFS Bagh Sakha Registration Confirmation';
                            $mail->isHTML(true);
                            $mail->Body .= "Dear <b>" . $_POST['name'] . ",</b><br/><br/>";
                            $mail->Body .= "Your registration has been successfully done.</b><br/><br/>";
                            $html = "<table border='5' cellpadding='5' style='border-collapse: collapse; border: 2px solid #555;'>
                                        <tr>
                                            <td>Slot Name is </td>
                                            <td><b>" . $slot . "</b></td>
                                        </tr>
                                        <tr>
                                            <td>Event Date is </td>
                                            <td><b>" . date('d-m-Y', $date) . "</b></td>
                                        </tr>
                                        <tr>
                                            <td>Event City is </td>
                                            <td><b>" . $city . "</b></td>
                                        </tr>
                                        <tr>
                                            <td>Event Place is </td>
                                            <td><b>" . $place . "</b></td>
                                        </tr>
                                    </table><br/>";
                            $mail->Body .= $html;
                            $mail->Body .= "Thanks & Regards,<br/>";
                            $mail->Body .= "<b>MPTFS, Bhopal (M.P.)</b>";
                            $mail->Send();

                            return true;
                        } catch (Exception $e) {
                            return false;
                        }
                    }
                } else {
                    return false;
                }
            }
        }
    }
}
