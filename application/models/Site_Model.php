<?php
/**
 * Created by PhpStorm.
 * User: lenovo
 * Date: 13/06/2018
 * Time: 02:22
 */
class Site_Model extends CI_Model{
    public function __construct()
    {
        parent::__construct();
    }
    public function Get_All($limit,$start){
        $this->db->limit($limit,$start);
        $this->db->where('parvaz_state','0');
        $retrieve =$this->db->get('parvaz');
        return $retrieve ;
    }
    public function Get_All_Mashhad($limit,$start){
        $this->db->limit($limit,$start);
        $this->db->where('parvaz_maghsad','مشهد');
        $this->db->where('parvaz_state','0');
        $retrieve =$this->db->get('parvaz');
        return $retrieve ;
    }
    public function Get_All_Search($limit,$start,$maghsad,$date){
        $this->db->limit($limit,$start);
        $this->db->where('parvaz_maghsad',$maghsad);
        $this->db->where('parvaz_date',$date);
        $this->db->where('parvaz_state','0');
        $retrieve =$this->db->get('parvaz');
        return $retrieve ;
    }
    public function Get_All_Kish($limit,$start){
        $this->db->limit($limit,$start);
        $this->db->where('parvaz_maghsad','کیش');
        $this->db->where('parvaz_state','0');
        $retrieve =$this->db->get('parvaz');
        return $retrieve ;
    }
    public function Update_ParvazReservedCount($Code,$NCount){
        $this->db->where('parvaz_code',$Code);
        $retrieve=$this->db->update('parvaz',array('parvaz_reserved_count'=>$NCount+1));
        return $retrieve;
    }
    public function Reserve_Register($data){
        $retrieve=$this->db->insert('reserve',$data);
        return $retrieve;
    }
    public function Update_ParvazState($Code){
        $this->db->where('parvaz_code',$Code);
        $retrieve=$this->db->update('parvaz',array('parvaz_state'=>1));
        return $retrieve;
    }
    public function Get_Single_Reserve($Code,$CodeMelli){
        $this->db->where(array('reserve_Code'=>$Code,'reserve_codeMelli'=>$CodeMelli));
        $retrieve=$this->db->get('reserve');
        return $retrieve;
    }
    function Get_All_Reserve(){
        $retrieve=$this->db->get('reserve');
        return $retrieve;
    }
    function Get_All_Contact(){
        $retrieve=$this->db->get('contact');
        return $retrieve;
    }
    function Delete($code){
        $this->db->where('reserve_Code',$code);
        $retrieve=$this->db->delete('reserve');
        return $retrieve;
    }
    function Register_Contact($data){
        return $this->db->insert('contact',$data);
    }
}