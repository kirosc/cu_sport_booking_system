<div class="container-login100">
    <div class="wrap-login100">
        <form class="login100-form validate-form">
					<span class="login100-form-title p-b-26">
						Welcome
					</span>
            <div class="wrap-input100 validate-input" data-validate = "Enter username">
                <input class="input100" type="text" name="username">
                <span class="focus-input100" data-placeholder="Username"></span>
            </div>

            <div class="wrap-input100 validate-input" data-validate="Enter password">
						<span class="btn-show-pass">
							<i class="zmdi zmdi-eye"></i>
						</span>
                <input class="input100" type="password" name="pass">
                <span class="focus-input100" data-placeholder="Password"></span>
            </div>

            <div class="container-login100-form-btn">
                <div class="wrap-login100-form-btn">
                    <div class="login100-form-bgbtn"></div>
                    <form action='<?php //echo $page_url; ?>login/login_check' method='post' onsubmit='return login()'>
                    <button class="login100-form-btn">
                        Login
                    </button>
                    </form>
                </div>
            </div>

            <div class="text-center p-t-100">
						<span class="txt1">
							Don’t have an account?
						</span>
                <a class="txt2" href="<?php echo $page_url; ?>login/register_main">
                    Sign Up
                </a>
            </div>
        </form>
    </div>
</div>

