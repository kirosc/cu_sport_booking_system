<table border=2>
  <tr height = 50px valign = center>
    <td width = 250px >Login</td>
  </tr>
  <tr height= 200px>
    <td>
      <form action='<?php echo $page_url; ?>login/login_check' method='post' onsubmit='return login()'>
        User Name: <br>
        <input type='text' name='user_name'><br><br>
        Password: <br>
        <input type='text' name='password'><br><br>
        <div name='alert'><br></div>
        <input type='submit' value='Submit'>
      </form>
      <form action='<?php echo $page_url; ?>login/register_main' method='get'>
        <button type="submit">Register</button>
      </form>
    </td>
  </tr>
</table>
