<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Created by PhpStorm.
 * User: lenovo
 * Date: 11/06/2018
 * Time: 05:16
 */
class Home extends MY_Controller {
    function index(){
        $this->load->view('Panel/index');
    }
}