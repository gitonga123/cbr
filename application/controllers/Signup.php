<?php

defined('BASEPATH') OR EXIT("No direct script access allowed");

class Signup extends CI_Controller {

    function __construct() {
        parent::__construct();
    }

    public function index() {
        $this->load->view('signup');
    }

}
