<!DOCTYPE html>
<html>
    <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="Content-Script-Type" content="text/javascript" />
    <meta http-equiv="Content-Style-Type" content="text/css" />
    <title>Cuddles and Care - Administrator Dashboard</title>
    <!-- INCLUDES -->
    <?php include_once('../config/includes.php') ?>
    
    </head>
    <body>
    <?php include_once('../config/admin-header.php') ?> 
<div id="divContent">
  <h1>Administrator Dashboard</h1>
	<div><?php echo $message?$message:'';?></div>
<div id="formsData"></div>
<?php
        $objDatabase = new mysqlDatabaseClass();
        $objUserClass = new userClass();
        $objDoctorClass = new doctorClass();

        $patientList = $objDoctorClass->getUnconformedPatient($objDatabase);
        if (is_array($patientList) && count($patientList) > 0) {
        ?>
<script type="text/javascript">
                $(document).ready(function() {
                    $('#example').dataTable();
                } );
            </script>
<div id="actualData">
      <table border="0" id="example" width="100%" cellpadding="0" cellspacing="0">
    <thead>
          <tr>
        <th> User Name </th>
        <th> Email </th>
        <th> Birth Date </th>
        <th> Alternate Email </th>
        <th> Marital Status </th>
        <th> Gender </th>
        <th> Phone No </th>
        <th> Confirm Patient </th>
      </tr>
        </thead>
    <tbody>
          <?php
                foreach ($patientList as $patient) {
                ?>
          <tr>
        <td>&nbsp; <?php echo $patient['username'] ?></td>
        <td>&nbsp; <?php echo $patient['email'] ?></td>
        <td>&nbsp; <?php echo $patient['birth_date'] ?></td>
        <td>&nbsp; <?php echo $patient['alt_email'] ?></td>
        <td>&nbsp; <?php echo $patient['marital_status'] ?></td>
        <td>&nbsp; <?php echo $patient['gender'] ?></td>
        <td>&nbsp; <?php echo $patient['phone_no'] ?></td>
        <td class="tdAction"><a href="<?php echo HTTP_HOST ?>/doctor?action=updateConformation&id=<?php echo $patient['id'] ?>"><img src="../images/add.png"></a>  <a href="#"><img src="../images/delete.png"></a></td>
      </tr>
          <?php
                    }
                ?>
        </tbody>
  </table>
    </div>
<?php
                } else {
                    echo "<p id='example1'>No New Registration or No pending conformation for user</p>";
                }
    ?>
    </div><!-- divContent END -->
    <div class="divClr"></div>
    <?php include_once('../config/footer.php') ?>
</body>
</html>