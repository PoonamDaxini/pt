<?php
session_start();
if($_SESSION['logged_in']){

require_once '../config/config.php';
require_once CLASS_DIR . 'mysqlDatabaseClass.php';
require_once CLASS_DIR . 'articleClass.php';

$objdb = new mysqlDatabaseClass();
$objarticle = new articleClass();
$arrDetails = $objarticle->getArticle($objdb, $_REQUEST['articleId']);
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
    </head>
    <body>
        <?php include_once('../config/admin-header.php') ?> 
    <!--div id="divHeader">
  <p><img src="../images/logo.png" class="imgLogo" /></p>
  <p class="pWelcome">
  <?php echo "Welcome  " . $_SESSION['user']; ?> 
  </p>
  <div class="divClr"></div>
</div--><!-- divHeader END -->

<div id="divContent">
<!--        <a href="<?php echo HTTP_HOST?>/article"><img src="../images/back.png" title="Go back to the previous page"></a>-->
        <h2><?php echo $arrDetails[0]['Title'] ?></h2>
        <br/>
        <div>
            <?php echo $arrDetails[0]['article']?>
        </div>
        </div><!-- divContent END -->
    </body>
</html>
<?php }?>