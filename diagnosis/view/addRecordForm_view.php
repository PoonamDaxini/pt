<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="Content-Script-Type" content="text/javascript" />
    <meta http-equiv="Content-Style-Type" content="text/css" />
    <title>Cuddles and Care - Articles</title>
    <!-- INCLUDES -->
    <?php include_once('../config/includes.php') ?>
        <script type="text/javascript">
        $(document).ready(function(){
            var myDate = new Date();
            var prettyDate = myDate.getFullYear()+ '/' +(myDate.getMonth()+1) + '/' + myDate.getDate();
            $("#mydate").val(prettyDate);

            var space = ""
            $('#register').validate({
                rules:{
                    symtoms:"required",
                    recommendation:"required"
                    
                },
                messages:{
                    symtoms:{
                        required:space+"Please enter Symtoms"
                    },
                    recommendation:{
                        required:space+"Please enter recommendation"
                    }
                }
            });
            $('#birthdate').datepicker({
                yearRange: '1936:2012',
                dateFormat: 'yy/mm/dd',
                changeMonth:true,
                changeYear:true
            });
        });

    </script>
</head>
    <body>
    <br/><br/>
    <div><?php echo $message?$message:'';?></div>
        <form method="post" name="register" id="register" >
<h3 class="subheading">Add new details</h3>
            <table>
                <tr>
                    <td>
                        <b>Date:</b>
                    </td>
                    <td>
                        <input type="text" name="date" id="mydate" readonly="readonly"/>
                    </td>
                </tr>
                <tr>
                    <td>
                        <b>Symtoms:</b>
                    </td>
                    <td>
                        <textarea name="symtoms" id="symtoms" ></textarea>
                    </td>
                </tr>
                <tr>
                    <td>
                        <b>Details:</b>
                    </td>
                    <td>
                        <textarea name="details" id="details" ></textarea>
                    </td>
                </tr>
                <tr><td><b>Recommendation:</b>
                    </td>
                    <td>
                        <textarea name="recommendation"  id="recommendation" ></textarea>
                    </td>
                </tr>
                <tr><td><b>Follow Up Date:</b>
                    </td>
                    <td>
                        <input type="text" name="followup"  id="birthdate" />
                    </td>
                </tr>
                
                <tr>
                    <td colspan="2" >
                        <input type="submit" id="register" name="record" value="Add Record"/>
                    </td>
                </tr>
                </table>
        </form>


    </body>
</html>