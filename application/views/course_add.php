<form action='<?php echo $page_url; ?>course/check_add_course' method='post'>
    Course Title:<br>
    <input type="text" name="course_title"><br>

    Select Facility:<br>
    <select name="facility">
      <?php foreach ($facilities as $facility) : ?>
        <option value="<?php echo $facility->location_id; ?>"><?php echo $facility->name; ?></option>
      <?php endforeach; ?>
    </select><br><br>

    //here is base on the chosen facility shown related session<br>
    Select Session:<br>
    <select name="session">
      <?php foreach ($sessions as $session) : ?>
        <option value="<?php echo $session->session_id; ?>"><?php echo $session->name." Court   ".$session->start_time." - ".$session->end_time."   ".$session->location_id." //this is location_id"; ?></option>
      <?php endforeach; ?>
    </select><br>

    Category:<br>
    <select name="category">
      <?php foreach ($categories as $category) : ?>
        <option value="<?php echo $category->category_id; ?>"><?php echo $category->description; ?></option>
      <?php endforeach; ?>
    </select><br>

    Level:<br>
    <select name="level">
      <?php foreach ($levels as $level) : ?>
        <option value="<?php echo $level->level_id; ?>"><?php echo $level->description; ?></option>
      <?php endforeach; ?>
    </select><br>

    Description:<br>
    <textarea rows="4" name="description"></textarea><br>

    Tickets Price:<br>
    <input type="number" name="price"><br>

    Available Seats:<br>
    <input type="number" name="seat"><br>

    <input type="submit">
</form>
