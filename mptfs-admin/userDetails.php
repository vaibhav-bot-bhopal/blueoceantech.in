<?php

include('../includes/connection.inc.php');


// Initialize the session
session_start();

// Check if the user is logged in, if not then redirect him to login page
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
    header("location: login-view.php");
    exit;
}
?>

<?php
include('includes/admin-header.php');
?>

<style>
    select {
        border: 2px solid #999;
        border-radius: 3px;
        outline: none;
    }
</style>

<div id="admin-content">
    <div class="row">
        <div class="col-md-12">
            <div class="container-fluid mt-5 mb-5">
                <div class="row d-flex">
                    <div class="col-md-12 mx-auto">

                        <div id="message"></div>

                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-lg-6 offset-lg-3">
                                        <p class="text-center" id="selectTriggerPlace"><label style="font-size: 14px; font-weight: 600;">Filter by Place:</label><br></p>
                                        <!-- <p class="float-right" id="selectTriggerCity" style="margin-right: 20px;"><label style="font-size: 14px; font-weight: 600;">Filter by City:</label><br></p> -->
                                    </div>
                                </div>

                                <table id="tblData" class="table table-bordered table-striped">
                                    <thead>
                                        <th>S.No.</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Address</th>
                                        <th>Phone No.</th>
                                        <th>Are you a student studying in Class 8th to Class 12th (for session Apr 2021 - Mar 2022) ?</th>
                                        <th>City</th>
                                        <th>Place</th>
                                        <th>Date</th>
                                        <th>Slot Name</th>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $sql_fetch = "SELECT *FROM participants as p LEFT JOIN slots ON p.slot = slots.slot_id LEFT JOIN cities ON p.city = cities.city_id  LEFT JOIN places ON p.place = places.place_id";

                                        $result = mysqli_query($conn, $sql_fetch);
                                        ?>

                                        <?php
                                        if (mysqli_num_rows($result) > 0) {
                                            $id = 1;
                                            while ($row = mysqli_fetch_assoc($result)) { ?>
                                                <tr>
                                                    <td><?php echo $id ?></td>
                                                    <td><?php echo $row['name'] ?></td>
                                                    <td><?php echo $row['email'] ?></td>
                                                    <td><?php echo $row['address'] ?></td>
                                                    <td><?php echo $row['phone'] ?></td>
                                                    <td><?php echo $row['answer'] ?></td>
                                                    <td><?php echo $row['city_name'] ?></td>
                                                    <td><?php echo $row['place_name'] ?></td>
                                                    <td>
                                                        <?php
                                                        $date = strtotime($row['date']);
                                                        echo date('d-m-Y', $date);
                                                        ?>
                                                    </td>
                                                    <td><?php echo $row['slot_name'] ?></td>
                                                </tr>
                                            <?php $id++;
                                            } ?>
                                        <?php }  ?>
                                    </tbody>

                                    <tfoot>
                                        <th>S.No.</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Address</th>
                                        <th>Phone No.</th>
                                        <th>Are you a student studying in Class 8th to Class 12th (for session Apr 2021 - Mar 2022) ?</th>
                                        <th>City</th>
                                        <th>Place</th>
                                        <th>Date</th>
                                        <th>Slot Name</th>
                                    </tfoot>
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
include('includes/admin-footer.php');

if ($_SESSION['role'] == 'admin') { ?>
    <script>
        // Page specific script
        $(document).ready(function() {
            $("#tblData").DataTable({
                "responsive": true,
                "processing": true,
                "lengthChange": true,
                "autoWidth": false,
                "columnDefs": [{
                    "orderable": false,
                    "targets": [0, 1, 2, 3, 4, 5, 6, 7, 8, 9],
                }],
                dom: 'Brtip',
                buttons: [{
                        extend: 'copy',
                        exportOptions: {
                            columns: [0, 1, 2, 3, 4, 5, 6, 7, 8, 9] //Your Column value those you want
                        }
                    },
                    {
                        extend: 'excel',
                        exportOptions: {
                            columns: [0, 1, 2, 3, 4, 5, 6, 7, 8, 9] //Your Column value those you want
                        }
                    },
                    {
                        extend: 'pdf',
                        exportOptions: {
                            columns: [0, 1, 2, 3, 4, 5, 6, 7, 8, 9] //Your Column value those you want
                        }
                    },
                    {
                        extend: 'print',
                        exportOptions: {
                            columns: [0, 1, 2, 3, 4, 5, 6, 7, 8, 9] //Your Column value those you want
                        }
                    },
                    {
                        extend: 'colvis',
                        exportOptions: {
                            columns: [0, 1, 2, 3, 4, 5, 6, 7, 8, 9] //Your Column value those you want
                        }
                    },
                ],

                initComplete: function() {
                    var city_column = this.api().column(6);

                    var select_city = $('<select class="filter"><option value=""></option></select>')
                        .appendTo('#selectTriggerCity')
                        .on('change', function() {
                            var val = $(this).val();
                            city_column.search(val ? '^' + $(this).val() + '$' : val, true, false).draw();
                        });

                    city_column.data().unique().sort().each(function(d, j) {
                        select_city.append('<option value="' + d + '">' + d + '</option>');
                    });

                    var place_column = this.api().column(7);

                    var select_place = $('<select class="filter w-100 p-1" style="font-weight: 600;"><option value="">----- Select Your Place -----</option></select>')
                        .appendTo('#selectTriggerPlace')
                        .on('change', function() {
                            var val = $(this).val();
                            place_column.search(val ? '^' + $(this).val() + '$' : val, true, false).draw();
                        });

                    place_column.data().unique().sort().each(function(d, j) {
                        select_place.append('<option value="' + d + '">' + d + '</option>');
                    });
                }
            });
        });
    </script>
<?php } else if ($_SESSION['role'] == 'user') { ?>
    <script>
        // Page specific script
        $(document).ready(function() {
            $("#tblData").DataTable({
                "responsive": true,
                "processing": true,
                "lengthChange": true,
                "autoWidth": false,
                "columnDefs": [{
                    "orderable": false,
                    "targets": [0, 1, 2, 3, 4, 5, 6, 7, 8, 9],
                }],
                dom: 'Brtip',
                buttons: [{
                    extend: 'excel',
                    exportOptions: {
                        columns: [1, 2, 3, 4, 5, 6, 7, 8, 9] //Your Column value those you want
                    }
                }, ],

                initComplete: function() {
                    var city_column = this.api().column(6);

                    var select_city = $('<select class="filter"><option value=""></option></select>')
                        .appendTo('#selectTriggerCity')
                        .on('change', function() {
                            var val = $(this).val();
                            city_column.search(val ? '^' + $(this).val() + '$' : val, true, false).draw();
                        });

                    city_column.data().unique().sort().each(function(d, j) {
                        select_city.append('<option value="' + d + '">' + d + '</option>');
                    });

                    var place_column = this.api().column(7);

                    var select_place = $('<select class="filter w-100 p-1" style="font-weight: 600;"><option value="">----- Select Your Place -----</option></select>')
                        .appendTo('#selectTriggerPlace')
                        .on('change', function() {
                            var val = $(this).val();
                            place_column.search(val ? '^' + $(this).val() + '$' : val, true, false).draw();
                        });

                    place_column.data().unique().sort().each(function(d, j) {
                        select_place.append('<option value="' + d + '">' + d + '</option>');
                    });
                }
            });
        });
    </script>
<?php } ?>