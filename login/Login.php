<?php include('server.php')?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>signin/signup page</title>
    <link rel="stylesheet" href="Loginstyle.css">
</head>
<body>
    
  <div class="login-wrap">
    <div class="login-html"> 
        <input id="tab-1" type="radio" name="tab" class="sign-in" checked><label for="tab-1" class="tab">Sign In</label>
        <input id="tab-2" type="radio" name="tab" class="sign-up"><label for="tab-2" class="tab">Sign Up</label>
        <div class="login-form">
        <form name="f1" action = "signinserv.php" onsubmit = "return validation()" method = "POST">  
          <div class="sign-in-htm">
          <div class="group">
				<label for="user" class="label">User type</label>
				<select name="usertype" class="usertype" id="usertype" >
					<option value="User-type">Select User-type</option>
					<option value="admin">Admin</option>
					<option value="user">User</option>
				</select>
			</div>
            <div class="group">
              <label for="user" class="label">Email</label>
              <input id="user" type="text" name="Email" class="input">
            </div>
            <div class="group">
              <label for="pass" class="label">Password</label>
              <input id="pass" type="password"  name="password" class="input" data-type="password">
            </div>
            <div class="group">
              <input id="check" type="checkbox" class="check" checked>
              <label for="check"><span class="icon"></span> Keep me Signed in</label>
            </div>
            <div class="group">
              <input type="submit" class="button" name="signin" value="Sign In">
            </div>
      </form>
        </div>
        <form name="f2" action = "signuperv.php" onsubmit = "return validation()" method = "POST"> 
          <div class="sign-up-htm">
			<div class="group">
				<label for="user" class="label">User type</label>
				<select name="usertype" class="usertype" id="usertype" >
					<option value="User-type"><b>Select User-type</b></option>
					<option value="admin">Admin</option>
					<option value="user">User</option>
				</select>
			</div>
            <div class="group">
              <label for="user" class="label">Email</label>
              <input id="user" type="text" name="Email" class="input">
            </div>
            
            <div class="group">
              <label for="pass" class="label">Password</label>
              <input id="pass" type="password" class="input" name="password" data-type="password">
            </div>
            <div class="group">
              <label for="pass" class="label">Confirm-Password</label>
              <input id="cpass" type="password" class="input" name="confirmpassword"  placeholder="Confirm Password" data-type="password">
            </div>
            <div class="group">
              <input type="submit" class="button" name="signup" value="Sign Up">
            </div>
            <div class="hr"></div>
            <div class="foot-lnk">
              <label for="tab-1">Already Member?</a>
            </div>
          </div>
        </div>
      </form>
    </div>
  </div>
  <script type="textbar.js" src="login.js" ></script>
</body>
</html>