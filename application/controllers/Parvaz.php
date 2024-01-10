<?php
/**
 * Created by PhpStorm.
 * User: lenovo
 * Date: 13/06/2018
 * Time: 02:00
 */
defined('BASEPATH') OR exit('No direct script access allowed');
class Parvaz extends MY_Controller {
    function __construct()
    {
        parent::__construct();
        $this->load->model('Parvaz_Model');
    }
    function Register_Form(){
        $this->load->view('Parvaz/parvaz_register');
    }
    function Get_All_Airlines(){
        $this->load->model('Airline_Model');
        $data_airline['get_all']=$this->Airline_Model->Get_All();
        return $data_airline;
    }
    function Show_Parvaz(){
        $this->load->view('Parvaz/parvaz_show');
    }
    function Get_All_Parvaz(){
        $data_parvaz['get_all']=$this->Parvaz_Model->Get_All();
        return $data_parvaz;
    }

    function Register(){
        $form_validation=array(
            array(
                'field'=>'parvaz_zarfiyat',
                'label'=>'parvaz_zarfiyat',
                'rules'=>'required|numeric',
                'errors'=>array(
                    'required'=>'لطفا ظرفیت را وارد کنید',
                    'numeric'=>' ظرفیت را عددی وارد کنید'
                )
            ),
            array(
                'field'=>'parvaz_gheymat',
                'label'=>'parvaz_gheymat',
                'rules'=>'required|numeric',
                'errors'=>array(
                    'required'=>'لطفا قیمت را وارد کنید',
                    'numeric'=>' قیمت پرواز را عددی وارد کنید'
                )
            ),
            array(
                'field'=>'parvaz_date',
                'label'=>'parvaz_date',
                'rules'=>'required',
                'errors'=>array(
                    'required'=>'تاریخ پرواز را وارد کنید',
                )
            ),
            array(
                'field'=>'parvaz_time',
                'label'=>'parvaz_time',
                'rules'=>'required',
                'errors'=>array(
                    'required'=>'ساعت پرواز را وارد کنید',
                )
            )
        );
        $this->form_validation->set_rules($form_validation);
        if($this->form_validation->run()==false){
            $this->load->view('Parvaz/parvaz_register');
        }else{
            $name_and_codeSherkat=explode('/',$_POST['parvaz_airline']);
            $data['parvaz_mabda']=$_POST['parvaz_mabda'];
            $data['parvaz_maghsad']=$_POST['parvaz_maghsad'];
            $data['parvaz_zarfiyat']=$_POST['parvaz_zarfiyat'];
            $data['parvaz_gheymat']=$_POST['parvaz_gheymat'];
            $data['parvaz_date']=$_POST['parvaz_date'];
            $data['parvaz_time']=$_POST['parvaz_time'];
            $data['parvaz_airline']=$name_and_codeSherkat[0]."/".$name_and_codeSherkat[1];
            $data['parvaz_state']="0";
            $data['parvaz_code']=mt_rand();

            $retrieve=$this->Parvaz_Model->Insert($data);
            if($retrieve){
                $data_parvaz['register_result']=" پرواز در سیستم ثبت شد";
            }else{
                $data_parvaz['register_result']=" پرواز در سیستم ثبت نشد";
            }
            $this->load->view('Parvaz/parvaz_register',$data_parvaz);

        }
    }
    function Delete(){
        $code=$this->input->post('code');
        $data_parvaz['delete_result']=$this->Parvaz_Model->Delete($code);
        echo $data_parvaz['delete_result'];
    }
    function Parvaz_Update($data){
        $code=$this->uri->segment('3');
        if(isset($data)){
            $code=$data;
        }
        $data_parvaz['data_result']=$this->Parvaz_Model->Get_Single($code);
        foreach ($data_parvaz['data_result']->result() as $row_fetch){
            $this->session->set_userdata('parvaz_id',$row_fetch->parvaz_id);
        }
        $this->load->view('Parvaz/parvaz_edit',$data_parvaz);
    }
    function Update(){
        $parvaz_id=$this->session->userdata('parvaz_id');
        if(!empty($parvaz_id)){
            $form_validation=array(
                array(
                    'field'=>'parvaz_zarfiyat',
                    'label'=>'parvaz_zarfiyat',
                    'rules'=>'required|numeric',
                    'errors'=>array(
                        'required'=>'لطفا ظرفیت را وارد کنید',
                        'numeric'=>' ظرفیت را عددی وارد کنید'
                    )
                ),
                array(
                    'field'=>'parvaz_gheymat',
                    'label'=>'parvaz_gheymat',
                    'rules'=>'required|numeric',
                    'errors'=>array(
                        'required'=>'لطفا قیمت را وارد کنید',
                        'numeric'=>' قیمت پرواز را عددی وارد کنید'
                    )
                ),
                array(
                    'field'=>'parvaz_date',
                    'label'=>'parvaz_date',
                    'rules'=>'required',
                    'errors'=>array(
                        'required'=>'تاریخ پرواز را وارد کنید',
                    )
                ),
                array(
                    'field'=>'parvaz_time',
                    'label'=>'parvaz_time',
                    'rules'=>'required',
                    'errors'=>array(
                        'required'=>'ساعت پرواز را وارد کنید',
                    )
                )
            );
            $this->form_validation->set_rules($form_validation);
            if($this->form_validation->run()==false){
                $this->Parvaz_Update($this->session->userdata('parvaz_id'));
            }else{
                $name_and_codeSherkat=explode('/',$_POST['parvaz_airline']);
                $data['parvaz_mabda']=$_POST['parvaz_mabda'];
                $data['parvaz_maghsad']=$_POST['parvaz_maghsad'];
                $data['parvaz_zarfiyat']=$_POST['parvaz_zarfiyat'];
                $data['parvaz_gheymat']=$_POST['parvaz_gheymat'];
                $data['parvaz_date']=$_POST['parvaz_date'];
                $data['parvaz_time']=$_POST['parvaz_time'];
                $data['parvaz_airline']=$name_and_codeSherkat[0]."/".$name_and_codeSherkat[1];
                $retrieve=$this->Parvaz_Model->Update($data);
                if($retrieve){
                    $data_parvaz['action_result']=" پرواز در سیستم ویرایش شد";
                }else{
                    $data_parvaz['action_result']=" پرواز در سیستم ویرایش نشد";
                }
                $session_unset_array=array('parvaz_id');
                $this->session->unset_userdata($session_unset_array);
                $this->load->view('Parvaz/parvaz_show',$data_parvaz);

            }
        }else{
            redirect('Airline/Show_Airlines');
        }
    }
    function Change_State(){
        $code=$this->input->post('code');
        $state=$this->input->post('state');
        if($state=="3")
            $state="0";
        else
            $state++;
        $retrieve=$this->Parvaz_Model->Change_State($code,$state);
        if($retrieve)
            echo "1";
        else
            echo "0";
    }
}
