<?php
(int)$currentpage = (!empty($_GET["currentpage"])) ? $_GET["currentpage"] : 0;
(int)$nextpage = $currentpage + 1;
(int)$prevpage = $currentpage - 1;
$dow = array('Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun');
?>

<div class="wrapper">
    <ul class="nav nav-pills mb-3 m-md-4 m-2" id="pills-tab" role="tablist">
        <li class="nav-item">
            <a class="nav-link active" id="pills-add-tab" data-toggle="pill" href="#pills-add" role="tab">Add Session</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="pills-delete-tab" data-toggle="pill" href="#pills-delete" role="tab">Delete Session</a>
        </li>
    </ul>
    <div class="tab-content" id="pills-tabContent">
        <div class="tab-pane fade show active" id="pills-add" role="tabpanel">
            <form action='<?php echo $page_url; ?>admin/add_session_handler' method='post'>
                <div class="m-md-4 m-2">
                    <label for="venue">Select Venue</label>
                    <select class="form-control" name="venue">
                        <?php foreach ($venues as $venue) : ?>
                            <option value="<?php echo $venue->venue_id; ?>"><?php echo $venue->venue; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div class="m-md-4 m-2">
                    <div class="table-responsive-md">
                        <table data-toggle="table" class="table-hover-md" id="table">
                            <thead>
                            <tr>
                                <td><a href="<?php echo "{$_SERVER['PHP_SELF']}?currentpage=$prevpage"; ?>"> << </a>
                                </td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td><a href="<?php echo "{$_SERVER['PHP_SELF']}?currentpage=$nextpage"; ?>"> >> </a>
                                </td>
                            </tr>
                            <tr>
                                <th data-col="time"></th>

                                <?php
                                $_SESSION['admin_session_page'] = $currentpage;

                                if (date('D', strtotime('today')) == 'Mon') {
                                    $ts = date(strtotime('today'));
                                } else {
                                    $ts = date(strtotime('previous monday'));
                                }
                                $ts = $ts + $currentpage * 86400 * 7;
                                for ($i = 0; $i < 7; $i++):
                                    ?>
                                    <th class="text-center">
                                        <?php echo date('Y-m-d', $ts + 86400 * $i) . "<br>" . $dow[$i]; ?>
                                    </th>
                                <?php endfor; ?>

                            </tr>
                            </thead>
                            <tbody>
                            <?php $st = 8; $end = 9; for ($i = 0; $i < 15; $i++): ?>
                                <tr>
                                    <?php if ($st == 8): ?>
                                        <td><?php echo "0" . $st . ":00 - 0" . $end . ":00"; ?></td>
                                    <?php endif; ?>
                                    <?php if ($st == 9): ?>
                                        <td><?php echo "0" . $st . ":00 - " . $end . ":00"; ?></td>
                                    <?php endif; ?>
                                    <?php if ($st >= 10): ?>
                                        <td><?php echo $st . ":00 - " . $end . ":00"; ?></td>
                                    <?php endif; ?>

                                    <?php for ($j = 0; $j < 7; $j++): ?>
                                        <?php if (in_array($st, $sessions)): ?>
                                            <td></td>
                                        <?php else: ?>
                                            <td style="text-align: center;">
                                                <input type="checkbox" name="checkbox-<?php echo $j . $st; ?>" value="checked">
                                            </td>
                                        <?php endif; ?>
                                    <?php endfor; ?>
                                </tr>
                                <?php $st = $st + 1; $end = $end + 1; ?>
                            <?php endfor; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="options m-md-4 m-2">
                    <div class="custom-control custom-checkbox mb-md-4 mb-2">
                        <input type="checkbox" class="custom-control-input" id="selectAll">
                        <label class="custom-control-label" for="selectAll">Select All</label>
                    </div>
                    <button class="btn btn-lg btn-success mr-2" type="submit">Add</button>
                </div>
            </form>
        </div>
        <div class="tab-pane fade" id="pills-delete" role="tabpanel">
            <form action='<?php echo $page_url; ?>admin/delete_session_handler' method='post'>
                <div class="m-md-4 m-2">
                    <label for="venue">Select Venue</label>
                    <select class="form-control" name="venue" id="venue">
                        <?php foreach ($venues as $venue) : ?>
                            <option value="<?php echo $venue->venue_id; ?>"><?php echo $venue->venue; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div class="m-md-4 m-2">
                    <span>Select Session</span>
                </div>

                <div class="m-md-4 m-2">
                    <div class="table-responsive-md" id="table-delete">
                        <table data-toggle="table" class="table-hover-md" id="table-2">
                            <thead>
                            <tr>
                                <th data-col="time"></th>
                            </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="m-md-4 m-2">
                    <button class="btn btn-lg btn-danger mr-2" type="submit">Delete</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    $(document).ready(function () {
        function getSession() {
            let venue_id = $('#venue').val();
            $.ajax({
                type: "POST",
                url: "<?php echo $page_url; ?>util/search_session_handler",
                data: {venue_id},
                dataType: 'json',
                success: function (result) {
                    $("#table-2 tbody").html("");
                    for (var i = 0; i < result.length; i++) {
                        var venue = result[i].venue_id;
                        var date = result[i].date;
                        var avail_time = result[i].availableTimeSlot;

                        var tr_str = "<tr>" +
                            "<td align='center'>" + date + "</td>";

                        for (var j = 0; j < avail_time.length; j++) {
                            tr_str = tr_str + "<td align='center'><input type='checkbox' name='delete-checkbox[" + date + (avail_time[j] + 8) + "]' value='checked'/>" + (avail_time[j] + 8) + ":00 - " + (avail_time[j] + 9) + ":00</td>";
                        }

                        tr_str = tr_str + "</tr>";

                        $("#table-2 tbody").append(tr_str);
                    }
                }
            });
        }

        getSession();

        $('#selectAll').click(function (event) {
            if (this.checked) {
                // Iterate each checkbox
                $(':checkbox').each(function () {
                    this.checked = true;
                });
            } else {
                $(':checkbox').each(function () {
                    this.checked = false;
                });
            }
        });

        $('#venue').change(getSession);
    });
</script>
