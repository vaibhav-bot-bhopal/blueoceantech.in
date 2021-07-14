<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Basic -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="keywords" content="HTML5 Template" />
    <meta name="description" content="Porto - Responsive HTML5 Template">
    <meta name="author" content="okler.net">

    <!-- Favicon -->
    <link rel="shortcut icon" href="../img/logo/favicon.png" type="image/x-icon" />
    <link rel="apple-touch-icon" href="../img/logo/favicon.png">

    <?php
    include('../includes/connection.inc.php');

    error_reporting(0);

    if ($_SESSION['role'] == 'admin') { ?>
        <meta http-equiv="refresh" content="900;url=logout.php">
        <title>Admin Panel</title>
    <?php } else if ($_SESSION['role'] == 'user') { ?>
        <meta http-equiv="refresh" content="180;url=logout.php">
        <title>User Panel</title>
    <?php  } else { ?>
        <title>Login Panel</title>
    <?php } ?>

    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1.0, shrink-to-fit=no">

    <!-- Web Fonts  -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800%7CShadows+Into+Light" rel="stylesheet" type="text/css">

    <!-- Vendor CSS -->
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/all.min.css">

    <!-- Theme CSS -->
    <link rel="stylesheet" href="../assets/css/theme.css">
    <link rel="stylesheet" href="../assets/css/theme-elements.css">

    <!-- DataTables -->
    <link rel="stylesheet" href="plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="plugins/datatables-buttons/css/buttons.bootstrap4.min.css">

    <!-- Skin CSS -->
    <link rel="stylesheet" href="../assets/css/default.css">

    <!-- Toastr -->
    <link rel="stylesheet" href="https://cdn.bootcss.com/toastr.js/latest/css/toastr.min.css">

    <!-- Toggle Switch -->
    <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">

    <!-- Theme Custom CSS -->
    <link rel="stylesheet" href="../assets/css/custom.css">

    <!-- My Style -->
    <link rel="stylesheet" href="assets/css/my-style.css">
</head>