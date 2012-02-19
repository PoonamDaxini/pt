<?php
$objdb = new mysqlDatabaseClass();
$objpt = new patientClass();

?>
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
            $("#querySubmit").live("click",function(){
                qry = $("#query").val();
                doctor = $("#patientquery select").val();
                $.ajax({
                    type: "GET",
                    data:"action=fireQuery&doctor="+doctor+"&query="+qry,
                    success: function(msg){
                        location.reload();
                        $("#queryForm").after(msg);
                        $("#patientquery").remove();
                        
                    }
                });
            });
            $('#patientQueryData').dataTable();
           
        });
        function patientQueryForm(){
            $.ajax({
                type: "GET",
                data:"action=addForm",
                success: function(msg){
                    $("#queryForm").after(msg);
                }
            });
        }
    </script>
    </head>
<body>
    <?php include_once('../config/header.php') ?> 
<div id="divContent">
<div class="divUserTopLinks"><a href="javascript:void(0);" onclick="patientQueryForm();"><img src="../images/add-big.png" title="Post New Query"></a></div>
        <!-- divUserTopLinks END -->
<div><?php echo $message?$message:'';?></div>
<div id="queryForm"> </div>
<?php
        $historyquery = $objpt->getPatientQuery($objdb, $_SESSION['uid']);
        if (isset($historyquery) && count($historyquery) > 0) {
        ?>
<table border="0" id="patientQueryData" width="100%" cellpadding="0" cellspacing="0">
  <thead>
    <tr>
      <th> Sr No. </th>
      <th> Query </th>
      <th> Reply </th>
    </tr>
  </thead>
  <tbody>
    <?php
                $i = 0;
                foreach ($historyquery as $patientquery) {
                ?>
    <tr>
      <td><?php echo++$i; ?></td>
      <td><?php echo $patientquery['query']; ?></td>
      <td><?php echo $patientquery['reply'] ? $patientquery['reply'] : "Doctor's reply pending"; ?></td>
    </tr>
    <?php
                    }
                ?>
  </tbody>
</table>
<?php } ?>
<div id="pager"></div>
<div class="divClr"></div>
</div><!-- divContent END -->
</body>
</html>