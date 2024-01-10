<?php
/**
 * Created by PhpStorm.
 * User: lenovo
 * Date: 24/06/2018
 * Time: 08:59 AM
 */
defined('BASEPATH') OR exit('No direct script access allowed');
class Site extends MY_Controller {
    public $maghsad_parvaz;
    public $date_parvaz;
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Site_Model');
    }
    function index(){
        $config['base_url'] = base_url().'Site/index/page/';
        $config['total_rows'] = $this->CountAll();
        $config['per_page'] = 4;
        $config['uri_segment']=4;
        $page=($this->uri->segment(4))?$this->uri->segment(4):0;
        $this->pagination->initialize($config);


        $data['fetch_data']=$this->Site_Model->Get_All($config['per_page'],$page);
        $data['pagination']=$this->pagination->create_links();
        $this->load->view('Site/index',$data);
    }
    function explode_date($date){
        $data=explode('/',$date);
        switch ($data[1]){
            case "1":
                $month="فروردین";
                break;
            case "2":
                $month="اردیبهشت";
                break;
            case "3":
                $month="خرداد";
                break;
            case "4":
                $month="تیر";
                break;
            case "5":
                $month="مرداد";
                break;
            case "6":
                $month="شهریور";
                break;
            case "7":
                $month="مهر";
                break;
            case "8":
                $month="آبان";
                break;
            case "9":
                $month="آذر";
                break;
            case "10":
                $month="دی";
                break;
            case "11":
                $month="بهمن";
                break;
            case "12":
                $month="اسفند";
                break;
        }
        return $data[2]." ".$month." ".$data[0];
    }
    function explode_airline($data){
        $data=explode('/',$data);
        return $data[0];
    }
    function get_airline_image($data){
        $data=explode('/',$data);
        $this->load->model('Airline_Model');
        $data_airline['data_result']=$this->Airline_Model->Get_Single($data[1]);
        foreach ($data_airline['data_result']->result() as $row){
            return $row->airline_logo;
        }
    }
    function Mashhad(){
        $config['base_url'] = base_url().'Site/Mashhad/page/';
        $config['total_rows'] = $this->CountAll_Mashhad();
        $config['per_page'] = 4;
        $config['uri_segment']=4;
        $page=($this->uri->segment(4))?$this->uri->segment(4):0;
        $this->pagination->initialize($config);
        $data['fetch_data']=$this->Site_Model->Get_All_Mashhad($config['per_page'],$page);
        $data['pagination']=$this->pagination->create_links();
        $this->load->view('Site/index',$data);
    }
    function Kish(){
        $config['base_url'] = base_url().'Site/Kish/page/';
        $config['total_rows'] = $this->CountAll_Kish();
        $config['per_page'] = 4;
        $config['uri_segment']=4;
        $page=($this->uri->segment(4))?$this->uri->segment(4):0;
        $this->pagination->initialize($config);
        $data['fetch_data']=$this->Site_Model->Get_All_Kish($config['per_page'],$page);
        $data['pagination']=$this->pagination->create_links();
        $this->load->view('Site/index',$data);
    }
    function Search(){
        if(isset($_POST['parvaz_maghsad'])){
            $this->session->set_userdata('parvaz_maghsad_search',$_POST['parvaz_maghsad']);
        }
        if(isset($_POST['parvaz_date'])){
            $this->session->set_userdata('parvaz_date_search',$_POST['parvaz_date']);
        }
        $config['base_url'] = base_url().'Site/Search/page/';
        $config['total_rows'] = $this->CountAll_Search();
        $config['per_page'] = 4;
        $config['uri_segment']=4;
        $page=($this->uri->segment(4))?$this->uri->segment(4):0;
        $this->pagination->initialize($config);
        $data['fetch_data']=$this->Site_Model->Get_All_Search($config['per_page'],$page,$this->session->userdata('parvaz_maghsad_search'),$this->session->userdata('parvaz_date_search'));
        $data['pagination']=$this->pagination->create_links();
        $this->load->view('Site/index',$data);
    }
    public function CountAll_Search(){
        return $this->db->where(array('parvaz_state'=>'0','parvaz_maghsad'=>$this->session->userdata('parvaz_maghsad_search'),'parvaz_date'=>$this->session->userdata('parvaz_date_search')))->count_all_results('parvaz');
    }
    public function CountAll(){
        return $this->db->where(array('parvaz_state'=>'0'))->count_all_results('parvaz');
    }
    public function CountAll_Mashhad(){
        return $this->db->where(array('parvaz_state'=>'0','parvaz_maghsad'=>'مشهد'))->count_all_results('parvaz');
    }
    public function CountAll_Kish(){
        return $this->db->where(array('parvaz_state'=>'0','parvaz_maghsad'=>'کیش'))->count_all_results('parvaz');
    }
    public function Reserve(){
        $this->load->view('Site/reserve');
    }
    public function Get_Single($ID){
        $this->load->model('Parvaz_Model');
        $Parvaz_data['result_data']=$this->Parvaz_Model->Get_Single($ID);
        return $Parvaz_data;
    }
    public function Reserve_Final(){
        $form_validation=array(
            array(
                'field'=>'reserve_username',
                'label'=>'reserve_username',
                'rules'=>'required',
                'errors'=>array(
                    'required'=>'نام خودتان را وارد کنید'
                )
            ),
            array(
                'field'=>'reserve_codeMelli',
                'label'=>'reserve_codeMelli',
                'rules'=>'required|exact_length[10]',
                'errors'=>array(
                    'required'=>'کد ملی خودتان را وارد کنید',
                    'exact_length'=>'کد ملی 10 رقمی است !',
                )
            ),
            array(
                'field'=>'reserve_mobile',
                'label'=>'reserve_mobile',
                'rules'=>'required',
                'errors'=>array(
                    'required'=>'موبایل خودتان را وارد کنید',
                )
            ),
            array(
                'field'=>'reserve_sen',
                'label'=>'reserve_sen',
                'rules'=>'required',
                'errors'=>array(
                    'required'=>'سن خودتان را وارد کنید',
                )
            )
        );
        $this->form_validation->set_rules($form_validation);
        if($this->form_validation->run()==false){
            $this->Reserve();
        }else{
             $ID=$this->uri->segment(3);
             $data_parvaz=$this->Get_Single($ID);
             foreach($data_parvaz['result_data']->result() as $row){
                 $data_parvaz['parvaz_mabda']=$row->parvaz_mabda;
                 $data_parvaz['parvaz_maghsad']=$row->parvaz_maghsad;
                 $data_parvaz['parvaz_zarfiyat']=$row->parvaz_zarfiyat;
                 $data_parvaz['parvaz_reserved_count']=$row->parvaz_reserved_count;
                 $data_parvaz['parvaz_gheymat']=$row->parvaz_gheymat;
                 $data_parvaz['parvaz_date']=$row->parvaz_date;
                 $data_parvaz['parvaz_time']=$row->parvaz_time;
                 $data_parvaz['parvaz_airline']=$row->parvaz_airline;
             }
            $data_parvaz['parvaz_date']=$this->explode_date($data_parvaz['parvaz_date']);
            $data_parvaz['airline_image']=$this->get_airline_image($data_parvaz['parvaz_airline']);
            $data_parvaz['parvaz_airline']=$this->explode_airline($data_parvaz['parvaz_airline']);
             $data_parvaz['reserve_username']=$_POST['reserve_username'];
            $data_parvaz['reserve_codeMelli']=$_POST['reserve_codeMelli'];
            $data_parvaz['reserve_mobile']=$_POST['reserve_mobile'];
            $data_parvaz['reserve_sen']=$_POST['reserve_sen'];
            $data_parvaz['reserve_bozorgCount']=$_POST['reserve_bozorgCount'];
            $data_parvaz['reserve_koodakCount']=$_POST['reserve_koodakCount'];

            $array_user=array(
                'reserve_username'=>$data_parvaz['reserve_username'],
                'reserve_codeMelli'=>$data_parvaz['reserve_codeMelli'],
                'reserve_mobile'=>$data_parvaz['reserve_mobile'],
                'reserve_sen'=>$data_parvaz['reserve_sen'],
                'reserve_bozorgCount'=>$data_parvaz['reserve_bozorgCount'],
                'reserve_koodakCount'=>$data_parvaz['reserve_koodakCount'],
            );
            $this->session->set_userdata($array_user);
             $this->load->view('Site/reserve-final',$data_parvaz);
        }
    }
    function Register_Reserve(){
        $ID=$this->uri->segment(3);
        $data_parvaz=$this->Get_Single($ID);
        foreach($data_parvaz['result_data']->result() as $row){
            $data_parvaz['parvaz_mabda']=$row->parvaz_mabda;
            $data_parvaz['parvaz_maghsad']=$row->parvaz_maghsad;
            $data_parvaz['parvaz_zarfiyat']=$row->parvaz_zarfiyat;
            $data_parvaz['parvaz_reserved_count']=$row->parvaz_reserved_count;
            $data_parvaz['parvaz_gheymat']=$row->parvaz_gheymat;
            $data_parvaz['parvaz_date']=$row->parvaz_date;
            $data_parvaz['parvaz_time']=$row->parvaz_time;
            $data_parvaz['parvaz_airline']=$row->parvaz_airline;
            $data_parvaz['parvaz_code']=$row->parvaz_code;
        }
        if($data_parvaz['parvaz_reserved_count'] < $data_parvaz['parvaz_zarfiyat']){
            $retrieve=$this->Site_Model->Update_ParvazReservedCount($data_parvaz['parvaz_code'],$data_parvaz['parvaz_reserved_count']);
            if($retrieve){
                if($data_parvaz['parvaz_zarfiyat']==$data_parvaz['parvaz_reserved_count']+1){
                    $this->Site_Model->Update_ParvazState($data_parvaz['parvaz_code']);
                }
                $data_reserve['reserve_username']=$this->session->userdata('reserve_username');
                $data_reserve['reserve_codeMelli']=$this->session->userdata('reserve_codeMelli');
                $data_reserve['reserve_mobile']=$this->session->userdata('reserve_mobile');
                $data_reserve['reserve_sen']=$this->session->userdata('reserve_sen');
                $data_reserve['reserve_bozorgCount']=$this->session->userdata('reserve_bozorgCount');
                $data_reserve['reserve_koodakCount']=$this->session->userdata('reserve_koodakCount');
                $data_reserve['reserve_takgheymat']=$data_parvaz['parvaz_gheymat'];
                $data_reserve['reserve_allgheymat']=($data_parvaz['parvaz_gheymat'] * ($data_reserve['reserve_koodakCount'] + $data_reserve['reserve_bozorgCount'])) ;
                $data_reserve['reserve_parvazCode']=$data_parvaz['parvaz_code'];
                $data_reserve['reserve_Code']=mt_rand();
                $retrieve=$this->Site_Model->Reserve_Register($data_reserve);
                if($retrieve){
                    redirect(base_url().'Site/Show_Reserve/'.$data_reserve['reserve_Code'].'/'.$data_reserve['reserve_codeMelli']);
                }else{
                    redirect(base_url().'Site/Show_Reserve/NOtReserve');
                }
            }else{
                redirect(base_url().'Site/Show_Reserve/NOtUpdateZarfiyat');
            }
        }else{
            redirect(base_url().'Site/Show_Reserve/NOtZarfiyat');
        }
    }
    public function Show_Reserve(){
        $this->load->view('Site/show_reserve');
    }
    public function Get_Single_Reserve($Code,$CodeMelli){
        $Reserve_data['result_data']=$this->Site_Model->Get_Single_Reserve($Code,$CodeMelli);
        return $Reserve_data;
    }
    public function Get_SingleParvaz_WithCode($Code){
        $this->load->model('Parvaz_Model');
        $Parvaz_data['result_data']=$this->Parvaz_Model->Get_SingleParvaz_WithCode($Code);
        return $Parvaz_data;
    }
    public function Peygiri(){
        redirect(base_url().'Site/Show_Reserve/'.$_POST['ReserveCode'].'/'.$_POST['CodeMelli']);
    }
    function Get_All_Reserve(){
        $data_reserve['get_all']=$this->Site_Model->Get_All_Reserve();
        return $data_reserve;
    }
    function contactus(){
        $this->load->view('Site/contact');
    }
    function Register_Contact(){
        $form_validation=array(
            array(
                'field'=>'name',
                'label'=>'name',
                'rules'=>'required',
                'errors'=>array(
                    'required'=>'لطفا نام و نام خانوادگی را وارد کنید',
                )
            ),
            array(
                'field'=>'email',
                'label'=>'email',
                'rules'=>'required',
                'errors'=>array(
                    'required'=>'لطفا ایمیل را وارد کنید',
                )
            ),
            array(
                'field'=>'subject',
                'label'=>'subject',
                'rules'=>'required',
                'errors'=>array(
                    'required'=>'موضوع پیام را وارد کنید',
                )
            ),
            array(
                'field'=>'text',
                'label'=>'text',
                'rules'=>'required',
                'errors'=>array(
                    'required'=>'متن پیام را وارد کنید',
                )
            )
        );
        $this->form_validation->set_rules($form_validation);
        if($this->form_validation->run()==false){
            $this->load->view('Site/contact');
        }else{
            $data=$_POST;
            $retrieve=$this->Site_Model->Register_Contact($data);
            if($retrieve){
                $data_contact['register_result']=" پیام شما در سیستم ثبت شد";
            }else{
                $data_contact['register_result']=" پیام شما در سیستم ثبت نشد";
            }
            $this->load->view('Site/contact',$data_contact);
        }
    }
    function aboutus(){
        $this->load->view('Site/about');
    }
    public function Show_Contact(){
        $this->load->view('contactus/contactus_show');
    }
    function Get_All_Contacte(){
        $data_contact['get_all']=$this->Site_Model->Get_All_Contact();
        return $data_contact;
    }
}
