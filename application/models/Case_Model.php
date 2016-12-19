<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * This file is used to manage the cases. Adding new cases,
 * Delete cases,
 * View Cases
 */
class Case_Model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    public function add_case($data) {
        $this->db->select("disease_id, symptom_id");
        $query = $this->db->get("disease_symptom_combination");
        $check_disease = $query->result();
        foreach ($check_disease as $disease) {
            if ($disease->disease_id == $data['disease_id']) {
                if ($disease->symptom_id == $data['symptom_id']) {
                    echo "<div class='alert alert-danger'>Case: Already Exitisting</div>";

                    exit();
                }
            }
        }
        return $this->db->insert('disease_symptom_combination', $data);
    }

    public function get_all_disease() {
        $this->db->distinct();
        $this->db->select("disease_name,disease_id");
        $query = $this->db->get("disease_case");

        return $query->result();
    }

    public function get_symptom() {
        $this->db->distinct();
        $this->db->select("symptom_id,symptom_name");
        $query = $this->db->get("symptom");

        return $query->result();
    }

    public function get_symptom2($disease_id) {
        $this->db->select("symptom_name");
        $this->db->where('disease_id', $disease_id);
        $query = $this->db->get("disease_case");
        return $query->result();
    }

    public function get_disease() {
        $this->db->distinct();
        $this->db->select("disease_id,disease_name");
        $query = $this->db->get('disease');
        return $query->result();
    }

    public function get_all_symptoms() {
        $this->db->select('cases_id,symptom_name,disease_id,symptom_id');
        $query = $this->db->get("disease_case");
        return $query->result();
    }

    public function symptom_for_search() {
        $this->db->select('symptom_name');
        $query = $this->db->get('symptom');
        return $query->result();
    }

    public function search_result() {
        $this->db->select('disease_name, symptom_name');
        $query = $this->db->get('disease_case');
        return $query->result();
    }

    public function get_by_id($id) {
        $query = $this->db->get_where('disease', array('disease_id' => $id));
        return $query->row_array();
    }

    public function get_symptom_by_id($id) {
        $query = $this->db->get_where('symptom', array('symptom_id' => $id));
        return $query->row_array();
    }

    public function delete_disease($id) {
        $this->db->where('disease.disease_id', $id);
        return $this->db->delete('disease');
    }

    public function delete_symptom($id) {
        $this->db->where('symptom.symptom_id', $id);
        return $this->db->delete('symptom');
    }

    public function update_symptom($data, $id) {
        $this->db->where('symptom_id', $id);
        return $this->db->update('symptom', $data);
    }

    public function update_disease($data, $id) {
        $this->db->where('disease_id', $id);
        return $this->db->update('disease', $data);
    }

    public function add_symptom($data) {
        $this->db->distinct();
        $this->db->select("symptom_name");
        $query = $this->db->get("symptom");
        $check_symptom = $query->result();
        foreach ($check_symptom as $symptom) {
            if ($symptom->symptom_name == $data['symptom_name']) {
                echo "Error: Symptom already in the database";
                exit();
            }
        }

        return $this->db->insert('symptom', $data);
    }

    public function add_disease($data) {
        $this->db->distinct();
        $this->db->select("disease_name");
        $query = $this->db->get("disease");
        $check_disease = $query->result();
        foreach ($check_disease as $disease) {
            if ($disease->disease_name == $data['disease_name']) {
                echo "<div class='alert alert-danger'>Error: Disease already in the database</div>";
                exit();
            }
        }
        return $this->db->insert('disease', $data);
    }

    public function get_case_summary() {
        $query = $this->db->get('disease_case');

        return $query->result();
    }

    public function get_unaccounted_symptom() {
        $query = $this->db->get('unaccounted_symptom');

        return $query->result();
    }

    public function frequent_cases($param) {
        if (is_array($param)) {
            return $this->db->insert('frequent_cases', $param);
        } else {
            exit();
        }
    }

    public function frequent_symptom_searches() {
        $this->db->select('symptom_name,dupe_cnt');
        $query = $this->db->get('frequent_symptom_searches');
        return $query->result();
    }
    
    public function frequent_symptoms() {
        $query = $this->db->get('frequent_symptom');
        return $query->result();
    }
}

?>