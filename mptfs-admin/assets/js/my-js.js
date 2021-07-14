//Hide Alert Message
// $('#submit').click(function() {
//     setTimeout(function() {
//         $('.alert').slideUp('slow');
//     }, 5000);
// });

// Insert City
function insertCity(){
    $('#submit-city').on('click', function(e) {
        e.preventDefault();
        var city = '';

        var city = $('#city').val();

        if (city == '') {
            toastr["error"]("City field is required.");
        } else {

            $.ajax({
                url: 'insertCity.php',
                type: 'POST',
                data: {
                    city: city
                },
                success: function(data) {
                    if (data == true) {
                        toastr["success"]("City Successfully Saved.");
                        setTimeout(function() {
                            window.location.reload();
                        }, 1000);
                        $("#usrForm")[0].reset();
                    } else if (data == false) {
                        toastr["error"]("City Not Saved !!");
                    } else {
                        toastr["error"]("City Already Exist !!");
                    }
                }
            });
        }
    });
}

insertCity();

// Delete City
function deleteCity(){
    $(document).on("click", "#all-chkbx", function() {

        var id = [];
    
        if (this.checked) {
            $(".del-chkbx").each(function(key) {
                $(".del-chkbx").prop('checked', true);
                id[key] = $(this).val();
            });
        } else {
            $(".del-chkbx").each(function() {
                $(".del-chkbx").prop('checked', false);
            });
        }
    });
    
    $("#delete-btn").on("click", function() {
    
        var id = [];
    
        $(".del-chkbx:checked").each(function(key) {
            id[key] = $(this).val();
        });
    
        if (id.length == 0) {
            $("#msgModal").modal('show');
        } else {
            $("#delCityModal").modal('show');
    
            $(document).on("click", "#delCity", function() {
                $.ajax({
                    url: "deleteCity.php",
                    type: "POST",
                    data: {
                        id: id
                    },
                    success: function(data) {
                        if (data == true) {
                            $("#delCityModal").modal('hide');
                            toastr["success"]("City Successfully Deleted.");
                            // $('#tblData').ajax.reload();
                            setTimeout(function() {
                                window.location.reload();
                            }, 1000);
                        }
                    }
                });
            });
        }
    });
}

deleteCity();

// Load Place Data from database
function loadPlaceData(type, cat_id) {
    $.ajax({
        url: 'placeProcess.php',
        type: 'POST',
        data: {
            type: type,
            id: cat_id
        },
        success: function(data) {
            if (type == '') {
                $("#places").html('');
            } else {
                $('#cities').append(data);
            }
        }
    });
}

loadPlaceData();

// Check validation for place form
function checkValidation(){
    $(document).ready(function() {
        $('#submit-place').on('click', function(e) {
            e.preventDefault();
            var city, place = '';
    
            var city = $('#cities').val();
            var place = $('#place').val();
    
            if (city == '' || place == '') {
                toastr["error"]("All fields are required.");
            } else {
                $.ajax({
                    url: 'insertPlace.php',
                    type: 'POST',
                    data: {
                        city: city,
                        place: place,
                    },
                    success: function(data) {
                        if (data == true) {
                            toastr["success"]("Place Successfully Saved.");
                            setTimeout(function() {
                                window.location.reload();
                            }, 1000);
                            $("#usrForm")[0].reset();
                        } else if (data == false) {
                            toastr["error"]("Place Not Saved !!");
                        } else {
                            toastr["error"]("Place Already Exist !!");
                        }
                    }
                });
            }
        });
    });
}

checkValidation();

// Delete Place
function deletePlace(){
    $(document).on("click", "#all-chkbx", function() {

        var id = [];
    
        if (this.checked) {
            $(".del-chkbx").each(function(key) {
                $(".del-chkbx").prop('checked', true);
                id[key] = $(this).val();
            });
        } else {
            $(".del-chkbx").each(function() {
                $(".del-chkbx").prop('checked', false);
            });
        }
    });
    
    $("#delete-btn").on("click", function() {
    
        var id = [];
    
        $(".del-chkbx:checked").each(function(key) {
            id[key] = $(this).val();
        });
    
        if (id.length == 0) {
            $("#msgModal").modal('show');
        } else {
            $("#delPlaceModal").modal('show');
    
            $(document).on("click", "#delPlace", function() {
                $.ajax({
                    url: "deletePlace.php",
                    type: "POST",
                    data: {
                        id: id
                    },
                    success: function(data) {
                        if (data == true) {
                            $("#delPlaceModal").modal('hide');
                            toastr["success"]("Place Successfully Deleted.");
                            // $('#tblData').ajax.reload();
                            setTimeout(function() {
                                window.location.reload();
                            }, 1000);
                        }
                    }
                });
            });
        }
    });
}

deletePlace();

// Load Slot data from database
function loadSlotData(type, cat_id) {
    $.ajax({
        url: 'slotProcess.php',
        type: 'POST',
        data: {
            type: type,
            id: cat_id
        },
        success: function(data) {
            if (type == 'slotData') {
                $("#slot").append(data);
            } else if (type == 'placeData') {
                $('#place').append(data);
            } else if (type == 'currData') {
                $("#cslots").val(data);
            } else {
                $('#city').append(data);
            }
        }
    });
}

loadSlotData();

$('#city').on('change', function() {
    $('#place').html('<option value="">----- Select Place -----</option>');
    var city = $('#city').val();

    if (city != '') {
        loadSlotData('placeData', city);
    } else {
        $('#places').html('');
    }
});

$('#place').on('change', function() {
    $('#slot').html('<option value="">----- Select Slot -----</option>');
    var place = $('#place').val();

    if (place != '') {
        loadSlotData('slotData', place);
    } else {
        $('#slot').html('<option value="">----- Select Slot -----</option>');
    }
});

$('#slot').on('change', function() {
    $('#cslots').html('');
    var slot = $('#slot').val();

    if (slot != '') {
        loadSlotData('currData', slot);
    } else {
        $('#cslots').html('');
    }
});

// Insert Slots
function checkSlots(){
    $(document).ready(function() {
        $('#submit-slot').on('click', function(e) {
            e.preventDefault();
            var city, place, date, name, slots = '';
    
            var city = $('#city').val();
            var place = $('#place').val();
            var name = $('#sname').val();
            var date = $('#date').val();
            var slots = $('#fslots').val();
    
            if (city == '' || place == '' || date == '' || name == '' || slots == '') {
                toastr["error"]("All fields are required.");
            } else {
                $.ajax({
                    url: 'insertSlot.php',
                    type: 'POST',
                    data: {
                        city: city,
                        place: place,
                        date: date,
                        name: name,
                        slots: slots,
                    },
                    success: function(data) {
                        if (data == true) {
                            toastr["success"]("Slot Successfully Saved.");
                            setTimeout(function() {
                                window.location.reload();
                            }, 1000);
    
                            $("#usrForm")[0].reset();
                            getDate();
                        } else if (data == false) {
                            toastr["error"]("Slot Not Saved !!");
                        } else if (data == 2) {
                            toastr["error"]("Slot Already Exist !!");
                        }
                    }
                });
            }
        });
    });

    // Set Default Date
    $(document).ready(function() {
        getDate();
    });

    function getDate() {
        var today = new Date();
        document.getElementById("date").value = today.getFullYear() + '-' + ('0' + (today.getMonth() + 1)).slice(-2) + '-' + ('0' + today.getDate()).slice(-2);
    }

    //Prevent Back Date in Datepicker
    var today = new Date().toISOString().split('T')[0];
    document.getElementsByName("date")[0].setAttribute('min', today);
}

checkSlots();

// Delete Slots
function deleteSlots(){
    $(document).on("click", "#all-chkbx", function() {

        var id = [];
    
        if (this.checked) {
            $(".del-chkbx").each(function(key) {
                $(".del-chkbx").prop('checked', true);
                id[key] = $(this).val();
            });
        } else {
            $(".del-chkbx").each(function() {
                $(".del-chkbx").prop('checked', false);
            });
        }
    });
    
    
    $("#delete-btn").on("click", function() {
    
        var id = [];
    
        $(".del-chkbx:checked").each(function(key) {
            id[key] = $(this).val();
        });
    
        if (id.length == 0) {
            $("#msgModal").modal('show');
        } else {
            $("#delModal").modal('show');
    
            $(document).on("click", "#delSlot", function() {
                $.ajax({
                    url: "deleteSlots.php",
                    type: "POST",
                    data: {
                        id: id
                    },
                    success: function(data) {
                        if (data == true) {
                            $("#delModal").modal('hide');
                            toastr["success"]("Slot Successfully Deleted.");
                            // $('#tblData').ajax.reload();
                            setTimeout(function() {
                                window.location.reload();
                            }, 1000);
                        }
                    }
                });
            });
        }
    });
}

deleteSlots();


// Edit Slot
$(document).on("click", "#edit-btn", function() {
    $("#editModal").modal('show');
    var eid = $(this).data('eid');

    $.ajax({
        url: "loadSlot.php",
        type: "POST",
        data: {
            eid: eid
        },
        success: function(data) {
            $(".modal-dialog .modal-content #modal-body").html(data);
        }
    });
});

//Update Slot
$(document).on("click", "#updateSlot", function() {
    var sid = $("#sid").val();
    var edate = $("#edate").val();
    var esname = $("#esname").val();
    var efslots = $("#efslots").val();

    $.ajax({
        url: "updateSlot.php",
        type: "POST",
        data: {
            id: sid, date: edate, sname: esname, fslots: efslots
        },
        success: function(data) {
            if(data == 1)
            {
                $("#editModal").modal('hide');
                toastr["success"]("Slot Successfully Updated.");
                // $('#tblData').ajax.reload();
                setTimeout(function() {
                    window.location.reload();
                }, 1000);
            }
        }
    });
});




