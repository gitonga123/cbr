<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Cases extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model(array("case_Model", "user_model"));
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
    }

    public function index() {
        $data['title'] = "CBR: Home Page";
        $data['disease'] = $this->case_Model->get_all_disease();
        $data['symptom'] = $this->case_Model->get_all_symptoms();
        $data['disease2'] = $this->case_Model->get_disease();
        $data['symptom2'] = $this->case_Model->get_symptom();
        $data['error_message'] = "";

        if (isset($_POST['selection1']) && isset($_POST['selection2'])) {
            $data_selected1 = $this->input->post('selection1');
            $data_selected2 = $this->input->post('selection2');
            echo $data_selected1 . "</br >";

            foreach ($data_selected2 as $key => $value) {

                $case_added = $this->case_Model->add_case($data_selected1, $value);
            }
            if ($case_added) {
                $data['error_message'] = "Case Added in the system";
            } else {
                $data['error_message'] = "Case Already Existing in the system";
            }
        } else {
            $data['error_message'] = "Nothing to insert";
        }

        $this->load->view('case', $data);
    }

    public function displayID() {
        $valuex = $this->input->post('diseaseID');
        $symptoms = $this->case_Model->get_symptom2($valuex);

        //$this->load->view('diseaseID',$data);
        echo json_encode(['SYMPTOMS' => $symptoms]);
    }

    public function active_case() {

        $data = $this->input->post('symptom_id');
        
        $return = $this->case_Model->active_case($data);
        if ($return) {
            
        } else {
            
        }
    }

    public function inactive_case() {
        $data = $this->input->post('symptom_id');
        
        $result = $this->case_Model->inactive_case($data);
        if ($result) {
            
        } else {
            
        }
    }

}
