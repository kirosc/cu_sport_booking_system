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
                                <button type="button" class="btn btn-lg btn-danger disabled" id="reset-btn"
                                        data-toggle=""
                                        data-target="#modalConfirm">Reset
                                </button>
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
                                        <option value="<?php echo $user->email; ?>"><?php echo $user->username; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                        <div class="profile-container" id="profile2"></div>
                        <div class="row m-2 m-md-4">
                            <div class="col-xl-6 mb-1 mx-auto">
                                <button type="button" class="btn btn-lg btn-danger disabled" data-toggle=""
                                        data-target="#modalConfirm" id="delete-btn">Delete
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>


    <!--  Modal  -->
    <div class="modal fade" id="modalConfirm" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header text-center">
                    <h4 class="modal-title w-100 font-weight-bold">Are you absolutely sure?</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body py-0 mt-4">
                    <p id="reset-message">This will reset user <span class="font-weight-bold"
                                                                     id="reset-username"></span> password.</p>
                    <p class="hidden" id="delete-message">This will delete user <span class="font-weight-bold"
                                                                                      id="delete-username"></span>.</p>
                </div>
                <div class="modal-body py-0">
                    <p id="confirm-message">Please type in the name of the user to confirm.</p>
                </div>
                <div class="modal-body pt-0">
                    <div class="md-form">
                        <input type="text" id="confirm-form" class="form-control validate" required>
                    </div>
                </div>
                <div class="modal-footer d-flex justify-content-center">
                    <button class="btn btn-danger" value="Reset This User Password" form="form-reset" id="confirm-btn">Confirm</button>
                </div>
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
                        html_str = html_str + "<option value=" + username + ">" + username + "</option>";
                    }
                    $("#user-1").append(html_str);
                }
            });
        });

        // Insert user profile
        $('#user-1').change(function () {
            //Selected value
            let user = $(this).val();
            let username = $('option[value="' + user + '"]').html();
            if (user === 'None') {
                $('#reset-btn').addClass('disabled').attr('data-toggle', '');
                $('#profile1').html('');
            } else {
                $('#reset-btn').removeClass('disabled').attr('data-toggle', 'modal');
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
            $('#reset-username').html(username);
            $('#confirm-form').val('');
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
                    let html_str = "<option value=\"None\" selected>-----</option>";
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
            let username = $('option[value="' + user + '"]').html();
            if (user === 'None') {
                $('#delete-btn').addClass('disabled').attr('data-toggle', '');
                $('#profile2').html('');
            } else {
                $('#delete-btn').removeClass('disabled').attr('data-toggle', 'modal');
            }
            $.ajax({
                type: "POST",
                url: "<?php echo $page_url; ?>admin/show_user_profile",
                data: {user: username},
                dataType: 'html',
                success: function (result) {
                    $('#profile2').html(result)
                }
            });
            $('#delete-username').html(username);
            $('#confirm-form').val('');
        });

        $('#form-reset').submit(function (e) {
            let confirmForm = $('#confirm-form');
            if ($('#reset-username').html() !== confirmForm.val()) {
                confirmForm.addClass('is-invalid');
                e.preventDefault();
            }
        });

        $('#form-delete').submit(function (e) {
            let confirmForm = $('#confirm-form');
            if ($('#delete-username').html() !== confirmForm.val()) {
                confirmForm.addClass('is-invalid');
                e.preventDefault();
            }
        });

        $('#confirm-form').focus(function () {
            $(this).removeClass('is-invalid');
        });


        $('a[data-toggle="tab"]').on('shown.bs.tab', function (e) {
            let target = $(e.target).attr("href") // activated tab
            if (target === "#nav-delete") {
                $('#reset-message').addClass('hidden');
                $('#delete-message').removeClass('hidden');
                $('#confirm-btn').attr('form', 'form-delete');
            } else {
                $('#reset-message').removeClass('hidden');
                $('#delete-message').addClass('hidden');
                $('#confirm-btn').attr('form', 'form-reset');
            }
        });
    });
</script>
