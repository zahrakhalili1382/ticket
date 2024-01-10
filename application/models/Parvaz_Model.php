<?php
/**
 * Created by PhpStorm.
 * User: lenovo
 * Date: 13/06/2018
 * Time: 02:22
 */
class Parvaz_Model extends CI_Model{
    public function __construct()
    {
        parent::__construct();
    }
    function Insert($data){
        $retrieve=$this->db->insert('parvaz',$data);
        return $retrieve;
    }
    function Get_All(){
        $retrieve=$this->db->get('parvaz');
        return $retrieve;
    }
    function Delete($data){
        $this->db->where('parvaz_id',$data);
        $retrieve=$this->db->delete('parvaz');
        return $retrieve;
    }
    function Get_Single($data){
        $retrieve = $this->db->get_where('parvaz', array('parvaz_id' => $data));
        return $retrieve;
    }
    function Get_Single_Code($data){
        $retrieve = $this->db->get_where('parvaz', array('parvaz_code' => $data));
        return $retrieve;
    }
    function Get_SingleParvaz_WithCode($data){
        $retrieve = $this->db->get_where('parvaz', array('parvaz_code' => $data));
        return $retrieve;
    }
    function Update($data){
        $parvaz_id=$this->session->userdata('parvaz_id');
        $data=array(
            'parvaz_mabda'=>$data['parvaz_mabda'],
            'parvaz_maghsad'=>$data['parvaz_maghsad'],
            'parvaz_zarfiyat'=>$data['parvaz_zarfiyat'],
            'parvaz_gheymat'=>$data['parvaz_gheymat'],
            'parvaz_date'=>$data['parvaz_date'],
            'parvaz_time'=>$data['parvaz_time'],
            'parvaz_airline'=>$data['parvaz_airline'],
        );
        $this->db->where('parvaz_id',$parvaz_id);
        $query=$this->db->update('parvaz',$data);
        return $query;
    }
    function Change_State($code,$state){
        $this->db->where('parvaz_code',$code);
        $retrieve=$this->db->update('parvaz',array('parvaz_state'=>$state));
        return $retrieve;
    }
}