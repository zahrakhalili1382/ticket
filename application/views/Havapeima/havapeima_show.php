<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>مشاهده هواپیما ها </title>
<link rel="stylesheet" type="text/css" href="../Assets/bootstrap/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="../Assets/bootstrap/css/bootstrap-rtl.css">
<link rel="stylesheet" type="text/css" href="../Assets/css/css.css">
<link rel="stylesheet" type="text/css" href="../Assets/css/responsive.css">
<link rel="stylesheet" type="text/css" href="../Assets/font-awesome-4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="../Assets/css/jquery.dataTables.css">
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
                    	<li><i class='fa fa-users'></i><p> نمایش هواپیما ها </p></li>
                        <li>
                            <?php
                            if(isset($action_result)){
                                echo '<p>'.$action_result.'</p>';
                            }
                            ?>
                        </li>
                        <li id="shortcut_toggle"><i class='fa fa-angle-double-down'></i></li>
                    </ul>	
                </div>
                <div class="body show_table" style="background-color:rgba(235,235,235,1.00)">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 right" style="border:1px solid rgba(49,128,138,0.1); border-radius:3px; margin-bottom:40px; background-color:rgba(235,235,235,1.00)">
                    <div class="result"><p></p></div>
	<table cellpadding="0" cellspacing="0" border="0" class="display table table-striped table-responsive table-hover table-bordered" id="example" width="100%">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>نام </th>
                                            <th>نام شرکت هواپیمایی </th>
                                            <th>کد هواپیما </th>
                                            <th> عملیات </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    $CI=&get_instance();
                                    $data=$CI->Get_All_Havapeima();
                                    ?>
                                    <?php
                                    $i=0;
                                    foreach ($data['get_all']->result() as $row){
                                        $i++;
                                        echo '
                                          <tr class="odd gradeX">
                                              <td> '.$i.' </td>
                                              <td> '.$row->havapeima_name.' </td>
                                              <td> '.$row->havapeima_airlineName.' </td>
                                              <td> '.$row->havapeima_Code.' </td>
                                               <td id="action_data">
                                                   <a href="#" data-action="delete" data-code="'.$row->havapeima_id.'" >  <i class="fa fa-trash"></i> </a>
                                                   <a href="#" data-action="edit" data-code="'.$row->havapeima_id.'" > <i class="fa fa-edit"></i> </a>
                                               </td>
                                          </tr>
                                        ';
                                    }
                                    ?>
                                    </tbody>
                                </table>
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
<script src="<?php echo base_url() ?>Assets/js/jquery.dataTables.js"></script>
<script src="<?php echo base_url() ?>Assets/Ajax/havapeima/index.js"></script>
<script type="text/javascript" charset="utf-8">
    $(document).ready(function() {
        $('#example').dataTable();
    } );
</script>
</body>
</html>
