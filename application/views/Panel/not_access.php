<?php
session_start();
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title> خطای دسترسی </title>
<link rel="stylesheet" type="text/css" href="../Assets/bootstrap/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="../Assets/bootstrap/css/bootstrap-rtl.css">
<link rel="stylesheet" type="text/css" href="../Assets/css/css.css">
<link rel="stylesheet" type="text/css" href="../Assets/css/responsive.css">
<link rel="stylesheet" type="text/css" href="../Assets/font-awesome-4.7.0/css/font-awesome.min.css">
</head>
<body>
<div class="container">
	<div class="row">
    <?php include ("../function/header.php");?>
        <div class="row">
        	<div class="main-form">
            	<div class="top">
                	<ul>
                    	<li><i class='fa fa-crosshairs'></i><p> خطای دسترسی </p></li>
                        <li id="shortcut_toggle"><i class='fa fa-angle-double-down'></i></li>
                    </ul>	
                </div>
                <div class="body">
					<div class="box_not_access">
                    	<p> شما مجوز دسترسی به این صفحه رو ندارید ! &nbsp;&nbsp;&nbsp;<a href="index.php"> بازگشت به صفحه اصلی </a></p>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
        	<div class="bottom navbar-fixed-bottom">
            	<p> اسکریپت دفترچه تلفن نسخه 1.0.0 / تمام حقوق برای php-programming.ir محفوظ است </p>
            </div>
        </div>
    </div>
</div>
<script src="../Assets/bootstrap/js/jquery-1.12.3.min.js"></script>
<script src="../Assets/bootstrap/js/bootstrap.min.js"></script>
<script src="../Assets/js/js.js"></script>
</body>
</html>