<form action='<?php echo $page_url; ?>profile/update_profile' method='post'>

    First Name:<br>
    <input type="text" name="first_name" value="<?php echo $user['db']->first_name;?>"><br>

    Last Name:<br>
    <input type="text" name="last_name" value="<?php echo $user['db']->last_name;?>"><br>

    Password:<br>
    <input type="password" name="password" value="<?php echo $user['db']->password;?>"><br>

    Icon:<br>
      <img src="https://vignette.wikia.nocookie.net/uncyclopedia/images/0/03/200px-Super_Saiyan.jpg"
           class="img-thumbnail" alt="profile pic"><br>
      <input type="file" name="icon"><br>

    Self Introduction:<br>
    <textarea rows="4" name="intro"><?php echo $user['db']->intro;?></textarea><br>

    <?php if ($user['usertype'] == 'coach'): ?>
    Experience:<br>
    <input type="text" name="experience" value="<?php echo $user['db']->experience;?>"><br>
    <?php endif; ?>

    <?php if ($user['usertype'] == 'student'): ?>
    Interest:<br>
    <input type="text" name="interest" value="<?php echo $user['db']->interest;?>"><br>

    Birthday:<br>
    <input type="date" name="birthday" value="<?php echo $user['db']->birthday;?>"><br>
    <?php endif; ?>

    Phone Number:<br>
    <input type="text" name="phone" value="<?php echo $user['db']->phone;?>"><br>

    <input type="submit">
</form>
