<?php
/**
 * Created by PhpStorm.
 * User: lenovo
 * Date: 15/06/2018
 * Time: 23:24
 */
class Havapeima_Model extends CI_Model{
    function __construct()
    {
        parent::__construct();
    }
    function Insert($data){
        $retrieve=$this->db->insert('havapeima',$data);
        return $retrieve;
    }
    function Get_All(){
        $retrieve=$this->db->get('havapeima');
        return $retrieve;
    }
    function Delete($data){
        $this->db->where('havapeima_id',$data);
        $retrieve=$this->db->delete('havapeima');
        return $retrieve;
    }
    function Get_Single($data){
        $retrieve = $this->db->get_where('havapeima', array('havapeima_id' => $data));
        return $retrieve;
    }
    function Update($data){
        $havapeima_id=$this->session->userdata('havapeima_id');
        $data=array(
            'havapeima_name'=>$data['havapeima_name'],
            'havapeima_airlineName'=>$data['havapeima_airlineName'],
            'havapeima_airlineCode'=>$data['havapeima_airlineCode'],
            'havapeima_Code'=>$data['havapeima_Code'],
        );
        $this->db->where('havapeima_id',$havapeima_id);
        $query=$this->db->update('havapeima',$data);
        return $query;

    }
}