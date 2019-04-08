<div class="wrapper">
    <form action='<?php echo $page_url; ?>court_booking/check_booking' method='post'>
        <div class="container-fluid">
            <div class="row m-2 mt-4 m-md-4">
                <div class="col-xl-4">
                    <label for="title">Course Title</label>
                    <input class="form-control" name="title" id="title" type="text" required>
                </div>
            </div>

            <div class="row m-2 m-md-4">
                <div class="col-xl-4">
                    <label for="level">Level</label>
                    <select class="form-control" name="level" id="level">
                        <?php foreach ($levels as $level) : ?>
                            <option value="<?php echo $level->level_id; ?>"><?php echo $level->description; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>

            <div class="row m-2 m-md-4" id="row-description">
                <div class="col-xl-4">
                    <label for="description">Description</label>
                    <textarea class="form-control" id="description" rows="3"
                              placeholder="Goal? Requirement? Equipment?"></textarea>
                </div>
            </div>

            <div class="row m-2 m-md-4">
                <div class="col-xl-4">
                    <label for="price">Ticket Price ($)</label>
                    <input type="number" class="form-control" name="price" id="price" placeholder="HKD" required>
                </div>
            </div>

            <div class="row m-2 m-md-4">
                <div class="col-xl-4">
                    <label for="people">Available Seats</label>
                    <input type="number" class="form-control" name="people" id="people" placeholder="Maximum participants" required>
                </div>
            </div>

            <div class="row m-2 m-md-4">
                <div class="col-xl-4 mb-1">
                    <label for="college">Select College</label>
                    <select class="form-control" name="college" id="college" onchange="getVenue()">
                        <option value="None" selected>-----</option>
                        <?php foreach ($colleges as $college) : ?>
                            <option value="<?php echo $college->college_id; ?>"><?php echo $college->name; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div class="col-xl-4 mb-1">
                    <label for="sport">Select Sport</label>
                    <select class="form-control" name="sport" id="sport" onchange="getVenue()">
                        <option value="None" selected>-----</option>
                        <?php foreach ($sports as $sport) : ?>
                            <option value="<?php echo $sport->sports_id; ?>"><?php echo $sport->name; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div class="col-xl-4 mb-1">
                    <label for="venue">Select Venue</label>
                    <select class="form-control" name="venue" id="venue">
                        <option value="None" selected>-----</option>
                        <?php foreach ($venues as $venue) : ?>
                            <option value="<?php echo $venue->venue_id; ?>"><?php echo $venue->venue; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>

            <div class="row m-0 m-md-4">
                <div class="col-xl table-responsive-md">
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

            <div class="row m-2 m-md-4">
                <div class="col-xl-4">
                    <button class="btn btn-success mr-2" type="submit" value="add" id="add">Add</button>
                    <small id="submitHelpInline" class="text-muted">
                        All courses will be reviewed before publishing.
                    </small>
                </div>
            </div>
        </div>
    </form>
</div>
