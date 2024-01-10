<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title> سیستم مدیریت بلیط </title>
<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>Assets/bootstrap/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>Assets/bootstrap/css/bootstrap-rtl.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>Assets/css/css.css">
<link rel="stylesheet" type="text/css" href=".<?php echo base_url() ?>Assets/css/responsive.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>Assets/font-awesome-4.7.0/css/font-awesome.min.css">
</head>
<body>
<div class="container">
	<div class="row">
        <?php
        $this->load->view('Layout/header');
        ?>
        <div class="row">
        	<div class="main-form">
            	<div class="top">
                	<ul>
                    	<li><i class='fa fa-crosshairs'></i><p> پنل اصلی  </p></li>
                        <li id="shortcut_toggle"><i class='fa fa-angle-double-down'></i></li>
                    </ul>	
                </div>
                <div class="body">
                      	<ul>
						<li>
                            <div class="box">
                            	<div class="top_shortcut">
                                	<ul>
                                    	<li><a href="<?php echo base_url()?>Airline/Show_Airlines" target="_blank"><i class='fa fa-eye'></i></a></li>
                                        <li><a href="<?php echo base_url()?>Airline/Register_Form" target="_blank"><i class='fa fa-plus-square'></i></a></li>
                                        <li><p>  شرکت هواپیمایی </p></li>
                                    </ul>
                                </div>
                                <div class="icon">
                                	<img src="<?php echo base_url() ?>Assets/image/default_logo.png">
                                </div>
                            </div>
                        </li>
						<li>
                            <div class="box">
                            	<div class="top_shortcut">
                                	<ul>
                                    	<li><a href="<?php echo base_url()?>Havapeima/Show_Havapeima" target="_blank"><i class='fa fa-eye'></i></a></li>
                                        <li><a href="<?php echo base_url()?>Havapeima/Register_Form" target="_blank"><i class='fa fa-plus-square'></i></a></li>
                                        <li><p> هواپیماها  </p></li>
                                    </ul>
                                </div>
                                <div class="icon">
                                	<img src="<?php echo base_url() ?>Assets/image/Aircraft_PNG_Vector_Clipart.png">
                                </div>
                            </div>
                        </li>
						<li>
                            <div class="box">
                            	<div class="top_shortcut">
                                	<ul>
                                    	<li><a href="<?php echo base_url()?>Parvaz/Show_Parvaz" target="_blank"><i class='fa fa-eye'></i></a></li>
                                        <li><a href="<?php echo base_url()?>Parvaz/Register_Form" target="_blank"><i class='fa fa-plus-square'></i></a></li>
                                        <li><p>  پروازها </p></li>
                                    </ul>
                                </div>
                                <div class="icon">
                                	<img src="<?php echo base_url() ?>Assets/image/4c58fcdb.png">
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="box">
                            	<div class="top_shortcut">
                                	<ul>
                                    	<li><a href="<?php echo base_url()?>Reserve/Show_Reserves" target="_blank"><i class='fa fa-eye'></i></a></li>
                                        <li><p> رزروها  </p></li>
                                    </ul>
                                </div>
                                <div class="icon">
                                	<img src="<?php echo base_url() ?>Assets/image/cheap-flight-ticket.png">
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="row">
        	<div class="bottom navbar-fixed-bottom">
            	<p>     تمام حقوق برای آژانس هواپیمایی محفوظ است </p>
            </div>
        </div>
    </div>
</div>
<script src="<?php echo base_url() ?>Assets/bootstrap/js/jquery-1.12.3.min.js"></script>
<script src="<?php echo base_url() ?>Assets/bootstrap/js/bootstrap.min.js"></script>
<script src="<?php echo base_url() ?>Assets/js/js.js"></script>
</body>
</html>
