<form action='<?php echo $page_url; ?>facility/check_booking' method='post'>

    Select Facility:<br>
    <select name="facility">
      <?php foreach ($facilities as $facility) : ?>
        <option value="<?php echo $facility->location_id; ?>"><?php echo $facility->name; ?></option>
      <?php endforeach; ?>
    </select><br>

    Start Time:<br>
    <input type="datetime-local" name="start_time"><br>

    End Time:<br>
    <input type="datetime-local" name="end_time"><br>

    Select Purpose:<br>
    <select name="type">
        <option value="Basketball">Basketball</option>
        <option value="Tennis">Tennis</option>
        <option value="Badmintion">Badmintion</option>
        <option value="Table Tennis">Table Tennis</option>
        <option value="Volleyball">Volleyball</option>
    </select><br>

    <input type="submit">
</form>
