<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>تنظیمات  </title>
<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>Assets/bootstrap/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>Assets/bootstrap/css/bootstrap-rtl.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>Assets/css/css.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>Assets/css/responsive.css">
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
                    	<li><i class='fa fa-plus'></i><p> تنظیمات - ویرایش گذرواژه
                            </p></li>
                        <li style="color: #97310e">
                            <?php
                            if(isset($result_change_pass)){
                                echo '<p>'.$result_change_pass.'</p>';
                            }
                            ?>
                        </li>
                        <li id="shortcut_toggle"><i class='fa fa-angle-double-down'></i></li>
                    </ul>	
                </div>
                <div class="body">
					<div class="col-lg-6 col-md-5 col-sm-4 col-xs-12 left">
                    	<div class="box_info">
                        	<div class="top">
                            	<i class='fa fa-info-circle'></i> راهنمای فرم
                            </div>
                            <div class="body">
                            	<ul>
                                	<li><i class='fa fa-info'></i> لطفا مشخصات مخاطب را به طور کامل وارد کنید </li>
                                    <li><i class='fa fa-info'></i> لطفا در وارد کردن ایمیل مخاطب دقت فرمایید </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <?php
                        $fname=$this->session->userdata('admin_session_fname');
                        $lname=$this->session->userdata('admin_session_lname');
                        $email=$this->session->userdata('admin_session_email');
                        $pic=$this->session->userdata('admin_session_pic');
                        echo form_open_multipart('Setting/Change_Pass');
                    ?>
                    <div class="col-lg-6 col-md-7 col-sm-8 col-xs-12 right">
                        <div id="result_box">
                            <div class="result"><p></p></div>
                        </div>
                    <div class="form_row">
                        <label> ایمیل : <?php echo form_error('admin_email') ?></label>
                        <input type="text" name="admin_email" id="tell1" value="<?=$email?>">
                    </div>
                    <div class="form_row">
                        <label>  گذرواژه فعلی : <?php echo form_error('current_pass') ?></label>
                        <input type="text" name="current_pass" id="tell2">
                    </div>
                    <div class="form_row">
                        <label>  گذرواژه جدید : <?php echo form_error('admin_pass') ?></label>
                        <input type="text" name="admin_pass" id="mob2" >
                    </div>
                    <div class="form_row">
                        <label> تکرار گذرواژه جدید  : <?php echo form_error('admin_pass_retype') ?> </label>
                        <input type="text" name="admin_pass_retype" id="fax">
                    </div>
                    <div class="form_row">
						<input type="submit" value="ویرایش ">
                    </div>
                        <?php
                        echo form_close();
                        ?>
                    </div>
                </div>
            </div>
            <div class="main-form" style="margin-top: -30px">
                <div class="top">
                    <ul>
                        <li><i class='fa fa-plus'></i><p> تنظیمات - ویرایش اطلاعات شخصی
                            </p></li>
                        <li>
                            <?php
                            if(isset($register_result)){
                                echo '<p>'.$register_result.'</p>';
                            }
                            ?>
                        </li>
                        <li id="shortcut_toggle_2"><i class='fa fa-angle-double-down'></i></li>
                    </ul>
                </div>
                <div class="body" id="body2">
                    <?php
                    echo form_open_multipart('Setting/Change_Profile');
                    ?>
                    <div class="col-lg-6 col-md-7 col-sm-8 col-xs-12 right">
                        <div id="result_box">
                            <div class="result"><p></p></div>
                        </div>
                        <div class="form_row">
                            <label> نام  : <?php echo form_error('admin_fame');?></label>
                            <input type="text" name="admin_fame" id="name" value="<?=$fname?>">
                        </div>
                        <div class="form_row">
                            <label> فامیلی  : <?php echo form_error('admin_lname') ?></label>
                            <input type="text" name="admin_lname" id="family" value="<?=$lname?>">
                        </div>
                        <div class="form_row">
                            <label> تصویر  : </label>
                            <input type="file" name="pic">
                            <img style="width: 100px ; height: 100px; border: 1px dashed #0f0f0f; margin-top: 20px;" src="<?php echo base_url().'Admin_Pic/'.$pic ?>">
                        </div>
                        <div class="form_row">
                            <input type="submit" value="ویرایش ">
                        </div>
                        <?php
                        echo form_close();
                        ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
        	<div class="col-lg-12 bottom navbar-fixed-bottom">
                <p>     تمام حقوق برای آژانس هواپیمایی محفوظ است </p>
            </div>
        </div>
    </div>
</div>
<script src="<?php echo base_url() ?>Assets/bootstrap/js/jquery-1.12.3.min.js"></script>
<script src="<?php echo base_url() ?>Assets/bootstrap/js/bootstrap.min.js"></script>
<script src="<?php echo base_url() ?>Assets/js/jquery.slimscroll.js"></script>
<script src="<?php echo base_url() ?>Assets/js/js.js"></script>
<script src="<?php echo base_url() ?>Connector/Send/Contact/index.js"></script>
</body>
</html>
