<?php
/**
 * Created by PhpStorm.
 * User: lenovo
 * Date: 13/06/2018
 * Time: 02:22
 */
class Airline_Model extends CI_Model{
    public function __construct()
    {
        parent::__construct();
    }
    function Insert($data){
        $retrieve=$this->db->insert('airline',$data);
        return $retrieve;
    }
    function Get_All(){
        $retrieve=$this->db->get('airline');
        return $retrieve;
    }
    function Delete($data){
        $this->db->where('airline_sherkatCode',$data);
        $retrieve=$this->db->delete('airline');
        return $retrieve;
    }
    function Get_Single($data){
        $retrieve = $this->db->get_where('airline', array('airline_sherkatCode' => $data));
        return $retrieve;
    }
    function Update($data){
        $airline_sherkatCode=$this->session->userdata('airline_sherkatCode');
        $data=array(
            'airline_name'=>$data['airline_name'],
            'airline_modirName'=>$data['airline_modirName'],
            'airline_centralAddress'=>$data['airline_centralAddress'],
            'airline_tell'=>$data['airline_tell'],
            'airline_modirMobile'=>$data['airline_modirMobile'],
            'airline_sherkatCode'=>$data['airline_sherkatCode'],
            'airline_logo'=>$data['airline_logo'],
        );
        $this->db->where('airline_sherkatCode',$airline_sherkatCode);
        $query=$this->db->update('airline',$data);
        return $query;

    }
}