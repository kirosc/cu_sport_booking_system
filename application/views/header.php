<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" type="text/css" href="../../styles/header.css"/>
    <meta charset="utf-8">
    <title>CU Sport Booking System</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <?php foreach ($css_file as $file): ?>
        <link rel="stylesheet" href="<?php echo $file; ?>">
    <?php endforeach; ?>

    <?php foreach ($js_file as $file): ?>
        <script type="text/javascript" src="<?php echo $file; ?>"></script>
    <?php endforeach; ?>

    <meta name="theme-color" content="#fafafa">
</head>

<body>
<header>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <a href="<?php echo base_url(); ?>" class="d-none d-400-block">
            <img src="<?php echo base_url(); ?>images/logo_64px.png" class="d-inline-block align-top" alt="">
        </a>
        <a class="navbar-brand" href="<?php echo base_url(); ?>">
            <span id="title">CU Sport Booking System</span>
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>


        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <?php
                if ($nav == 'home') {
                    echo "<li class='nav-item active'>
                    <a class='nav-link' href='".base_url()."' id='current'>Home <span class='sr-only'>(current)</span></a>
                    </li>";
                } else {
                    echo "<li class='nav-item'>
                    <a class='nav-link' href='" . base_url() . "'>Home</a>
                    </li>";
                }

                if ($nav == 'course') {
                    echo "<li class='nav-item active'>
                    <a class='nav-link' href='" . $page_url . "course' id='current'>Course <span class='sr-only'>(current)</span></a>
                    </li>";
                } else {
                    echo "<li class='nav-item'>
                    <a class='nav-link' href='" . $page_url . "course'>Course</a>
                    </li>";
                }

                if ($nav == 'facility') {
                    echo "<li class='nav-item active'>
                    <a class='nav-link' href='" . $page_url . "facility' id='current'>Book Court <span class='sr-only'>(current)</span></a>
                    </li>";
                } else {
                    echo "<li class='nav-item'>
                    <a class='nav-link' href='" . $page_url . "facility'>Book Court</a>
                    </li>";
                }

                if ($nav == 'session_share') {
                    echo "<li class='nav-item active'>
                    <a class='nav-link' href='" . $page_url . "session_share' id='current'>Session Share <span class='sr-only'>(current)</span></a>
                    </li>";
                } else {
                    echo "<li class='nav-item'>
                    <a class='nav-link' href='" . $page_url . "session_share'>Session Share</a>
                    </li>";
                }
                ?>
            </ul>
            <ul class="navbar-nav mr-2">
                <?php
                if (isset($_SESSION['logged_in']) && $_SESSION['logged_in']) {
                    echo "
                            <li class=\"nav-item dropdown\">
                                <a class=\"nav-link dropdown-toggle\" href=\"#\" id=\"navbarDropdown\" role=\"button\"
                                data-toggle=\"dropdown\" aria-haspopup=\"true\" aria-expanded=\"false\">
                                {$_SESSION['username']}
                                </a>
                                <div class=\"dropdown-menu dropdown-menu-right\" aria-labelledby=\"navbarDropdown\">
                                <a class=\"dropdown-item\" href=\"#\">Profile</a>
                                <div class=\"dropdown-divider\"></div>
                                <a class=\"dropdown-item align-text-bottom\" href='" . $page_url . "login/logout'>
                                    Logout
                                    <span class='span-icon'><i class=\"material-icons inline-icons\">exit_to_app</i></span>
                                </a>

                    </div>
                </li>
                        ";
                } else {
                    echo "
                        <li class=\"nav-item\">
                            <a class=\"nav-link\"  href='" . $page_url . "login/login_main'>
                                Login
                                <span class='span-icon'><i class=\"material-icons inline-icons\">exit_to_app</i></span>
                            </a>
                        </li>
                        ";
                }
                ?>
            </ul>
    </nav>
</header>
