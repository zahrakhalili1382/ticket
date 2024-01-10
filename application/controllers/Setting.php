<?php
/**
 * Created by PhpStorm.
 * User: lenovo
 * Date: 23/06/2018
 * Time: 05:52 AM
 */
defined('BASEPATH') OR exit('No direct script access allowed');
class Setting extends MY_Controller {
    function __construct()
    {
        parent::__construct();
        $this->load->model('Setting_Model');
    }
    function index(){
        $this->load->view('Setting/setting_edit');
    }
    function Change_Pass(){
        $form_validation=array(
            array(
                'field'=>'admin_email',
                'label'=>'admin_email',
                'rules'=>'required',
                'errors'=>array(
                    'required'=>'لطفا ایمیل خود را وارد کنید'
                )
            ),
            array(
                'field'=>'current_pass',
                'label'=>'current_pass',
                'rules'=>'required',
                'errors'=>array(
                    'required'=>'لطفا گذرواژه فعلی خودتان را وارد کنید'
                )
            ),
            array(
                'field'=>'admin_pass',
                'label'=>'admin_pass',
                'rules'=>'required',
                'errors'=>array(
                    'required'=>'لطفا گذرواژه جدید خودتان را وارد کنید'
                )
            ),
            array(
                'field'=>'admin_pass_retype',
                'label'=>'admin_pass_retype',
                'rules'=>'required',
                'errors'=>array(
                    'required'=>'لطفا تکرار گذرواژه جدید خودتان را وارد کنید'
                )
            )
        );
        $this->form_validation->set_rules($form_validation);
        if($this->form_validation->run()==false){
            $this->load->view('Setting/setting_edit');
        }else{
            if($_POST['current_pass']==$this->session->userdata('admin_session_pass')){
                if($_POST['admin_pass']==$_POST['admin_pass_retype']){
                    $data['admin_email']=$_POST['admin_email'];
                    $data['admin_pass']=$_POST['admin_pass'];
                    $retrieve=$this->Setting_Model->Update($data);
                    if($retrieve){
                        $admin_session=array(
                            'admin_session_email'=>$_POST['admin_email'],
                            'admin_session_pass'=>$_POST['admin_pass'],
                        );
                        $this->session->set_userdata($admin_session);
                        $data['result_change_pass']=" اطلاعات شما با موفقیت ویرایش شد ، لطفا از پنل لاگ اوت کنید و دوباره وارد شید ";
                        $this->load->view('Setting/setting_edit',$data);
                    }else{
                        $data['result_change_pass']=" اطلاعات شما ویرایش نشد ";
                        $this->load->view('Setting/setting_edit',$data);
                    }
                }else{
                    $data['result_change_pass']=" گذروازه جدید شما با تکرار ان مطابقت ندارد ";
                    $this->load->view('Setting/setting_edit',$data);
                }
            }
            else{
                $data['result_change_pass']=" گذروازه فعلی خودتان را اشتباه وارد کردید ";
                $this->load->view('Setting/setting_edit',$data);
            }
        }
    }
    function Change_Profile(){
        $form_validation=array(
            array(
                'field'=>'admin_fame',
                'label'=>'admin_fame',
                'rules'=>'required',
                'errors'=>array(
                    'required'=>'لطفا نام خود را وارد کنید'
                )
            ),
            array(
                'field'=>'admin_lname',
                'label'=>'admin_lname',
                'rules'=>'required',
                'errors'=>array(
                    'required'=>'لطفا فامیلی خودتان را وارد کنید'
                )
            )
        );
        $this->form_validation->set_rules($form_validation);
        if($this->form_validation->run()==false){
            $this->load->view('Setting/setting_edit');
        }else{
            $config['upload_path'] = "Admin_Pic/";
            $config['allowed_types'] = 'gif|jpg|png';
            $config['max_size'] = 10000;
            $config['max_width'] = 2024;
            $config['max_height'] = 1768;

            $this->load->library('upload', $config);

            if (!$this->upload->do_upload('pic')) {
                $data['result_change_pass'] = "تصویر اپلود نشد ";
            } else {
                $data['admin_pic']=$this->upload->data('file_name');
                $data['admin_fame']=$_POST['admin_fame'];
                $data['admin_lname']=$_POST['admin_lname'];
                $retrieve=$this->Setting_Model->Update_Profile($data);
                if($retrieve){
                    unlink('Admin_Pic/'.$this->session->userdata('admin_session_pic'));
                    $admin_session=array(
                        'admin_session_fname'=>$_POST['admin_fame'],
                        'admin_session_lname'=>$_POST['admin_lname'],
                        'admin_session_pic'=>$this->upload->data('file_name'),
                    );
                    $this->session->set_userdata($admin_session);

                    $data['result_change_pass']=" اطلاعات شما ویرایش شد";
                }else{
                    $data['result_change_pass']=" اطلاعات شما ویرایش نشد";
                }
            }
            $this->load->view('Setting/setting_edit',$data);

        }
    }
}