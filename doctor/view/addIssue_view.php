<?php
$objdb = new mysqlDatabaseClass();
$objIll = new illnessClass();
?>
<!DOCTYPE html>
<html>
    <script type="text/javascript" src="<?php echo JS_DIR; ?>jquery-1.7.1.min.js"></script>
    <script type="text/javascript" src="<?php echo JS_DIR; ?>jquery.validate.min.js"></script>
    <link rel="stylesheet" href="<?php echo CSS_DIR; ?>jquery.dataTables.css" type="text/css" />
    <link rel="stylesheet" href="<?php echo CSS_DIR; ?>ui-lightness/jquery-ui-1.8.17.custom.css" type="text/css" />

    <script type="text/javascript" src="<?php echo JS_DIR; ?>jquery.dataTables.min.js"></script>

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
                    $("#formsData").html(msg);
                }
            });
        }

    </script>

    <body>
        <form method="post" name="addIssue" id="addIssue">
            <div>
                Name : <input type="text" name="illName" id="illName"/>
            </div>
            <input type="submit" name="illness" value="Add Illness"/>
        </form>
                <?php
        $detailillness = $objIll->getIllnessDetail($objdb);
        if (is_array($detailillness) && count($detailillness) > 0) {
        ?>
        <script type="text/javascript">
            $("#illData").dataTable();
        </script>
            <table border="1" id="illData">
                <thead>
                    <tr>
                        <th>
                            Sr No.
                        </th>
                        <th>
                            Illness
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
                foreach ($detailillness as $ill) {
                ?>
                    <tr>
                        <td>
                        <?php echo++$i; ?>
                    </td>
                    <td>
                        <?php echo $ill['illnessname']; ?>
                    </td>
                    <td>
                        <a href="javascript:void(0)" onclick="editIllness('<?php echo $ill['illid'] ?>','<?php echo $ill['illnessname']?>')">
                            Edit
                        </a>
                    </td>
                    <td>
                        <a href="javascript:void(0)" onclick="deleteIllness('<?php echo $ill['illid'] ?>')">
                            Delete
                        </a>
                    </td>

                </tr>
                <?php
                    }
                ?>
                </tbody>
            </table>
        <?php } ?>


    </body>
</html>