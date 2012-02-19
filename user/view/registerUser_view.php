<!DOCTYPE html>
<html>
    <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="Content-Script-Type" content="text/javascript" />
    <meta http-equiv="Content-Style-Type" content="text/css" />
    <title>Cuddles and Care - User Registeration</title>
    <!-- INCLUDES -->

    <?php include_once('../config/includes.php') ?>
    
    <script type="text/javascript">
        $(document).ready(function(){
            var space = "&nbsp;&nbsp;"
            $('#register').validate({
                rules:{
                    username:"required",
                    email:{
                        required:true,
                        email:true
                    },
                    password:{
                        required:true

                    },
                    passconf:{
                        required:true,
                        equalTo:"#password"
                    },
                    altemail:{
                        email:true
                    }


                },
                messages:{
                    username:{
                        required:space+"Please enter USERNAME."
                    },
                    email:{
                        required:space+"Please enter EMAIL ADDRESS",
                        email:space+"Please enter valid EMAIL ADDRESS"
                    },
                    password:{
                        required:space+"Please enter PASSWORD"
                    },
                    passconf:{
                        required:space+"Please fill confirm PASSWORD",
                        equalTo:space+"PASSWORD does not match"
                    },
                    altemail:{
                        email:space+"Please enter valid EMAIL ADDRESS"
                    }
                }
            });
            $('#birthdate').datepicker({
                yearRange: '1936:2012',
                dateFormat: 'mm/dd/yy',
                changeMonth:true,
                changeYear:true
            });
        });

    </script>
    </head>
    <body>
    
   <?php include_once('../config/header.php') ?> 

<div id="divContent">
  <h1>User Registration</h1>
    
    <div id="divRegFormOuter">
	<div><?php echo $message?$message:'';?></div>
  <!--<div id="ribbon2"><img src="../images/reg_ribbon-psd-template.png"></div>-->
  <!--<a href="/" style="display:block; text-align:center"><img src="../../images/logo.png"></a> -->

<form method="post" name="register" id="register" >
      <table>
      <tr>
    <td><b>Username:</b></td>
    <td><input type="text" name="username" id="username" />
          <span class="error">*</span></td>
  </tr>
      <tr>
    <td><b>Date Of Birth:</b></td>
    <td><input type="text" name="birthdate" id="birthdate" /></td>
  </tr>
      <tr>
    <td><b>Email Address:</b></td>
    <td><input type="text" name="email" id="email"  />
          <span class="error">*</span></td>
  </tr>
      <tr>
    <td><b>Alternate Email Address:</b></td>
    <td><input type="text" name="altemail"  id="altemail" /></td>
  </tr>
      <tr>
    <td><b>Marital Status:</b></td>
    <td><input type="radio" name="maritalstate" id="maritalstate" value="Unmarried" checked="checked"/>
          <label>Unmarried</label>
          <input type="radio" name="maritalstate" id="maritalstate" value="Married"/>
          <label>Married</label> </td>
  </tr>
      <tr>
    <td><b>Gender:</b></td>
    <td><input type="radio" name="gender" id="gender" value="Male" checked="checked"/>
          <label>Male</label>
          <input type="radio" name="gender" id="gender" value="Female"/>
          <label>Female</label> </td>
  </tr>
      <tr>
    <td><b>Contact No:</b></td>
    <td><input type="text" name="phone_no" id="phone_no" /></td>
  </tr>
      <tr>
    <td><b>Password:</b></td>
    <td><input type="password" name="password" id="password" />
          <span class="error">*</span></td>
  </tr>
      <tr>
    <td><b>Password Confirm:</b></td>
    <td><input type="password" name="passconf" id="passconf"  />
          <span class="error">*</span></td>
  </tr>
     
      <tr>
    <td colspan="2" ><input type="submit" id="register" name="register" value="Register"/></td>
    
  </tr>
  <div class="divClr"></div>
  </table>
    </form>
    <div class="divClr"></div>
    </div><!-- divRegFormOuter END -->
    <div class="divClr"></div>
    </div><!-- divContent END -->
    <div class="divClr"></div>
    <?php include_once('../config/footer.php') ?>
</body>
</html>