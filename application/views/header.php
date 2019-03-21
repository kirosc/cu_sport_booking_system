<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>CU Sport Booking System</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!--    Below two css are for all page-->
    <link rel="stylesheet" href="styles/normalize.css">
    <link rel="stylesheet" href="styles/style.css">
    <!--    Header css-->
    <link rel="stylesheet" href="styles/header.css">

    <meta name="theme-color" content="#fafafa">
</head>

<body>
<header>
    <div class="header-container">
        <img src="../../images/logo.png" alt="logo">
        <div class="navbar">
            <ul>
                <li class="<?php if ($title == 'Home') echo 'active'; ?>">
                    <a href="<?php echo base_url(); ?>">Home</a>
                </li>
                <li class="<?php if ($title == 'Course') echo 'active'; ?>">
                    <a href="<?php echo $page_url; ?>course">Course</a>
                </li>
                <li class="<?php if ($title == 'Facility') echo 'active'; ?>">
                    <a href="<?php echo $page_url; ?>facility">Facility</a>
                </li>
                <li class="<?php if ($title == 'Session-Share') echo 'active'; ?>">
                    <a href="<?php echo $page_url; ?>session_share">Session Share</a>
                </li>
            </ul>
        </div>
    </div>
</header>
