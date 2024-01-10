<?php
/**
 * Created by PhpStorm.
 * User: lenovo
 * Date: 23/06/2018
 * Time: 03:56 AM
 */
class MY_Controller extends CI_Controller{
    public $admin_mail,$admin_fname;
    function __construct()
    {
        parent::__construct();
        $this->admin_mail=$this->session->userdata('admin_session_email');
        $this->admin_fname=$this->session->userdata('admin_session_fname');
        if(!isset($this->admin_mail)){
            redirect('Login/index');
        }
    }
}