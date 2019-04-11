<div class="container-fluid">
    <div class="row">
        <div class="container-login100">
            <div class="wrap-login100 col-md-8 col-lg-6 col-xl-6">
                <form class="login100-form validate-form"
                      action='<?php echo $page_url; ?>login/forgot_check' method='post'>
					<span class="login100-form-title p-b-26">
						Verify Your Identity
					</span>
                    <div class="wrap-input100 validate-input" data-validate="Enter username">
                        <input class="input100" type="text" name="validate_user_name">
                        <span class="focus-input100" data-placeholder="Username"></span>
                    </div>

                    <div class="form-group p-b-10">
                        <label for="securityQuestion1">Security Question 1</label>
                        <select id="securityQuestion1" class="btn form-control">
                            <option selected>Choose...</option>
                            <option>What was your childhood nickname?</option>
                            <option>In what city or town did your mother and father meet?</option>
                            <option>What is the name of your favorite childhood friend?</option>
                            <option>What was the name of your first stuffed animal?</option>
                            <option>Who are you, if you are not you?</option>
                            <option>In what city or town was your first school located?</option>
                            <option>What is your favorite video game?</option>
                            <option>Who do you love the most?</option>
                            <option>Who do you hate the most?</option>
                            <option>What do you do first if your life is restarted?</option>
                        </select>
                    </div>
                    <div class="wrap-input100 validate-input" data-validate="Enter Answer 1">
                        <input class="input100" type="text" name="answer1">
                        <span class="focus-input100" data-placeholder="Answer 1"></span>
                    </div>

                    <div class="form-group p-b-10">
                        <label for="securityQuestion2">Security Question 2</label>
                        <select id="securityQuestion2" class="btn form-control">
                            <option selected>Choose...</option>
                            <option>What was your childhood nickname?</option>
                            <option>In what city or town did your mother and father meet?</option>
                            <option>What is the name of your favorite childhood friend?</option>
                            <option>What was the name of your first stuffed animal?</option>
                            <option>Who are you, if you are not you?</option>
                            <option>In what city or town was your first school located?</option>
                            <option>What is your favorite video game?</option>
                            <option>Who do you love the most?</option>
                            <option>Who do you hate the most?</option>
                            <option>What do you do first if your life is restarted?</option>
                        </select>
                    </div>
                    <div class="wrap-input100 validate-input" data-validate="Enter Answer 2">
                        <input class="input100" type="text" name="answer2">
                        <span class="focus-input100" data-placeholder="Answer 2"></span>
                    </div>

                    <div class="container-login100-form-btn">
                        <div class="wrap-login100-form-btn">
                            <div class="login100-form-bgbtn"></div>
                            <button class="login100-form-btn" type="submit">
                                Verify
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>