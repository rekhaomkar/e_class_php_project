
<!DOCTYPE html>
<html lang="en">
<head>
	<!-- Required meta tags --> 
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>Gurukula</title>
	<link rel="stylesheet" href="vendors/mdi/css/materialdesignicons.min.css">
	<link rel="stylesheet" href="vendors/owl.carousel/css/owl.carousel.css">
	<link rel="stylesheet" href="vendors/owl.carousel/css/owl.theme.default.min.css">
	<link rel="stylesheet" href="vendors/aos/css/aos.css">
	<link rel="stylesheet" href="vendors/jquery-flipster/css/jquery.flipster.css">
	<link rel="stylesheet" href="css/style.css">
	<link rel="shortcut icon" href="images/favicon2.png" />
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

	<script> 
		function demo() {
			var data1;
			$.ajax({ 
				type: "POST", 
				data: data1, 
				url: "http://localhost/e_class_php_project/WebSite/ajax/cssdata.php",  
				success: function (result) { 
					var imgg = jQuery.parseJSON(result);
		//$('p').css('background-color',result);
		//$("p").css("background-color", "yellow");
		// alert(imgg[0].url);
		for(var i=0;i<=4;i++)
		{
			var j=i+1;
			var nm="del"+j;
		//alert(nm);alert(imgg[i].url);
		document.getElementById(nm).src=imgg[i].url;
	}
}
});
		}
	</script>
	<script> $(document).ready(function() {demo(); }); </script>

	<?php
	$link=mysqli_connect("localhost","root","","tutor");
//Sign in form --------
	$name="";
	$eml="";
	if(isset($_POST["your_pass"]) && isset($_POST['email']))
	{
		$pswd=$_POST["your_pass"];
		$eml=$_POST["email"];

		$sql="SELECT * FROM user WHERE Email_id='$eml' ";
		$res=mysqli_query($link,$sql);
		$rowcount=mysqli_num_rows($res);
		if($rowcount==1)
		{
			$row = mysqli_fetch_row($res);
			$name=$row[0];
		}

		echo $name;	
		echo $eml;		
	}
	else
	{
	// Sign up form -------
		if($_SERVER["REQUEST_METHOD"]=="POST")
		{
			$usnm = trim($_POST['name']);
			$pswd1=trim($_POST['pass']);
			$pswd2=trim($_POST['re_pass']);
			$eml=trim($_POST['nemail']);
		}	

		$sql="SELECT * FROM user WHERE Email_id='$eml' ";



		if($res=mysqli_query($link,$sql))
		{
			$rowcount=mysqli_num_rows($res);
			if($rowcount ==1)
			{
				echo "Already exist. ".$uname;
				//header("location:userlg.html");
			}
			else
 				{ // New user insertion
 					$sqll="INSERT INTO user(Name,Email_id,Password) VALUES ('$usnm','$eml','$pswd1')";
 					$name=$usnm;
 					if(mysqli_query($link,$sqll))
 					{
 						echo  "Records inserted successfully";
						//header("Location:http://localhost/e_class_php_project/WebSite/userlng.php");
 					}
 					else
 					{
 						echo "Error: could not insert";

 					}
 				}

 			}

 			echo $name;			
 			echo $eml;

 		}
 		?>

 	</head>


 	<body data-spy="scroll" data-target=".navbar" data-offset="50">
 		
 		<div id="mobile-menu-overlay"></div>
 		<nav class="navbar navbar-expand-lg fixed-top">
 			<div class="container">
 				<a class="navbar-brand" href="#"><img src="" alt=""></a>
 				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
 					<span class="navbar-toggler-icon"><i class="mdi mdi-menu">
 					</i></span>
 				</button>
 				<div class="collapse navbar-collapse" id="navbarTogglerDemo01">
 					<div class="d-lg-none d-flex justify-content-between px-4 py-3 align-items-center">
 						<img src="" class="logo-mobile-menu" alt="">
 						<a href="javascript:;" class="close-menu"><i class="mdi mdi-close"></i></a>
 					</div>
 					<ul class="navbar-nav ml-auto align-items-center">
 						<li class="nav-item active">
 							<a class="nav-link" href="#home">Home <span class="sr-only">(current)</span></a>
 						</li>
 						<li class="nav-item">
 							<a class="nav-link" href="#services">Services</a>
 						</li>
 						<li class="nav-item">
 							<a class="nav-link" href="#about">About</a>
 						</li>
 						<li class="nav-item">
 							<a class="nav-link" href="#projects">Projects</a>
 						</li>
 						<li class="nav-item">
 							<a class="nav-link" href="#testimonial">Testimonial</a>
 						</li>
 						<li class="nav-item">
 							<a class="nav-link" href="http://localhost/e_class_php_project/WebSite/index.html">Logout</a>
 						</li>
 						<li class="nav-item">
 							<a class="nav-link btn btn-success" href="#contact"><?php  echo "Welcome ".$name;  ?></a>
 						</li>
 					</ul>
 				</div>
 			</div>
 		</nav>
 		<div class="page-body-wrapper">
 			<section id="home" class="home">
 				<div class="container">
 					<div class="row">
 						<div class="col-sm-12">
 							<div class="main-banner">
 								<div class="d-sm-flex justify-content-between">
 									<div data-aos="zoom-in-up">
 										<div class="banner-title">
 											<h3 class="font-weight-medium">We Help Power
 												Millions Of Businesses 
 												in 100+ Countries
 											</h3>
 										</div>
 										<p class="mt-3">Lorem Ipsum is simply dummy text of the printing and typesetting industry. 

 											<br>
 											Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,
 										</p>
 										<a href="#" class="btn btn-secondary mt-3">Learn more</a>
 									</div>
 									<div class="mt-5 mt-lg-0">
 										<img src="images/group.png" alt="marsmello" class="img-fluid" data-aos="zoom-in-up">
 									</div>
 								</div>
 							</div>
 						</div>
 					</div>
 				</div>
 			</section>
 			<section class="our-services" id="services">
 				<div class="container">
 					<div class="row">
 						<div class="col-sm-12">
 							<h5 class="text-dark">We’re offering</h5>
 							<h3 class="font-weight-medium text-dark mb-5">Creative Digital Agency</h3>
 						</div>
 					</div>
 					<div class="row" data-aos="fade-up">
 						<div class="col-sm-4 text-center text-lg-left">
 							<div class="services-box" data-aos="fade-down" data-aos-easing="linear" data-aos-duration="1500">
 								<img src="images/integrated-marketing.svg" alt="integrated-marketing" data-aos="zoom-in">
 								<h6 class="text-dark mb-3 mt-4 font-weight-medium">Integrated 
 									Marketing
 								</h6>
 								<p>Lorem ipsum dolor sit amet, 
 									pretium pretium tempor.Lorem ipsum 
 								</p>
 							</div>
 						</div>
 						<div class="col-sm-4 text-center text-lg-left">
 							<div class="services-box"   data-aos="fade-down" data-aos-easing="linear" data-aos-duration="1500">
 								<img src="images/design-development.svg" alt="design-development" data-aos="zoom-in">
 								<h6 class="text-dark mb-3 mt-4 font-weight-medium">Design & 
 									Development
 								</h6>
 								<p>Lorem ipsum dolor sit amet, 
 									pretium pretium tempor.Lorem ipsum 
 								</p>
 							</div>
 						</div>
 						<div class="col-sm-4 text-center text-lg-left">
 							<div class="services-box" data-aos="fade-down" data-aos-easing="linear" data-aos-duration="1500">
 								<img src="images/digital-strategy.svg" alt="digital-strategy" data-aos="zoom-in">
 								<h6 class="text-dark mb-3 mt-4 font-weight-medium">Digital 
 									Strategy
 								</h6>
 								<p>Lorem ipsum dolor sit amet, 
 									pretium pretium tempor.Lorem ipsum 
 								</p>
 							</div>
 						</div>
 					</div>
 					<div class="row" data-aos="fade-up">
 						<div class="col-sm-4 text-center text-lg-left">
 							<div class="services-box  pb-lg-0" data-aos="fade-down" data-aos-easing="linear" data-aos-duration="1500">
 								<img src="images/digital-marketing.svg" alt="digital-marketing" data-aos="zoom-in">
 								<h6 class="text-dark mb-3 mt-4 font-weight-medium">Digital 
 									Marketing
 								</h6>
 								<p>Lorem ipsum dolor sit amet, 
 									pretium pretium tempor.Lorem ipsum 
 								</p>
 							</div>
 						</div>
 						<div class="col-sm-4 text-center text-lg-left">
 							<div class="services-box pb-lg-0" data-aos="fade-down" data-aos-easing="linear" data-aos-duration="1500">
 								<img src="images/growth-strategy.svg" alt="growth-strategy" data-aos="zoom-in">
 								<h6 class="text-dark mb-3 mt-4 font-weight-medium">Growth 
 									Strategy
 								</h6>
 								<p>Lorem ipsum dolor sit amet, 
 									pretium pretium tempor.Lorem ipsum 
 								</p>
 							</div>
 						</div>
 						<div class="col-sm-4 text-center text-lg-left">
 							<div class="services-box pb-0" data-aos="fade-down" data-aos-easing="linear" data-aos-duration="1500">
 								<img src="images/saving-strategy.svg" alt="saving-strategy" data-aos="zoom-in">
 								<h6 class="text-dark mb-3 mt-4 font-weight-medium">Saving 
 									Strategy
 								</h6>
 								<p>Lorem ipsum dolor sit amet, 
 									pretium pretium tempor.Lorem ipsum 
 								</p>
 							</div>
 						</div>
 					</div>
 				</div>
 			</section>
 			<section class="our-process" id="about">
 				<div class="container">
 					<div class="row">
 						<div class="col-sm-6" data-aos="fade-up">
 							<h5 class="text-dark">Our work process</h5>
 							<h3 class="font-weight-medium text-dark">Discover New Idea With Us!</h3>
 							<h5 class="text-dark mb-3">Imagination will take us everywhere</h5>
 							<p class="font-weight-medium mb-4">Lorem ipsum dolor sit amet, <br> 
 								pretium pretium tempor.Lorem ipsum dolor sit amet, consectetur
 							</p>
 							<div class="d-flex justify-content-start mb-3">
 								<img src="images/tick.png" alt="tick" class="mr-3 tick-icon"  >
 								<p class="mb-0">Lorem ipsum dolor sit amet, pretium pretium</p>
 							</div>
 							<div class="d-flex justify-content-start mb-3">
 								<img src="images/tick.png" alt="tick" class="mr-3 tick-icon"  >
 								<p class="mb-0">Lorem ipsum dolor sit amet, pretium pretium</p>
 							</div>
 							<div class="d-flex justify-content-start">
 								<img src="images/tick.png" alt="tick" class="mr-3 tick-icon"  >
 								<p class="mb-0">Lorem ipsum dolor sit amet, pretium pretium</p>
 							</div>
 						</div>
 						<div class="col-sm-6 text-right" data-aos="flip-left" data-aos-easing="ease-out-cubic" data-aos-duration="2000">
 							<img src="images/idea.png" alt="idea" class="img-fluid">
 						</div>
 					</div>
 				</div>
 			</section>
 			<section class="our-projects" id="projects">
 				<div class="container">
 					<div class="row mb-5">
 						<div class="col-sm-12">
 							<div class="d-sm-flex justify-content-between align-items-center mb-2">
 								<h3 class="font-weight-medium text-dark ">Let's See Our Latest Project</h3>
 								<div><a href="#" class="btn btn-outline-primary">View more</a></div>
 							</div>
 						</div>
 					</div>
 				</div>
 				<div class="mb-5" data-aos="fade-up">
 					<div class="owl-carousel-projects owl-carousel owl-theme">
 						<div class="item">
 							<img src="images/carousel/slider1.jpg" alt="slider">
 						</div>
 						<div class="item">
 							<img src="images/carousel/slider2.jpg" alt="slider">
 						</div>
 						<div class="item">
 							<img src="images/carousel/slider3.jpg" alt="slider">
 						</div>
 						<div class="item">
 							<img src="images/carousel/slider4.jpg" alt="slider">
 						</div>
 						<div class="item">
 							<img src="images/carousel/slider5.jpg" alt="slider">
 						</div>
 						<div class="item">
 							<img src="images/carousel/slider1.jpg" alt="slider">
 						</div>
 						<div class="item">
 							<img src="images/carousel/slider2.jpg" alt="slider">
 						</div>
 						<div class="item">
 							<img src="images/carousel/slider3.jpg" alt="slider">
 						</div>
 						<div class="item">
 							<img src="images/carousel/slider4.jpg" alt="slider">
 						</div>
 						<div class="item">
 							<img src="images/carousel/slider5.jpg" alt="slider">
 						</div>
 						<div class="item">
 							<img src="images/carousel/slider1.jpg" alt="slider">
 						</div>
 						<div class="item">
 							<img src="images/carousel/slider2.jpg" alt="slider">
 						</div>
 						<div class="item">
 							<img src="images/carousel/slider3.jpg" alt="slider">
 						</div>
 						<div class="item">
 							<img src="images/carousel/slider4.jpg" alt="slider">
 						</div>
 						<div class="item">
 							<img src="images/carousel/slider5.jpg" alt="slider">
 						</div>
 					</div>
 				</div>
 				<div class="container">
 					<div class="row pt-5 mt-5 pb-5 mb-5">
 						<div class="col-sm-3">
 							<div class="d-flex py-3 my-3 my-lg-0 justify-content-center" data-aos="fade-down">
 								<img src="images/satisfied-client.svg" alt="satisfied-client" class="mr-3">
 								<div>
 									<h4 class="font-weight-bold text-dark mb-0"><span class="scVal">0</span>%</h4>
 									<h5 class="text-dark mb-0">Satisfied clients</h5>
 								</div>
 							</div>
 						</div>
 						<div class="col-sm-3">
 							<div class="d-flex py-3 my-3 my-lg-0 justify-content-center" data-aos="fade-up">
 								<img src="images/finished-project.svg" alt="satisfied-client" class="mr-3">
 								<div>
 									<h4 class="font-weight-bold text-dark mb-0"><span class="fpVal">0</span></h4>
 									<h5 class="text-dark mb-0">Finished Project</h5>
 								</div>
 							</div>
 						</div>
 						<div class="col-sm-3">
 							<div class="d-flex py-3 my-3 my-lg-0 justify-content-center" data-aos="fade-down">
 								<img src="images/team-members.svg" alt="Team Members" class="mr-3">
 								<div>
 									<h4 class="font-weight-bold text-dark mb-0"><span class="tMVal">0</span></h4>
 									<h5 class="text-dark mb-0">Team Members</h5>
 								</div>
 							</div>
 						</div>
 						<div class="col-sm-3">
 							<div class="d-flex py-3 my-3 my-lg-0 justify-content-center" data-aos="fade-up">
 								<img src="images/our-blog-posts.svg" alt="Our Blog Posts" class="mr-3">
 								<div>
 									<h4 class="font-weight-bold text-dark mb-0"><span class="bPVal">0</span></h4>
 									<h5 class="text-dark mb-0">Our Blog Posts</h5>
 								</div>
 							</div>
 						</div>
 					</div>
 				</div>
 			</section>
 			<section class="testimonial" id="testimonial">
 				<div class="container">
 					<div class="row  mt-md-0 mt-lg-4">
 						<div class="col-sm-6 text-white" data-aos="fade-up">
 							<p class="font-weight-bold mb-3">Testimonials</p>
 							<h3 class="font-weight-medium">Our customers are our <br>biggest fans</h3>
 							<ul class="flipster-custom-nav">
 								<li class="flipster-custom-nav-item">
 									<a href="javascript:;" class="flipster-custom-nav-link" title="0"></a>
 								</li>
 								<li class="flipster-custom-nav-item">
 									<a href="javascript:;" class="flipster-custom-nav-link"  title="1"></a>
 								</li>
 								<li class="flipster-custom-nav-item">
 									<a href="javascript:;" class="flipster-custom-nav-link active" title="2"></a>
 								</li>
 								<li class="flipster-custom-nav-item">
 									<a href="javascript:;" class="flipster-custom-nav-link"  title="3"></a>
 								</li>
 							</ul>
 						</div>
 						<div class="col-sm-6" data-aos="fade-up">
 							<div id="testimonial-flipster">
 								<ul>
 									<li>
 										<div class="testimonial-item">
 											<img src="images/testimonial/testimonial1.jpg" alt="icon" class="testimonial-icons">
 											<p>Lorem ipsum dolor sit amet, consectetur
 												pretium pretium tempor.Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut pretium
 											</p>
 											<h6 class="testimonial-author">Mark Spenser</h6>
 											<p class="testimonial-destination">Accounts</p>
 										</div>
 									</li>
 									<li>
 										<div class="testimonial-item">
 											<img src="images/testimonial/testimonial2.jpg" alt="icon" class="testimonial-icons">
 											<p>Lorem ipsum dolor sit amet, consectetur
 												pretium pretium tempor.Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut pretium
 											</p>
 											<h6 class="testimonial-author">Tua Manuera</h6>
 											<p class="testimonial-destination">Director,Dj market</p>
 										</div>
 									</li>
 									<li>
 										<div class="testimonial-item">
 											<img src="images/testimonial/testimonial3.jpg" alt="icon" class="testimonial-icons">
 											<p>Lorem ipsum dolor sit amet, consectetur
 												pretium pretium tempor.Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut pretium
 											</p>
 											<h6 class="testimonial-author">Sarah Philip</h6>
 											<p class="testimonial-destination">Chief Accountant</p>
 										</div>
 									</li>
 									<li>
 										<div class="testimonial-item">
 											<img src="images/testimonial/testimonial4.jpg" alt="icon" class="testimonial-icons">
 											<p>Lorem ipsum dolor sit amet, consectetur
 												pretium pretium tempor.Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut pretium
 											</p>
 											<h6 class="testimonial-author">Mark Spenser</h6>
 											<p class="testimonial-destination">Director,Dj market</p>
 										</div>
 									</li>
 								</ul>
 							</div>
 						</div>
 					</div>
 				</div>
 			</section>
 			<section class="clients pt-5 mt-5"  data-aos="fade-up" data-aos-offset="-400">
 				<div class="container">
 					<div class="row">
 						<div class="col-sm-12">
 							<div class="owl-carousel-projects owl-carousel owl-theme">
 								<div class="item">
 									<img src="images/carousel/slider1.jpg" alt="slider">
 								</div>
 								<div class="item">
 									<img src="images/carousel/slider2.jpg" alt="slider">
 								</div>
 								<div class="item">
 									<img src="images/carousel/slider3.jpg" alt="slider">
 								</div>
 								<div class="item">
 									<img src="images/carousel/slider4.jpg" alt="slider">
 								</div>
 								<div class="item">
 									<img src="images/carousel/slider5.jpg" alt="slider">
 								</div>
 								<div class="item">
 									<img src="images/carousel/slider1.jpg" alt="slider">
 								</div>
 								<div class="item">
 									<img src="images/carousel/slider2.jpg" alt="slider">
 								</div>
 								<div class="item">
 									<img src="images/carousel/slider3.jpg" alt="slider">
 								</div>
 								<div class="item">
 									<img src="images/carousel/slider4.jpg" alt="slider">
 								</div>
 								<div class="item">
 									<img src="images/carousel/slider5.jpg" alt="slider">
 								</div>
 								<div class="item">
 									<img src="images/carousel/slider1.jpg" alt="slider">
 								</div>
 								<div class="item">
 									<img src="images/carousel/slider2.jpg" alt="slider">
 								</div>
 								<div class="item">
 									<img src="images/carousel/slider3.jpg" alt="slider">
 								</div>
 								<div class="item">
 									<img src="images/carousel/slider4.jpg" alt="slider">
 								</div>
 								<div class="item">
 									<img src="images/carousel/slider5.jpg" alt="slider">
 								</div>
 							</div>
 							<div class="d-sm-flex justify-content-between align-items-center">
 								<img  id ="del1" src="images/deloit.svg" alt="deloit" class="p-2 p-lg-0"  data-aos="fade-down"  data-aos-offset="-400">
 								<img  id ="del2" src="images/erricson.svg" alt="erricson" class="p-2 p-lg-0" data-aos="fade-up"  data-aos-offset="-400">
 								<img  id ="del3" src="images/netflix.svg" alt="netflix" class="p-2 p-lg-0" data-aos="fade-down"  data-aos-offset="-400">
 								<img id ="del4" src="images/instagram.svg" alt="instagram" class="p-2 p-lg-0" data-aos="fade-up"  data-aos-offset="-400">
 								<img  id ="del5" src="images/coinbase.svg" alt="coinbase" class="p-2 p-lg-0" data-aos="fade-down"  data-aos-offset="-400">
 							</div>
 						</div>
 					</div>
 				</div>
 			</section>
 			<section class="pricing-list" id="plans">
 				<div class="container">
 					<div class="row" data-aos="fade-up" data-aos-offset="-500">
 						<div class="col-sm-12">
 							<div class="d-sm-flex justify-content-between align-items-center mb-2">
 								<div>
 									<h3 class="font-weight-medium text-dark ">Checkout Pricing Plan</h3>
 									<h5 class="text-dark ">Lorem ipsum dolor sit amet, consectetur pretium pretium tempor. Lorem ipsum dolor </h5>
 								</div>
 								<div class="mb-5 mb-lg-0 mt-3 mt-lg-0">
 									<div class="d-flex align-items-center">
 										<p class="mr-2 font-weight-medium monthly text-active check-box-label">Monthly</p>
 										<label class="toggle-switch toggle-switch">
 											<input type="checkbox" checked  id="toggle-switch">
 											<span class="toggle-slider round"></span>
 										</label>
 										<p class="ml-2 font-weight-medium yearly check-box-label">Yearly</p>
 									</div>
 								</div>
 							</div>
 						</div>
 					</div>
 					<div class="row"  data-aos="fade-up" data-aos-offset="-300">
 						<div class="col-sm-4">
 							<div class="pricing-box">
 								<img src="images/starter.svg" alt="starter">
 								<h6 class="font-weight-medium title-text">Starter Business</h6>
 								<h1 class="text-amount mb-4 mt-2">$23</h1>
 								<ul class="pricing-list">
 									<li>Create a free website</li>
 									<li>Connect Domain</li>
 									<li>Business and ecommerce</li>
 									<li>Idea for smaller professional websites</li>
 									<li>Web space</li>
 								</ul>
 								<a href="#" class="btn btn-outline-primary">Puchase Now</a>
 							</div>
 						</div>
 						<div class="col-sm-4">
 							<div class="pricing-box selected">
 								<img src="images/proffessional.svg" alt="starter">
 								<h6 class="font-weight-medium title-text">Professional</h6>
 								<h1 class="text-amount mb-4 mt-2">$45</h1>
 								<ul class="pricing-list">
 									<li>Create a free website</li>
 									<li>Connect Domain</li>
 									<li>Business and ecommerce</li>
 									<li>Idea for smaller professional websites</li>
 									<li>Web space</li>
 								</ul>
 								<a href="#" class="btn btn-primary">Puchase Now</a>
 							</div>
 						</div>
 						<div class="col-sm-4">
 							<div class="pricing-box">
 								<img src="images/premium.svg" alt="starter">
 								<h6 class="font-weight-medium title-text">Premium</h6>
 								<h1 class="text-amount mb-4 mt-2">$87</h1>
 								<ul class="pricing-list">
 									<li>Create a free website</li>
 									<li>Connect Domain</li>
 									<li>Business and ecommerce</li>
 									<li>Idea for smaller professional websites</li>
 									<li>Web space</li>
 								</ul>
 								<a href="#" class="btn btn-outline-primary">Puchase Now</a>
 							</div>
 						</div>
 					</div>
 				</div>
 			</section>
 			<section class="contactus" id="contact">
 				<div class="container">
 					<div class="row mb-5 pb-5">
 						<div class="col-sm-5" data-aos="fade-up" data-aos-offset="-500">
 							<img src="images/contact.jpg" alt="contact" class="img-fluid">
 						</div>
 						<div class="col-sm-7" data-aos="fade-up" data-aos-offset="-500">
 							<h3 class="font-weight-medium text-dark mt-5 mt-lg-0">Please fill the form below ..</h3>
 							<h5 class="text-dark mb-5">Our Team will get intouch with you.</h5>
 							<form action="mailsend.php" method="POST">
 								<div class="row">
 									<div class="col-sm-6">
 										<div class="form-group">
 											<input type="text" class="form-control" id="name"  name="nm" placeholder="Name*" value="<?php echo $name ?>">
 										</div>
 									</div>
 									<div class="col-sm-6">
 										<div class="form-group">
 											<input type="email" name="emaill" class="form-control" id="mail" placeholder="Email*" value="<?php echo $eml ?>">
 										</div>
 									</div>
 									<div class="col-sm-12">
 										<div class="form-group">
 											<textarea name="message" id="message" class="form-control" placeholder="Message*" rows="5"></textarea>
 										</div>
 									</div>
 									<div class="col-sm-12">
 										<input type="submit" value="send">
 									</div>
 								</div>
 							</form>
 						</div>
 					</div>
 				</div>
 			</section>
 		</div>
 		<footer class="footer">
 			<div class="footer-top">
 				<div class="container">
 					<div class="row">
 						<div class="col-sm-6">
 							<address>
 								<p>143 castle road 517</p>
 								<p class="mb-4">district, kiyev port south Canada</p>
 								<div class="d-flex align-items-center">
 									<p class="mr-4 mb-0">+3 123 456 789</p>
 									<a href="mailto:info@yourmail.com" class="footer-link">info@yourmail.com</a>
 								</div>
 								<div class="d-flex align-items-center">
 									<p class="mr-4 mb-0">+1 222 345 342</p>
 									<a href="mailto:Marshmallow@yourmail.com" class="footer-link">Marshmallow@yourmail.com</a>
 								</div>
 							</address>
 							<div class="social-icons">
 								<h6 class="footer-title font-weight-bold">
 									Social Share
 								</h6>
 								<div class="d-flex">
 									<a href="#"><i class="mdi mdi-github-circle"></i></a>
 									<a href="#"><i class="mdi mdi-facebook-box"></i></a>
 									<a href="#"><i class="mdi mdi-twitter"></i></a>
 									<a href="#"><i class="mdi mdi-dribbble"></i></a>
 								</div>
 							</div>
 						</div>
 						<div class="col-sm-6">
 							<div class="row">
 								<div class="col-sm-4">
 									<h6 class="footer-title">Social Share</h6>
 									<ul class="list-footer">
 										<li><a href="#" class="footer-link">Home</a></li>
 										<li><a href="#" class="footer-link">About</a></li>
 										<li><a href="#" class="footer-link">Services</a></li>
 										<li><a href="#" class="footer-link">Portfolio</a></li>
 										<li><a href="#" class="footer-link">Contact</a></li>
 									</ul>
 								</div>
 								<div class="col-sm-4">
 									<h6 class="footer-title">Product</h6>
 									<ul class="list-footer">
 										<li><a href="#" class="footer-link">Digital Marketing</a></li>
 										<li><a href="#" class="footer-link">Web Development</a></li>
 										<li><a href="#" class="footer-link">App Development</a></li>
 										<li><a href="#" class="footer-link">Design</a></li>
 									</ul>
 								</div>
 								<div class="col-sm-4">
 									<h6 class="footer-title">Company</h6>
 									<ul class="list-footer">
 										<li><a href="#" class="footer-link">Partners</a></li>
 										<li><a href="#" class="footer-link">Investors</a></li>
 										<li><a href="#" class="footer-link">Partners</a></li>
 										<li><a href="#" class="footer-link">FAQ</a></li>
 									</ul>
 								</div>
 							</div>
 						</div>
 					</div>
 				</div>
 			</div>
 			<div class="footer-bottom">
 				<div class="container">
 					<div class="d-flex justify-content-between align-items-center">
 						<div class="d-flex align-items-center">
 							<img src="images/logo.svg" alt="logo" class="mr-3">
 							<p class="mb-0 text-small pt-1">© 2019-2020 <a href="https://www.bootstrapdash.com" class="text-white" target="_blank">BootstrapDash</a>. All rights reserved.</p>
 						</div>
 						<div>
 							<div class="d-flex">
 								<a href="#" class="text-small text-white mx-2 footer-link">Privacy Policy </a>          
 								<a href="#" class="text-small text-white mx-2 footer-link">Customer Support </a>
 								<a href="#" class="text-small text-white mx-2 footer-link">Careers </a>
 							</div>
 						</div>
 					</div>
 				</div>
 			</div>
 		</footer>
 		<script src="vendors/base/vendor.bundle.base.js"></script>
 		<script src="vendors/owl.carousel/js/owl.carousel.js"></script>
 		<script src="vendors/aos/js/aos.js"></script>
 		<script src="vendors/jquery-flipster/js/jquery.flipster.min.js"></script>
 		<script src="js/template.js"></script>
 	</body>
 	</html>