<?php
$objdb = new mysqlDatabaseClass();
$objIll = new illnessClass();
$objarticle = new articleClass();
$detailArticle = $objarticle->getArticleBasedOnIllness($objdb, $_REQUEST['illid']);
if (is_array($detailArticle) && count($detailArticle) > 0) {
?>
<br/><br/>
<table border="0" id="articleData" width="100%" cellpadding="0" cellspacing="0">
  <thead>
    <tr>
      <th> Sr No. </th>
      <th> Title </th>
    </tr>
  </thead>
  <tbody>
    <?php
        $i = 0;
        foreach ($detailArticle as $article) {
        ?>
    <tr>
      <td><?php echo++$i; ?></td>
      <td><a href="<?php echo HTTP_HOST ?>/article/viewArticle.php?articleId=<?php echo $article['articleId'] ?>"> <?php echo $article['Title']; ?> </a></td>
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
