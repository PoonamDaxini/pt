<!DOCTYPE html>
<html>
    <script type="text/javascript" src="<?php echo JS_DIR; ?>jquery-1.7.1.min.js"></script>
    <script type="text/javascript" src="<?php echo JS_DIR; ?>jquery.validate.min.js"></script>

    <script type="text/javascript">
        $(document).ready(function(){
            var space = "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"
            $('#addIssue').validate({
                rules:{
                    illName:"required"
                },
                messages:{
                    illName:{
                        required:space+"please enter illness name"
                    }
                }
            });
        });
    </script>
    <body>
        <form method="post" id="addIssue">
            <div>
                <input type="hidden" value="<?php echo $_REQUEST['illid']?>" name="illid"/>
                <input type="text" value="<?Php echo $_REQUEST['illname']?>"/>
                New Name : <input type="text" name="illName" id="illName"/>
            </div>
            <input type="submit" name="updateill" value="Update Illness"/>
        </form>
    </body>