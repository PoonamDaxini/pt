<?php
$objdb = new mysqlDatabaseClass();
$objIll = new illnessClass();
$objarticle = new articleClass();
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
            $("select").change(function () {
                illid = $("select option:selected").val();
                $.ajax({
                type: "GET",
                data:"action=getArticle&illid="+illid,
                success: function(msg){
                    $("#article").html(msg);
                }
            });
            });
        });
    </script>
    <body>
    <?php include_once('../config/header.php') ?>
    <div id="divContent">
    <h1>Articles</h1>
      <?php
        $illdetails = $objIll->getIllnessDetail($objdb);
        if (is_array($illdetails) && count($illdetails) > 0) {
        ?>
      <form><label><strong>Select Illness category :</strong></label>
      <select name="illid" id="illid">
        <option value="0">Select Illness</option>
        <?php
            foreach ($illdetails as $illname) {
            ?>
        <option value="<?php echo $illname['illid']; ?>"><?php echo $illname['illnessname'] ?> </option>
        <?php
            }
            ?>
      </select>
      <div class="divClr"></div>
      </form>
      <?php
        } else {
            echo "No articles available";
        }
        ?>
      <div id="article"> </div>
      <div class="divClr">&nbsp;</div>
    </div>
    <!-- divContent END -->
    <div class="divClr"></div>
</body>
</html>
