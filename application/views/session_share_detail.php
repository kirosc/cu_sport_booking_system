<div class="wrapper">
    <section class="container-fluid">
        <div class="row mt-3">
            <div class="col-md-8">
                <div class="ss-title info-block mb-3">
                    <h4 class="title"><span
                                id="session-name"><?php echo $session->user_fullname . 's shared session'; ?></span>
                    </h4>
                    <p>
                        Sport Type:
                        <i>
                            <?php echo 'Basketball'; ?>
                        </i>
                    </p>
                </div>
                <div class="info-block mb-3">
                    <h4 class="title">
                        <i class="fa fa-pencil-square-o align-middle" aria-hidden="true"></i>
                        <span>Description</span>
                    </h4>
                    <p><?php echo $session->description; ?></p>
                </div>
                <div class="info-block mb-3">
                    <h4 class="title">
                        <i class="fa fa-clock-o align-middle" aria-hidden="true"></i>
                        <span>Does the time fit you?</span>
                    </h4>
                    <p>
                        <i style="margin-right: 5px;" class="fa fa-calendar" aria-hidden="true"></i>
                        <span>Time: <?php echo substr($session->start_time, 0, 16) . ' - ' . $end_time . ':00'; ?></span>
                    </p>
                    <p>
                        <i style="margin-right: 5px;" class="fa fa-users" aria-hidden="true"></i>
                        <span>Available Seats: <?php echo $seat_remain . " / " . $session->seats; ?></span>
                    </p>
                    <?php
                    if ($seat_remain == 0) {
                        echo '<p>FULL</p>';
                    } else {
                        if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] == TRUE) {
                            echo "<a href='" . $page_url . "session_share/id/" . $session->session_id . "/join' class='btn cu-btn btn-danger'>Claim Your Seat Now!</a>";
                        } else {
                            echo "<a href='" . $page_url . "login/login_main' class='btn cu-btn btn-danger'>Login to Join</a>";
                        }

                    }
                    ?>
                </div>
            </div>
            <div class="col-md-4">
                <div class="info-block mb-3">
                    <h4 class="title">
                        <i class="fa fa-user align-middle" aria-hidden="true"></i>
                        <span>Host</span>
                    </h4>
                        <div class="host row m-0">
                            <div class="host-container float-left mr-3">
                                <a href="<?php echo $page_url . "profile/" . $session->host; ?>" class="text-center mt-2">
                                    <img src="<?php echo base_url() . 'images/user/' . $session->host_icon; ?>" class="img-thumbnail mb-1" alt="profile pic">
                                    <br>
                                    <?php echo $session->user_fullname; ?>
                                </a>
                            </div>
                        </div>
                </div>

                <div class="card info-block mb-3" id="venue-preview">
                    <img src="<?php echo base_url() . 'images/college/' . $session->college_image; ?>"
                         class="card-img-top"
                         alt="Venue image">
                    <div class="card-body">
                        <h4 class="title">
                            <i class="fa fa-building-o align-center" aria-hidden="true"></i>
                            <span>Venue</span>
                        </h4>
                        <p>
                            <?php echo $session->college . " - " . $session->venue; ?>
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
                                    <div class="modal-body p-0">
                                        <div class="embed-responsive embed-responsive-4by3" id="google-map">
                                            <iframe
                                                    frameborder="0" style="border:0"
                                                    src="<?php echo $session->map;?>"
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
