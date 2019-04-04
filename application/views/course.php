<p>This is the Course page</p>
<section class="container-fluid">
<?php foreach($courses as $course) : ?>
<div class="course row">

  <div class="course-info">
    <div class="course-info col-md-8">
      <table>
        <tbody>
          <tr>
              <th scope="row">
                  <i class="fa fa-newspaper-o" aria-hidden="true"></i>
                  <span>Course Title</span>
              </th>
              <td>
                <a href="<?php echo $detail_url . $course->course_id; ?>">
                  <?php echo $course->course_name; ?>
                </a>
              </td>
          </tr>
          <tr>
              <th scope="row">
                  <i class="fa fa-building-o" aria-hidden="true"></i>
                  <span>Location</span>
              </th>
              <td>
                  <?php echo $course->location_name; ?></td>
          </tr>
          <tr>
              <th scope="row">
                  <i class="fa fa-clock-o" aria-hidden="true"></i>
                  <span>Course Period</span>
              </th>
              <td>
                  <?php echo $course->start_time." - ".$course->end_time; ?></td>
          </tr>
          <tr>
              <th scope="row">
                  <i class="fa fa-indent" aria-hidden="true"></i>
                  <span>Description</span>
              </th>
              <td><?php echo $course->description; ?></td>
          </tr>
          <tr>
              <th scope="row">
                  <i class="fa fa-ticket" aria-hidden="true"></i>
                  <span>Tickets</span>
              </th>
              <td>
                <?php echo "$".$course->price; ?>
              </td>
          </tr>
          <tr>
              <th scope="row">
                  <i class="fa fa-users" aria-hidden="true"></i>
                  <span>Availablie Seats</span>
              </th>
              <td>
                <?php echo $course->available_seats; ?>
              </td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
</div>
<br><br><br>


<?php endforeach; ?>
</section>
