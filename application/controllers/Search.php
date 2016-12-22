<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Search extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model(array("case_Model", "user_model"));
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
    }

    public function index() {
        $data['title'] = 'CBR | Search Diagnosis';
        $this->load->view('search');
    }

    public function searchArea() {
        $symptom_search = $this->case_Model->symptom_for_search();
        //print_r($symptom_search);
        $symptoms = array();
        foreach ($symptom_search as $key => $value) {
            $symptoms[] = $value->symptom_name;
        }
        echo json_encode($symptoms);
    }

    public function search_result() {
        $data_received = array();
        $data_results = array();



        $config = array(
            array(
                'field' => 'symptom_search',
                'label' => 'symptom Search',
                'rules' => 'required'
            )
        );
        $this->form_validation->set_rules($config);

        $data_received = $this->input->post('symptom_search');
        $received_db = $this->case_Model->search_result();

        $json_data = json_encode($received_db);
        $vararray = json_decode($json_data, true);
        $daniel = array();
        if (count($data_received) > 1) {
            for ($i = 0; $i < count($data_received); $i++) {
                $daniel[$data_received[$i]] = count($this->search_return($vararray, 'symptom_name', $data_received[$i]));
            }
            $value_max = 0;
            $possible_symptom = NULL;

            foreach ($daniel as $key => $value) {
                if ($value > $value_max) {
                    $value_max = $value;
                    $possible_symptom = $key;
                }
            }



            foreach ($data_received as $key => $value) {
                if ($value == $possible_symptom) {
                    $hold_key = $key;
                }
            }

            $data_results = $this->search_return($vararray, 'symptom_name', $data_received[$hold_key]);

            echo '<table class="table table-hover">';

            $multiple_data = $this->multi_symptom_search($data_results, $vararray, $data_received);
            $result_count = array_count_values($multiple_data);
            arsort($result_count);


            $disease_count1 = $this->send_disease_count($result_count);
            $disease_result2 = $this->send_disease_result($result_count);


            echo "<button class='btn btn-info' onclick='view_graph($disease_count1,$disease_result2)'>View As A Graph</button>";
            echo "<table class='table table-hover'><thead><tr><th>Disease Name</th><th>Symptom Frequency Appearance:</th></tr><tbody>";
            foreach ($result_count as $value => $kyes) {
                echo "<tr><td>" . $value . "</td><td>" . $kyes . "</td><tr>";
            }

            echo "</tbody></table>";
        } else {
            $data_results = $this->search_return($vararray, 'symptom_name', $data_received[0]);
            echo '<table class="table table-hover">';
            echo "<thead><tr><th colspan='2' class='alert alert-danger'>Likely Dieases: Disease Found = " . count($data_results) . "</th></tr>"
            . "<tr><th>No.</th><th>Disease Name</th></tr></thead><tbody>";

            $index = 0;
            foreach ($data_results as $key) {
                $index += 1;
                echo "<tr><td>" . $index . ". </td><td>" . $key['disease_name'] . "</td></tr>";
            }
            echo "</tbody></table>";
        }
        foreach ($data_received as $key => $value) {
            $data_sent['search_id'] = $key;
            $data_sent['symptom_name'] = $value;

            $send_to_db = $this->case_Model->frequent_cases($data_sent);
            if ($send_to_db) {
                
            } else {
                echo "search not complete";
            }
        }
        $this->learn($data_received);
    }

    public function search_return($array, $key, $value) {
        $results = array();

        if (is_array($array)) {
            if (isset($array[$key]) && $array[$key] == $value) {
                $results[] = $array;
            }

            foreach ($array as $subarray) {
                $results = array_merge($results, $this->search_return($subarray, $key, $value));
            }
        }

        return $results;
    }

    public function multi_symptom_search($array1, $array2, $symptoms) {
        $result = array();
        $disease = array();


        if (is_array($array1) && is_array($array2) && is_array($symptoms)) {
            $size = count($symptoms);
            foreach ($array1 as $key) {
                $result = $this->search_return($array2, 'disease_name', $key['disease_name']);
                foreach ($result as $keys) {
                    for ($i = 0; $i < $size; $i++) {
                        if ($keys["symptom_name"] == $symptoms[$i]) {
                            array_push($disease, $keys['disease_name']);
                        }
                    }
                }
            }
        } else {
            $disease[] = "Symptoms Can not be identified by the system";
        }
        return $disease;
    }

    public function send_disease_count($disease_count) {
        $count = array();
        foreach ($disease_count as $value => $keys) {
            $count[] = $keys;
        }
        $result = json_encode($count);
        return $result;
    }

    public function send_disease_result($disease_result) {
        $count = array();
        foreach ($disease_result as $value => $keys) {
            $count[] = $value;
        }
        $result = json_encode($count);
        return $result;
    }

    public function learn($data_received) {
        $vararray = $this->case_Model->get_symptom3();

        $holdarray = json_decode(json_encode($vararray), true);
        $size = count($data_received);
        for ($i = 0; $i < $size; $i++) {
            $data_results = $this->search_return($holdarray, 'symptom_name', $data_received[$i]);

            if (count($data_results) == 0) {
                $this->case_Model->add_symptom_undefined($data_received[$i]);
            }
        }
    }
    
    public function undefined(){
        $data['symptom2'] = $this->case_Model->get_symptom4();//Get all symptoms that are undefined
        
        $this->load->view('undefined',$data);
    }

}
