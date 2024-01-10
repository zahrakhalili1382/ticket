<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>ویرایش شرکت هواپیمایی  </title>
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
                    	<li><i class='fa fa-plus'></i><p> ویرایش شرکت هواپیمایی
                            </p></li>
                        <li>
                            <?php
                            if(isset($register_result)){
                                echo '<p>'.$register_result.'</p>';
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
                                    <li><i class='fa fa-info'></i> فیلد های ستاره دار (*) باید پر شوند  </li>
                                    <li><i class='fa fa-info'></i> شماره تماس 2 ، شماره موبایل 2 ، فکس ، ایمیل ، گروه ، تصویر می تواند خالی باشد </li>
                                    <li><i class='fa fa-info'></i> موقع وارد کردن شماره موبایل ۱ و ۲ صفحه کلید در حالت EN باشد  </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <?php
                    $CI=&get_instance();
                    $data=$CI->Get_All_Airlines();

                    if(isset($data_result)){
                        foreach ($data_result->result() as $row){
                            $data['havapeima_name']=$row->havapeima_name;
                            $data['havapeima_airlineName']=$row->havapeima_airlineName;
                            $data['havapeima_airlineCode']=$row->havapeima_airlineCode;
                            $data['havapeima_Code']=$row->havapeima_Code;
                        }
                    }
                        echo form_open('Havapeima/Update');
                    ?>
                    <div class="col-lg-6 col-md-7 col-sm-8 col-xs-12 right">
                        <div id="result_box">
                            <div class="result"><p></p></div>
                        </div>
                        <div class="form_row">
                            <label> نام هواپیما : <?php echo form_error('havapeima_name');?></label>
                            <input type="text" name="havapeima_name" value="<?=$data['havapeima_name']?>">
                        </div>
                        <div class="form_row">
                            <label> نام شرکت هواپیمایی  : </label>
                            <select name="havapeima_airlineName" id="havapeima_airlineName">
                                <?php
                                foreach ($data['get_all']->result() as $row) {
                                    echo'
                                        <option value="'.$row->airline_name."/".$row->airline_sherkatCode.'">'.$row->airline_name.'</option>
                                        ';
                                }
                                ?>
                            </select>
                        </div>
                        <div class="form_row">
                            <label> کد هواپیما  : <?php echo form_error('havapeima_Code') ?></label>
                            <input type="text" name="havapeima_Code" value="<?=$data['havapeima_Code']?>">
                        </div>
                    <div class="form_row">
						<input type="submit" value="ویرایش هواپیما">
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
<script>
    $(document).ready(function(e) {
        $("#havapeima_airlineName").val(<?php echo $data['havapeima_airlineName'].'/'.$data['havapeima_airlineCode'] ?>);
    });
</script>

</body>
</html>
