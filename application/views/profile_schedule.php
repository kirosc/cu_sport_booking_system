<a href="<?php echo $page_url.'profile/'.$username;?>">Profile</a>
<?php if ($_SESSION['usertype'] == 'coach'): ?>

  <?php for ($i = 0;$i<sizeof($courses);$i++): ?>
      <p>Title: <?php echo $courses[$i]->course_name;?></p>
      <p>Date: <?php echo substr($courses[$i]->start_time, 0, 10);?></p>
      <p>Time: <?php echo substr($courses[$i]->start_time, 11, 5)." - ".substr($courses[$i]->end_time, 11, 5); ?></p>
      <p>Venue: <?php echo $courses[$i]->venue; ?></p>
      <p>Price: <?php echo $courses[$i]->price; ?></p>
      <p>Total Seats: <?php echo $courses[$i]->seats; ?></p>
      <p>Level: <?php echo $courses[$i]->level; ?></p>
      <br><br>
      <p>Participate Student:</p>
      <?php foreach ($courses_student[$i] as $student): ?>
        <p><?php echo $student->first_name." ".$student->last_name; ?></p>
      <?php endforeach; ?>
  <?php endfor; ?>



<?php elseif ($_SESSION['usertype'] == 'student'): ?>

  <p>Course Joined:</p>
  <?php for ($i=0; $i < sizeof($courses_join); $i++): ?>
    <p>Course Name: <?php echo $courses_join[$i]->course_name; ?></p>
    <p>Date: <?php echo substr($courses_join[$i]->start_time, 0, 10); ?></p>
    <p>Time: <?php echo substr($courses_join[$i]->start_time, 11, 5)." - ".substr($courses_join[$i]->end_time, 11, 5); ?></p>
    <p>Venue: <?php echo $courses_join[$i]->venue; ?></p>
    <p>Sport: <?php echo $courses_join[$i]->sport; ?></p>
    <p>Level: <?php echo $courses_join[$i]->level; ?></p>
    <br><br>
  <?php endfor; ?>
  <br><br><br><br><br>

  <p>Venue Booked:</p>
  <?php for ($i=0; $i < sizeof($venues_book); $i++): ?>
    <p>Date: <?php echo substr($venues_book[$i]->start_time, 0, 10); ?></p>
    <p>Time: <?php echo substr($venues_book[$i]->start_time, 11, 5); ?></p>
    <p>Venue: <?php echo $venues_book[$i]->venue; ?></p>
    <p>Sport: <?php echo $venues_book[$i]->sport; ?></p>
    <br><br>
  <?php endfor; ?>
  <br><br><br><br><br>

  <p>Session Joined:</p>
  <?php for ($i=0; $i < sizeof($shares_join); $i++): ?>
    <p>Host: <?php echo $shares_join[$i]->first_name." ".$shares_join[$i]->last_name; ?></p>
    <p>Date: <?php echo substr($shares_join[$i]->start_time, 0, 10); ?></p>
    <p>Time: <?php echo substr($shares_join[$i]->start_time, 11, 5); ?></p>
    <p>Venue: <?php echo $shares_join[$i]->venue; ?></p>
    <p>Sport: <?php echo $shares_join[$i]->sport; ?></p>
    <br><br>
  <?php endfor; ?>
<?php endif; ?>
