<div class="wrapper">
    <section class="container-fluid" id="session-share-container">
        <?php
        $count = 0;
        foreach ($sessions as $session) : ?>
            <div class="ss row">
                <div class="ss-info col">
                    <div class="ss-info">
                        <table>
                            <tbody>
                            <tr>
                                <th scope="row">
                                    <i class="fa fa-newspaper-o" aria-hidden="true"></i>
                                    <span>Location</span>
                                </th>
                                <td>
                                    <a href="<?php echo $detail_url . $session['start_session_id'] . '/' . $session['end_session_id']; ?>">
                                        <?php echo $session['college']." - ".$session['venue']; ?>
                                    </a>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">
                                    <i class="fa fa-indent" aria-hidden="true"></i>
                                    <span>Host</span>
                                </th>
                                <td>
                                  <a href="<?php echo $page_url."profile/".$session['host'];?>">
                                    <?php echo $session['user_fullname']; ?>
                                  </a>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">
                                    <i class="fa fa-clock-o" aria-hidden="true"></i>
                                    <span>Session Time</span>
                                </th>
                                <td>
                                    <?php echo $session['date']." ".$session['start_time'].":00 - ".$session['end_time'].":00"; ?></td>
                            </tr>
                            <tr>
                                <th scope="row">
                                    <i class="fa fa-indent" aria-hidden="true"></i>
                                    <span>Sport</span>
                                </th>
                                <td><?php echo $session['sport']; ?></td>
                            </tr>
                            <tr>
                                <th scope="row">
                                    <i class="fa fa-indent" aria-hidden="true"></i>
                                    <span>Description</span>
                                </th>
                                <td><?php echo $session['description']; ?></td>
                            </tr>
                            <tr>
                                <th scope="row">
                                    <i class="fa fa-users" aria-hidden="true"></i>
                                    <span>Available Seats</span>
                                </th>
                                <td>
                                    <?php
                                    if ($session['seat_remain'] == 0) {
                                        echo 'FULL /';
                                    } else {
                                        echo $session['seat_remain'] . " remaining /";
                                    }
                                    ?>
                                    <?php echo $session['seats'] . " total"; ?>
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
