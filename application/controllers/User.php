<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

    function __construct() {
        parent::__construct();
    }

    public function index() {
        $this->load->view('user_show');
    }

    public function logout() {
        $this->session->unset_userdata('is_logged_in');
        session_destroy();
        redirect('login', 'refresh');
    }

}
