<form action='<?php echo $page_url; ?>court_booking/check_booking' method='post'>

    Select College:<br>
    <select name="college" id="college">
        <?php foreach ($colleges as $college) : ?>
            <option value="<?php echo $college->college_id; ?>"><?php echo $college->name; ?></option>
        <?php endforeach; ?>
    </select><br>

    Select Sport:<br>
    <select name="sport" id="sport">
        <?php foreach ($sports as $sport) : ?>
            <option value="<?php echo $sport->sports_id; ?>"><?php echo $sport->name; ?></option>
        <?php endforeach; ?>
    </select><br>


    <br>//here is base on the chosen college and sport shown related venue<br>
    Select Venue:<br>
    <select name="venue" id="venue">
        <?php foreach ($venues as $venue) : ?>
            <option value="<?php echo $venue->venue_id; ?>"><?php echo $venue->venue; ?></option>
        <?php endforeach; ?>
    </select><br>

    <br>//here is base on the chosen venue shown related session<br>
    Select Session:<br>
    <select name="session">
        <?php foreach ($sessions as $session) : ?>
            <option value="<?php echo $session->session_id; ?>"><?php echo $session->start_time; ?></option>
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

<!--     Bootstrap 4 table below     -->

<div class="m-md-4 m-2 table-container">
    <div class="table-responsive-md">
        <form>
            <table data-toggle="table" id="table">
                <thead>
                <tr>
                    <th data-col="time"></th>
                    <th class="text-center" data-col="mon"> (Mon)</th>
                    <th class="text-center" data-col="tue"> (Tue)</th>
                    <th class="text-center" data-col="wed"> (Wed)</th>
                    <th class="text-center" data-col="thu"> (Thu)</th>
                    <th class="text-center" data-col="fri"> (Fri)</th>
                    <th class="text-center" data-col="sat"> (Sat)</th>
                    <th class="text-center" data-col="sun"> (Sun)</th>
                </tr>
                </thead>
                <tbody>
                    <?php ?>
                </tbody>
            </table>
        </form>
    </div>
</div>