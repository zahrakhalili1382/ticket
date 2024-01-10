<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Holiday - About</title>
  <link href="<?php echo base_url()?>Assets/Site/css/font-awesome.min.css" rel="stylesheet">
  <link href="<?php echo base_url()?>Assets/Site/css/bootstrap.min.css" rel="stylesheet">
  <link href="<?php echo base_url()?>Assets/Site/css/bootstrap-datetimepicker.min.css" rel="stylesheet">
  <link href="<?php echo base_url()?>Assets/Site/css/flexslider.css" rel="stylesheet">
  <link href="<?php echo base_url()?>Assets/Site/css/templatemo-style.css" rel="stylesheet">
  </head>
  <body class="tm-gray-bg">
  	<!-- Header -->
  	<div class="tm-header">
  		<div class="container">
  			<div class="row">
  				<div class="col-lg-6 col-md-4 col-sm-3 tm-site-name-container">
                    <a href="<?php echo base_url().'Site/index' ?>" class="tm-site-name">  آرتور رزرواسیون</a>
  				</div>
	  			<div class="col-lg-6 col-md-8 col-sm-9">
	  				<div class="mobile-menu-icon">
		              <i class="fa fa-bars"></i>
		            </div>
                    <nav class="tm-nav">
                        <ul>
                            <li><a href="<?php echo base_url().'Site/index' ?>" class="active">صفحه اصلی</a></li>
                            <li><a href="<?php echo base_url().'Site/aboutus' ?>">درباره ما</a></li>
                            <li><a href="<?php echo base_url().'Site/contactus' ?>">تماس با ما</a></li>
                        </ul>
                    </nav>
                </div>
  			</div>
  		</div>	  	
  	</div>

    <section class="tm-banner">
        <!-- Flexslider -->
        <div class="flexslider flexslider-banner">
            <ul class="slides">
                <li>
                    <div class="tm-banner-inner">
                        <h1 class="tm-banner-title">لذت <span class="tm-yellow-text">رزرو بلیط</span> با ما را تجربه کنید</h1>
                        <p class="tm-banner-subtitle"> سایت رزرو بلیط ارتور </p>
                    </div>
                    <img src="<?php echo base_url()?>Assets/Site/img/new-hero-image.3f3e887.jpg" alt="Image" />
                </li>
            </ul>
        </div>
    </section>

<div class="" style="margin: 20px 0px; direction: rtl; padding: 20px 30px; ">
    <p>
        تاریخچه ارتور رزرواسیون
        اگرچه تاریخچه پروازهای بازرگانی در ایران به سال‏های 1320و 30 خورشیدی باز می گردد اما در 5 اسفند سال 1340 بود که برای نخستین بار یک شرکت هواپیمایی بازرگانی ملی تاسیس گشت . این شرکت با نام بین المللی IRAN AIR و عنوان هواپیمایی ملی ایران با نام اختصاری "هما" امکانات سایر شرکت‏های خصوصی که تا پیش از آن تاریخ در ایران فعالیت می کردند را در اختیار گرفت و بدینسان تاریخ پر فراز و نشیب هما که تا امروز بیش از نیم قرن است ادامه دارد رقم خورد.نشان آشنای «مرغ هما» که برگرفته از سازه موجود از این پرنده افسانه ای در تخت جمشید باستانی بود را جوانی به نام «ادوارد زهرابیان» در سال 1341 طراحی نمود که از آن زمان تاکنون یکی از زیباترین نشانه‏های طراحی شده و از برترین برندهای بین المللی به شمار می رود.
        "هما" پروازهای خود را با بهره‌گیری از هواپیماهای داگلاس دی سی ۳، دی سی ۶، ویکرز و آورویورک آغاز نمود و در سال 1964 به عضویت کامل یاتا در آمد.

        پیش از پیروزی انقلاب اسلامی
        پس از پیروزی انقلاب اسلامی
        تاریخچه نشان هما
    </p>
</div>
	<footer class="tm-black-bg">
		<div class="container">
            <div class="row">
                <p class="tm-copyright-text">Copyright &copy; 2084 airlineSite

                    | Designed by php-programming.ir</p>
            </div>
		</div>		
	</footer>
	<script type="text/javascript" src="<?php echo base_url()?>Assets/Site/js/jquery-1.11.2.min.js"></script>      		<!-- jQuery -->
  	<script type="text/javascript" src="<?php echo base_url()?>Assets/Site/js/bootstrap.min.js"></script>					<!-- bootstrap js -->
  	<script type="text/javascript" src="<?php echo base_url()?>Assets/Site/js/jquery.flexslider-min.js"></script>			<!-- flexslider js -->
  	<script type="text/javascript" src="<?php echo base_url()?>Assets/Site/js/templatemo-script.js"></script>      		<!-- Templatemo Script -->
	<script>
		$(function() {

			// https://css-tricks.com/snippets/jquery/smooth-scrolling/
		  	$('a[href*=#]:not([href=#])').click(function() {
			    if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
			      var target = $(this.hash);
			      target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
			      if (target.length) {
			        $('html,body').animate({
			          scrollTop: target.offset().top
			        }, 1000);
			        return false;
			      }
			    }
		  	});
		});
		$(window).load(function(){
			// Flexsliders
		  	$('.flexslider.flexslider-banner').flexslider({
			    controlNav: false
		    });
		  	$('.flexslider').flexslider({
		    	animation: "slide",
		    	directionNav: false,
		    	slideshow: false
		  	});
		});
	</script>
 </body>
 </html>
