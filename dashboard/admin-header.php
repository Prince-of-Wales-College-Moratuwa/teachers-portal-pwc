<?php
// header.php
?>

<!doctype html>
<html lang="en">

<head>

    <!-- Favicon -->
    <link href="https://princeofwales.edu.lk/content/icons/logo-70x70-pwc.webp" rel="icon">
    <link rel="icon" href="https://princeofwales.edu.lk/content/icons/logo-70x70-pwc.webp" type="image/x-icon">
    <link rel="apple-touch-icon" sizes="180x180"
        href="https://princeofwales.edu.lk/content/icons/logo-apple-touch-icon-pwc.webp">
    <link rel="icon" type="image/webp" sizes="192x192"
        href="https://princeofwales.edu.lk/content/icons/logo-android-chrome-icon-pwc.webp">
    <meta name="msapplication-TileImage" content="https://princeofwales.edu.lk/content/icons/logo-70x70-pwc.webp">
    <meta name="msapplication-TileColor" content="#800000">


    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Teachers Portal for PWC">
    <meta name="author" content="PWC">
    <meta name="generator" content="PWC Teachers Portal">
    <title>Teachers Portal</title>

    <!-- Bootstrap core CSS -->
    <style>
        <?php include 'css/styles.css';
        ?>
    </style>
    <style>
        <?php include 'css/simple-datatables-style.css';
        ?>
    </style>
    <style>
        <?php include 'css/select2.min.css';
        ?>
    </style>
    <style>
        <?php include 'css/vanillaSelectBox.css';
        ?>
    </style>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <!-- Additional Metadata -->
    <meta name="theme-color" content="#800000">
    <meta name="keywords" content="Teachers, Portal, PWC, Education">
    <meta name="robots" content="noindex, nofollow">

    <style>
        .breadcrumb {
            background-color: #f8f9fa;
            padding: 8px 15px;
            margin-bottom: 20px;
            border-radius: 4px;
        }

        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }

        .dropdown {
            position: relative;
            display: inline-block;
        }

        /* Style for the dropdown content */
        .dropdown-content {
            display: none;
            position: absolute;
            background-color: #f9f9f9;
            min-width: 160px;
            box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
            z-index: 1;
        }

        .dropdown-content a {
            color: black;
            padding: 12px 16px;
            text-decoration: none;
            display: block;
        }

        .dropdown-content a:hover {
            background-color: #f1f1f1;
        }

        .dropdown:hover .dropdown-content {
            display: block;
        }

        .dropdown-icon {
            margin-left: 5px;
        }
    </style>

</head>

<body class="sb-nav-fixed">
    <nav class="sb-topnav navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand ps-3" href="/dashboard">
            <img src="/content/icons/main.png" alt="pwc logo" width="35px">&nbsp;&nbsp;&nbsp;Teachers Portal - PWC
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive"
            aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ms-auto">
               
            </ul>
        </div>
    </nav>

    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                <div class="sb-sidenav-menu">
                    <div class="nav">
                        <a class="nav-item nav-link <?php if ($page === 'index') echo 'active'; ?>"
                            href="/dashboard"><img src="/content/icons/dashboard.png" width="20px">&nbsp Dashboard</a>
                        <a class="nav-item nav-link <?php if ($page === 'periodcount') echo 'active'; ?>"
                            href="/dashboard/periodcount"><img src="/content/icons/table.png" width="20px">&nbsp Period
                            Count</a>
                        <a class="nav-item nav-link <?php if ($page === 'teachers-leaving') echo 'active'; ?>"
                            href="/dashboard/teachers-leaving/"><img src="/content/icons/table.png" width="20px">&nbsp
                            Teachers' Leaving</a>
                        <hr>
                        <a class="nav-item nav-link" href="/logout"><img src="/content/icons/logout.png"
                                width="20px">&nbsp Logout</a>
                    </div>
                </div>
                <div class="sb-sidenav-footer">
                </div>
            </nav>
        </div>
        <div id="layoutSidenav_content">
            <main>