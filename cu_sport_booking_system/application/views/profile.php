<div class="wrapper">
    <section class="container-fluid">
        <div class="row mt-4 justify-content-center">
            <div class="col-md-6">
                <!-- Use Bootstrap's card to show the user's profile -->
                <div class="card">
                    <div class="card-header">
                        <?php echo $user['db']->first_name . " " . $user['db']->last_name; ?>'s Profile
                    </div>
                    <div class="card-body">
                        <!-- Generic info -->
                        <div class="info-block mb-3 text-center"><img
                                    src="<?php echo base_url() . 'images/user/' . $user['db']->icon; ?>"
                                    class="img-thumbnail" alt="profile pic" width="200 px"></div>
                        <div class="info-block mb-3">
                            <h4 class="title">
                                <i class="fa fa-user align-middle" aria-hidden="true"></i>
                                <span>User group</span>
                            </h4>
                            <p><?php echo ucfirst($user['usertype']); ?></p>
                        </div>

                        <!-- Coach info -->
                        <?php if ($user['usertype'] == 'coach'): ?>
                            <div class="info-block mb-3">
                                <h4 class="title">
                                    <i class="fa fa-certificate align-middle" aria-hidden="true"></i>
                                    <span>Experience</span>
                                </h4>
                                <p><?php echo $user['db']->experience; ?></p>
                            </div>
                        <?php endif; ?>

                        <!-- Student/Normal user info -->
                        <?php if ($user['usertype'] == 'student'): ?>
                            <div class="info-block mb-3">
                                <h4 class="title">
                                    <i class="fa fa-soccer-ball-o"></i>
                                    <span>Interest</span>
                                </h4>
                                <p><?php echo $user['db']->interest; ?></p>
                            </div>
                            <div class="info-block mb-3">
                                <h4 class="title">
                                    <i class="fa fa-birthday-cake"></i>
                                    <span>Birthday</span>
                                </h4>
                                <p><?php echo $user['db']->birthday; ?></p>
                            </div>
                            <div class="info-block mb-3">
                                <h4 class="title">
                                    <i class="fa fa-phone"></i>
                                    <span>Phone number</span>
                                </h4>
                                <p><?php echo $user['db']->phone; ?></p>
                            </div>
                        <?php endif; ?>

                        <!-- Generic info -->
                        <div class="info-block mb-3">
                            <h4 class="title">
                                <i class="fa fa-file align-middle" aria-hidden="true"></i>
                                <span>Introduction</span>
                            </h4>
                            <p><?php echo $user['db']->intro; ?></p>
                        </div>
                    </div>

                    <!-- Edit Profile -->
                    <?php if (isset($_SESSION['username']) && strtolower($user['db']->username) == strtolower($_SESSION['username'])): ?>
                        <a href="<?php echo $page_url ?>profile/edit_profile" class="btn btn-primary">Edit
                            Profile</a>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </section>
</div>
