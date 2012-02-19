<div id="divHeader">
  <p style="float:left;"><img src="../images/logo.png" class="imgLogo" /></p>
  <p class="pWelcome">
  <?php echo "Welcome  " . $_SESSION['user']; ?> 
  </p>
  <div id="divNavBar">
  
    <ul id="css3menu1" class="topmenu">
    <li class="topfirst active"><a href="<?php echo HTTP_HOST?>/doctor" onclick="patientConform();">Patient Confirmation</a></li>
      <li class="topmenu"><a href="<?php echo HTTP_HOST?>/doctor/?action=addUser">Add Doctor</a></li>
      
      <li class="topmenu"><a href="<?php echo HTTP_HOST?>/article">Article</a></li>
      
      <!--<li class="topmenu"><a href="<?php //echo HTTP_HOST?>/article"><span>Article</span></a>
        <ul>
          <li><a href="#" title="Item 1 0">Services 1</a></li>
          <li><a href="#" title="Item 1 1">Services 2</a></li>
          <li><a href="#" title="Item 1 2">Services 3</a></li>
        </ul>
      </li>-->
      <li class="topmenu"><a href="<?php echo HTTP_HOST?>/illness">Illness</a></li>
      <li class="topmenu"><a href="<?php echo HTTP_HOST?>/diagnosis">Diagnosis</a></li>
<!--      <li class="topmenu"><a href="javascript:void(0);" onclick="patientQuery();">Reply to Patient Query</a></li>-->
      <li class="topmenu"><a href="<?php echo HTTP_HOST?>/doctor/?action=replyQuery">Reply to Patient Query</a></li>
      <li class="toplast"><a href="<?php echo HTTP_HOST ?>/logout.php">Logout</a></li>
    </ul>
  </div>
  <div class="divClr"></div>
</div><!-- divHeader END -->