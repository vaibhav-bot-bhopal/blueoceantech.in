<?php

include('../includes/connection.inc.php');


// Initialize the session
session_start();

// Check if the user is logged in, if not then redirect him to login page
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
    header("location: login-view.php");
    exit;
}

if ($_SESSION['role'] != 'admin') {
    header("location: userDetails.php");
}

?>

<?php
include('includes/admin-header.php');
?>

<style>
    .table td,
    .table th {
        vertical-align: middle;
    }

    .toggle {
        margin: 0px 0px 0px;
    }
</style>

<div id="admin-content">
    <div class="row">
        <div class="col-md-12">
            <div class="container-fluid mt-5 mb-5">
                <div class="row">
                    <div class="col-lg-4 col-md-12 mb-5">
                        <div id="message"></div>

                        <div class="card" style="background-color: #E8E8E8;">

                            <div class="logo text-center mt-4">
                                <img src='../img/logo/mptfslogo.png' alt='MPTFS Logo' width='80' height='80' class="img-fluid" style="opacity:1;">
                            </div>

                            <div class="card-body">
                                <form id="usrForm" action="">

                                    <div class="form-row">
                                        <div class="form-group col-md-12">
                                            <label for="inputCity" class="lbl-color">City</label>
                                            <select id="city" name="city" class="form-control">
                                                <option value="">----- Select City -----</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-row">
                                        <div class="form-group col-md-12">
                                            <label for="inputPlace" class="lbl-color">Place</label>
                                            <select id="place" name="place" class="form-control">
                                                <option value="">----- Select Place -----</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-row">
                                        <div class="form-group col-md-12">
                                            <label for="inputDatepicker" class="lbl-color">Date</label>
                                            <input type="date" class="form-control" onload="getDate()" id="date" name="date" required>
                                        </div>
                                    </div>

                                    <div class="form-row">
                                        <div class="form-group col-md-12">
                                            <label for="inputName" class="lbl-color">Slot Name</label>
                                            <input type="text" class="form-control" id="sname" name="sname" autocomplete="off" placeholder="Enter Slot Name">
                                        </div>
                                    </div>

                                    <div class="form-row">
                                        <div class="form-group col-md-12">
                                            <label for="inputSlot" class="lbl-color">Add Number of Slots</label>
                                            <input type="text" class="form-control" id="fslots" name="fslots" autocomplete="off" placeholder="Enter Number of Free Slots">
                                        </div>
                                    </div>

                                    <input type="submit" class="btn btn-success" value="SAVE" id="submit-slot" name="submit">
                                </form>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-8 col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <button class="btn btn-small btn-danger float-left" id="delete-btn">DELETE</button>
                            </div>

                            <div class="card-body">
                                <table id="tblData" class="table table-bordered table-striped">
                                    <thead>
                                        <th class='text-center'><input type='checkbox' id='all-chkbx' value=''></th>
                                        <th class='text-center'>S.No.</th>
                                        <th class='text-center'>Slot Name</th>
                                        <th class='text-center'>Slot Date</th>
                                        <th class='text-center'>Current Slot Status</th>
                                        <th class='text-center'>Total Slots</th>
                                        <th class='text-center'>City Name</th>
                                        <th class='text-center'>Place Name</th>
                                        <th class='text-center'>Show/Hide Slot</th>
                                        <th class='text-center'>Action</th>
                                    </thead>

                                    <tbody>
                                        <?php

                                        $sql_fetch = "SELECT *FROM slots as slots INNER JOIN cities ON slots.city_code = cities.city_id INNER JOIN places ON slots.place_code = places.place_id";

                                        // $sql_fetch = "SELECT *FROM slots ORDER BY id DESC";

                                        $result = mysqli_query($conn, $sql_fetch);
                                        ?>

                                        <?php
                                        if (mysqli_num_rows($result) > 0) {
                                            $id = 1;
                                            while ($row = mysqli_fetch_assoc($result)) { ?>
                                                <tr>
                                                    <td class='text-center'><input type='checkbox' class='del-chkbx' value='<?php echo $row['slot_id'] ?>'></td>
                                                    <td><?php echo $id ?></td>
                                                    <td><?php echo $row['slot_name'] ?></td>
                                                    <td><?php echo $row['slot_date'] ?></td>
                                                    <td><?php echo $row['slot_state'] ?></td>
                                                    <td><?php echo $row['free_slot'] ?></td>
                                                    <td><?php echo $row['city_name'] ?></td>
                                                    <td><?php echo $row['place_name'] ?></td>
                                                    <td class="text-center">
                                                        <input data-id="<?php echo $row['slot_id'] ?>" class="toggle-class" type="checkbox" data-onstyle="success" data-offstyle="danger" data-size="small" data-toggle="toggle" data-style="slow" data-on="Showing" data-off="Hidden" <?php echo $row['status'] ? '' : 'checked' ?>>
                                                    </td>
                                                    <td class="text-center">
                                                        <button data-eid="<?php echo $row['slot_id'] ?>" class="btn btn-sm btn-info" id="edit-btn">Edit</button>
                                                    </td>
                                                </tr>
                                            <?php $id++;
                                            } ?>
                                        <?php }  ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

<?php
include('includes/info-modal.php');
include('includes/slot-modal.php');
include('includes/editSlot-modal.php');
include('includes/admin-footer.php');
?>

<script>
    // Toggle Switch
    $(function() {
        $('.toggle-class').change(function() {
            var status = $(this).prop('checked') == true ? 0 : 1;
            var slot_id = $(this).data('id');

            $.ajax({
                type: "POST",
                // dataType: "json",
                url: 'changeStatus',
                data: {
                    'status': status,
                    'slot_id': slot_id
                },
                success: function(data) {
                    if (status == 0) {
                        toastr['success']("Slot has been successfully Unblocked !!");
                    } else if (status == 1) {
                        toastr['error']("Slot has been successfully Blocked !!");
                    }
                }
            });
        });
    })

    // Page specific script
    $(document).ready(function() {
        $("#tblData").DataTable({
            "responsive": true,
            "processing": true,
            "lengthChange": true,
            "autoWidth": false,
            "columnDefs": [
                // {
                //     "targets": [0, 1, 2, 3, 4, 5],
                //     "className": "dt-center",
                // },
                {
                    "orderable": false,
                    "targets": [0],
                }
            ],
            dom: 'Brtip',
            buttons: [{
                    extend: 'copy',
                    exportOptions: {
                        columns: [1, 2, 3, 4, 5, 6, 7] //Your Column value those you want
                    }
                },
                {
                    extend: 'excel',
                    exportOptions: {
                        columns: [1, 2, 3, 4, 5, 6, 7] //Your Column value those you want
                    }
                },
                {
                    extend: 'pdf',
                    exportOptions: {
                        columns: [1, 2, 3, 4, 5, 6, 7] //Your Column value those you want
                    }
                },
                {
                    extend: 'print',
                    exportOptions: {
                        columns: [1, 2, 3, 4, 5, 6, 7] //Your Column value those you want
                    }
                },
                {
                    extend: 'colvis',
                    exportOptions: {
                        columns: [0, 1, 2, 3, 4, 5, 6, 7] //Your Column value those you want
                    }
                },

            ],
            // "buttons": ["copy", "excel", "pdf", "print", "colvis"],
        }).buttons().container().appendTo('#tblData_wrapper .col-md-6:eq(0)');
    });
</script>