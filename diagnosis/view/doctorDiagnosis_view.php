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
        $(document).ready(function(){
            $('#birthdate').datepicker({
                yearRange: '1936:2012',
                dateFormat: 'mm/dd/yy',
                changeMonth:true,
                changeYear:true
            });
        });
    </script>
    </head>
    <body>
    <?php include_once('../config/admin-header.php') ?>
    <div id="divContent">
      <h1>Diagnosis</h1>
      <form method="post">
      <div style="float: left; width: 48%;">
        <label>Patient Name :</label>
        <input type="text" name="username"/>
        <div class="divClr"></div>
        <label>Email Address :</label>
        <input type="text" name="email"/>
       </div>
       <div style="float: left; width: 48%;">
        <label>Date of Birth :</label>
        <input type="text" name="birthdate" id="birthdate"/>
        <div class="divClr"></div>
        <label>Gender :</label>
        <input type="text" name="gender"/>
        </div>
        <br/>
        <input type="submit" name="search" value="Search"/>
        <div class="divClr"></div>
      </form>
      <?php if (count($patientDetails) > 0) {
        ?>
      <table border="0" id="patientQueryData" width="100%" cellpadding="0" cellspacing="0">
        <thead>
          <tr>
            <th> Patient Name </th>
            <th> Email </th>
            <th> Birth Date </th>
            <th> Alternate Email </th>
            <th> Marital Status </th>
            <th> Gender </th>
            <th> Phone no </th>
            <th> Actions </th>
          </tr>
        </thead>
        <tbody>
          <?php
                foreach ($patientDetails as $patient) {
                ?>
          <tr>
            <td>&nbsp; <?php echo $patient['username'] ?></td>
            <td>&nbsp; <?php echo $patient['email'] ?></td>
            <td>&nbsp; <?php echo $patient['birth_date'] ?></td>
            <td>&nbsp; <?php echo $patient['alt_email'] ?></td>
            <td>&nbsp; <?php echo $patient['marital_status'] ?></td>
            <td>&nbsp; <?php echo $patient['gender'] ?></td>
            <td>&nbsp; <?php echo $patient['phone_no'] ?></td>
            <td align="center">&nbsp; <a href="<?php echo HTTP_HOST ?>/diagnosis?action=view&uid=<?php echo $patient['id']; ?>"><img src="../images/view.png" title="View Medical Details" /></a></td>
          </tr>
          <?php } ?>
        </tbody>
      </table>
      <script type="text/javascript">
                $(document).ready(function(){
                    $('#patientQueryData').dataTable();

                });    
            </script>
      <?php } ?>
    </div>
    <!-- #divContent END -->
</body>
</html>