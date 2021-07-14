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

<div id="admin-content">
    <div class="row">
        <div class="col-md-12">
            <div class="container-fluid mt-5 mb-5">
                <div class="row">
                    <div class="col-lg-4 col-md-12 mb-4">

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
                                            <input type="text" class="form-control" id="city" name="city" placeholder="Enter City Name" autocomplete="off">
                                        </div>

                                    </div>

                                    <input type="submit" class="btn btn-success" value="SAVE" id="submit-city" name="submit">
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
                                    <thead class="text-center">
                                        <th><input type='checkbox' id='all-chkbx' value=''></th>
                                        <th>S.No.</th>
                                        <th>City Name</th>
                                    </thead>

                                    <tbody>
                                        <?php
                                        $sql_fetch = "SELECT *FROM cities ORDER BY city_id DESC";

                                        $result = mysqli_query($conn, $sql_fetch);
                                        ?>

                                        <?php
                                        if (mysqli_num_rows($result) > 0) {
                                            $id = 1;
                                            while ($row = mysqli_fetch_assoc($result)) { ?>
                                                <tr class="text-center">
                                                    <td><input type='checkbox' class='del-chkbx' value='<?php echo $row['city_id'] ?>'></td>
                                                    <td><?php echo $id ?></td>
                                                    <td><?php echo $row['city_name'] ?></td>
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
include('includes/city-modal.php');
include('includes/admin-footer.php');
?>

<script>
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
                        columns: [1, 2] //Your Column value those you want
                    }
                },
                {
                    extend: 'excel',
                    exportOptions: {
                        columns: [1, 2] //Your Column value those you want
                    }
                },
                {
                    extend: 'pdf',
                    exportOptions: {
                        columns: [1, 2] //Your Column value those you want
                    }
                },
                {
                    extend: 'print',
                    exportOptions: {
                        columns: [1, 2] //Your Column value those you want
                    }
                },
                {
                    extend: 'colvis',
                    exportOptions: {
                        columns: [0, 1, 2] //Your Column value those you want
                    }
                },

            ],
            // "buttons": ["copy", "excel", "pdf", "print", "colvis"],
        }).buttons().container().appendTo('#tblData_wrapper .col-md-6:eq(0)');
    });
</script>