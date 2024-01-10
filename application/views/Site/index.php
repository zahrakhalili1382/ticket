<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title> صفحه اصلی </title>
<!--
Holiday Template
http://www.templatemo.com/tm-475-holiday
-->
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
	<!-- Banner -->
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

    <?php
    $this->load->view('Layout/searchTab');
    ?>
			<div class="col-lg-4 col-md-4 col-sm-6">
				<div class="tm-home-box-1 tm-home-box-1-2 tm-home-box-1-center">
					<img src="<?php echo base_url()?>Assets/Site/img/2426769.jpg" alt="image" class="img-responsive">
					<a href="<?php echo base_url() ?>Site/Mashhad">
						<div class="tm-green-gradient-bg tm-city-price-container">
							<span> پرواژه های مشهد</span>
							<span>مشاهده</span>
						</div>	
					</a>			
				</div>				
			</div>
			<div class="col-lg-4 col-md-4 col-sm-6">
				<div class="tm-home-box-1 tm-home-box-1-2 tm-home-box-1-right">
					<img src="<?php echo base_url()?>Assets/Site/img/Marina(1).jpg" alt="image" class="img-responsive">
                    <a href="<?php echo base_url() ?>Site/Kish">
						<div class="tm-red-gradient-bg tm-city-price-container">
							<span>پرواژه های کیش </span>
							<span>مشاهده</span>
						</div>	
					</a>					
				</div>				
			</div>
		</div>
	
		<div class="section-margin-top">
			<div class="row">				
				<div class="tm-section-header">
					<div class="col-lg-3 col-md-3 col-sm-3"><hr></div>
					<div class="col-lg-6 col-md-6 col-sm-6"><h2 class="tm-section-title">پروازهای داخلی</h2></div>
					<div class="col-lg-3 col-md-3 col-sm-3"><hr></div>	
				</div>
			</div>
			<div class="row" style="direction: rtl">
                <?php
                $CI=&get_instance();
                if(isset($fetch_data)){
                    foreach ($fetch_data->result() as $row){
                        echo form_open('Site/Reserve/'.$row->parvaz_id);
                        echo'
                            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-6 col-xxs-12" dir="rtl">
                                <div class="tm-home-box-2">						
                                    <img src="'.base_url().'uploads/'.$data1=$CI->get_airline_image($row->parvaz_airline).'" alt="'.$data1=$CI->get_airline_image($row->parvaz_airline).'" class="img-responsive">
                                    <div class="info">
                                        <ul>
                                            <li> <i class="fa fa-map-marker"></i><p>'.$row->parvaz_mabda.'</p></li>
                                            <li> <i class="fa fa-plane"></i><p>'.$row->parvaz_maghsad.'</p></li>
                                            <li> <i class="fa fa-calendar-check-o"></i><p>
                                            '.$data=$CI->explode_date($row->parvaz_date).'
                                            </p></li>
                                            <li> <i class="fa fa-clock-o"></i><p>'.$row->parvaz_time.'</p></li>
                                            <li> <i class="fa fa-euro"></i><p>'.number_format($row->parvaz_gheymat).' ريال</p></li>
                                            <li> <i class="fa fa-road"></i><p>هواپیمایی '.$data=$CI->explode_airline($row->parvaz_airline).'</p></li>
                                        </ul>
                                    </div>
                                    <div class="tm-home-box-2-container">
                                        <input type="submit" value="رزرو">
                                    </div>
                                </div>
                            </div>
                            ';
                        echo form_close();
                    }
                }

                ?>


				<div class="pagination">
                    <?php
                    echo $pagination;
                    ?>
				</div>
		</div>
        </div>
	</section>
	<!-- white bg -->
	<footer class="tm-black-bg">
		<div class="container">
			<div class="row">
				<p class="tm-copyright-text">Copyright &copy; 2084 airlineSite 
                
                | Designed by php-programming.ir</p>
			</div>
		</div>		
	</footer>
	<script type="text/javascript" src="<?php echo base_url()?>Assets/Site/js/jquery-1.11.2.min.js"></script>      		<!-- jQuery -->
  	<script type="text/javascript" src="<?php echo base_url()?>Assets/Site/js/moment.js"></script>							<!-- moment.js -->
	<script type="text/javascript" src="<?php echo base_url()?>Assets/Site/js/bootstrap.min.js"></script>					<!-- bootstrap js -->
	<script type="text/javascript" src="<?php echo base_url()?>Assets/Site/js/bootstrap-datetimepicker.min.js"></script>	<!-- bootstrap date time picker js, http://eonasdan.github.io/bootstrap-datetimepicker/ -->
	<script type="text/javascript" src="<?php echo base_url()?>Assets/Site/js/jquery.flexslider-min.js"></script>
<!--
	<script src="js/froogaloop.js"></script>
	<script src="js/jquery.fitvid.js"></script>
-->
   	<script type="text/javascript" src="<?php echo base_url()?>Assets/Site/js/templatemo-script.js"></script>      		<!-- Templatemo Script -->
	<script>
		// HTML document is loaded. DOM is ready.
		$(function() {

			$('#hotelCarTabs a').click(function (e) {
			  e.preventDefault()
			  $(this).tab('show')
			})
        });

		// Load Flexslider when everything is loaded.
		$(window).load(function() {
			// Vimeo API nonsense

/*
			  var player = document.getElementById('player_1');
			  $f(player).addEvent('ready', ready);

			  function addEvent(element, eventName, callback) {
			    if (element.addEventListener) {
			      element.addEventListener(eventName, callback, false)
			    } else {
			      element.attachEvent(eventName, callback, false);
			    }
			  }

			  function ready(player_id) {
			    var froogaloop = $f(player_id);
			    froogaloop.addEvent('play', function(data) {
			      $('.flexslider').flexslider("pause");
			    });
			    froogaloop.addEvent('pause', function(data) {
			      $('.flexslider').flexslider("play");
			    });
			  }
*/



			  // Call fitVid before FlexSlider initializes, so the proper initial height can be retrieved.
/*

			  $(".flexslider")
			    .fitVids()
			    .flexslider({
			      animation: "slide",
			      useCSS: false,
			      animationLoop: false,
			      smoothHeight: true,
			      controlNav: false,
			      before: function(slider){
			        $f(player).api('pause');
			      }
			  });
*/




//	For images only
		    $('.flexslider').flexslider({
			    controlNav: false
		    });


	  	});
	</script>


<!--datepicker start-->
<link rel="stylesheet" href="<?php echo base_url()?>Assets/Site/datepicker/persian.css"/>
  <script src="<?php echo base_url()?>Assets/Site/datepicker/persian-date.js"></script>
  <script src="<?php echo base_url()?>Assets/Site/datepicker/persian-datepicker.js"></script>
	<script type="text/javascript">
  $(document).ready(function() {
    $(".example1").pDatepicker();
  });
</script>
<!--datepicker end-->
 </body>
 </html>