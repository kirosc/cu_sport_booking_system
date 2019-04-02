<div class="wrapper">
    <section class="container-fluid">
      <?php if (isset($_SESSION['logged_in']) && $_SESSION['logged_in']) { ?>
          <a href="<?php echo $page_url?>facility/book_facility" class="btn cu-btn">Book Facility</a>
        <?php } ?>
        
        <div class="facility row justify-content-center ">
            <?php foreach ($facilities as $facility) : ?>
                <div class="facility col col-sm-6 col-md-3 text-center">
                    <div class="facility-wrapper">
                        <div class="facility-photo">
                            <img src="<?php echo $image_url . 'facility/' . $facility->photo; ?>"/>
                        </div>
                        <div class="facility-info">
                            <h4 class="facility-title">
                                <?php echo $facility->name; ?>
                            </h4>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </section>
</div>
