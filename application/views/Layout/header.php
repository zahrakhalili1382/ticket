<div class="row">
    <div class="top">
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 right">
            <ul>
                <li><img style="width: 50px;height:50px;border-radius: 50%" src="<?php echo base_url().'Admin_Pic/'.$this->session->userdata('admin_session_pic') ?>"></li>
                <li id="clock1"> </li>
                <li> <div class="box_info"><p> سلام <?php echo $this->admin_fname; ?> خوش آمدی</p></div></li>
            </ul>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 left">
            <ul>
                <li class="power_off"><a href="<?php echo base_url()?>Home" target=""><i class='fa fa-home rotate'></i></a> </li>
                <li class="power_off"><a href="<?php echo base_url()?>Login/LogOut" target="_blank"><i class='fa fa-power-off rotate'></i></a> </li>
                <li class="setting"><a href="<?php echo base_url()?>Setting" target="_blank"><i class='fa fa-cog rotate'></i></a></li>
                <li class="setting"><a href="<?php echo base_url()?>Site/Show_Contact" target="_blank"><i class='fa fa-envelope rotate'></i></a></li>
                <li class="setting"><a href="<?php echo base_url()?>Site" target="_blank"><i class='fa fa-globe rotate'></i></a></li>
            </ul>
        </div>
    </div>
</div>