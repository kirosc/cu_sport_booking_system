<form action='<?php echo $page_url; ?>course/check_add_course' method='post'>
    Course Title:<br>
    <input type="text" name="course_title"><br>

    Location:<br>
    <select name="facility">
      <?php foreach ($facilities as $facility) : ?>
        <option value="<?php echo $facility->location_id; ?>"><?php echo $facility->name; ?></option>
      <?php endforeach; ?>
    </select><br>

    Start Time:<br>
    <input type="datetime-local" name="start_time"><br>

    End Time:<br>
    <input type="datetime-local" name="end_time"><br>

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
