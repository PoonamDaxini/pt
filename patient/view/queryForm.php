<!DOCTYPE html>
<html>
    <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="Content-Script-Type" content="text/javascript" />
    <meta http-equiv="Content-Style-Type" content="text/css" />
    <title>Cuddles and Care - Queries sent to Doctor</title>
    <!-- INCLUDES -->
    <?php include_once('../config/includes.php') ?>
    <script type="text/javascript">
        $(document).ready(function(){
            var space = "&nbsp;&nbsp;"
            $('#patientquery').validate({
                rules:{
                    query:"required",
                },
                messages:{
                    query:{
                        required:space+"Please enter Query"
                    }
                }
            });
        });
    </script>
    </head>
    <body>
    <div class="divClr"></div>
    <div><?php echo $message?$message:'';?></div>
        <form method="post" id="patientquery">
        <h3 class="subheading">Post your query to Doctor</h3>
            <label><strong>Select Doctor :</strong></label>
            <?php 
                $objUser     = new userClass();
                $objDatabase = new mysqlDatabaseClass();
                $doctorList = $objUser->getDoctorsList($objDatabase);
            ?>
            <select name="doctor">
                <option>Select Doctor</option>
                <?php
                foreach($doctorList as $doctor){
                    echo '<option value='.$doctor['id'].'>'.ucfirst($doctor['username']).'</option>';
                }
                ?>
            </select>
            <div class="divClr">&nbsp;</div>
            <label><strong>Query :</strong></label>
            <textarea name="query" id="query"></textarea>
            <div class="divClr"></div>
            <input type="button" id="querySubmit" value="Submit"/>
            <div class="divClr"></div>
        </form>
    </body>
</html>