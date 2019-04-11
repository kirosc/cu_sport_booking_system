<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>CU Sport Booking System</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" type="image/png" href="<?php echo base_url(); ?>images/logo_64px.png">
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
            <img src="<?php echo base_url(); ?>images/logo_64px.png" class="d-inline-block align-top" alt=""
                 id="nav-icon">
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
                <?php if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] && isset($_SESSION['usertype']) && $_SESSION['usertype'] == 'admin'): ?>
                    <?php if ($nav == 'admin_session'): ?>
                        <li class='nav-item active'>
                            <a class='nav-link' href='<?php echo $page_url; ?>admin/session' id='current'>Session
                                Control <span class='sr-only'>(current)</span></a>
                        </li>
                    <?php else: ?>
                        <li class='nav-item'>
                            <a class='nav-link' href='<?php echo $page_url; ?>admin/session'>Session Control</a>
                        </li>
                    <?php endif; ?>

                    <?php if ($nav == 'admin_user'): ?>
                        <li class='nav-item active'>
                            <a class='nav-link' href='<?php echo $page_url; ?>admin/user' id='current'>User Control
                                <span class='sr-only'>(current)</span></a>
                        </li>
                    <?php else: ?>
                        <li class='nav-item'>
                            <a class='nav-link' href='<?php echo $page_url; ?>admin/user'>User Control</a>
                        </li>
                    <?php endif; ?>

                <?php else: ?>

                    <?php if ($nav == 'home'): ?>
                        <li class='nav-item active'>
                            <a class='nav-link' href='<?php echo base_url(); ?>' id='current'>Home <span
                                        class='sr-only'>(current)</span></a>
                        </li>
                    <?php else: ?>
                        <li class='nav-item'>
                            <a class='nav-link' href='<?php echo base_url(); ?>'>Home</a>
                        </li>
                    <?php endif; ?>

                    <?php if ($nav == 'course'): ?>
                        <li class='nav-item active'>
                            <a class='nav-link' href='<?php echo $page_url; ?>course' id='current'>Course <span
                                        class='sr-only'>(current)</span></a>
                        </li>
                    <?php else: ?>
                        <li class='nav-item'>
                            <a class='nav-link' href='<?php echo $page_url; ?>course'>Course</a>
                        </li>
                    <?php endif; ?>

                    <?php if ($nav == 'court_booking'): ?>
                        <li class='nav-item active'>
                            <a class='nav-link' href='<?php echo $page_url; ?>court_booking' id='current'>Book Court
                                <span class='sr-only'>(current)</span></a>
                        </li>
                    <?php else: ?>
                        <li class='nav-item'>
                            <a class='nav-link' href='<?php echo $page_url; ?>court_booking'>Book Court</a>
                        </li>
                    <?php endif; ?>

                    <?php if ($nav == 'session_share'): ?>
                        <li class='nav-item active'>
                            <a class='nav-link' href='<?php echo $page_url; ?>session_share' id='current'>Session Share
                                <span class='sr-only'>(current)</span></a>
                        </li>
                    <?php else: ?>
                        <li class='nav-item'>
                            <a class='nav-link' href='<?php echo $page_url; ?>session_share'>Session Share</a>
                        </li>
                    <?php endif; ?>

                <?php endif; ?>
            </ul>
            <ul class="navbar-nav mr-2">
                <?php if (isset($_SESSION['logged_in']) && $_SESSION['logged_in']): ?>
                    <li class='nav-item dropdown'>
                        <a class='nav-link dropdown-toggle' href='#' id='navbarDropdown' role='button'
                           data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
                            <?php echo $_SESSION['username']; ?>
                        </a>
                        <div class='dropdown-menu dropdown-menu-right' aria-labelledby='navbarDropdown'>

                            <?php if ($_SESSION['usertype'] != 'admin'): ?>
                                <a class='dropdown-item'
                                   href='<?php echo $page_url; ?>profile/<?php echo $_SESSION['username']; ?>'>Profile</a>
                            <?php endif; ?>

<!--                            <a class='dropdown-item'-->
<!--                               href='--><?php //echo $page_url . 'schedule/' . $user['db']->username; ?><!--'>Schedule</a>-->

                            <div class='dropdown-divider'></div>

                            <a class='dropdown-item align-text-bottom' href='<?php echo $page_url; ?>login/logout'>
                                Logout
                                <span class='span-icon'><i class='material-icons inline-icons'>exit_to_app</i></span>
                            </a>

                        </div>
                    </li>

                <?php else: ?>
                    <li class='nav-item'>
                        <a class='nav-link' href='<?php echo $page_url; ?>login/login_main'>
                            Login
                            <span class='span-icon'><i class='material-icons inline-icons'>exit_to_app</i></span>
                        </a>
                    </li>
                <?php endif; ?>
            </ul>
    </nav>
</header>
