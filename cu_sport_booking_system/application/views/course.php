<div class="wrapper">
    <!--    Add course button-->
    <section class="container-fluid" id="course-tool">
        <div class="tool row">
            <div class="tool-container col col-md-12">
                <?php if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] && $_SESSION['usertype'] != 'student'): ?>
                    <a href="<?php echo $page_url ?>add_course" class="btn btn-info btn-md-block">Add Course</a>
                <?php endif; ?>
            </div>
        </div>
    </section>

    <!--  Generate course information  -->
    <section class="container-fluid" id="course-container">
        <?php
        $count = 0;
        foreach ($courses as $course) : ?>
            <div class="course row">
                <div class="course-info col-lg-3">
                    <a href="<?php echo $detail_url . $course->course_id; ?>">
                        <img src="<?php echo base_url(); ?>images/sports/<?php echo $course->course_image; ?>"
                             alt="Sport thumbnail">
                    </a>
                </div>
                <div class="course-info col col-lg-9">
                    <div class="course-info">
                        <table>
                            <tbody>
                            <tr>
                                <th scope="row">
                                    <i class="fa fa-newspaper-o" aria-hidden="true"></i>
                                    <span>Course Title</span>
                                </th>
                                <td>
                                    <a href="<?php echo $detail_url . $course->course_id; ?>">
                                        <?php echo $course->course_name; ?>
                                    </a>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">
                                    <i class="fa fa-building-o" aria-hidden="true"></i>
                                    <span>Location</span>
                                </th>
                                <td>
                                    <?php echo $course->college . " - " . $course->venue; ?></td>
                            </tr>
                            <tr>
                                <th scope="row">
                                    <i class="fa fa-clock-o" aria-hidden="true"></i>
                                    <span>Course Period</span>
                                </th>
                                <td>
                                    <?php echo $date . " " . $start_time . " - " . $end_time; ?></td>
                            </tr>
                            <tr>
                                <th scope="row">
                                    <i class="fa fa-indent" aria-hidden="true"></i>
                                    <span>Description</span>
                                </th>
                                <td><?php echo $course->description; ?></td>
                            </tr>
                            <tr>
                                <th scope="row">
                                    <i class="fa fa-ticket" aria-hidden="true"></i>
                                    <span>Tickets</span>
                                </th>
                                <td>
                                    <?php echo "$" . $course->price; ?>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">
                                    <i class="fa fa-users" aria-hidden="true"></i>
                                    <span>Available Seats</span>
                                </th>
                                <td>
                                    <?php
                                    if ($seat_remain[$count] == 0) {
                                        echo 'FULL /';
                                    } else {
                                        echo $seat_remain[$count] . " remaining /";
                                    }
                                    ?>
                                    <?php echo $course->seats . " total"; ?>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <?php
            $count = $count + 1;
        endforeach; ?>
    </section>
</div>
