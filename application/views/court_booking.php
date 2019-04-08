<div class="wrapper">
    <form action='<?php echo $page_url; ?>court_booking/check_booking' method='post'>
        <div class="container-fluid">
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
                    <label for="isShare1">Share this session?</label><br>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="isShare1" name="is-share" class="custom-control-input" value="1">
                        <label class="custom-control-label" for="isShare1">Of cuz!</label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="isShare2" name="is-share" class="custom-control-input" value="0"
                               checked>
                        <label class="custom-control-label" for="isShare2">Nah, next time.</label>
                    </div>
                </div>
            </div>

            <div class="row m-2 m-md-4 hidden" id="row-seat">
                <div class="col-xl-4">
                    <label for="seat">Available Seat(s)</label>
                    <!--            TODO:  Add require when based on radio button-->
                    <input type="number" class="form-control" id="seat" placeholder="Number of people">
                </div>
            </div>

            <div class="row m-2 m-md-4 hidden" id="row-description">
                <div class="col-xl-4">
                    <label for="description">Description</label>
                    <textarea class="form-control" id="description" rows="3"
                              placeholder="What you wanna say?"></textarea>
                </div>
            </div>

            <div class="row m-2 m-md-4" id="row-submit">
                <div class="col-xl-4">
                    <button class="btn btn-success" type="submit" value="book" id="book">Book Now</button>
                </div>
            </div>
        </div>
    </form>
</div>
