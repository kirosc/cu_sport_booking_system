<div class="wrapper">
    <section class="container-fluid">
        <div class="row mt-3">
            <div class="col-md-8">
                <div class="course-title info-block mb-3">
                    <h4><?php echo $course->course_name; ?></h4>
                    <p>
                        Level:
                        <i>
                            <?php echo $course->level; ?>
                        </i>
                    </p>
                </div>
                <div class="info-block mb-3">
                    <h4 class="title">
                        <i class="fa fa-pencil-square-o align-middle" aria-hidden="true"></i>
                        <span>Description</span>
                    </h4>
                    <p><?php echo $course->description; ?></p>
                </div>
                <div class="info-block mb-3">
                    <h4 class="title">
                        <i class="fa fa-clock-o align-middle" aria-hidden="true"></i>
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
                        <span>Available Seats: <?php echo $seat_remain." / ".$course->seats; ?></span>
                    </p>
                    <?php
                      if ($seat_remain == 0){
                        echo '<p>FULL</p>';
                      }else {
                        if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] == TRUE) {
                          echo "<a href='".$page_url."course/id/".$course->course_id."/apply' class='btn cu-btn btn-danger'>Book Now</a>";
                        }else{
                          echo "<a href='".$page_url."login/login_main' class='btn cu-btn btn-danger'>Login to Book</a>";
                        }

                      }
                    ?>
                </div>
                <div class="info-block mb-3">
                    <h4 class="title">
                        <i class="fa fa-user align-middle" aria-hidden="true"></i>
                        <span>Coach</span>
                    </h4>
                    <div class="coach row m-0">
                        <div class="coach-container float-left mr-3">
                            <img src="https://vignette.wikia.nocookie.net/uncyclopedia/images/0/03/200px-Super_Saiyan.jpg"
                                 class="rounded" alt="profile pic">
                            <a href="javascript:void(0)" class="text-center mt-2"><?php echo $course->coach; ?></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card info-block">
                    <div class="card-body">
                        <h4 class="title">
                            <i class="fa fa-building-o align-center" aria-hidden="true"></i>
                            <span>Coach</span>
                        </h4>
                        <p>
                            <a href="">
                                <?php echo $course->coach; ?>
                            </a>
                        </p>
                    </div>
                </div>

                <div class="card info-block mb-3" id="venue-preview">
                    <img src="<?php echo base_url() . 'images/facility/' . $course->college_image; ?>" class="card-img-top"
                         alt="Venue image">
                    <div class="card-body">
                        <h4 class="title">
                            <i class="fa fa-building-o align-center" aria-hidden="true"></i>
                            <span>Venue</span>
                        </h4>
                        <p>
                            <a href="">
                                <?php echo $course->college." - ".$course->venue; ?>
                            </a>
                        </p>
                    </div>
                </div>

            </div>
        </div>
    </section>
</div>
