<?php
/**
 * Created by PhpStorm.
 * User: lenovo
 * Date: 13/06/2018
 * Time: 02:00
 */
defined('BASEPATH') OR exit('No direct script access allowed');
class Airline extends MY_Controller {
    function __construct()
    {
        parent::__construct();
        $this->load->model('Airline_Model');
    }
    function Register_Form(){
        $this->load->view('Airline/airline_register');
    }
    function Show_Airlines(){
        $this->load->view('Airline/airline_show');
    }
    function Register(){
        $form_validation=array(
            array(
                'field'=>'airline_name',
                'label'=>'airline_name',
                'rules'=>'required',
                'errors'=>array(
                    'required'=>'نام شرکت را وارد کنید'
                )
            ),
            array(
                'field'=>'airline_modirName',
                'label'=>'airline_modirName',
                'rules'=>'required',
                'errors'=>array(
                    'required'=>'نام مدیر شرکت را وارد کنید',
                )
            ),
            array(
                'field'=>'airline_centralAddress',
                'label'=>'airline_centralAddress',
                'rules'=>'required',
                'errors'=>array(
                    'required'=>'ادرس مرکزی شرکت را وارد کنید',
                )
            ),
            array(
                'field'=>'airline_tell',
                'label'=>'airline_tell',
                'rules'=>'required',
                'errors'=>array(
                    'required'=>'تلفن شرکت را وارد کنید',
                )
            ),array(
                'field'=>'airline_modirMobile',
                'label'=>'airline_modirMobile',
                'rules'=>'required',
                'errors'=>array(
                    'required'=>'شماره موبایل شرکت را وارد کنید',
                )
            ),array(
                'field'=>'airline_sherkatCode',
                'label'=>'airline_sherkatCode',
                'rules'=>'required|numeric',
                'errors'=>array(
                    'required'=>'کد شرکت را وارد کنید',
                    'numeric'=>' کد شرکت را عددی وارد کنید'
                )
            )
        );
        $this->form_validation->set_rules($form_validation);
        if($this->form_validation->run()==false){
            $this->load->view('Airline/airline_register');
        }else{
            $config['upload_path'] = "uploads/";
            $config['allowed_types'] = 'gif|jpg|png';
            $config['max_size'] = 10000;
            $config['max_width'] = 2024;
            $config['max_height'] = 1768;

            $this->load->library('upload', $config);

            if (!$this->upload->do_upload('pic')) {
                $data_airline['register_result'] = "تصویر اپلود نشد ";
            } else {
                $data_airline=$_POST;
                $data_airline['airline_logo']=$this->upload->data('file_name');
                $retrieve=$this->Airline_Model->Insert($data_airline);
                if($retrieve){
                    $data_airline['register_result']=" مشخصات شرکت هواپیمایی در سیستم ثبت شد";
                }else{
                    $data_airline['register_result']=" مشخصات شرکت هواپیمایی در سیستم ثبت نشد";
                }
            }
            $this->load->view('Airline/airline_register',$data_airline);
        }
    }
    function Get_All_Airlines(){
        $data_airline['get_all']=$this->Airline_Model->Get_All();
        return $data_airline;
    }
    function Delete(){
        $code=$this->input->post('code');
        $data_airline['delete_result']=$this->Airline_Model->Delete($code);
        echo $data_airline['delete_result'];
    }
    function Airline_Update($data){
        $code=$this->uri->segment('3');
        if(isset($data)){
            $code=$data;
        }
        $data_airline['data_result']=$this->Airline_Model->Get_Single($code);
        foreach ($data_airline['data_result']->result() as $row_fetch){
            $this->session->set_userdata('airline_logo',$row_fetch->airline_logo);
            $this->session->set_userdata('airline_sherkatCode',$row_fetch->airline_sherkatCode);
        }
        $this->load->view('Airline/airline_edit',$data_airline);
    }
    function Update(){
        $sherkatcode=$this->session->userdata('airline_sherkatCode');
        if(!empty($sherkatcode)){
            $form_validation=array(
                array(
                    'field'=>'airline_name',
                    'label'=>'airline_name',
                    'rules'=>'required',
                    'errors'=>array(
                        'required'=>'نام شرکت را وارد کنید'
                    )
                ),
                array(
                    'field'=>'airline_modirName',
                    'label'=>'airline_modirName',
                    'rules'=>'required',
                    'errors'=>array(
                        'required'=>'نام مدیر شرکت را وارد کنید',
                    )
                ),
                array(
                    'field'=>'airline_centralAddress',
                    'label'=>'airline_centralAddress',
                    'rules'=>'required',
                    'errors'=>array(
                        'required'=>'ادرس مرکزی شرکت را وارد کنید',
                    )
                ),
                array(
                    'field'=>'airline_tell',
                    'label'=>'airline_tell',
                    'rules'=>'required',
                    'errors'=>array(
                        'required'=>'تلفن شرکت را وارد کنید',
                    )
                ),array(
                    'field'=>'airline_modirMobile',
                    'label'=>'airline_modirMobile',
                    'rules'=>'required',
                    'errors'=>array(
                        'required'=>'شماره موبایل شرکت را وارد کنید',
                    )
                ),array(
                    'field'=>'airline_sherkatCode',
                    'label'=>'airline_sherkatCode',
                    'rules'=>'required|numeric',
                    'errors'=>array(
                        'required'=>'کد شرکت را وارد کنید',
                        'numeric'=>' کد شرکت را عددی وارد کنید'
                    )
                )
            );
            $this->form_validation->set_rules($form_validation);
            if($this->form_validation->run()==false){
                $this->Airline_Update($this->session->userdata('airline_sherkatCode'));
            }else{
                $airline_logo=$_FILES['pic']['name'];
                if(!empty($airline_logo)){
                    $config['upload_path'] = "uploads/";
                    $config['allowed_types'] = 'gif|jpg|png|jpeg';
                    $config['max_size'] = 10000;
                    $config['max_width'] = 2024;
                    $config['max_height'] = 1768;

                    $this->load->library('upload', $config);

                    if (!$this->upload->do_upload('pic')) {
                        $data_airline['register_result'] = "تصویر اپلود نشد ";
                    } else {
                        $data_airline=$_POST;
                        $data_airline['airline_logo']=$this->upload->data('file_name');
                        $retrieve=$this->Airline_Model->Update($data_airline);
                        if($retrieve){
                            $data_airline['action_result']=" مشخصات شرکت هواپیمایی در سیستم ویرایش شد";
                            unlink('uploads/'.$this->session->userdata('airline_logo'));
                        }else{
                            $data_airline['action_result']=" مشخصات شرکت هواپیمایی در سیستم ویرایش نشد";
                        }
                    }
                    $this->load->view('Airline/airline_show',$data_airline);
                }else{
                    $data_airline=$_POST;
                    $data_airline['airline_logo']=$this->session->userdata('airline_logo');
                    $retrieve=$this->Airline_Model->Update($data_airline);
                    if($retrieve){
                        $data_airline['action_result']=" مشخصات شرکت هواپیمایی در سیستم ویرایش شد";
                    }else{
                        $data_airline['action_result']=" مشخصات شرکت هواپیمایی در سیستم ویرایش نشد";
                    }
                    $session_unset_array=array('airline_logo','airline_sherkatCode');
                    $this->session->unset_userdata($session_unset_array);
                    $this->load->view('Airline/airline_show',$data_airline);
                }
            }
        }else{
            redirect('Airline/Show_Airlines');
        }
    }
}