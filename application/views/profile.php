<div class="wrapper">
    <section class="container-fluid">
        <div class="row mt-4 justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <?php echo $user['db']->first_name . " " . $user['db']->last_name; ?>'s Profile
                    </div>
                    <div class="card-body">
                        <div class="info-block mb-3 text-center"><img
                                    src="https://vignette.wikia.nocookie.net/uncyclopedia/images/0/03/200px-Super_Saiyan.jpg"
                                    class="img-thumbnail" alt="profile pic"></div>
                        <div class="info-block mb-3">
                            <h4 class="title">
                                <i class="fa fa-user align-middle" aria-hidden="true"></i>
                                <span>User group</span>
                            </h4>
                            <p><?php echo $user['usertype']; ?></p>
                        </div>

                        <?php if ($user['usertype'] == 'coach'): ?>
                            <div class="info-block mb-3">
                                <h4 class="title">
                                    <i class="fa fa-certificate align-middle" aria-hidden="true"></i>
                                    <span>Experience</span>
                                </h4>
                                <p><?php echo $user['db']->experience; ?></p>
                            </div>
                        <?php endif; ?>

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

                        <div class="info-block mb-3">
                            <h4 class="title">
                                <i class="fa fa-file align-middle" aria-hidden="true"></i>
                                <span>Introduction</span>
                            </h4>
                            <p><?php echo $user['db']->intro; ?></p>
                        </div>
                    </div>

                    <?php if (isset($_SESSION['username']) && $user['db']->username == $_SESSION['username']): ?>
                        <a href="<?php echo $page_url ?>profile/edit_profile" class="btn btn-primary">Edit
                            Profile</a>
                    <?php endif; ?>
                </div>
            </div>
        </div>
</div>