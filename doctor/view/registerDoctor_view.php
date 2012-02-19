<!DOCTYPE html>
<html>
    <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="Content-Script-Type" content="text/javascript" />
    <meta http-equiv="Content-Style-Type" content="text/css" />
    <title>Cuddles and Care - Administrator Dashboard</title>
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
                        required:space+"please enter Username"
                    },
                    email:{
                        required:space+"please enter email id",
                        email:space+"please enter valid email id"
                    },
                    password:{
                        required:space+"please enter password"
                    },
                    passconf:{
                        required:space+"please fill confirm password field",
                        equalTo:space+"password does not match"
                    },
                    altemail:{
                        email:space+"Please enter valid email address"
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
         <?php include_once('../config/admin-header.php') ?> 
<div id="divContent">
  <h1>Add a Doctor</h1>
        <!-- <a href="<?php //echo HTTP_HOST?>/doctor">Back</a>-->
        <form method="post" name="register" id="register" >

            <table>
                <tr>
                    <td>
                        <b>Username:</b>
                    </td>
                    <td>
                        <input type="text" name="username" id="username" /><span class="error">*</span>
                    </td>
                </tr>
                <tr>
                    <td>
                        <b>Date Of Birth:</b>
                    </td>
                    <td>
                        <input type="text" name="birthdate" id="birthdate" />
                    </td>
                </tr>
                <tr>
                    <td>
                        <b>Email Address:</b>
                    </td>
                    <td>
                        <input type="text" name="email" id="email"  /><span class="error">*</span>
                    </td>
                </tr>
                <tr><td><b>Alternate Email Address:</b>
                    </td>
                    <td>
                        <input type="text" name="altemail"  id="altemail" />
                    </td>
                </tr>
                <tr><td><b>Marital Status:</b>
                    </td>
                    <td>
                        <input type="radio" name="maritalstate" id="maritalstate" value="Unmarried" checked="checked"/><label>Unmarried</label>
                        <input type="radio" name="maritalstate" id="maritalstate" value="Married"/><label>Married</label>
                    </td>
                </tr>
                <tr><td><b>Gender:</b>
                    </td>
                    <td>
                        <input type="radio" name="gender" id="gender" value="Male" checked="checked"/><label>Male</label>
                        <input type="radio" name="gender" id="gender" value="Female"/><label>Female</label>
                    </td>
                </tr>
                <tr><td><b>Contact No:</b>
                    </td>
                    <td>
                        <input type="text" name="phone_no" id="phone_no" />
                    </td>
                </tr>
                <tr><td><b>Password:</b>
                    </td>
                    <td>
                        <input type="password" name="password" id="password" /><span class="error">*</span>
                    </td>
                </tr>
                <tr><td><b>Password Confirm:</b>
                    </td>
                    <td>
                        <input type="password" name="passconf" id="passconf"  /><span class="error">*</span>
                    </td>
                </tr>
                <tr>
                    <td colspan="2" >
                        <input type="submit" id="register" name="register" value="Register"/>
                    </td>
                </tr>
                </table>
        </form>

</div>
    </body>
</html>