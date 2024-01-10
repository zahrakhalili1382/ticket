<?php
/**
 * Created by PhpStorm.
 * User: lenovo
 * Date: 13/06/2018
 * Time: 02:00
 */
defined('BASEPATH') OR exit('No direct script access allowed');
class Reserve extends MY_Controller {
    function __construct()
    {
        parent::__construct();
        //$this->load->model('Reserve_Model');
        $this->load->model('Site_Model');
    }
    function Show_Reserves(){
        $this->load->view('Reserve/reserve_show');
    }
    function Get_All_Reserve(){
        $data_reserve['get_all']=$this->Site_Model->Get_All_Reserve();
        return $data_reserve;
    }
}