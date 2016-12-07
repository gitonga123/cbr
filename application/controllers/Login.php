<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model("user_model");
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
    }

    public function index() {
        $this->load->view("login");
    }
    public function user_validate(){
        $user_data = array();
        $data['username'] = $this->input->post('username');
        $data['password'] = md5($this->input->post('password'));
        $result = $this->user_model->validate($data);
        if($result){
           $user_data = $this->user_model->get_specific_user($this->input->post('username'));
           $user_data['is_logged_in'] = true;
           $this->session->set_userdata($user_data);
           redirect('user/index');
           
        }else{
            echo 'Check your user_name and Password combination';
        }
    }

}
