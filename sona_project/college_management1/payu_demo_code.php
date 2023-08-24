<?php
include('include/dbconnect.php');
error_reporting(0);
// $MERCHANT_KEY = "VzfS4KwV";
// $SALT = "bbru6uh7rP";

// Merchant key here as provided by Payu
// $MERCHANT_KEY = "FoofJ4";
// $SALT = "Gwtto7lp";

// $PAYU_BASE_URL = "https://secure.payu.in";

$MERCHANT_KEY = "FoofJ4";

// Merchant Salt as provided by Payu
$SALT = "Gwtto7lp";

// End point - change to https://secure.payu.in for LIVE mode
$PAYU_BASE_URL = "https://secure.payu.in";

$action = '';

$posted = array();
if(!empty($_POST)) {
    //print_r($_POST);
  foreach($_POST as $key => $value) {    
    $posted[$key] = $value; 
    
  }
}

$formError = 0;

if(empty($posted['txnid'])) {
  // Generate random transaction id
  $txnid = substr(hash('sha256', mt_rand() . microtime()), 0, 20);
} else {
  $txnid = $posted['txnid'];
}
$hash = '';
// Hash Sequence
$hashSequence = "key|txnid|amount|productinfo|firstname|email|udf1|udf2|udf3|udf4|udf5|udf6|udf7|udf8|udf9|udf10";
if(empty($posted['hash']) && sizeof($posted) > 0) {
  if(
          empty($posted['key'])
          || empty($posted['txnid'])
          || empty($posted['amount'])
          || empty($posted['firstname'])
          || empty($posted['email'])
          || empty($posted['phone'])
          || empty($posted['productinfo'])
          || empty($posted['surl'])
          || empty($posted['furl'])
          || empty($posted['service_provider'])
  ) {
    $formError = 1;
  } else {
    //$posted['productinfo'] = json_encode(json_decode('[{"name":"tutionfee","description":"","value":"500","isRequired":"false"},{"name":"developmentfee","description":"monthly tution fee","value":"1500","isRequired":"false"}]'));
    $hashVarsSeq = explode('|', $hashSequence);
    $hash_string = '';  
    foreach($hashVarsSeq as $hash_var) {
      $hash_string .= isset($posted[$hash_var]) ? $posted[$hash_var] : '';
      $hash_string .= '|';
    }

    $hash_string .= $SALT;

 $hash = hash('sha512', $hash_string);
    $action = $PAYU_BASE_URL . '/_payment';
  }
} elseif(!empty($posted['hash'])) {
  $hash = $posted['hash'];
  $action = $PAYU_BASE_URL . '/_payment';
}
?>
<!DOCTYPE html>
<html>

<head>
<meta charset="utf-8">
<title>The Power of One Welfare Foundation - Best Ngo in India</title>
<!-- Stylesheets -->
<link href="css/bootstrap.css" rel="stylesheet">
<link href="css/revolution-slider.css" rel="stylesheet">
<link href="css/style.css" rel="stylesheet">
<link rel="shortcut icon" href="images/fav.png" />
<!-- Responsive -->
<meta http-equiv="X-UA-Compatible" content="IE=edge">

<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">

<link href="css/responsive.css" rel="stylesheet">
<meta name="google-site-verification" content="4RJhWbS2k9gnMaCEzV9GX-KDJsjV65TsYOIFUfQL_9k" />
<!-- Global site tag (gtag.js) - Google Analytics -->
  <script>
    var hash = '<?php echo $hash ?>';
    function submitPayuForm() {
      if(hash == '') {
        return;
      }
      var payuForm = document.forms.payuForm;
      payuForm.submit();
    }
  </script>
</head>

<body onload="submitPayuForm()">
<div class="page-wrapper">

    <!-- Main Header -->                                                                                      
    <header class="main-header">
        <!--Header Top-->
        <div class="header-top">
            <div class="container">
                <div class="row clearfix">
                    <!--Top Left-->
                    <div class="col-md-6 col-sm-6 col-xs-12 top-left">
                        <div class="clearfix">
                            <!-- <div class="pull-left phone-num"><span class="icon flaticon-telephone51"></span><a href="#">+91-9373114607, +91-9373114572</a></div> -->
                            <div class="pull-left email"><span class="icon flaticon-mail115"></span><a href="#">ngopowerofone@gmail.com</a></div>
                        </div>
                    </div>
                    <!--Top Right-->
                    <div class="col-md-6 col-sm-6 col-xs-12 top-right">
                        <div class="social-links"><a href="https://www.facebook.com/thepowerofonewelfarefoundation/" class="fa fa-facebook-f"></a> 
                            <a href="https://www.instagram.com/thepowerofonengo/" class="fa fa-instagram"></a>
                            <a href="https://twitter.com/powerofonengo" class="fa fa-twitter"></a>
                            <a href="https://www.youtube.com/channel/UC88XIXIvksg-YW6UCJOsmJQ/featured" class="fa fa-youtube-play"></a>
                         <!-- <a href="#" class="fa fa-google-plus"></a> <a href="#" class="fa fa-linkedin"></a> <a href="#" class="fa fa-dribbble"></a>  <a href="#" class="fa fa-pinterest-p"></a> -->
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
        
        <!--Header Lower-->
        <div class="header-lower">
            <div class="auto-container clearfix">
                <!--Logo-->
                <div class="logo"><a href="https://www.powerofonengo.org/"><img src="images/power-logo.png" alt="Power Of One" title="Power Of One" class="powerLogo"></a></div>
                
                <!--Right Container-->
                <div class="right-cont clearfix">
                    
                    <!-- Main Menu -->
                    <nav class="main-menu">
                        <div class="navbar-header">
                            <!-- Toggle Button -->      
                            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                            
                        </div>
                        
                        <div class="navbar-collapse collapse clearfix">                                                                                              
                            <ul class="navigation">
                                <li class="dropdown"><a href="https://www.powerofonengo.org/">Home</a></li>
                                <li class="dropdown"><a href="about.php">About</a>
                                <ul class="submenu">
                                    <li><a href="vision-mission.php">Vision and Mission</a></li>
                                    <li><a href="broucher.php">Broucher</a></li>
                                </ul>
                                </li>
                                <li class="dropdown"><a href="project.php">Projects</a></li>
                                <li class="dropdown"><a href="gallery.php">Gallery</a></li>
                                <li class="dropdown"><a href="activity.php">Activity</a></li>
                                <li class="current dropdown"><a href="register.php">Register</a></li>
                                <li class="dropdown"><a href="contact.php">Contact</a></li>
                                
                            </ul>
                        </div>
                    </nav>
                    <!-- Main Menu End-->
                </div>
                
            </div>
            
        </div>
        <!--Header Lower End-->
        
    </header>
    <!--End Main Header -->
    
    
    <!--Sidebar Navigation-->
    <aside id="side-navigation">
        <button type="button" class="toggle-nav"><span class="fa fa-bars"></span></button>
            
        <div class="sidebar-inner">
            <!--Logo-->
            <div class="logo"><a href="#"><img src="images/power-logo.png" alt="Power Of One"></a></div>
            
            <!--Main Navigation-->
            <nav class="navigation">
                <ul>
                    <li class="dropdown"><a href="http://www.powerofonengo.org/">Home</a>
                        <ul class="submenu">
                            <!-- <li><a href="index-2.php">home</a></li>
                            <li><a href="index-7.php">home</a></li> -->
                            
                        </ul>
                    </li>
                    <li class="dropdown"><a href="about.php">About</a>
                        <ul class="submenu">
                            <li><a href="vision-mission.php">Vision and Mission</a></li>
                            <li><a href="broucher.php">Broucher</a></li>
                        </ul>
                    </li>
                    <li class="dropdown"><a href="project.php">Projects</a>
                        <ul class="submenu"></ul>
                    </li>
                    <li class="dropdown"><a href="gallery.php">Gallery</a>
                        <ul class="submenu"></ul>
                    </li>
                    <li class="dropdown"><a href="activity.php">Activity</a>
                        <ul class="submenu"></ul>
                    </li>
                    <li class="current dropdown"><a href="register.php">Register</a>
                        <ul class="submenu"></ul>
                    </li>
                    <li class=" dropdown"><a href="contact.php">Contact</a>
                        <ul class="submenu"></ul>
                    </li>
                </ul>
            </nav>
        </div>
    </aside>
    <!--Sidebar Nav End-->
    
    
    
    <!--Bread Crumb-->
    <div class="bread-crumb">
        <div class="auto-container">
            Pages  &ensp;<span class="fa fa-angle-right"></span>&ensp; <a href="#" class="ative">Payment</a>
        </div>
    </div>
    
    <!--Contact Us Section-->
    <div class="sidebar-page">
        <div class="auto-container">
            
            <div class="row clearfix">
                
                <div class="col-md-1"></div>
                <div class="col-md-3">
                    <div class="sideBox">
                        <p class="donatePay"><a href="#">DONATE NOW</a></p>
                        <p class="powerTxt">Power of One Welfare Foundation</p>
                    </div>
                </div>
                <div class="col-md-5">
                    <section class="contact-section">
                        <div class="sec-title">
                            <h2>Payment<strong> Details</strong></h2>
                        </div>
                        <div class="sec-text">
                            <!--<p class="regP"></p>-->
                        </div>   
                       
                        <!--<img src="images/background/register-bg.jpg" alt="Power of One NGO" class="img-responsive">-->
                        <br>
                        <div class="form">
                 <?php if($formError) { ?>
    
      <span style="color:red">Please fill all mandatory fields.</span>
      <br/>
      <br/>
    <?php } ?>    
         <form action="<?php echo $action; ?>" method="post" name="payuForm" class="default-form">
                      <input type="hidden" name="key" value="<?php echo $MERCHANT_KEY ?>" />
      <input type="hidden" name="hash" value="<?php echo $hash ?>"/>
      <input type="hidden" name="txnid" value="<?php echo $txnid ?>" />  

                                <div class="contact-form row clearfix">
                                    <div class="form-group col-md-12 col-sm-12 col-xs-12">
                                        <div class="form-group-inner">
                                            <div class="icon-box">
                                                <label for="contact_name"><span class="icon fa fa-rupee"></span></label>
                                                </div>
                                            <div class="field-outer">
                                                <input type="text" name="amount" value="<?php echo (empty($posted['amount'])) ? '' : $posted['amount'] ?>" placeholder="Enter amount to pay" required>
                                                  <span id="username" class="text-danger"></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-12 col-sm-12 col-xs-12">
                                        <div class="form-group-inner">
                                            <div class="icon-box">
                                                <label for="contact_name"><span class="icon flaticon-user168"></span></label>
                                                </div>
                                            <div class="field-outer">
                                                <input type="text" name="firstname" id="firstname" value="<?php echo (empty($posted['firstname'])) ? '' : $posted['firstname']; ?>" placeholder="Customer Name" required>
                                                  <span id="username" class="text-danger"></span>
                                            </div>
                                        </div>
                                    </div>
                                   
                                          <input type="hidden" name="lastname" id="firstname" value="demo" placeholder="Customer Name" required>
                                             
                                <div class="form-group col-md-12 col-sm-12 col-xs-12">
                                        <div class="form-group-inner">
                                            <div class="icon-box">
                                                <label for="contact_name"><span class="icon flaticon-edition2"></span></label>

                                                </div>
                                      <div class="field-outer">
                                        <select id="city_id" class="form-control" name="productinfo" aria-required="true" required placeholder="Please select project name " style="padding: 0px;">
                                                      <?php    $postid=intval($_GET['pid']);
                                                      if(empty($postid)){?>

                                                        <option value="<?php echo (empty($posted['productinfo'])) ? '' : $posted['productinfo']; ?>">Please Select Project Name</option>
                                                
                                                      <?php 
                                                   
                                                  $query=mysqli_query($maincon,"Select * from  project_name");
                                       
                                            while($rows=mysqli_fetch_array($query)){
                                                
                                                      ?>      
                                                            <option value="<?php echo $rows['project_name'];?>"><?php echo htmlentities($rows['project_name']);?></option>
                                                     <?php } 
                                                    }else{
                                    $query=mysqli_query($maincon,"SELECT * from project_name where project_id='$postid'");
                                       
                                            while($rows=mysqli_fetch_array($query)){
                                               
                                                      ?>      
                                                      <option value="<?php echo $rows['project_name'];?>"><?php echo htmlentities($rows['project_name']);?></option>
                                                     <?php } }?>     
                                              </select>
                                            </div>
                                        </div>
                                    </div> 
                               <!--      <div class="form-group col-md-12 col-sm-12 col-xs-12">
                                        <div class="form-group-inner">
                                            <div class="icon-box">
                                                <label for="contact_name"><span class="icon flaticon-new100"></span></label>
                                                </div>
                                            <div class="field-outer">
                                                <input type="text" name="name" placeholder="Message" required>
                                                  <span id="username" class="text-danger"></span>
                                            </div>
                                        </div>
                                    </div> -->
                                    <div class="form-group col-md-12 col-sm-12 col-xs-12">
                                        <div class="form-group-inner">
                                            <div class="icon-box"><label for="contact_phone"><span class="icon glyphicon glyphicon-phone"></span></label></div>
                                            <div class="field-outer">
                                                <input type="text" name="phone" value="<?php echo (empty($posted['phone'])) ? '' : $posted['phone']; ?>" placeholder="Phone" required>
                                                  <span id="mobile-no" class="text-danger"></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-12 col-sm-12 col-xs-12">
                                        <div class="form-group-inner">
                                            <div class="icon-box"><label for="contact_email"><span class="icon flaticon-new100"></span></label></div>
                                            <div class="field-outer">
                                                <input type="email" name="email" id="email" value="<?php echo (empty($posted['email'])) ? '' : $posted['email']; ?>" placeholder="Email" required>
                                                 <span id="emailid" class="text-danger"></span>
                                            </div>
                                        </div>
                                    </div>
          <input type="hidden" name="surl" value="https://powerofonengo.org/success.php" size="64" /> 
          <input type="hidden" name="furl" value="https://powerofonengo.org/failure.php" size="64" />
          <input type="hidden" name="service_provider" value="PayU" size="64" />               
                                    
                                    <div class="form-group col-md-12 col-sm-12 col-xs-12 text-left">
                                       <?php if(!$hash) { ?>
       
        
                                        <button class="hvr-bounce-to-right" type="submit" name="Submit" value="Submit"> Donate Now &ensp; <span class="icon glyphicon glyphicon-log-in"></span></button>
                             <?php } ?>    
                                    <p role="alert"></p>
                                    <img src="images/payGet.png" style="width: 175px;">
                                    </div>
                                </div>
                            </form>
                            
                        </div>
                    
                    </section>
                </div>
                <div class="col-md-1"></div>
             
            </div>
        </div>
    </div>
       
       <?php include('include/footer.php'); ?>