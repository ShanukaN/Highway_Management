<?php session_start(); 
include "security.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="shotcut icon" href="./image/lo.png" type="x-icon">
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Manager Dashboard</title>
    <script src="https://code.iconify.design/iconify-icon/1.0.0/iconify-icon.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
    <link href="css/styles.css" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
</head>

<body class="sb-nav-fixed" onload="initClock()">

    <?php include ('includes/navbar.php'); ?>

    <div id="layoutSidenav">

        <?php include ('includes/sidebar.php'); ?>

        <div id="layoutSidenav_content">
            <main>