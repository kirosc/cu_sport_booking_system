<section class="container-fluid">
  <div class="row">
  <div class="col-md-8">
    <div class="course-title info-block">
      <h2><?php echo $course->name; ?></h2>
      <p>
          Feature Tags:
          <i>
            <?php echo $course->category.', '.$course->level; ?>
          </i>
      </p>
    </div>
    <div class="info-block">
      <h4 class="title">
          <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
          <span>Description</span>
      </h4>
      <p><?php echo $course->description; ?></p>
    </div>
    <div class="info-block">
        <h4 class="title">
            <i class="fa fa-clock-o" aria-hidden="true"></i>
            <span>Does the time fit you?</span>
        </h4>
        <p>
            <i style="margin-right: 5px;" class="fa fa-calendar" aria-hidden="true"></i>
            <span>Starting Time: <?php echo $course->start_time; ?></span>
        </p>
        <p>
            <i style="margin-right: 5px;" class="fa fa-calendar" aria-hidden="true"></i>
            <span>Ending Time: <?php echo $course->end_time; ?></span>
        </p>
        <p>
            <i style="margin-right: 5px;" class="fa fa-ticket" aria-hidden="true"></i>
            <span>Cost: <?php echo $course->price; ?></span>
        </p>
        <p>
            <i style="margin-right: 5px;" class="fa fa-users" aria-hidden="true"></i>
            <span>Available Seats: <?php echo $course->available_seats; ?></span>
        </p>
        <a href="" class="btn cu-btn">Book Now</a>
    </div>
    <div class="info-block">
        <h4 class="title">
            <i class="fa fa-building-o" aria-hidden="true"></i>
            <span>Venue</span>
        </h4>
        <p>
        <a href="">
            <?php echo $course->location; ?>
        </a>
        </p>
    </div>
  </div>
</div>
</section>
