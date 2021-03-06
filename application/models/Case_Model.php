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

    public function add_case($data1, $data2) {
        $data = array(
            'disease_id' => $data1,
            'symptom_id' => $data2
        );
        $this->db->select("disease_id, symptom_id");
        $query = $this->db->get("disease_symptom_combination");
        $check_disease = $query->result();
        foreach ($check_disease as $disease) {
            if ($disease->disease_id == $data['disease_id']) {
                if ($disease->symptom_id == $data['symptom_id']) {
                    return FALSE;
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

    public function get_symptom3() {
        $this->db->select("symptom_id,symptom_name");
        $query = $this->db->get("active_symptom");
        return $query->result();
    }

    public function get_symptom2($disease_id) {
        $this->db->select("symptom_name");
        $this->db->where('disease_id', $disease_id);
        $query = $this->db->get("disease_case_true");
        return $query->result();
    }

    public function get_disease() {
        $this->db->distinct();
        $this->db->select("disease_id,disease_name");
        $query = $this->db->get('disease');
        return $query->result();
    }

    public function get_all_symptoms() {
        $this->db->select('cases_id,symptom_name,disease_id,symptom_id,active');
        $query = $this->db->get("disease_case");
        return $query->result();
    }

    public function symptom_for_search() {
        $this->db->select('symptom_name');
        $query = $this->db->get('active_symptom');
        return $query->result();
    }

    public function search_result() {
        $this->db->select('disease_name, symptom_name');
        $query = $this->db->get('disease_case_true');
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
                return false;
            }
        }

        return $this->db->insert('symptom', $data);
    }

    public function add_disease($data) {
        $check = 0;
        $this->db->distinct();
        $this->db->select("disease_name");
        $query = $this->db->get("disease");
        $check_disease = $query->result();
        foreach ($check_disease as $disease) {
            if ($disease->disease_name == $data['disease_name']) {
                $check = 1;
            }
        }
        if ($check == 1) {
            return FALSE;
        } else {

            return $this->db->insert('disease', $data);
        }
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

    public function add_symptom_undefined($data) {
        $data1 = array(
            'symptom_name' => $data,
            'active' => 0
        );

        return $this->db->insert('symptom', $data1);
    }

    public function get_symptom4() {
        $query = $this->db->get('symptom_undefined');
        return $query->result();
    }

    public function active_symptom($id) {
        $data = array(
            'active' => 1
        );
        $this->db->where('symptom_id', $id);
        return $this->db->update('symptom', $data);
    }

    public function active_case($id) {
        $data = array(
            'active' => 1
        );
         $this->db->where('cases_id', $id);
        $result = $this->db->update('disease_symptom_combination', $data);
        if ($result) {
            echo "Case With Member {$id} Activated";
        } else {
            echo "Case with Member {$id} can not be activated at the moment";
        }

    }

    public function inactive_case($id) {
        $data = array(
            'active' => 0
        );
        $this->db->where('cases_id', $id);
        $result = $this->db->update('disease_symptom_combination', $data);
        if ($result) {
            echo "Case Member {$id} Diactivated";
        } else {
            echo "Case with Member {$d} Could Not be diactevated at the moment";
        }
    }

    public function diactivate_all() {
        $query = $this->db->get('disease_symptom_combination');

        $result = $query->result();
        $data = array(
            'active' => 0
        );
        foreach ($result as $key => $value) {
            $this->db->where('cases_id', $value->cases_id);
            $hold[] = $this->db->update('disease_symptom_combination', $data);
        }
        if (count($hold) == count($result)) {
            echo "<p class='alert alert-warning'>All Cases Di-Activated</p>";
            echo "<script>"
            . "$('.loader').hide();"
            . "</script>";
        }
    }

    public function activate_all() {
        $query = $this->db->get('disease_symptom_combination');
        $hold = 0;
        $result = $query->result();
        $data = array(
            'active' => 1
        );
        foreach ($result as $key => $value) {
            $this->db->where('cases_id', $value->cases_id);
            $hold += $this->db->update('disease_symptom_combination', $data);
        }
        if ($hold == count($result)) {
            echo "<p class='alert alert-info'>All Cases Activated</p>";
            echo "<script>"
            . "$('.loader').hide();"
            . "</script>";
        } else {
            
        }
    }

}

?>