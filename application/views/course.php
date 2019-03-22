<p>This is the Course page</p>

<?php foreach($courses as $course) : ?>
  <p><?php echo $course->name." ".$course->datetime." ".$course->location." ".$course->price." ".$course->available_seats." ".$course->description; ?><p/>
<?php endforeach; ?>
