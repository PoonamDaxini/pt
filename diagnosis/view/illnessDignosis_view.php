<?php
$objDatabase = new mysqlDatabaseClass();
$objUser = new userClass();
$objPatientHistory = new patientHistoryClass();

$patientDetails = $objUser->getUserBasedOnId($objDatabase, $_REQUEST['uid']);
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
             $('#patientdetail').dataTable();
            $('#birthdate').datepicker({
                yearRange: '1936:2012',
                dateFormat: 'mm/dd/yy',
                changeMonth:true,
                changeYear:true
            });
        });
        function addRecord(){
            $("#addRecord").html('');
            $.ajax({
                type: "GET",
                data:"action=addRecord",
                success: function(msg){
                   // location.reload();
                    $("#addRecord").html(msg);
                }
            });
        }
        function editRecord(historyid){
            $("#addRecord").html('');
            $.ajax({
                type: "GET",
                data:"action=editRecord&history="+historyid,
                success: function(msg){
                    $("#addRecord").html(msg);
                }
            });
        }
    </script>
    </head>
    <body>
    <?php include_once('../config/admin-header.php') ?>
    <div id="divContent">
      <h1 style="float:left;">Medical Details of a Patient</h1>
      
      <div class="divUserTopLinks"><a href="javascript:void(0)" onclick="addRecord()"><img src="../images/add-big.png" title="Add New Record"></a></div>
        <!-- divUserTopLinks END -->
        
      
<!--        <a href="<?php //echo HTTP_HOST ?>/diagnosis">Back</a>-->
<div class="divClr"></div>
        
        <?php if (count($patientDetails) > 0) {
        ?>
            <table border="0" id="patientdetail" width="100%" cellpadding="0" cellspacing="0">
                <thead>
                    <tr>
                        <th>
                            Patient Name
                        </th>
                        <th>
                            Email
                        </th>
                        <th>
                            Birth Date
                        </th>
                        <th>
                            Alternate Email
                        </th>
                        <th>
                            Marital Status
                        </th>
                        <th>
                            Gender
                        </th>
                        <th>
                            Phone no
                        </th>

                    </tr>
                </thead>
                <tbody>
                <?php
                foreach ($patientDetails as $patient) {
                ?>
                    <tr>
                        <td>&nbsp;
                        <?php echo $patient['username'] ?>
                    </td>
                    <td>&nbsp;
                        <?php echo $patient['email'] ?>
                    </td>
                    <td>&nbsp;
                        <?php echo $patient['birth_date'] ?>
                    </td>
                    <td>&nbsp;
                        <?php echo $patient['alt_email'] ?>
                    </td>
                    <td>&nbsp;
                        <?php echo $patient['marital_status'] ?>
                    </td>
                    <td>&nbsp;
                        <?php echo $patient['gender'] ?>
                    </td>
                    <td>&nbsp;
                        <?php echo $patient['phone_no'] ?>
                    </td>
                </tr>
                <?php } ?>
                </tbody>
            </table>
        <?php } ?>
                <div id="addRecord"></div>


        <?php
                $patientMedicalDetails = $objPatientHistory->getHistory($objDatabase, $_REQUEST['uid']);
                if (count($patientMedicalDetails) > 0) {
        ?>
                <script type="text/javascript">
                $(document).ready(function(){
                    $('#patientQueryData').dataTable();

                });
            </script>
            <br/><br/>
                    <h3 class="subheading">Medical Records</h3>
                    <table border="0" id="patientQueryData" width="100%" cellpadding="0" cellspacing="0">
                        <thead>
                            <tr>
                                <th>
                                    Date
                                </th>
                                <th>
                                    Symptom
                                </th>
                                <th>
                                    Details
                                </th>
                                <th>
                                    Recommendation
                                </th>
                                <th>
                                    Follow Up Date
                                </th>
                                <th>
                                    Doctor
                                </th>
                                <th>
                                    Action
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                <?php
                    foreach ($patientMedicalDetails as $patient) {
                ?>
                        <tr>
                            <td>&nbsp;
                        <?php echo $patient['date'] ?>
                    </td>
                    <td>&nbsp;
                        <?php echo $patient['symptoms'] ?>
                    </td>
                    <td>&nbsp;
                        <?php echo $patient['details'] ?>
                    </td>
                    <td>&nbsp;
                        <?php echo $patient['recommendation'] ?>
                    </td>
                    <td>&nbsp;
                        <?php echo $patient['followUp'] ?>
                    </td>
                    <td>
                        DR.
                        <?php
                        $doctor = $objUser->getUserBasedOnId($objDatabase, $patient['did']);
                        echo ucfirst($doctor[0]['username']); ?>
                    </td>
                    <td align="center">
                        <a href="javascript:void(0)" onclick="editRecord('<?php echo $patient['phid'] ?>')"><img src="../images/edit.png" title="Edit Medical Record" /></a>
                    </td>
                </tr>
                <?php } ?>
                </tbody>
            </table>
        <?php } ?>
</div><!-- #divContent END -->
    </body>
</html>