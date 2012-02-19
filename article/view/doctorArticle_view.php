<?php
require_once dirname(__FILE__) . '/../../ckeditor/ckeditor.php';
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
        function addArticle(){
            $("#formsData").html('');
            $.ajax({
                type: "GET",
                data:"action=add",
                success: function(msg){
                    $("#formsData").html(msg);
                }
            });
        }
        function editarticle(articleid){
            $("#formsData").html('');
            $.ajax({
                type: "GET",
                data:"action=edit&articleid="+articleid,
                success: function(msg){
                    $("#formsData").html(msg);
                }
            });
        }
    </script>
    </head>
    <body>
    <?php include_once('../config/admin-header.php') ?> 
    <div id="divContent">
  <h1 style="float:left;">Articles</h1>
<div><?php echo $message?$message:'';?></div>
        <div id="formsData"></div>
        <div class="divUserTopLinks"><a href="javascript:void(0)" onclick="addArticle()" class="aAdd"><img src="../images/add-big.png" title="Add New Article"></a></div>
        <!-- divUserTopLinks END -->
        <?php
        $detailArticle = $objarticle->getArticleDetail($objdb);
        if (is_array($detailArticle) && count($detailArticle) > 0) {
        ?>

            <table border="0" id="articleData" width="100%" cellpadding="0" cellspacing="0">
                <thead>
                    <tr>
                        <th>
                            Sr No.
                        </th>
                        <th>
                            Title
                        </th>
                        <th>
                            Illness Name:
                        </th>
                        <th>
                            Edit
                        </th>
                        <th>
                            Delete
                        </th>
                    </tr>
                </thead>
                <tbody>
                <?php
                $i = 0;                
                foreach ($detailArticle as $article) {
                $illnessResult = $objIll->getIllnessBasedOnId($objdb,$article['illnessId']);
                ?>
                    <tr>
                        <td>
                        <?php echo++$i; ?>
                    </td>
                    <td>
                        <a href="<?php echo HTTP_HOST ?>/article/viewArticle.php?articleId=<?php echo $article['articleId'] ?>">
                            <?php echo $article['Title']; ?>
                        </a>
                    </td>
                    <td>
                        <?php echo $illnessResult?$illnessResult[0]['illnessname']:''?>
                    </td>
                    <td align="center">
                        <a href="javascript:void(0)" onclick="editarticle('<?php echo $article['articleId'] ?>')">
                            <img src="../images/edit.png" />
                        </a>
                    </td>
                    <td align="center">
                        <a href="<?php echo HTTP_HOST ?>/article?delete&articleId=<?php echo $article['articleId'] ?>">
                            <img src="../images/delete.png" />
                        </a>
                    </td>

                </tr>
                <?php
                        }
                ?>
                    </tbody>
                </table>
                <script type="text/javascript">
                    $(document).ready(function(){
                        $("#articleData").dataTable();
                    });
                </script>
        <?php } ?>

</div><!-- divContent END -->
    </body>
</html>