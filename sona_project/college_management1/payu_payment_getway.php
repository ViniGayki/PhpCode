<?php
include'college_connection.php';
error_reporting(0);
$MERCHANT_KEY = "JZfega";
$SALT = "p7RZcSk5ApEwiw8B5cl3jWuDJmBMY906";

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
    link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
<!-- Styles -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" >
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    
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
    <div class="sidebar-page"></div>
    <div class="auto-container"></div>
    <div class="row clearfix"></div>
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
      <input type="text" name="txnid" value="<?php echo $txnid ?>" />
      <table>
        <tr>
          <td><b>Mandatory Parameters</b></td>
        </tr>
        <tr>
          <td>Amount: </td>
          <td><input name="amount" value="<?php echo (empty($posted['amount'])) ? '' : $posted['amount'] ?>" /></td>
            
         <td>First Name: </td>
          <td><select name="firstname" id="puja" checked required>
            <?php
             $my=mysqli_query($con,"select * from student_table ");
              while($data=mysqli_fetch_array($my)){
             $f_name=$data['f_name'];
              ?>
              <option value="<?php echo $data['f_name'];?>"><?php echo $data['f_name'];?></option>
              <?php } ?>
          </select>
          </td>
            </tr>
        <tr id="tina">
            
        </tr>
        <tr>
          <td>Product Info: </td>
          <td colspan="3"><textarea name="productinfo"><?php echo (empty($posted['productinfo'])) ? '' : $posted['productinfo'] ?></textarea></td>
        </tr>
        <tr>
          <td>Success URI: </td>
          <td colspan="3"><input name="surl" value="http://localhost/college_management/Success_payment.php" size="64" /></td>
        </tr>
        <tr>
          <td>Failure URI: </td>
          <td colspan="3"><input name="furl" value="http://localhost/college_management/Failur_payment.php" size="64" /></td>
        </tr>
        <tr>
          <td colspan="3"><input type="hidden" name="service_provider" value="payu_paisa" size="64" /></td>
        </tr>
        <tr>
          <td><b>Optional Parameters</b></td>
        </tr>
        <tr>
          <td>Last Name: </td>
          <td><input name="lastname" id="lastname" value="<?php echo (empty($posted['lastname'])) ? '' : $posted['lastname']; ?>" /></td>
          <td>Cancel URI: </td>
          <td><input name="curl" value="http://localhost/college_management/cancel_payment.php" /></td>
        </tr>
        <tr>
          <td>Address1: </td>
          <td><input name="address1" value="<?php echo (empty($posted['address1'])) ? '' : $posted['address1']; ?>" /></td>
          <td>Address2: </td>
          <td><input name="address2" value="<?php echo (empty($posted['address2'])) ? '' : $posted['address2']; ?>" /></td>
        </tr>
        <tr>
          <td>City: </td>
          <td><input name="city" value="<?php echo (empty($posted['city'])) ? '' : $posted['city']; ?>" /></td>
          <td>State: </td>
          <td><input name="state" value="<?php echo (empty($posted['state'])) ? '' : $posted['state']; ?>" /></td>
        </tr>
        <tr>
          <td>Country: </td>
          <td><input name="country" value="<?php echo (empty($posted['country'])) ? '' : $posted['country']; ?>" /></td>
          <td>Zipcode: </td>
          <td><input name="zipcode" value="<?php echo (empty($posted['zipcode'])) ? '' : $posted['zipcode']; ?>" /></td>
        </tr>
        <tr>
          <td>UDF1: </td>
          <td><input name="udf1" value="<?php echo (empty($posted['udf1'])) ? '' : $posted['udf1']; ?>" /></td>
          <td>UDF2: </td>
          <td><input name="udf2" value="<?php echo (empty($posted['udf2'])) ? '' : $posted['udf2']; ?>" /></td>
        </tr>
        <tr>
          <td>UDF3: </td>
          <td><input name="udf3" value="<?php echo (empty($posted['udf3'])) ? '' : $posted['udf3']; ?>" /></td>
          <td>UDF4: </td>
          <td><input name="udf4" value="<?php echo (empty($posted['udf4'])) ? '' : $posted['udf4']; ?>" /></td>
        </tr>
        <tr>
          <td>UDF5: </td>
          <td><input name="udf5" value="<?php echo (empty($posted['udf5'])) ? '' : $posted['udf5']; ?>" /></td>
          <td>PG: </td>
          <td><input name="pg" value="<?php echo (empty($posted['pg'])) ? '' : $posted['pg']; ?>" /></td>
        </tr>
        <tr>
          <?php if(!$hash) { ?>
            <td colspan="4"><input type="submit" value="Submit" /></td>
          <?php } ?>
        </tr>
      </table>
     </form>
                        </div></section></div></div>         
                        
    <script>//ajax script language code
$(document).ready(function() {
$('#puja').on('change', function() {
var sona_id = this.value;
$.ajax({
url: "payu_payment_getway_remaing_part.php",
type: "POST",
data: {
sona_id: sona_id// used for request and responce data
},
cache: false,
success: function(result){
$("#tina").html(result);
}
});
});    

});
</script>
  </body>
</html> 