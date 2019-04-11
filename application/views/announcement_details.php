<div>

      <img src="<?php echo base_url(); ?>/images/announcement/<?php echo $announcement->image; ?>" alt="Event" style="width: 100%;">

      <div style="margin: 3% 10%;">
          <h2 style="padding-bottom: 3%; border-bottom: 2px solid orange; margin-bottom: 2%"><?php echo $announcement->name; ?></h2>
          <div style="font-size: 150%; padding-bottom: 10%;">
            <div style="padding: 2%; line-height: 160%;">
              <pre><?php echo $announcement->description; ?></pre>
              <pre><?php echo $announcement->details; ?></pre>
            </div>
          </div>
      </div>
</div>
