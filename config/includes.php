<?php include_once('config.php') ?>

<!-- JS -->
<script type="text/javascript" src="<?php echo JS_DIR; ?>jquery-1.7.1.min.js"></script>
<script type="text/javascript" src="<?php echo JS_DIR; ?>jquery.dataTables.min.js"></script>
<script type="text/javascript" src="<?php echo JS_DIR; ?>jquery-ui-1.8.17.custom.min.js"></script>
<script type="text/javascript" src="<?php echo JS_DIR; ?>jquery.validate.min.js"></script>
<script type="text/javascript" src="<?php echo JS_DIR; ?>jquery.jqtransform.js"></script>


<script language="javascript">
    $(function(){
        $('form').jqTransform({imgPath:'PatientManageMentSystem/images/'});
    });
</script>

<!-- CSS -->
<!-- jQTransform -->
<link type="text/css" href="<?php echo CSS_DIR; ?>jqtransform.css" rel="stylesheet" />
<!-- Jquery UI Kit -->
<link type="text/css" href="<?php echo CSS_DIR; ?>jquery.dataTables.css" rel="stylesheet" />
<!-- DATAGRID -->
<link type="text/css" href="<?php echo CSS_DIR; ?>/ui-lightness/jquery-ui-1.8.17.custom.css" rel="stylesheet" />
<!-- Regular -->
<link type="text/css" href="<?php echo CSS_DIR; ?>portal-css.css" rel="stylesheet" />

<script type="text/javascript">

    function addDoctor()
    {
        $("#formsData").html('');
        $.ajax({
            type: "GET",
            url: "<?php echo HTTP_HOST?>/doctor/",
            data:"action=addUser",
            success: function(msg){
                alert(msg);
                $("#formsData").html(msg);
                $("#actualData").hide();
                $("#example").hide();
                $("#example1").hide();
            }

        });
    }
    function patientConform(){
        $("#formsData").html('');
        $("#actualData").show();
        $("#example").show();
        $("#example1").show();
    }
    function patientQuery(){
            if($("#formsData").hasClass('progress')){
                return;
            }else{
                $("#formsData").html('');
                $.ajax({
                    type: "GET",
                     URL: "<?php echo HTTP_HOST ?>/doctor",
                    data:"action=replyQuery",
                    beforeSend: function(){
                        // Handle the beforeSend event
                        $("#formsData").addClass("progress");
                        $("body").css("cursor", "wait");

                    },
                    complete: function(){
                        // Handle the complete event
                        $("#formsData").removeClass("progress");
                        $("body").css("cursor", "default");

                    },
                    success: function(msg){

                        $("#formsData").html(msg).delay(80000);;
                        $("#actualData").hide();
                        $("#example").hide();
                        $("#example1").hide();
                    }

                });
            }
        }



</script>