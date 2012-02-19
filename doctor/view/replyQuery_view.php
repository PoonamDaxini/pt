<?php
$objdb = new mysqlDatabaseClass();
$objdoctor = new doctorClass();
$objpt = new userClass();
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
                $('#patientQueryData').dataTable();

            });
            function replyQuery(queryid){
                $("#formsData").html('');
                $.ajax({
                    type: "GET",
                    data:"action=reply&qid="+queryid,
                    success: function(msg){
                        $("#formsData").html(msg);
                        $("#patientQueryData").remove();
                    }
                });
            }
        </script>
    <body>
        <?php include_once('../config/admin-header.php') ?> 
        <?php
        $historyquery = $objdoctor->getPatientQuestions($objdb, $_SESSION['uid']);
        if (is_array($historyquery) && count($historyquery) > 0) {
        ?>
            <table border="0" id="patientQueryData"  width="100%" cellpadding="0" cellspacing="0">
                <thead>
                    <tr>
                        <th>
                            Sr No.
                        </th>
                        <th>
                            Query
                        </th>
                        <th>
                            Patient Name:
                        </th>
                        <th>
                            Patient Email:
                        </th>
                        <th>
                            Reply
                        </th>
                    </tr>
                </thead>
                <tbody>
                <?php
                $i = 0;
                foreach ($historyquery as $patientquery) {
                    $patientResult = $objpt->getUserBasedOnId($objdb, $patientquery['pid']);
                ?>
                    <tr>
                        <td>
                        <?php echo++$i; ?>
                    </td>
                    <td>
                        <?php echo $patientquery['query']; ?>
                    </td>
                    <td>
                        <?php echo $patientResult[0]['username']; ?>
                    </td>
                    <td>
                        <?php echo $patientResult[0]['email']; ?>
                    </td>
                    <td>
<!--                        <a href="javascript:void(0)" onclick="replyQuery(<?php echo $patientquery['qid'] ?>)">-->
                        <a href="<?php echo HTTP_HOST ?>/doctor/?action=reply&qid=<?php echo $patientquery['qid'] ?>">
                            Reply
                        </a>
                    </td>

                </tr>
                <?php
                    }
                ?>
                </tbody>
            </table>
        <?php } else {
        ?>
                    No question pending.. :)
        <?php } ?>

    </body>
</html>