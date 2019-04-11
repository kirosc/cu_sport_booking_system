<div class="wrapper">
    <?php if ($_SESSION['usertype'] == 'coach'): ?>
        <section class="container">
            <?php for ($i = 0; $i < sizeof($courses); $i++): ?>
                <div class="course row">
                    <div class="course-info col col-lg-12">
                        <div class="course-info">
                            <table>
                                <tbody>
                                <tr>
                                    <th scope="row">
                                        <i class="fa fa-newspaper-o" aria-hidden="true"></i>
                                        <span>Course Title</span>
                                    </th>
                                    <td>
                                        <?php echo $courses[$i]->course_name; ?>
                                        </a>
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">
                                        <i class="fa fa-signal" aria-hidden="true"></i>
                                        <span>Level</span>
                                    </th>
                                    <td>
                                        <?php echo $courses[$i]->level; ?>
                                        </a>
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">
                                        <i class="fa fa-building-o" aria-hidden="true"></i>
                                        <span>Location</span>
                                    </th>
                                    <td>
                                        <?php echo $courses[$i]->venue; ?></td>
                                </tr>
                                <tr>
                                    <th scope="row">
                                        <i class="fa fa-clock-o" aria-hidden="true"></i>
                                        <span>Course Period</span>
                                    </th>
                                    <td>
                                        <?php echo substr($courses[$i]->start_time, 0, 10) . ' ' . substr($courses[$i]->start_time, 11, 5) . " - " . substr($courses[$i]->end_time, 11, 5); ?></td>
                                </tr>
                                <tr>
                                    <th scope="row">
                                        <i class="fa fa-ticket" aria-hidden="true"></i>
                                        <span>Tickets</span>
                                    </th>
                                    <td>
                                        <?php echo "$" . $courses[$i]->price; ?>
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">
                                        <i class="fa fa-users" aria-hidden="true"></i>
                                        <span>Total Seats</span>
                                    </th>
                                    <td>
                                        <?php echo $courses[$i]->seats; ?>
                                    </td>
                                </tr>

                                <tr class="row-participant">

                                </tr>
                                </tbody>
                            </table>
                            <div class="accordion" id="accordionParticipant">
                                <div class="card">
                                    <div class="card-header" id="headingOne">
                                        <h5 class="mb-0">
                                            <button class="btn btn-link button-participant" type="button"
                                                    data-toggle="collapse"
                                                    data-target="#collapse<?php echo $i ?>"
                                            ">
                                            <i class="fa fa-ticket" aria-hidden="true"></i>
                                            Participants
                                            <i class="fa fa-sort-down" aria-hidden="true"></i>
                                            <!--                                            <i class="material-icons">arrow_drop_down</i>-->
                                            </button>
                                        </h5>
                                    </div>

                                    <div id="collapse<?php echo $i ?>" class="collapse show"
                                         aria-labelledby="headingOne"
                                         data-parent="#accordionParticipant">
                                        <div class="card-body">
                                            <?php echo $student->first_name . " " . $student->last_name; ?>
                                            <?php $numItems = count($courses_student);
                                            $counter = 0; ?>
                                            <?php foreach ($courses_student[$i] as $student): ?>
                                                <?php if (++$counter === $numItems): ?>
                                                    <?php echo $student->first_name . " " . $student->last_name . ", "; ?>
                                                <?php else: ?>
                                                    <?php echo $student->first_name . " " . $student->last_name; ?>
                                                <?php endif; ?>
                                            <?php endforeach; ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endfor; ?>
        </section>
    <?php elseif ($_SESSION['usertype'] == 'student'): ?>

        <div class="container mt-2">
            <div class="course booked row">
                <div class="course-info col col-lg-12">
                    <h2><span class="badge badge-primary">Joined Course</span></h2>
                </div>
            </div>
        </div>
        <section class="container">
            <?php for ($i = 0;
                       $i < sizeof($courses_join);
                       $i++): ?>
                <div class="course join row">
                    <div class="course-info col col-lg-12">
                        <div class="course-info">
                            <table>
                                <tbody>
                                <tr>
                                    <th scope="row">
                                        <i class="fa fa-newspaper-o" aria-hidden="true"></i>
                                        <span>Course Title</span>
                                    </th>
                                    <td>
                                        <?php echo $courses_join[$i]->course_name; ?>
                                        </a>
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">
                                        <i class="fa fa-indent" aria-hidden="true"></i>
                                        <span>Sport</span>
                                    </th>
                                    <td>
                                        <?php echo $courses_join[$i]->sport; ?>
                                        </a>
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">
                                        <i class="fa fa-signal" aria-hidden="true"></i>
                                        <span>Level</span>
                                    </th>
                                    <td>
                                        <?php echo $courses_join[$i]->level; ?>
                                        </a>
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">
                                        <i class="fa fa-building-o" aria-hidden="true"></i>
                                        <span>Location</span>
                                    </th>
                                    <td>
                                        <?php echo $courses_join[$i]->venue; ?></td>
                                </tr>
                                <tr>
                                    <th scope="row">
                                        <i class="fa fa-clock-o" aria-hidden="true"></i>
                                        <span>Course Period</span>
                                    </th>
                                    <td>
                                        <?php echo substr($courses_join[$i]->start_time, 0, 10) . ' ' . substr($courses_join[$i]->start_time, 11, 5) . " - " . substr($courses_join[$i]->end_time, 11, 5); ?></td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            <?php endfor; ?>
        </section>

        <div class="container mt-2">
            <div class="course booked row">
                <div class="course-info col col-lg-12">
                    <h2><span class="badge badge-primary">Booked Venue</span></h2>
                </div>
            </div>
        </div>
        <section class="container">
            <?php for ($i = 0; $i < sizeof($venues_book); $i++): ?>
                <div class="course booked row">
                    <div class="course-info col col-lg-12">
                        <div class="course-info">
                            <table>
                                <tbody>
                                <th scope="row">
                                    <i class="fa fa-indent" aria-hidden="true"></i>
                                    <span>Sport</span>
                                </th>
                                <td>
                                    <?php echo $venues_book[$i]->sport; ?>
                                    </a>
                                </td>
                                </tr>
                                <tr>
                                    <th scope="row">
                                        <i class="fa fa-building-o" aria-hidden="true"></i>
                                        <span>Location</span>
                                    </th>
                                    <td>
                                        <?php echo $venues_book[$i]->venue; ?></td>
                                </tr>
                                <tr>
                                    <th scope="row">
                                        <i class="fa fa-clock-o" aria-hidden="true"></i>
                                        <span>Period</span>
                                    </th>
                                    <td>
                                        <?php echo substr($venues_book[$i]->start_time, 0, 10) . ' ' . substr($venues_book[$i]->start_time, 11, 5); ?></td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            <?php endfor; ?>
        </section>

        <div class="container mt-2">
            <div class="course booked row">
                <div class="course-info col col-lg-12">
                    <h2><span class="badge badge-primary">Joined Session</span></h2>
                </div>
            </div>
        </div>
        <section class="container">
            <?php for ($i = 0; $i < sizeof($shares_join); $i++): ?>
                <div class="course booked row">
                    <div class="course-info col col-lg-12">
                        <div class="course-info">
                            <table>
                                <tbody>
                                <tr>
                                    <th scope="row">
                                        <i class="fa fa-users" aria-hidden="true"></i>
                                        <span>Host</span>
                                    </th>
                                    <td>
                                        <?php echo $shares_join[$i]->first_name . " " . $shares_join[$i]->last_name; ?>
                                    </td>
                                </tr>
                                <th scope="row">
                                    <i class="fa fa-indent" aria-hidden="true"></i>
                                    <span>Sport</span>
                                </th>
                                <td>
                                    <?php echo $shares_join[$i]->sport; ?>
                                    </a>
                                </td>
                                </tr>
                                <tr>
                                    <th scope="row">
                                        <i class="fa fa-building-o" aria-hidden="true"></i>
                                        <span>Location</span>
                                    </th>
                                    <td>
                                        <?php echo $shares_join[$i]->venue; ?></td>
                                </tr>
                                <tr>
                                    <th scope="row">
                                        <i class="fa fa-clock-o" aria-hidden="true"></i>
                                        <span>Period</span>
                                    </th>
                                    <td>
                                        <?php echo substr($shares_join[$i]->start_time, 0, 10) . ' ' . substr($shares_join[$i]->start_time, 11, 5); ?></td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            <?php endfor; ?>
        </section>
    <?php endif; ?>
</div>

<script>
    $(function () {
        $('.collapse').collapse('hide');

        $('.button-participant').click(function (e) {
            let icon = $(this).children('i').eq(1);
            if (icon.hasClass('fa-sort-down')) {
                icon.removeClass('fa-sort-down');
                icon.addClass('fa-sort-up');
            } else {
                icon.removeClass('fa-sort-up');
                icon.addClass('fa-sort-down');
            }
        });
    });
</script>