<?php

defined('BASEPATH') OR EXIT("No direct script access allowed");

class Signup extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model(array("case_Model", "user_model"));
        $this->load->helper(array('form', 'file', 'url'));
        $this->load->library('form_validation');
    }

    public function index() {
        $data['title'] = "Create an Account";
        $data['error_message'] = '';
        $this->load->view('signup', $data);
    }

    public function upload_file() {

        $data1['error_message'] = "";
        $config['upload_path'] = './uploads/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = 100;
        $config['max_width'] = 1024;
        $config['max_height'] = 768;
        $config['maintain_ratio'] = TRUE;
        $this->load->library('upload', $config);
        if (!$this->upload->do_upload('fileToUpload')) {
            $data1['error_message'] = $this->upload->display_errors();

            $this->load->view('signup', $data1);
        } else {
            $image_path = $this->upload->data();


            $data['image_path'] = $image_path['full_path'];
            $data['first_name'] = $this->input->post('first_name');
            $data['surname'] = $this->input->post('sur_name');
            $data['user_name'] = $this->input->post('user_name');
            $data['title'] = $this->input->post('title');
            $data['gender'] = $this->input->post('gender');
            $data['email'] = $this->input->post('email');
            $data['mobile_number'] = $this->input->post('mobile_number');
            $data['dob'] = $this->input->post('dob');
            $data['smoker'] = $this->input->post('smoker');
            $data['occupation'] = $this->input->post('occupation');
            $data['alergies'] = $this->input->post('alergies');
            $data['physical_address'] = $this->input->post('address');
            $data['password'] = md5($this->input->post('password'));
            $data['user_category'] = $this->input->post('role');

            $this->form_validation->set_rules('email', 'Email', 'required|is_unique[users.email]');

            $this->form_validation->set_rules('user_name', 'Username', 'required|is_unique[users.user_name]');


            if ($this->form_validation->run() == TRUE) {
                $user = $this->user_model->insert_file($data);
                if (!empty($user)) {

                    $user_data = $this->user_model->get_user_specific($user);
                    $user_data['is_logged_in'] = true;
                    $this->session->set_userdata($user_data);
                    $login_id ['user_id'] = $_SESSION['user_id'];
                    $online = $this->user_model->store_session($login_id);
                    if ($online) {
                        redirect('welcome');
                    } else {
                        $data1['title'] = "Create an Account";
                        $data1['error_message'] = 'Session could no be created';
                        $this->load->view('signup', $data1);
                    }
                }
            } else {
                $data1['title'] = "Create an Account";
                $data1['error'] = 'Select and Unique Address or user name';
                $this->load->view('login', $data);
            }
        }
    }

}
