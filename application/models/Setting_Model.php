<?php
/**
 * Created by PhpStorm.
 * User: lenovo
 * Date: 23/06/2018
 * Time: 03:18 AM
 */
class Setting_Model extends CI_Model{
    public function __construct()
    {
        parent::__construct();
    }
    public function Update($data){
        $this->db->where('admin_email',$this->session->userdata('admin_session_email'));
        $retrieve=$this->db->update('admin',$data);
        return $retrieve;
    }
    public function Update_Profile($data){
        $this->db->where('admin_email',$this->session->userdata('admin_session_email'));
        $retrieve=$this->db->update('admin',$data);
        return $retrieve;
    }
}