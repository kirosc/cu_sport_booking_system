<nav>
  <div class="nav nav-tabs nav-justified" id="nav-tab" role="tablist">
    <a class="nav-item nav-link active" id="password-reset-tab" data-toggle="tab" href="#password-reset" role="tab" aria-controls="password-reset" aria-selected="true">User Password Reset</a>
    <a class="nav-item nav-link" id="delete-user-tab" data-toggle="tab" href="#delete-user" role="tab" aria-controls="delete-user" aria-selected="false">Delete User</a>
  </div>
</nav>
<div class="tab-content" id="nav-tabContent">
  <div class="tab-pane fade show active" id="password-reset" role="tabpanel" aria-labelledby="password-reset-tab">
    <form action='<?php echo $page_url; ?>admin/reset_user_handler' method='post'>
        Select Usertype:<br>
        <select name="usertype" id="usertype1">
            <option value="None" selected>---</option>
            <option value="coach">coach</option>
            <option value="student">student</option>
        </select><br>

        Select User:<br>
        <select name="user" id="user1">
            <option value="None" selected>---</option>
            <?php foreach ($users as $user): ?>
                <option value="<?php echo $user->username; ?>"><?php echo $user->username; ?></option>
            <?php endforeach; ?>
        </select><br>

        <div id="profile1"></div>

        <input type="submit" value="Confirm"/>
    </form>

  </div>

  <div class="tab-pane fade" id="delete-user" role="tabpanel" aria-labelledby="delete-user-tab">
    <form action='<?php echo $page_url; ?>admin/delete_user_handler' method='post'>
        Select Usertype:<br>
        <select name="usertype" id="usertype2">
            <option value="None" selected>---</option>
            <option value="coach">coach</option>
            <option value="student">student</option>
        </select><br>

        Select User:<br>
        <select value="None" name="user" id="user2">
            <option selected>---</option>
            <?php foreach ($users as $user): ?>
                <option value="<?php echo $user->username; ?>"><?php echo $user->username; ?></option>
            <?php endforeach; ?>
        </select><br>

        <div id="profile2"></div>

        <input type="submit" value="Confirm"/>
    </form>
  </div>

</div>

<script>
    $(document).ready(function(){
    $('#usertype1').change(function(){
        //Selected value
        var usertype = $(this).val();
        $.ajax({
            type: "POST",
            url: "<?php echo $page_url; ?>util/search_usertype_handler",
            data: {usertype},
            dataType: 'json',
            success: function(result){
               $("#user1").html("");
               var html_str = "<option selected>---</option>";
               for (var i = 0; i < result.length; i++) {
                 var username = result[i].username;
                 html_str = html_str + "<option value=" + username + ">"+ username +"</option>";
               }
               $("#user1").append(html_str);
            }
        });
    });

    $('#user1').change(function(){
        //Selected value
        var user = $(this).val();
        $.ajax({
            type: "POST",
            url: "<?php echo $page_url; ?>admin/show_user_profile",
            data: {user},
            dataType: 'html',
            success: function(result){
              $('#profile1').html(result)
            }
        });
    });

    $('#usertype2').change(function(){
        //Selected value
        var usertype = $(this).val();
        $.ajax({
            type: "POST",
            url: "<?php echo $page_url; ?>util/search_usertype_handler",
            data: {usertype},
            dataType: 'json',
            success: function(result){
               $("#user2").html("");
               var html_str = "<option selected>---</option>";
               for (var i = 0; i < result.length; i++) {
                 var username = result[i].username;
                 html_str = html_str + "<option value=" + username + ">"+ username +"</option>";
               }
               $("#user2").append(html_str);
            }
        });
    });

    $('#user2').change(function(){
        //Selected value
        var user = $(this).val();
        $.ajax({
            type: "POST",
            url: "<?php echo $page_url; ?>admin/show_user_profile",
            data: {user},
            dataType: 'html',
            success: function(result){
              $('#profile2').html(result)
            }
        });
    });
});
</script>
