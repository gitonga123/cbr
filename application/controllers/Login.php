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
        
        $data['title'] = 'CBR: Respiratory Disease';
        $data['error_message'] = "";
        
        $this->load->view("login", $data);
    }

    public function user_validate() {
        $user_data = array();
        $data['username'] = $this->input->post('username');
        $data['password'] = md5($this->input->post('password'));

        $result = $this->user_model->validate($data);
        if ($result) {
            $user_data = $this->user_model->get_specific_user($this->input->post('username'));
            $user_data['is_logged_in'] = true;
            $this->session->set_userdata($user_data);

            $login_id ['user_id'] = $_SESSION['user_id'];
            $online = $this->user_model->store_session($login_id);

            if ($online) {
                redirect('welcome');
            } else {
                echo "Data can not be added";
            }
        } else {
            
            echo "<div class='alert alert-danger'><strong>Wrong User name and Password Combination</strong></div>";
            redirect('login');
        }
    }

    public function logout() {
        $delete = $this->user_model->destroy_session($_SESSION['user_id']);
        if ($delete) {
            $this->session->unset_userdata('is_logged_in');
            session_destroy();
            redirect('login', 'refresh');
        } else {
            echo "Session can be destroyed";
        }
    }

    public function new_user() {
        $config['upload_path'] = './uploads/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = 100;
        $config['max_width'] = 1024;
        $config['max_height'] = 768;
        $config['maintain_ratio'] = TRUE;
        $this->load->library('upload', $config);
        if (!$this->upload->do_upload('fileToUpload')) {
            $data['error'] = $this->upload->display_errors();

            $this->load->view('signup', $data);
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


            $this->form_validation->set_rules('email', 'Email', 'required|is_unique[general_user.email]');

            $this->form_validation->set_rules('user_name', 'Username', 'required|is_unique[general_user.user_name]');


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
                        //redirect('user/index');
                    } else {
                        echo "Data can not be added";
                    }
                }
            } else {
                echo "<div class='alert alert-warning'> <strong>" . validation_errors() . "</strong> ";
            }
        }
    }

}
