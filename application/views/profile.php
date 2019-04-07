<div class="wrapper">
    <section class="container-fluid">
      <?php if (isset($_SESSION['username']) && $user['db']->username == $_SESSION['username']): ?>
        <a href="<?php echo $page_url ?>profile/edit_profile" class="btn btn-info btn-md-block">Edit Profile</a>
      <?php endif; ?>
        <div class="row mt-3">
            <div class="col-md-8">
                <div class="course-title info-block mb-3">
                    <h4 class="name">
                        <span id="course-name"><?php echo $user['db']->first_name." ".$user['db']->last_name; ?> Profile</span>
                    </h4>
                    <p>
                      <span><?php echo $user['usertype']; ?></span>
                    </p>
                    <img src="https://vignette.wikia.nocookie.net/uncyclopedia/images/0/03/200px-Super_Saiyan.jpg"
                         class="img-thumbnail" alt="profile pic">
                </div>
                <div class="info-block mb-3">
                    <h4 class="title">
                        <i class="fa fa-pencil-square-o align-middle" aria-hidden="true"></i>
                        <span>Introduction</span>
                    </h4>
                    <p><?php echo $user['db']->intro; ?></p>
                </div>

                <?php if ($user['usertype'] == 'coach'): ?>
                <div class="info-block mb-3">
                    <h4 class="title">
                        <i class="fa fa-pencil-square-o align-middle" aria-hidden="true"></i>
                        <span>Experience</span>
                    </h4>
                    <p><?php echo $user['db']->experience; ?></p>
                </div>
                <?php endif; ?>

                <?php if ($user['usertype'] == 'student'): ?>
                <div class="info-block mb-3">
                    <h4 class="title">
                        <i class="fa fa-pencil-square-o align-middle" aria-hidden="true"></i>
                        <span>Interest</span>
                    </h4>
                    <p><?php echo $user['db']->interest; ?></p>
                </div>
                <div class="info-block mb-3">
                    <h4 class="title">
                        <i class="fa fa-pencil-square-o align-middle" aria-hidden="true"></i>
                        <span>Birthday</span>
                    </h4>
                    <p><?php echo $user['db']->birthday; ?></p>
                </div>
                <div class="info-block mb-3">
                    <h4 class="title">
                        <i class="fa fa-pencil-square-o align-middle" aria-hidden="true"></i>
                        <span>Phone number</span>
                    </h4>
                    <p><?php echo $user['db']->phone; ?></p>
                </div>
                <?php endif; ?>


            </div>
        </div>
    </section>
</div>
