<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Symptom extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model(array("case_Model", "user_model"));

        $this->load->helper('url');
        $this->load->library('form_validation');
    }

    public function index() {
        $data['title'] = "CBR| Symptom";
        $data['symptom2'] = $this->list_symptom();
        $this->load->view('symptom', $data);
    }

    public function list_symptom() {
        $datas = $this->case_Model->get_symptom();
        return $datas;
    }

    public function edit_symptom() {
        $id = $this->input->get('id');
        $data['symptom'] = $this->case_Model->get_symptom_by_id($id);
        $this->load->view('edit_symptom', $data);
    }

    public function update_symptom() {
        $data['title'] = "CBR| Symptom";
        $data['error_message'] = "";
        $data1['symptom_description'] = $this->input->post('symptom_description');
        $data1['symptom_name'] = $this->input->post('symptom_name');
        $update = $this->case_Model->update_symptom($data1, $_POST['id']);

        if ($update) {
            $data['error_message'] = "Disease Update";
        } else {
            $data['error_message'] = "Disease Can not be Updated";
        }
        $data['symptom2'] = $this->list_symptom();
        $this->load->view('symptom', $data);
    }

    public function submission() {
        $data['symptom_description'] = $this->input->post('symptom_description');
        $data['symptom_name'] = $this->input->post('symptom');
        $added = $this->case_Model->add_symptom($data);
        if ($added) {
            $data['error_message'] = "New Symptom Added";
        } else {
            $data['error_message'] = "New Symptom can not be added";
        }

        $data['symptom2'] = $this->list_symptom();
        $this->load->view('symptom', $data);
    }

    public function delete_symptom() {
        $id = $this->input->get('id');
        $data['error_message'] = "";
        $result = $this->case_Model->delete_symptom($id);
        if ($result) {
            $data['error_message'] = "Symptom Deleted";
        } else {
            $data['error_message'] = "Symptom Can not be Deleted";
        }

        $data['symptom2'] = $this->list_symptom();
        $this->load->view('symptom', $data);
    }

    public function active_symptom() {

        $data = $this->input->post('symptom_id');

        $return = $this->case_Model->active_symptom($data);
        if ($return) {
            
        } else {
            
        }
    }

    public function delete_symptoms() {
        $data = $this->input->post('symptom_id');
        $result = $this->case_Model->delete_symptom($data);
        if ($result) {
            
        } else {
            
        }
    }

}
