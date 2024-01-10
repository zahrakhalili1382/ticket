<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>ثبت پرواز  </title>
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
                    	<li><i class='fa fa-plus'></i><p> ثبت پرواز

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
                    echo form_open_multipart('Parvaz/Register');
                    ?>
                    <div class="col-lg-6 col-md-7 col-sm-8 col-xs-12 right">
                        <div id="result_box">
                            <div class="result"><p></p></div>
                        </div>
                    <div class="form_row">
                        <label> مبداء : </label>
                        <select name="parvaz_mabda">
                            <option value="تهران"> تهران</option>
                            <option value="تبریز"> تبریز</option>
                            <option value="شیراز"> شیراز</option>
                            <option value="قم"> قم</option>
                            <option value="مشهد"> مشهد</option>
                            <option value="اصفهان"> اصفهان</option>
                            <option value="ارومیه"> ارومیه</option>
                            <option value="کیش"> کیش</option>
                            <option value="اردبیل"> اردبیل</option>
                            <option value="گلستان"> گلستان</option>
                            <option value="مازندران"> مازندران</option>
                            <option value="گیلان"> گیلان</option>
                            <option value="سیستان و بلوچستان"> سیستان و بلوچستان</option>
                            <option value="دزفول"> دزفول</option>
                            <option value="زاهدان"> زاهدان</option>
                            <option value="کرمانشاه"> کرمانشاه</option>
                        </select>
                    </div>
                    <div class="form_row">
                        <label> مقصد  : </label>
                        <select name="parvaz_maghsad">
                            <option value="تهران"> تهران</option>
                            <option value="تبریز"> تبریز</option>
                            <option value="شیراز"> شیراز</option>
                            <option value="قم"> قم</option>
                            <option value="مشهد"> مشهد</option>
                            <option value="اصفهان"> اصفهان</option>
                            <option value="ارومیه"> ارومیه</option>
                            <option value="کیش"> کیش</option>
                            <option value="اردبیل"> اردبیل</option>
                            <option value="گلستان"> گلستان</option>
                            <option value="مازندران"> مازندران</option>
                            <option value="گیلان"> گیلان</option>
                            <option value="سیستان و بلوچستان"> سیستان و بلوچستان</option>
                            <option value="دزفول"> دزفول</option>
                            <option value="زاهدان"> زاهدان</option>
                            <option value="کرمانشاه"> کرمانشاه</option>
                        </select>                    </div>
                    <div class="form_row">
                        <label> ظرفیت  : <?php echo form_error('parvaz_zarfiyat') ?></label>
                        <input type="text" name="parvaz_zarfiyat" id="tell1">
                    </div>
                    <div class="form_row">
                        <label>  قیمت هر نفر : <?php echo form_error('parvaz_gheymat')?></label>
                        <input type="text" name="parvaz_gheymat" id="tell2" placeholder="2.900.000R">
                    </div>
                    <div class="form_row">
                        <label>  تاریخ پرواز : <?php echo form_error('parvaz_date') ?></label>
                        <input type="text" name="parvaz_date" id="mob2" placeholder="1397/4/20">
                    </div>
                    <div class="form_row">
                        <label> ساعت پرواز  : <?php echo form_error('parvaz_time') ?></label>
                        <input type="text" name="parvaz_time" id="fax" placeholder="19:30">
                    </div>
                        <div class="form_row">
                            <label> شرکت هواپیمایی  : </label>
                            <select name="parvaz_airline">
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
						<input type="submit" value="ثبت پرواز ">
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
</body>
</html>
