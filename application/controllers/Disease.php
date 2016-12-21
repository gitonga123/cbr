<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Disease extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model(array("case_Model", "user_model"));

        $this->load->helper('url');
        $this->load->library('form_validation');
    }

    public function index() {
        $data['title'] = "CBR|Case - Disease";
        $data['disease2'] = $this->case_Model->get_disease();
        $data['error_message'] = "";


        $this->load->view('disease', $data);
    }
    
    

    public function edit_disease() {

        $id = $this->input->get('id');
        $data['user'] = $this->case_Model->get_by_id($id);
        $this->load->view('edit_disease', $data);
    }

//    public function edit_disease() {
//        $id = $this->uri->segment(3);
//        $data['user'] = $this->case_Model->get_by_id($id);
//        echo "request Received";
//        $this->load->view('home#edit', $data);
//    }

    public function delete_disease() {
        $data['title'] = "CBR|Case - Disease";
        $data['disease2'] = $this->case_Model->get_disease();
        $data['error_message'] = "";
        $id = $this->input->get('id');
        if ($this->case_Model->delete_disease($id)) {
            $data['error_message'] = "Disease Deleted";
        } else {
            $data['error_message'] = "Disease Not Deleted";
        }
        $this->load->view('disease', $data);
    }

    public function submissiond() {
        if (isset($_POST['disease']) && isset($_POST['description']) && isset($_POST['treatment']) && isset($_POST['medication'])) {
            $data1['disease_name'] = $this->input->post('disease');
            $data1['disease_description'] = $this->input->post('description');
            $data1['disease_treatment'] = $this->input->post('treatment');
            $data1['disease_medication'] = $this->input->post('medication');
            $data['title'] = "CBR|Case - Disease";

            $data['error_message'] = "";

            $added = $this->case_Model->add_disease($data1);
            if ($added) {
                $data['error_message'] = "Disease Added in the Case Memory";
            } else {
                $data['error_message'] = "Disease Could Not be add in the Case Memory";
            }
        }
        $data['disease2'] = $this->$this->case_Model->get_disease();
        
        $this->load->view('disease', $data);
    }

}
