<!DOCTYPE html>
<html>
    <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="Content-Script-Type" content="text/javascript" />
    <meta http-equiv="Content-Style-Type" content="text/css" />
    <title>Cuddles and Care - Guest Dashboard</title>
    <!-- INCLUDES -->
    <?php include_once('../config/includes.php') ?>
    <script type="text/javascript">
        function queryDoctor(){
            $.ajax({
                type: "GET",
                data:"action=query",
                success: function(msg){
                        $("#dataDiv").after(msg);
                    }
                
            });
        }
    </script>
    <body>
        <?php include_once('../config/header.php') ?> 
        <div id="divContent">
  <h1 style="float:left;">Guest's Dashboard</h1>
        <div id="dataDiv"></div>
        </div><!-- divContent END -->
    </body>
</html>