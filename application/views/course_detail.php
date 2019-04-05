<div class="wrapper">
    <section class="container-fluid">
        <div class="row mt-3">
            <div class="col-md-8">
                <div class="course-title info-block mb-3">
                    <h4 class="title">
                        <span id="course-name"><?php echo $course->course_name; ?></span>
                    </h4>
                    <p>
                        Level:
                        <span>
                            <?php echo $course->level; ?>
                        </span>
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
                        <span>Available Seats: <?php echo $seat_remain . " / " . $course->seats; ?></span>
                    </p>
                    <?php
                    if ($seat_remain == 0) {
                        echo '<p>FULL</p>';
                    } else {
                        if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] == TRUE) {
                            echo "<a href='" . $page_url . "course/id/" . $course->course_id . "/apply' class='btn cu-btn btn-danger'>Book Now</a>";
                        } else {
                            echo "<a href='" . $page_url . "login/login_main' class='btn cu-btn btn-danger'>Login to Book</a>";
                        }

                    }
                    ?>
                </div>
            </div>
            <div class="col-md-4">
                <div class="info-block mb-3">
                    <h4 class="title">
                        <i class="fa fa-user align-middle" aria-hidden="true"></i>
                        <span>Coach</span>
                    </h4>
                    <div class="coach row m-0">
                        <div class="coach-container float-left mr-3">
                          <a href="<?php echo $page_url."profile/".$course->coach_username;?>" class="text-center mt-2">
                            <img src="https://vignette.wikia.nocookie.net/uncyclopedia/images/0/03/200px-Super_Saiyan.jpg"
                                 class="img-thumbnail" alt="profile pic">
                            <?php echo $course->coach; ?>
                          </a>
                        </div>
                    </div>
                </div>

                <div class="card info-block mb-3" id="venue-preview">
                    <img src="<?php echo base_url() . 'images/college/' . $course->college_image; ?>"
                         class="card-img-top"
                         alt="Venue image">
                    <div class="card-body">
                        <h4 class="title">
                            <i class="fa fa-building-o align-center" aria-hidden="true"></i>
                            <span>Venue</span>
                        </h4>
                        <p>
                            <?php echo $course->college . " - " . $course->venue; ?>
                        </p>
                        <button type="button" class="btn btn-info" data-toggle="modal" data-target="#modalMap">Open
                            Map
                        </button>
                        <!--Modal: Name-->
                        <div class="modal fade" id="modalMap" tabindex="-1" role="dialog"
                             aria-labelledby="Google Map Modal"
                             aria-hidden="true">
                            <div class="modal-dialog modal-lg" id="modalMapDialog" role="document">
                                <!--Content-->
                                <div class="modal-content">
                                    <!--Body-->
                                    <!--TODO: Load Google Map dynamically-->
                                    <!--To embed a google map place. First, find the place_id from the following link-->
                                    <!--https://developers.google.com/maps/documentation/javascript/examples/places-placeid-finder-->
                                    <!--Then, insert the place_id to the query link and put into the <iframe> src-->
                                    <!--https://www.google.com/maps/embed/v1/place?key=AIzaSyD9USDNBoGIA1OJWavMMd5bob_NhwM73-E&q=place_id:ChIJQ0Di4ZsIBDQR05LxslXE4XU-->
                                    <div class="modal-body p-0">
                                        <div class="embed-responsive embed-responsive-4by3" id="google-map">
                                            <iframe
                                                    frameborder="0" style="border:0"
                                                    src="https://www.google.com/maps/embed/v1/place?key=AIzaSyD9USDNBoGIA1OJWavMMd5bob_NhwM73-E&q=place_id:ChIJQ0Di4ZsIBDQR05LxslXE4XU"
                                                    allowfullscreen>
                                            </iframe>
                                        </div>
                                    </div>
                                    <!--Footer-->
                                    <div class="modal-footer justify-content-center">
                                        <button type="button" class="btn btn-outline-info btn-md" data-dismiss="modal">
                                            Close <i class="fa fa-times ml-1"></i></button>
                                    </div>
                                </div>
                                <!--/.Content-->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
