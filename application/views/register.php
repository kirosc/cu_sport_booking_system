<div class="container-login100">
    <div class="wrap-login100">
        <form class="login100-form validate-form">
					<span class="login100-form-title p-b-26">
						Register
					</span>
            <div class="wrap-input100 validate-input" data-validate="Enter username">
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

            <div class="wrap-input100 validate-input" data-validate="Enter first name">
                <input class="input100" type="text" name='first_name' maxlength='40'>
                <span class="focus-input100" data-placeholder="First Name"></span>
            </div>

            <div class="wrap-input100 validate-input" data-validate="Enter last name">
                <input class="input100" type="text" name='last_name' maxlength='40'>
                <span class="focus-input100" data-placeholder="Last Name"></span>
            </div>

            <div class="wrap-input100 validate-input" data-validate="Enter phone number">
                <input class="input100" type="number" name="phone">
                <span class="focus-input100" data-placeholder="Phone Number"></span>
            </div>

            <div class="wrap-input100 validate-input" data-validate="Invalid email format">
                <input class="input100" type="text" name="email" maxlength='255'>
                <span class="focus-input100" data-placeholder="Email"></span>
            </div>

            <label class="control control-checkbox">
                <span class="checkbox-container">
                    I am a coach
                    <input type="checkbox" class="iscoach-checkbox"/>
                    <div class="control_indicator"></div>
                </span>
            </label>

            <div class="container-login100-form-btn">
                <div class="wrap-login100-form-btn">
                    <div class="login100-form-bgbtn"></div>
                    <form action='#'>
                        <button class="login100-form-btn">
                            Register
                        </button>
                    </form>
                </div>
            </div>

            <div class="text-center p-t-100">
						<span class="txt1">
							Already have an account?
						</span>
                <a class="txt2" href="<?php echo $page_url; ?>login">
                    Login in
                </a>
            </div>
        </form>
    </div>
</div>
