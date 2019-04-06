<?php
    (int)$currentpage = (!empty($_GET["currentpage"]))?$_GET["currentpage"]:0;
    (int)$nextpage = $currentpage + 1;
    (int)$prevpage = $currentpage - 1;
    $dow = array('Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun');
?>

<form action='<?php echo $page_url; ?>admin/session_handler' method='post'>


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
