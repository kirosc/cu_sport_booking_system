<form action='<?php echo $page_url; ?>course/check_add_course' method='post'>
    Course Title:<br>
    <input type="text" name="course_title"><br>

    Select College:<br>
    <select name="college">
      <?php foreach ($colleges as $college) : ?>
        <option value="<?php echo $college->college_id; ?>"><?php echo $college->name; ?></option>
      <?php endforeach; ?>
    </select><br>

    Select Sport:<br>
    <select name="sport">
      <?php foreach ($sports as $sport) : ?>
        <option value="<?php echo $sport->sports_id; ?>"><?php echo $sport->name; ?></option>
      <?php endforeach; ?>
    </select><br>


    <br>//here is base on the chosen college and sport shown related venue<br>
    Select Venue:<br>
    <select name="venue">
      <?php foreach ($venues as $venue) : ?>
        <option value="<?php echo $venue->venue_id; ?>"><?php echo $venue->venue; ?></option>
      <?php endforeach; ?>
    </select><br>

    <br>//here is base on the chosen venue shown related session<br>
    Select Session:<br>
    <select name="session">
      <?php foreach ($sessions as $session) : ?>
        <option value="<?php echo $session->session_id; ?>"><?php echo $session->start_time." - ".$session->end_time; ?></option>
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
