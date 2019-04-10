<div class="container-fluid">
    <div class="row">
        <div class="container-login100">
            <div class="wrap-login100 col-md-8 col-lg-6 col-xl-4">
                <form class="login100-form validate-form" id="login-form"
                      action='<?php echo $page_url; ?>login/forgot_check' method='post'>
					<span class="login100-form-title p-b-26">
						Verify Your Identity
					</span>
                    <div class="wrap-input100 validate-input" data-validate="Enter username">
                        <input class="input100" type="text" name="user_name">
                        <span class="focus-input100" data-placeholder="Username"></span>
                    </div>
                    
                    <div class="dropdown">
                        <button class="btn btn-secondary dropdown-toggle" type="button" id="question1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Security Question 1
                        </button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <a class="dropdown-item" href="#">Question</a>
                            <a class="dropdown-item" href="#">Question</a>
                            <a class="dropdown-item" href="#">Question</a>
                        </div>
                    </div>

                    <div class="container-login100-form-btn">
                        <div class="wrap-login100-form-btn">
                            <div class="login100-form-bgbtn"></div>
                            <button class="login100-form-btn" form="login-form">
                                Verify
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>