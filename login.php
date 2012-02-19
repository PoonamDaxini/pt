<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="Content-Script-Type" content="text/javascript" />
<meta http-equiv="Content-Style-Type" content="text/css" />
<title>Cuddles and Care - Login</title>
<!-- CSS -->
<link href="css/login-registration.css" rel="stylesheet" type="text/css" />   
<!-- JS -->
<script type="text/javascript" src="JS/jquery-1.7.1.min.js"></script>
<script type="text/javascript" src="JS/jquery.validate.min.js"></script>
<script type="text/javascript">
        $(document).ready(function() {
            var space = "&nbsp;&nbsp;"
            $("#loginform").validate({
                rules: {
                    username: {// compound rule
                        required: true,
                        email: true
                    },
                    password:{
                        required:true
                    }
                },
                messages:{
                    username:{
                        required:space+"Please enter email id",
                        username:space+"Please enter valid email id"
                    },
                    password:{
                        required:space+"Please enter password"
                    }
                }

            });
        });
    </script>
    
   
</head>
<body>
<?php if(isset ($_REQUEST['er'])){
                echo $_REQUEST['er'];
                }?>
<!--<a href="user/registerUser.php">Sign up</a>-->
<div id="divFormOuter">
  <div id="ribbon"><img src="images/red-decorative-ribbon-psd-template.png"></div>
  <a href="/" style="display:block;"><img src="images/logo.jpg"></a> 

<form method="post" id="loginform">
    <div id="divForm">
      <label>Email Address :</label>
      <input type="text" id="username" name="username" class="UserName" value="<?php echo $_COOKIE['usr']?$_COOKIE['usr']:''?>"/>
      <label>Password :</label>
      <input type="password" id="password" name="password" class="Pass" value="<?php echo $_COOKIE['hash']?base64_decode($_COOKIE['hash']):''?>"/>
    </div>
    <input type="checkbox" name="autologin" value="1">
    Remember Me
    <input type="submit" name="login" value=""/>
  </form>
  <div class="NewUser">Dont have an account?<br>
    <a href="user/registerUser.php">New User</a> | <a href="#">Forgot Password!</a> </div>
    
    
</div>
</body>
</html>