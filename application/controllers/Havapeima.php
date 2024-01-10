<?php
/**
 * Created by PhpStorm.
 * User: lenovo
 * Date: 13/06/2018
 * Time: 02:00
 */
defined('BASEPATH') OR exit('No direct script access allowed');
class Havapeima extends MY_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Havapeima_Model');
    }
    function Register_Form(){
        $this->load->view('Havapeima/havapeima_register');
    }
    function Show_Havapeima(){
        $this->load->view('Havapeima/havapeima_show');
    }
    function Get_All_Airlines(){
        $this->load->model('Airline_Model');
        $data_airline['get_all']=$this->Airline_Model->Get_All();
        return $data_airline;
    }
    function Get_All_Havapeima(){
        $data_airline['get_all']=$this->Havapeima_Model->Get_All();
        return $data_airline;
    }
    function Delete(){
        $code=$this->input->post('code');
        $data_havapeima['delete_result']=$this->Havapeima_Model->Delete($code);
        echo $data_havapeima['delete_result'];
    }
    function Havapeima_Update($data){
        $code=$this->uri->segment('3');
        if(isset($data)){
            $code=$data;
        }
        $data_havapeima['data_result']=$this->Havapeima_Model->Get_Single($code);
        foreach ($data_havapeima['data_result']->result() as $row_fetch){
            $this->session->set_userdata('havapeima_id',$row_fetch->havapeima_id);
        }
        $this->load->view('Havapeima/havapeima_edit',$data_havapeima);
    }
    function Update()
    {
        $form_validation = array(
            array(
                'field' => 'havapeima_name',
                'label' => 'havapeima_name',
                'rules' => 'required',
                'errors' => array(
                    'required' => 'نام هواپیما را وارد کنید'
                )
            ),
            array(
                'field' => 'havapeima_Code',
                'label' => 'havapeima_Code',
                'rules' => 'required|numeric',
                'errors' => array(
                    'required' => 'کد هواپیما را وارد کنید',
                    'numeric' => ' کد هواپیما را عددی وارد کنید'
                )
            ),
        );
        $this->form_validation->set_rules($form_validation);
        if ($this->form_validation->run() == false) {
            $this->Havapeima_Update($this->session->userdata('havapeima_id'));
        } else {
            $name_and_codeSherkat=explode('/',$_POST['havapeima_airlineName']);
            $data['havapeima_name']=$_POST['havapeima_name'];
            $data['havapeima_airlineName']=$name_and_codeSherkat[0];
            $data['havapeima_airlineCode']=$name_and_codeSherkat[1];
            $data['havapeima_Code']=$_POST['havapeima_Code'];
            $retrieve=$this->Havapeima_Model->Update($data);
            if($retrieve){
                $data_havapeima['action_result']=" هواپیما در سیستم ویرایش شد";
            }else{
                $data_havapeima['action_result']=" هواپیما در سیستم ویرایش نشد";
            }
            $session_unset_array=array('havapeima_id');
            $this->session->unset_userdata($session_unset_array);
            $this->load->view('Havapeima/havapeima_show',$data_havapeima);
        }
    }
    function Register(){
        $form_validation=array(
            array(
                'field'=>'havapeima_name',
                'label'=>'havapeima_name',
                'rules'=>'required',
                'errors'=>array(
                    'required'=>'نام هواپیما را وارد کنید'
                )
            ),
            array(
                'field'=>'havapeima_Code',
                'label'=>'havapeima_Code',
                'rules'=>'required|numeric',
                'errors'=>array(
                    'required'=>'کد هواپیما را وارد کنید',
                    'numeric'=>' کد هواپیما را عددی وارد کنید'
                )
            ),
        );
        $this->form_validation->set_rules($form_validation);
        if($this->form_validation->run()==false){
            $this->load->view('Havapeima/havapeima_register');
        }else{
            $name_and_codeSherkat=explode('/',$_POST['havapeima_airlineName']);
            $data['havapeima_name']=$_POST['havapeima_name'];
            $data['havapeima_airlineName']=$name_and_codeSherkat[0];
            $data['havapeima_airlineCode']=$name_and_codeSherkat[1];
            $data['havapeima_Code']=$_POST['havapeima_Code'];
            $retrieve=$this->Havapeima_Model->Insert($data);
            if($retrieve){
                $data_havapeima['register_result']=" هواپیما در سیستم ثبت شد";
            }else{
                $data_havapeima['register_result']=" هواپیما در سیستم ثبت نشد";
            }
            $this->load->view('Havapeima/havapeima_register',$data_havapeima);
        }
    }

}