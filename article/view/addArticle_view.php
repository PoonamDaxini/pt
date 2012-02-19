<?php
require_once dirname(__FILE__) . '/../../ckeditor/ckeditor.php';
$objdb = new mysqlDatabaseClass();
$objIll = new illnessClass();
$objarticle = new articleClass();
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
            <div>
                Title : <input type="text" name="title" id="title"/>
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
                    ?>
                        <option value="<?php echo $illname['illid']; ?>"><?php echo $illname['illnessname'] ?>
                        </option>
                    <?php
                    }
                    ?>
                </select>
                <?php
                } else {
                    echo "Please add Illness category";
                }
                ?>
            </div>
            <textarea name="post" id="post"></textarea>
            <div>
                <?php
                $CKEditor = new CKEditor();
                $CKEditor->basePath = HTTP_HOST . "/ckeditor/";
                // Replace a textarea element with an id (or name) of "editor1".
                $CKEditor->replace("post");
                ?>
            </div>
            <input type="hidden" name="savedArticle" value="1"/>
            <input type="checkbox" name="publish" value="Publish"/> Is Publish?
            <input type="submit" name="addArticle" value="Add Article"/>
        </form>
        
    </body>
</html>