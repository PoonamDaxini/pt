<?php
$objdb = new mysqlDatabaseClass();
$objIll = new illnessClass();
$detailillness = $objIll->getIllnessDetail($objdb);
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
            var space = ""
            $('#addIssue').validate({
                rules:{
                    illName:"required"
                },
                messages:{
                    illName:{
                        required:space+"Please enter illness name"
                    }
                }
            });
        });

        function editIllness(illid,illname)
        {
            $("#formsData").html('');
            $.ajax({
                type: "GET",
                data:"action=editill&illid="+illid+"&illname="+illname,
                success: function(msg){
                    $("#formsData").html(msg);
                }
            });
        }

        function deleteIllness(illid)
        {
            $("#formsData").html('');
            $.ajax({
                type: "GET",
                data:"action=deleteill&illid="+illid,
                success: function(msg){
                     location.reload();
                    $("#formsData").html(msg);
                }
            });

        }

    </script>
    </head>
    <body>
    <?php include_once('../config/admin-header.php') ?>
    <div id="divContent">
      <h1>Illness</h1>
      <!--<a href="<?php //echo HTTP_HOST?>/doctor">Back</a>-->
      <div><?php echo $message?$message:'';?></div>
      <div id="formsData"></div>
      <form method="post" name="addIssue" id="addIssue">
        <div> 
        <label>Name :</label>
          <input type="text" name="illName" id="illName"/>
        </div>
        <input type="submit" name="illness" value="Add Illness"/>
        <div class="divClr"></div>
      </form>
      <div class="divClr"></div>
      <?php
        
        if (is_array($detailillness) && count($detailillness) > 0) {
        ?>
     
      <table border="0" id="illData" width="100%" cellpadding="0" cellspacing="0">
        <thead>
          <tr>
            <th> Sr No. </th>
            <th> Illness </th>
            <th> Edit </th>
            <th> Delete </th>
          </tr>
        </thead>
        <tbody>
          <?php
                $i = 0;
                foreach ($detailillness as $ill) {
                ?>
          <tr>
            <td><?php echo++$i; ?></td>
            <td><?php echo $ill['illnessname']; ?></td>
            <td align="center"><a href="javascript:void(0)" onclick="editIllness('<?php echo $ill['illid'] ?>','<?php echo $ill['illnessname']?>')"> <img src="../images/edit.png" /> </a></td>
            <td align="center"><a href="javascript:void(0)" onclick="deleteIllness('<?php echo $ill['illid'] ?>')"> <img src="../images/delete.png" /> </a></td>
          </tr>
          <?php
                    }
					
                ?>
        </tbody>
      </table>
       <script type="text/javascript">
            $("#illData").dataTable();
        </script>
      <?php } ?>
    </div>
    <!-- # divContent END -->
</body>
</html>