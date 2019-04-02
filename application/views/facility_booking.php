<form action='<?php echo $page_url; ?>facility/check_booking' method='post'>

    Select Facility:<br>
    <select name="facility">
      <?php foreach ($facilities as $facility) : ?>
        <option value="<?php echo $facility->location_id; ?>"><?php echo $facility->name; ?></option>
      <?php endforeach; ?>
    </select><br>

    Select Session://need to devide those data<br>
    <select name="session">
      <?php foreach ($sessions as $session) : ?>
        <option value="<?php echo $session->session_id; ?>"><?php echo $session->name." Court   ".$session->start_time." - ".$session->end_time."   ".$session->location_id." //this is location_id"; ?></option>
      <?php endforeach; ?>
    </select><br>

    Share this session?<br>
    <input type="radio" name="is_share" value="1"> Yes
    <input type="radio" name="is_share" value="0" checked> No<br>

    <br>//if is_share == 1 those below will show up<br>
    Available Seats:<br>
    <input type="number" name="seat"><br>

    Description:<br>
    <textarea rows="4" name="description"></textarea><br>

    <input type="submit">
</form>
