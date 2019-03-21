<table border=2>
  <tr height = 50px valign = center>
    <td width = 250px >Login</td>
    <td width = 250px>Sign Up</td>
  </tr>
  <tr height= 200px>
    <td>
      <form action='/SportsHouse/index.php/register/login_check' method='post' onsubmit='return login()'>
        User Name: <br>
        <input type='text' name='user_name'><br><br>
        Password: <br>
        <input type='text' name='password'><br><br>
        <div name='alert'><br></div>
        <input type='submit' value='Submit'>
      </form>
    </td>
    <td>
      <form action='/SportsHouse/index.php/register/signup_check' method='post' onsubmit='return signup()'>
        User Name:<br>
        <input type='text' name='user_name'><br>
        Password: <br>
        <input type='text' name='password'><br>
        First Name:<br>
        <input type='text' name='first_name' maxlength='40'><br>
        Last Name:<br>
        <input type='text' name='last_name' maxlength='40'><br>
        Phone:<br>
        <input type='text' name='phone'><br>
        Email Address:<br>
        <input type='text' name='email' maxlength='255'><br><br>
        <div name='alert'><br></div>
        <input type='reset' value='Reset'>
        <input type='submit' value='Submit'>
      </form>
    </td>
  </tr>
</table>
