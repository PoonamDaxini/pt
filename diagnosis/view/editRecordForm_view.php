<?php
$objDatabase = new mysqlDatabaseClass();
$objPatientHistory = new patientHistoryClass();
$historyPatient = $objPatientHistory->getPatientHistory($objDatabase, $_REQUEST['history']);
?>
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
            var space = "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"
            $('#register').validate({
                rules:{
                    symtoms:"required",
                    recommendation:"required"

                },
                messages:{
                    symtoms:{
                        required:space+"please enter Symtoms"
                    },
                    recommendation:{
                        required:space+"please enter recommendation"
                    }
                }
            });
            $('#birthdate').datepicker({
                yearRange: '1936:2012',
                dateFormat: 'yy/mm/dd',
                changeMonth:true,
                changeYear:true
            });
            $('#mydate').datepicker({
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
        <form method="post" name="register" id="register" >
            <input type="hidden" name="phid" value="<?php echo $historyPatient[0]['phid'];?>"/>
            <table>
                <tr>
                    <td>
                        <b>Date:</b>
                    </td>
                    <td>
                        <input type="text" name="date" id="mydate" value="<?php echo $historyPatient[0]['date']; ?>"/>
                    </td>
                </tr>
                <tr>
                    <td>
                        <b>Symptoms:</b>
                    </td>
                    <td>
                        <textarea name="symtoms" id="symtoms" >
                            <?php echo $historyPatient[0]['symptoms']; ?>
                        </textarea>
                    </td>
                </tr>
                <tr>
                    <td>
                        <b>Details:</b>
                    </td>
                    <td>
                        <textarea name="details" id="details" >
                            <?php echo $historyPatient[0]['details']; ?>
                        </textarea>
                        </textarea>
                    </td>
                </tr>
                <tr><td><b>Recommendation:</b>
                    </td>
                    <td>
                        <textarea name="recommendation"  id="recommendation" >
                            <?php echo $historyPatient[0]['recommendation']; ?>
                        </textarea>
                    </td>
                </tr>
                <tr><td><b>Follow Up Date:</b>
                    </td>
                    <td>
                        <input type="text" name="followup"  id="birthdate" value="<?php echo $historyPatient[0]['followup']; ?>"/>
                    </td>
                </tr>
               
                <tr>
                    <td colspan="2" >
                        <input type="submit" id="register" name="update" value="Update"/>
                    </td>
                </tr>
        </form>


    </body>
</html>