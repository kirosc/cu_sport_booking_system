<div class="wrapper">
    <section class="container-fluid">
      <?php if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] && $_SESSION['usertype'] != 'student') { ?>
          <a href="<?php echo $page_url?>course/add_course" class="btn cu-btn">Add Course</a>
        <?php } ?>

        <?php
        $count = 0;
        foreach ($courses as $course) : ?>
            <div class="course row">
                <div class="course-info col-md-9">
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
                                    <?php echo $course->location_name; ?></td>
                            </tr>
                            <tr>
                                <th scope="row">
                                    <i class="fa fa-clock-o" aria-hidden="true"></i>
                                    <span>Course Period</span>
                                </th>
                                <td>
                                    <?php echo $course->start_time . " - " . $course->end_time; ?></td>
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
                                      }else {
                                        echo $seat_remain[$count]." remaining /";
                                      }
                                    ?>
                                    <?php echo $course->available_seats." total"; ?>
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
