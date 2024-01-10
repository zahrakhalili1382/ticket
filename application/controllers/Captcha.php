<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Created by PhpStorm.
 * User: lenovo
 * Date: 05/06/2018
 * Time: 05:44 AM
 */
class Captcha extends CI_Controller{
    function create(){
        $this->load->helper('captcha');
        $rand=rand(3972,20945);
        $this->session->set_userdata(array('captcha'=>$rand));
        $vals = array(
            'word'          => $rand,
            'img_path'      => './captcha/',
            'img_url'       => 'http://localhost/registerForm/captcha/',
            'font_path'     => '/assets/font/BYekan.ttf',
            'img_width'     => '150',
            'img_height'    => 30,
            'expiration'    => 7200,
            'word_length'   => 8,
            'font_size'     => 16,
            'img_id'        => 'Imageid',
            'pool'          => '0123456789abcdef ghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ',

            // White background and border, black text and red grid
            'colors'        => array(
                'background' => array(255, 255, 255),
                'border' => array(255, 255, 255),
                'text' => array(5, 100, 0),
                'grid' => array(255, 40, 40)
            )
        );

        $cap = create_captcha($vals);
        echo $cap['image'];
    }
}
