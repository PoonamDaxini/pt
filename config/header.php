<div id="divHeader">
  <p style="float:left;"><img src="../images/logo.png" class="imgLogo" /></p>
  <p class="pWelcome">
  <?php echo "Welcome  " . $_SESSION['user']; ?> 
  </p>
  <div id="divNavBar">
    <ul id="css3menu1" class="topmenu">
      <li class="topfirst active"><a href="<?php echo HTTP_HOST?>/patient/?action=query">Query To Doctor</a></li>
      <li class="topmenu"><a href="<?php echo HTTP_HOST?>/article">Articles</a></li>
      <!--<li class="topmenu"><a href="#" title="Item 1"><span>Services</span></a>
        <ul>
          <li><a href="#" title="Item 1 0">Services 1</a></li>
          <li><a href="#" title="Item 1 1">Services 2</a></li>
          <li><a href="#" title="Item 1 2">Services 3</a></li>
        </ul>
      </li>-->
      <li class="topmenu"><a href="<?php echo HTTP_HOST?>/diagnosis">Diagnosis</a>
      <li class="topmenu"><a href="#">FAQ / Help</a>
      <li class="topmenu"><a href="#">Login</a>
      <li class="topmenu"><a href="#">Register</a>
      <li class="toplast"><a href="<?php echo HTTP_HOST ?>/logout.php">Logout</a></li>
    </ul>
    <div class="divClr"></div>
  </div>
  <div class="divClr"></div>
</div><!-- divHeader END -->
<div class="divClr"></div>