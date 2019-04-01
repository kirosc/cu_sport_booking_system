<form action='<?php echo $page_url; ?>course/check_add_course' method='post'>
    Course Title:<br>
    <input type="text" name="course_title"><br>
    Location:
    <select name="facility">
      <?php foreach ($facilities as $facility) : ?>
        <option value="<?php echo $facility->name; ?>"><?php echo $facility->name; ?></option>
      <?php endforeach; ?>
    </select><br>

    Start Time:<br>
    <input type="datetime-local" name="start_time"><br>

    End Time:<br>
    <input type="datetime-local" name="end_time"><br>

    Description:<br>
    <textarea rows="4" name="description"></textarea><br>

    Tickets Price:<br>
    <input type="number" name="price"><br>

    Available Seats:<br>
    <input type="number" name="seat"><br>

    <input type="submit">
</form>
