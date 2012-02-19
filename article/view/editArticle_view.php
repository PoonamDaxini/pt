<?php
require_once dirname(__FILE__) . '/../../ckeditor/ckeditor.php';
$objdb = new mysqlDatabaseClass();
$objIll = new illnessClass();
$objarticle = new articleClass();
$arrDetails = $objarticle->getArticle($objdb, $_REQUEST['articleid']);
?>
<!DOCTYPE html>
<html>
    <script type="text/javascript" src="<?php echo JS_DIR; ?>jquery-1.7.1.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function(){

            $('#article').validate({
                rules:{
                    title:"required",
                    post : "required"
                },
                messages:{
                    title:{
                        required:space+"please enter title"
                    },
                    post:{
                        required:space + "Please enter some content"
                    }
                }
            });

        });
    </script>
    <body>
        <form method="post" name="addArticle" id="article">
            <input type="hidden" name="articleId" value="<?php echo $arrDetails[0]['articleId'];?>"/>
            <div>
                Title : <input type="text" name="title" id="title" value="<?php echo $arrDetails[0]['Title'] ?>"/>
            </div>
            <div>
                <?php
                $illdetails = $objIll->getIllnessDetail($objdb);
                if (is_array($illdetails) && count($illdetails) > 0) {
                ?>
                    Select Illness category :
                    <select name="illid">
                    <?php
                    foreach ($illdetails as $illname) {
                        if ($illname['illid'] == $arrDetails[0]['illnessId']) {
 ?>
                        <option selected="selected" value="<?php echo $illname['illid']; ?>"><?php echo $illname['illnessname'] ?>
                            </option>        
                    <?php
                        } else {
                    ?>
                            <option value="<?php echo $illname['illid']; ?>"><?php echo $illname['illnessname'] ?>
                            </option>
                    <?php
                        }
                    }
                    ?>
                </select>
                <?php
                } else {
                    echo "Please add Illness category";
                }
                ?>
            </div>
            <textarea name="post" id="post"><?php echo $arrDetails[0]['article']?></textarea>
            <div>
                <?php
                $CKEditor = new CKEditor();
                $CKEditor->basePath = HTTP_HOST . "/ckeditor/";
                // Replace a textarea element with an id (or name) of "editor1".
                $CKEditor->replace("post");
                ?>
            </div>
            <input type="hidden" name="saveEdit" value="1"/>
            <input type="checkbox" name="publish" value="Publish"/> Is Publish?
            <input type="submit" name="updateArticle" value="Update Article"/>
        </form>

    </body>
</html>