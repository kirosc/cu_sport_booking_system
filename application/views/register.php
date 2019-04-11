<div class="container-fluid">
    <div class="row">
        <div class="container-login100">
            <?php echo validation_errors(); ?>

            <div class="wrap-login100 col-md-8 col-lg-6 col-xl-4">
                <form class="login100-form validate-form" method="post"
                      action="<?php echo $page_url; ?>login/signup_check">
					<span class="login100-form-title p-b-26">
						Register
					</span>
                    <div class="wrap-input100 validate-input" data-validate="Invalid username">
                        <input class="input100" type="text" name="user_name" value="<?php echo set_value('user_name');?>">
                        <span class="focus-input100" data-placeholder="Username"></span>
                    </div>

                    <div class="wrap-input100 validate-input" data-validate="Enter password">
						<span class="btn-show-pass">
							<i class="zmdi zmdi-eye"></i>
						</span>
                        <input class="input100" type="password" name="password" value="<?php echo set_value('password');?>">
                        <span class="focus-input100" data-placeholder="Password"></span>
                    </div>

                    <div class="wrap-input100 validate-input" data-validate="Enter password">
						<span class="btn-show-pass">
							<i class="zmdi zmdi-eye"></i>
						</span>
                        <input class="input100" type="password" name="passconf" value="<?php echo set_value('passconf');?>">
                        <span class="focus-input100" data-placeholder="Confirm Password"></span>
                    </div>

                    <div class="wrap-input100 validate-input" data-validate="Enter first name">
                        <input class="input100" type="text" name='first_name' maxlength='40' value="<?php echo set_value('first_name');?>">
                        <span class="focus-input100" data-placeholder="First Name"></span>
                    </div>

                    <div class="wrap-input100 validate-input" data-validate="Enter last name">
                        <input class="input100" type="text" name='last_name' maxlength='40' value="<?php echo set_value('last_name');?>">
                        <span class="focus-input100" data-placeholder="Last Name"></span>
                    </div>

                    <div class="wrap-input100 validate-input" data-validate="Invalid email format">
                        <input class="input100" type="text" name="email" maxlength='255'>
                        <span class="focus-input100" data-placeholder="Email"></span>
                    </div>

                    <div class="wrap-input100 validate-input student">
                        <input class="input100" type="text" name="interest">
                        <span class="focus-input100" data-placeholder="Interest"></span>
                    </div>

                    <div class="wrap-input100 validate-input student" data-validate="Birthday">
                        <input class="input100 has-val" name="birthday" type="text" value=""/>
                        <span class="focus-input100" data-placeholder="Birthday"></span>
                    </div>

                    <div class="wrap-input100 validate-input student" data-validate="Enter phone number">
                        <input class="input100 number" type="text" name="phone">
                        <span class="focus-input100" data-placeholder="Phone Number"></span>
                    </div>

                    <div class="wrap-input100 validate-input coach hidden" data-validate="Enter experience">
                    <textarea class="input100" id="experience" name="experience"
                              rows="3"></textarea>
                        <span class="focus-input100" data-placeholder="Experience"></span>
                    </div>

                    <div class="wrap-input100 validate-input" data-validate="Required">
                    <textarea class="input100" id="description" name="description"
                              rows="3"></textarea>
                        <span class="focus-input100" data-placeholder="Description about yourself"></span>
                    </div>

                    <label class="control control-checkbox">
                <span class="checkbox-container">
                    I am a coach
                    <input type="checkbox" class="iscoach-checkbox" name='is_coach'/>
                    <div class="control_indicator"></div>
                </span>
                    </label>

                    <div class="container-login100-form-btn">
                        <div class="wrap-login100-form-btn">
                            <div class="login100-form-bgbtn"></div>
                            <button type="submit" class="login100-form-btn">
                                Register
                            </button>
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
    </div>
</div>
