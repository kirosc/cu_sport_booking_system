<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>CU Sport Booking System</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <?php foreach ($css_file as $file): ?>
        <link rel="stylesheet" href="<?php echo $file; ?>">
    <?php endforeach; ?>

    <meta name="theme-color" content="#fafafa">
</head>

<body>
<header>
    <div class="header-container">
        <div class="logo"><img src="<?php echo $image_url; ?>logo_128px.png" alt="logo"></div>
        <div class="navbar">
            <nav>
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
                        <a href="<?php echo $page_url; ?>session_share">Session Share<wbr></a>
                    </li>
                </ul>
            </nav>
        </div>
        <div class="right"></div>
    </div>
</header>
