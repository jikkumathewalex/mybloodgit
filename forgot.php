<?php
require_once 'db.php';

//check submit
if  (isset($_POST['submit'])) {
$username = $_POST['username'];
$email = $_POST['email'];
$db = user($username);
$jumlah = mysqli_num_rows($db);

//check is there username in database
if ($jumlah !=0) {
  while ($row=mysqli_fetch_assoc($db)){
    $db_email = $row['email'];
  }

//check input email similiar with email in database
if ($email==$db_email){
// make random code
  $code = '123456789qazwsxedcrfvtgbyhnujmikolp';
  $code = str_shuffle($code);
  $code = substr($code,0, 10);

// for send token
  $alamat = "http://localhost/quickstore/update.php?code=$code&username=$username";
  $to = $db_email;
  $judul = "passwrod reset";
  $isi = "this is automatic email, dont reply.To reset your password please click this link ".$alamat;
  $headers = "From: akash1213.ab@gmail.com" . "\r\n";
  mail($to,$judul,$isi,$headers);

//echo $alamat;
if (update_token($code, $username)){
  header("location:forgot.php?msg=A link will be sent 2 your Email");
 // echo "your password have reset";
}else {
  header("location:forgot.php?msg=please try again");
  
}

}else { header("location:forgot.php?msg=Email Not Registered");}

}else { header("location:forgot.php?msg=Username Not Registered");}
}


?>
<!DOCTYPE html>
<html>
<head>
<title>QuickStore</title>
<!-- for-mobile-apps -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Super Market Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
		function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- //for-mobile-apps -->
<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
<link href="css/oh-autoval-style.css" rel="stylesheet" type="text/css" media="all" />
<!-- font-awesome icons -->
<link href="css/font-awesome.css" rel="stylesheet"> 
<link href="css/w3.css" rel="stylesheet"> 
<!-- //font-awesome icons -->
<!-- js -->
<script src="js/jquery-1.11.1.min.js"></script>
<script src="js/oh-autoval-script.js"></script>
<script src="js/jquery.min.js"></script>
<!-- //js -->
<link href='//fonts.googleapis.com/css?family=Raleway:400,100,100italic,200,200italic,300,400italic,500,500italic,600,600italic,700,700italic,800,800italic,900,900italic' rel='stylesheet' type='text/css'>
<link href='//fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic' rel='stylesheet' type='text/css'>
<!-- start-smoth-scrolling -->
<script type="text/javascript" src="js/move-top.js"></script>
<script type="text/javascript" src="js/easing.js"></script>
<script type="text/javascript">
	jQuery(document).ready(function($) {
		$(".scroll").click(function(event){		
			event.preventDefault();
			$('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
		});
	});
</script>
<style>
body {
 background-image: url("images/qstore.jpg");
 background-color: #cccccc;
}

</style>
  <style>
.alert {
  padding: 20px;
  background-color: #fe9126;
  color: white;
}

.closebtn {
  margin-left: 15px;
  color: white;
  font-weight: bold;
  float: right;
  font-size: 22px;
  line-height: 20px;
  cursor: pointer;
  transition: 0.3s;
}

.closebtn:hover {
  color: black;
}
</style>

<!-- start-smoth-scrolling -->
</head>
<body>
<!-- header -->
	
 		
			

	<div style="background-color:#3c2f2f " class="logo_products">
		<div class="container">
		
			<div class="w3ls_logo_products_left">
				<h1><a href="index.php">QuickStore</a></h1>
			</div>
		<div class="w3l_search">
			
		</div>
			
			<div class="clearfix"> </div>
		</div>
	</div>
<!-- //header -->
<div class="login">
		<div class="container">
	
		
		
			<div class="login-form-grids animated wow slideInUp" data-wow-delay=".5s">
			<h2>Forgot Password</h2>
			<?php
if(isset($_GET['msg']))
{
  $text=$_GET['msg'];
}else
{
  $text="Enter Credentials";
}
	?>
	<div class="alert">
	<span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span> 
	<strong><?php echo $text ?></strong>
  </div>

				<form action="" onsubmit="return" class="oh-autoval-form" name="login" method="post">
				
          <input type="text" name="username" placeholder="Username" required=" " >
          <input type="text" name="email" class="av-email"  av-message="enter valid E-mail" placeholder="Email Address" required=" " >
					
					<input type="submit" name="submit" value="Continue">
				</form></br>
				<p>go back to <a href="index.php">Home<span class="glyphicon glyphicon-menu-left" aria-hidden="true"></span></a></p>
			</div>
		
		</div>
	
			
		</div>
  </div>
  

  <script src="js/bootstrap.min.js"></script>

<!-- top-header and slider -->
<!-- here stars scrolling icon -->
	<script type="text/javascript">
		$(document).ready(function() {
			/*
				var defaults = {
				containerID: 'toTop', // fading element id
				containerHoverID: 'toTopHover', // fading element hover id
				scrollSpeed: 1200,
				easingType: 'linear' 
				};
			*/
								
			$().UItoTop({ easingType: 'easeOutQuart' });
								
			});
	</script>
<!-- //here ends scrolling icon -->
<script src="js/minicart.min.js"></script>
<script>
	// Mini Cart
	paypal.minicart.render({
		action: '#'
	});

	if (~window.location.search.indexOf('reset=true')) {
		paypal.minicart.reset();
	}
</script>
<!-- main slider-banner -->
<script src="js/skdslider.min.js"></script>
<link href="css/skdslider.css" rel="stylesheet">
<script type="text/javascript">
		jQuery(document).ready(function(){
			jQuery('#demo1').skdslider({'delay':5000, 'animationSpeed': 2000,'showNextPrev':true,'showPlayButton':true,'autoSlide':true,'animationType':'fading'});
						
			jQuery('#responsive').change(function(){
			  $('#responsive_wrapper').width(jQuery(this).val());
			});
			
		});
</script>	
<!-- //main slider-banner --> 
</body>
</html>