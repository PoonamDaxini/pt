<title>Cuddles and Care - Confirm Awaiting Registered Users</title>
<!-- CSS -->
<link href="../css/dashboard_style.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="../css/style.css" type="text/css" />
<?php

$objDatabase = new mysqlDatabaseClass();
$objUserClass = new userClass();
$objDoctorClass = new doctorClass();

$patientList = $objDoctorClass->getUnconformedPatient($objDatabase);
if (is_array($patientList) && count($patientList) > 0) {
?>
<div id="divStatusBar"> 
  <!--    	<div class="Welcome">Welcome Guest</div>-->
  <div class="Account">
  <a>Welcome <?php $_SESSION['user']?></a> 
  <a href="../logout.php">Sign Out</a>
  </div>
</div>
<div id="divHeader">
  <p><img src="../images/logo.png" class="imgLogo" /></p>
  <div id="divNavBar">
    <ul id="css3menu1" class="topmenu">
      <li class="topfirst"><a href="#" title="Item 0">Home</a></li>
      <li class="topmenu"><a href="#" title="Item 1">About Us</a>
      <li class="topmenu"><a href="#" title="Item 1"><span>Services</span></a>
        <ul>
          <li><a href="#" title="Item 1 0">Services 1</a></li>
          <li><a href="#" title="Item 1 1">Services 2</a></li>
          <li><a href="#" title="Item 1 2">Services 3</a></li>
        </ul>
      </li>
      <li class="toplast"><a href="#" title="Item 2">Contact Us</a></li>
    </ul>
  </div>
</div>
<div id="divContent">
	<div><?php echo $message?$message:'';?></div>
<h1>Registerd Patients Database</h1>
<table border="0" width="100%">
  <tr>
    <th> User Name </th>
    <th> Email </th>
    <th> Birth Date </th>
    <th> Alternate Email </th>
    <th> Marital Status </th>
    <th> Gender </th>
    <th> Phone No </th>
    <th> Conform Patient </th>
  </tr>
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
    <td><a href="<?php echo HTTP_HOST ?>/doctor?action=updateConformation&id=<?php echo $patient['id'] ?>">Confirm</a></td>
  </tr>
  <?php
        }
    ?>
</table>
<?php
    } else {
        echo "No New Registration or No pending conformation for user";
    }
?>
<div class="divClear"></div>
<br/><br/><br/>
</div><!-- divContent END -->
<div id="divFooter"> &copy; Cuddles and Care Children Hospital. All rights reserved.<br />
  Developed by <a href="http://www.rethinkingweb.com" target="_blank"><img src="../images/rtw-credits.png" width="20" class="imgCredits" /></a></div>