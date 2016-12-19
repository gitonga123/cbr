<?php

defined('BASEPATH') OR EXIT("No direct script access allowed");

class Signup extends CI_Controller {

    function __construct() {
        parent::__construct();
    }

    public function index() {
        $data['title'] = "Create an Account";
        $this->load->view('signup',$data);
    }

}
