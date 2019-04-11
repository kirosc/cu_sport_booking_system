<div class="wrapper">
    <div class="container user-container">
        <nav>
            <div class="nav nav-tabs" id="nav-tab" role="tablist">
                <a class="nav-item nav-link active" id="nav-reset-tab" data-toggle="tab" href="#nav-reset" role="tab"
                   aria-controls="nav-reset" aria-selected="true">Reset Password</a>
                <a class="nav-item nav-link" id="nav-delete-tab" data-toggle="tab" href="#nav-delete" role="tab"
                   aria-controls="nav-delete" aria-selected="false">Delete User</a>
            </div>
        </nav>
        <div class="tab-content" id="nav-tabContent">
            <div class="tab-pane fade show active" id="nav-reset" role="tabpanel" aria-labelledby="nav-reset-tab">
                <form action='<?php echo $page_url; ?>admin/reset_password_handler' method='post' id="form-reset">
                    <div class="container-fluid">
                        <div class="row m-2 m-md-4">
                            <div class="col-xl-6 mb-1">
                                <label for="college">Select User Type</label>
                                <select class="form-control" name="usertype" id="user-type-1">
                                    <option value="None" selected>-----</option>
                                    <option value="coach">Coach</option>
                                    <option value="student">User</option>
                                </select>
                            </div>

                            <div class="col-xl-6 mb-1">
                                <label for="sport">Select User</label>
                                <select class="form-control" name="user" id="user-1">
                                    <option value="None" selected>-----</option>
                                    <?php foreach ($users as $user): ?>
                                        <option value="<?php echo $user->username; ?>"><?php echo $user->username; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                        <div class="profile-container" id="profile1"></div>
                        <div class="row m-2 m-md-4">
                            <div class="col-xl-6 mb-1 mx-auto">
                                <button class="btn btn-lg btn-danger disabled" value="Reset This User Password" form="form-reset" id="reset-btn">Reset</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>

            <div class="tab-pane fade" id="nav-delete" role="tabpanel" aria-labelledby="nav-delete-tab">


                <form action='<?php echo $page_url; ?>admin/delete_user_handler' method='post' id="form-delete">
                    <div class="container-fluid">
                        <div class="row m-2 m-md-4">
                            <div class="col-xl-6 mb-1">
                                <label for="college">Select User Type</label>
                                <select class="form-control" name="usertype" id="user-type-2">
                                    <option value="None" selected>-----</option>
                                    <option value="coach">Coach</option>
                                    <option value="student">User</option>
                                </select>
                            </div>

                            <div class="col-xl-6 mb-1">
                                <label for="sport">Select User</label>
                                <select class="form-control" name="user" id="user-2">
                                    <option value="None" selected>-----</option>
                                    <?php foreach ($users as $user): ?>
                                        <option value="<?php echo $user->username; ?>"><?php echo $user->username; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                        <div class="profile-container" id="profile2"></div>
                        <div class="row m-2 m-md-4">
                            <div class="col-xl-6 mb-1 mx-auto">
                                <button class="btn btn-lg btn-danger disabled" value="Delete This User"  form="form-delete" id="delete-btn">Delete</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function () {
        $('#user-type-1').change(function () {
            //Selected value
            let usertype = $(this).val();
            $.ajax({
                type: "POST",
                url: "<?php echo $page_url; ?>util/search_usertype_handler",
                data: {usertype},
                dataType: 'json',
                success: function (result) {
                    $("#user-1").html("");
                    let html_str = "<option value=\"None\" selected>-----</option>";
                    for (let i = 0; i < result.length; i++) {
                        let username = result[i].username;
                        let email = result[i].email;
                        html_str = html_str + "<option value=" + email + ">" + username + "</option>";
                    }
                    $("#user-1").append(html_str);
                }
            });
        });

        // Insert user profile
        $('#user-1').change(function () {
            //Selected value
            let user = $(this).val();
            if (user === 'None') {
                $('#reset-btn').addClass('disabled');
            } else {
                $('#reset-btn').removeClass('disabled');
            }
            $.ajax({
                type: "POST",
                url: "<?php echo $page_url; ?>admin/show_user_profile",
                data: {user},
                dataType: 'html',
                success: function (result) {
                    $('#profile1').html(result)
                }
            });
        });

        $('#user-type-2').change(function () {
            //Selected value
            let usertype = $(this).val();
            $.ajax({
                type: "POST",
                url: "<?php echo $page_url; ?>util/search_usertype_handler",
                data: {usertype},
                dataType: 'json',
                success: function (result) {
                    $("#user-2").html("");
                    let html_str = "<option value=\"None\" selected>---</option>";
                    for (let i = 0; i < result.length; i++) {
                        let username = result[i].username;
                        let email = result[i].email;
                        html_str = html_str + "<option value=" + email + ">" + username + "</option>";
                    }
                    $("#user-2").append(html_str);
                }
            });
        });

        $('#user-2').change(function () {
            //Selected value
            let user = $(this).val();
            if (user === 'None') {
                $('#delete-btn').addClass('disabled');
            } else {
                $('#delete-btn').removeClass('disabled');
            }
            $.ajax({
                type: "POST",
                url: "<?php echo $page_url; ?>admin/show_user_profile",
                data: {user},
                dataType: 'html',
                success: function (result) {
                    $('#profile2').html(result)
                }
            });
        });

        // Prevent empty submission
        $('form').submit(function (e) {
            if ($(this).attr('id') === 'form-reset') {
                if ($('#user-1').val() === 'None') {
                    e.preventDefault();
                }
            } else {
                if ($('#user-2').val() === 'None') {
                    e.preventDefault();
                }
            }
        });
    });
</script>
