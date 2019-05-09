<div class="wrapper">
    <!--  Form for adding new course for coach  -->
    <form action='<?php echo $page_url; ?>course/check_add_course' method='post'>
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
                    <textarea class="form-control" id="description" rows="3" name="description"
                              placeholder="Goal? Requirement? Equipment?" required></textarea>
                </div>
            </div>

            <div class="row m-2 m-md-4">
                <div class="col-xl-4">
                    <label for="price">Ticket Price ($)</label>
                    <input type="text" class="form-control number" name="price" id="price" placeholder="HKD" required>
                </div>
            </div>

            <div class="row m-2 m-md-4">
                <div class="col-xl-4">
                    <label for="people">Available Seats</label>
                    <input type="text" class="form-control number" name="people" id="people"
                           placeholder="Maximum participants" required>
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

            <div class="table-control-container hidden">
                <!--        Navigation buttons to view different week        -->
                <div class="row m-2 m-md-4 justify-content-between" id="row-nav">
                    <div class="col-2 col-lg-2">
                        <button class="btn btn-primary btn-icon disabled" type="button" value="prev" id="prev"
                                data-toggle="tooltip"
                                data-placement="top" data-original-title="">
                            <i class="material-icons">keyboard_arrow_left</i></button>
                    </div>
                    <div class="col text-center">
                        <button class="btn btn-primary" type="button" value="today" id="today" data-toggle="tooltip"
                                data-placement="top" data-original-title="">Today
                        </button>
                    </div>
                    <div class="col-2 col-lg-2">
                        <button class="btn btn-primary btn-icon float-right disabled" type="button" value="next"
                                id="next" data-toggle="tooltip"
                                data-placement="top" data-original-title="">
                            <i class="material-icons">keyboard_arrow_right</i></button>
                    </div>
                </div>
                <!--        Legends        -->
                <div class="row m-2 mt-4 m-md-4">
                    <div class="col col-lg">
                        <div class="legend-container">
                            <svg class="legend">
                                <rect class="red"/>
                            </svg>
                            <span class="legend-text">Past</span>
                            <svg class="legend">
                                <rect class="yellow"/>
                            </svg>
                            <span class="legend-text">Booked</span>
                            <svg class="legend">
                                <rect class="green"/>
                            </svg>
                            <span class="legend-text">Chosen</span>
                        </div>
                    </div>
                </div>

                <!--        The booking table        -->
                <div class="row m-0 m-md-4">
                    <div class="col-xl table-responsive-md">
                        <table data-toggle="table" id="table">
                            <thead class="thread-dark">
                            <tr>
                                <th data-col="time"></th>
                                <th class="text-center" data-col="mon">Mon</th>
                                <th class="text-center" data-col="tue">Tue</th>
                                <th class="text-center" data-col="wed">Wed</th>
                                <th class="text-center" data-col="thu">Thu</th>
                                <th class="text-center" data-col="fri">Fri</th>
                                <th class="text-center" data-col="sat">Sat</th>
                                <th class="text-center" data-col="sun">Sun</th>
                            </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                </div>

                <!--        Submit button        -->
                <div class="container-fluid hidden" id="booking-info-container">
                    <div class="row m-2 m-md-4" id="row-submit">
                        <div class="col-xl-4">
                            <button class="btn btn-lg btn-success mr-2" type="submit" value="add" id="add">Add</button>
                            <small id="submitHelpInline" class="text-muted">
                                Course will be published immediately.
                            </small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>

