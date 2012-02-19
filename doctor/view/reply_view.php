<?php
$objdb = new mysqlDatabaseClass();
$objdoctor = new doctorClass();
$query = $objdoctor->getParticularQuery($objdb, $_REQUEST['qid']);
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
        $("#donereply").live("click",function(){
            qryid = $("#qid").val();
            replytext = $("#replyToQuery").val();

            $.ajax({
                type: "post",
                url : "<?php echo HTTP_HOST?>/doctor/",
                data:"action=particularReply&qid="+qryid+"&reply="+replytext,
                success: function(msg){
//                    $("#queryForm").after(msg);
//                    $("#replydiv").remove();
                    window.location = "<?php echo HTTP_HOST ;?>/doctor/?action=replyQuery";
                }
            });
        });
    </script>
    <body>
        <?php include_once('../config/admin-header.php') ?> 
        <div id="queryForm">
        </div>
        <div id="replydiv">
             <form method="post">
             <h3 class="subheading">Reply to queries from patient</h3>
             <label><strong>Query :</strong></label>
            <label>
                <?php echo $query[0]['query']; ?>
            </label>
            <div class="divClr"></div>
                <input type="hidden" id="qid" name="qid" value="<?php echo $_REQUEST['qid']; ?>"/>
                <label><strong>Reply :</strong></label>
                <textarea name="replyToQuery" id="replyToQuery">

                </textarea>
                <input type="button" name="donereply" id="donereply" value="Reply"/>
                <div class="divClr"></div>
            </form>
        </div>
    </body>
</html>