<?php
    (int)$currentpage = (!empty($_GET["currentpage"]))?$_GET["currentpage"]:0;
    (int)$nextpage = $currentpage + 1;
    (int)$prevpage = $currentpage - 1;
    $dow = array('Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun');
?>

<nav>
  <div class="nav nav-tabs nav-justified" id="nav-tab" role="tablist">
    <a class="nav-item nav-link active" id="add-session-tab" data-toggle="tab" href="#add-session" role="tab" aria-controls="add-session" aria-selected="true">Add Session</a>
    <a class="nav-item nav-link" id="delete-session-tab" data-toggle="tab" href="#delete-session" role="tab" aria-controls="delete-session" aria-selected="false">Delete Session</a>
  </div>
</nav>
<div class="tab-content" id="nav-tabContent">
  <div class="tab-pane fade show active" id="add-session" role="tabpanel" aria-labelledby="add-session-tab">
    <form action='<?php echo $page_url; ?>admin/add_session_handler' method='post'>
        Select Venue:<br>
        <select name="venue">
            <?php foreach ($venues as $venue) : ?>
                <option value="<?php echo $venue->venue_id; ?>"><?php echo $venue->venue; ?></option>
            <?php endforeach; ?>
        </select><br>


        <div class="m-md-4 m-2">
            <div class="table-responsive-md">
                  <table data-toggle="table" class="table-hover-md" id="table">
                      <thead>
                        <tr>
                            <td><a href="<?php echo "{$_SERVER['PHP_SELF']}?currentpage=$prevpage"; ?>"> << </a> </td>
                            <td></td><td></td><td></td><td></td><td></td><td></td>
                            <td><a href="<?php echo "{$_SERVER['PHP_SELF']}?currentpage=$nextpage"; ?>"> >> </a> </td>
                        </tr>
                      <tr>
                          <th data-col="time"></th>

                          <?php
                            $_SESSION['admin_session_page'] = $currentpage;
                            $ts = date(strtotime('previous monday'));
                            $ts = $ts + $currentpage * 86400 * 7;
                            for ($i=0; $i < 7; $i++):
                          ?>
                              <th class="text-center">
                                  <?php echo date('Y-m-d', $ts+86400*$i) . "<br>" . $dow[$i]; ?>
                              </th>
                          <?php endfor; ?>

                      </tr>
                      </thead>
                      <tbody>
                          <?php $st = 8; $end = 9; for ($i=0; $i < 15; $i++): ?>
                            <tr>
                              <?php if ($st == 8): ?>
                                <td><?php echo "0".$st .":00 - 0".$end .":00";?></td>
                              <?php endif; ?>
                              <?php if ($st == 9): ?>
                                <td><?php echo "0".$st .":00 - ".$end .":00";?></td>
                              <?php endif; ?>
                              <?php if ($st >= 10): ?>
                                <td><?php echo $st .":00 - ".$end .":00";?></td>
                              <?php endif; ?>

                              <?php for ($j=0; $j < 7; $j++): ?>
                                <?php if (in_array($st, $sessions)): ?>
                                  <td></td>
                                <?php else: ?>
                                  <td><input type="checkbox" name="checkbox-<?php echo $j.$st;?>" value="checked"/></td>
                                <?php endif; ?>
                              <?php endfor; ?>

                            </tr>
                          <?php $st = $st+1; $end = $end + 1; endfor;?>
                      </tbody>
                  </table>
            </div>
        </div>
    <input type="checkbox" id="selectAll">Select All<br>
        <input type="submit">
    </form>

    <script language="JavaScript">
    $('#selectAll').click(function(event){
      if(this.checked) {
            // Iterate each checkbox
            $(':checkbox').each(function() {
                this.checked = true;
            });
        } else {
            $(':checkbox').each(function() {
                this.checked = false;
            });
        }
    });
    </script>

  </div>

  <div class="tab-pane fade" id="delete-session" role="tabpanel" aria-labelledby="delete-session-tab">
    <form action='<?php echo $page_url; ?>admin/delete_session_handler' method='post'>
        Select Venue:<br>
        <select name="venue" id='venue'>
            <?php foreach ($venues as $venue) : ?>
                <option value="<?php echo $venue->venue_id; ?>"><?php echo $venue->venue; ?></option>
            <?php endforeach; ?>
        </select><br>

        Select Session:<br>
        <div class="m-md-4 m-2">
            <div class="table-responsive-md">
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


        <input type="submit">
    </form>
  </div>

</div>

<script>
    $(document).ready(function(){
    $('#venue').change(function(){
        //Selected value
        var venue_id = $(this).val();
        alert("value in js "+venue_id);

        $.ajax({
            type: "POST",
            url: "<?php echo $page_url; ?>admin/test",
            data: {venue_id},
            dataType: 'json',
            success: function(result){
               for (var i = 0; i < result.length; i++) {
                 var venue = result[i].venue_id;
                 var date = result[i].date;
                 var avail_time = result[i].availableTimeSlot;

                 var tr_str = "<tr>" +
                    "<td align='center'>" + date + "</td>";

                 for (var j = 0; j < avail_time.length; j++) {
                   if (avail_time[j] === j) {
                     tr_str = tr_str + "<td align='center'><input type='checkbox' name='delete-checkbox-" + date + (j+8) + "' value='checked'/>" + (j+8) + ":00 - " + (j+9) + ":00</td>";
                   }
                 }

                tr_str = tr_str + "</tr>";

                 $("#table-2 tbody").append(tr_str);
               }
            }
        });
    });
});
</script>
