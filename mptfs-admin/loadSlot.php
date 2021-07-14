<?php
include('../includes/connection.inc.php');

$id = $_POST['eid'];

$sql = "SELECT *FROM slots as s LEFT JOIN cities ON s.city_code = cities.city_id  LEFT JOIN places ON s.place_code = places.place_id WHERE s.slot_id = {$id}";

$results = mysqli_query($conn, $sql) or die("SQL Query Failed.");

$output = '';

if (mysqli_num_rows($results) > 0) {
    while ($row = mysqli_fetch_assoc($results)) {
        $output .= "<form id='usrForm' action=''>
                        <div class='form-row' hidden>
                            <div class='form-group col-md-12'>
                                <label for='inputSid' class='lbl-color'>Slot Id</label>
                                <input type='text' class='form-control' id='sid' name='sid' value='{$row["slot_id"]}'>
                            </div>
                        </div>

                        <div class='form-row'>
                            <div class='form-group col-md-12'>
                                <label for='inputCity' class='lbl-color'>City</label>
                                <select id='city' name='city' class='form-control' disabled>
                                    <option value='{$row["city_code"]}' selected='selected'>{$row['city_name']}</option>
                                </select>
                            </div>
                        </div>

                        <div class='form-row'>
                            <div class='form-group col-md-12'>
                                <label for='inputPlace' class='lbl-color'>Place</label>
                                <select id='place' name='place' class='form-control' disabled>
                                    <option value='{$row["place_code"]}' selected='selected'>{$row['place_name']}</option>
                                </select>
                            </div>
                        </div>

                        <div class='form-row'>
                            <div class='form-group col-md-12'>
                                <label for='inputDatepicker' class='lbl-color'>Date</label>
                                <input type='date' class='form-control' onload='getDate()' id='edate' name='edate' value='{$row["slot_date"]}' autocomplete='off' required>
                            </div>
                        </div>

                        <div class='form-row'>
                            <div class='form-group col-md-12'>
                                <label for='inputName' class='lbl-color'>Slot Name</label>
                                <input type='text' class='form-control' id='esname' name='esname' value='{$row["slot_name"]}' placeholder='Enter Slot Name' autocomplete='off'>
                            </div>
                        </div>

                        <div class='form-row'>
                            <div class='form-group col-md-12'>
                                <label for='inputSlot' class='lbl-color'>Add Number of Slots</label>
                                <input type='text' class='form-control' id='efslots' name='efslots' value='{$row["free_slot"]}' autocomplete='off' placeholder='Enter Number of Free Slots'>
                            </div>
                        </div>
                    </form>";
    }

    mysqli_close($conn);

    echo $output;
}
