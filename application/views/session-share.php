<div class="wrapper">
    <section class="container-fluid" id="session-container">
        <?php
        $count = 0;
        foreach ($sessions as $session) : ?>
            <div class="session row">
                <div class="session-info col">
                    <div class="session-info">
                        <table>
                            <tbody>
                            <tr>
                                <th scope="row">
                                    <i class="fa fa-newspaper-o" aria-hidden="true"></i>
                                    <span>Location</span>
                                </th>
                                <td>
                                    <a href="<?php echo $detail_url . $session->session_id; ?>">
                                        <?php echo $session->facility." - ".$session->court; ?>
                                    </a>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">
                                    <i class="fa fa-indent" aria-hidden="true"></i>
                                    <span>Host</span>
                                </th>
                                <td><?php echo $session->fullname; ?></td>
                            </tr>
                            <tr>
                                <th scope="row">
                                    <i class="fa fa-clock-o" aria-hidden="true"></i>
                                    <span>Session Time</span>
                                </th>
                                <td>
                                    <?php echo $session->start_time . " - " . $session->end_time; ?></td>
                            </tr>
                            <tr>
                                <th scope="row">
                                    <i class="fa fa-indent" aria-hidden="true"></i>
                                    <span>Description</span>
                                </th>
                                <td><?php echo $session->description; ?></td>
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
                                    <?php echo $session->available_seats . " total"; ?>
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
