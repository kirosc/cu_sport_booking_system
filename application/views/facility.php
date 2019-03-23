<p>This is the facility page</p>
<section class="container-fluid">
  <?php foreach($facilities as $facility) : ?>
    <div class="facility col-xs-12 col-sm-6 col-md-3 text-center">
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
</section>
