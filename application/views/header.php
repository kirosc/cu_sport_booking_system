<!DOCTYPE html>
<html>
<head>
  <title>CU Sport Booking System</title>
</head>

<body>
<header>
  <div class="navbar">
    <ul>
      <li class="<?php if ($title == 'Home') echo 'active'; ?>">
        <a href="<?php echo $page_url; ?>">Home</a>
      </li>
      <li class="<?php if ($title == 'Course') echo 'active'; ?>">
        <a href="<?php echo $page_url; ?>course">Course</a>
      </li>
      <li class="<?php if ($title == 'Facility') echo 'active'; ?>">
        <a href="<?php echo $page_url; ?>facility">Facility</a>
      </li>
      <li class="<?php if ($title == 'Session Share') echo 'active'; ?>">
        <a href="<?php echo $page_url; ?>session-share">Session Share</a>
      </li>
    </ul>
  </div>
</header>
