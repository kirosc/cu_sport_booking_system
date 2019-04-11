<div class="container-fluid">
    <div class="row">
        <div class="container-login100">
            <?php echo validation_errors(); ?>

            <div class="wrap-login100 col-md-8 col-lg-4 col-xl-3">
                <form class="login100-form validate-form" id="login-form"
                      action='<?php echo $page_url; ?>profile/change_password_check' method='post'>
					<span class="login100-form-title p-b-26">
						Change Password
					</span>

                    <div class="wrap-input100 validate-input" data-validate="Enter password">
						<span class="btn-show-pass">
							<i class="zmdi zmdi-eye"></i>
						</span>
                        <input class="input100" type="password" name="password">
                        <span class="focus-input100" data-placeholder="Old Password"></span>
                    </div>

                    <div class="wrap-input100 validate-input" data-validate="Enter password">
						<span class="btn-show-pass">
							<i class="zmdi zmdi-eye"></i>
						</span>
                        <input class="input100" type="password" name="new_password">
                        <span class="focus-input100" data-placeholder="New Password"></span>
                    </div>

                    <div class="wrap-input100 validate-input" data-validate="Enter password">
						<span class="btn-show-pass">
							<i class="zmdi zmdi-eye"></i>
						</span>
                        <input class="input100" type="password" name="new_passconf">
                        <span class="focus-input100" data-placeholder="Confirm New Password"></span>
                    </div>

                    <div class="container-login100-form-btn">
                        <div class="wrap-login100-form-btn">
                            <div class="login100-form-bgbtn"></div>
                            <button class="login100-form-btn" form="login-form">
                                Confirm
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
