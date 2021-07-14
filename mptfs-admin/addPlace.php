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
                                            <select id="cities" name="cities" class="form-control">
                                                <option value="">----- Select City -----</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-row">
                                        <div class="form-group col-md-12">
                                            <label for="inputPlace" class="lbl-color">Place</label>
                                            <input type="text" class="form-control" id="place" name="place" placeholder="Enter Place Name" autocomplete="off">
                                        </div>
                                    </div>

                                    <input type="submit" class="btn btn-success" value="SAVE" id="submit-place" name="submit">
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
                                        <th class="text-center"><input type='checkbox' id='all-chkbx' value=''></th>
                                        <th class="text-center">S.No.</th>
                                        <th class="text-center">City Name</th>
                                        <th class="text-center">Place Name</th>
                                    </thead>

                                    <tbody>
                                        <?php

                                        $sql_fetch = "SELECT *FROM places LEFT JOIN cities ON places.city_code = cities.city_id ORDER BY places.place_id DESC";

                                        // $sql_fetch = "SELECT *FROM places ORDER BY id DESC";

                                        $result = mysqli_query($conn, $sql_fetch);
                                        ?>

                                        <?php
                                        if (mysqli_num_rows($result) > 0) {
                                            $id = 1;
                                            while ($row = mysqli_fetch_assoc($result)) { ?>
                                                <tr>
                                                    <td class="text-center"><input type='checkbox' class='del-chkbx' value='<?php echo $row['place_id'] ?>'></td>
                                                    <td class="text-center"><?php echo $id ?></td>
                                                    <td class="text-center"><?php echo $row['city_name'] ?></td>
                                                    <td class="text-center"><?php echo $row['place_name'] ?></td>
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
include('includes/place-modal.php');
include('includes/admin-footer.php');
?>

<script>
    // Page specific script
    $(document).ready(function() {
        $("#tblData").DataTable({
            "responsive": true,
            "processing": true,
            "lengthChange": true,
            "searching": true,
            "autoWidth": false,
            "columnDefs": [{
                "orderable": false,
                "targets": [0, 1, 2, 3],
            }],
            language: {
                sLengthMenu: "Show _MENU_ Records"
            },
            dom: "<'row'<'col-sm-6'l><'col-sm-6'f>>Brtip",
            buttons: [{
                    extend: 'copy',
                    exportOptions: {
                        columns: [1, 2] //Your Column value those you want
                    }
                },
                {
                    extend: 'excel',
                    exportOptions: {
                        columns: [1, 2, 3] //Your Column value those you want
                    }
                },
                {
                    extend: 'pdf',
                    exportOptions: {
                        columns: [1, 2, 3] //Your Column value those you want
                    }
                },
                {
                    extend: 'print',
                    exportOptions: {
                        columns: [1, 2, 3] //Your Column value those you want
                    }
                },
                {
                    extend: 'colvis',
                    exportOptions: {
                        columns: [0, 1, 2, 3] //Your Column value those you want
                    }
                },

            ],
            // "buttons": ["copy", "excel", "pdf", "print", "colvis"],
        });
    });
</script>