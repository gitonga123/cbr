<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model("case_Model");
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
    }

    public function index() {
        $data['title'] = "CBR: Home Page";
        $data['title'] = "Case Management";

        $data['disease'] = $this->case_Model->get_all_disease();
        $data['symptom'] = $this->case_Model->get_all_symptoms();
        // $data['records'] = $this->case_Model->symptom_for_search();
        $data['symptom2'] = $this->list_symptom();
        $data['disease2'] = $this->list_disease();

        $this->load->view('welcome_message', $data);
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
        //$received_db = array();

        $data_received = $this->input->post('symptom_search');
        $received_db = $this->case_Model->search_result();

        $json_data = json_encode($received_db);
        $vararray = json_decode($json_data, true);
        if (count($data_received) > 1) {
            $data = array();
            
//            for ($i = 0; $i < count($data_received); $i++) {
//                $data = $this->search_return($vararray, 'symptom_name', $data_received[$i]);
//                print_r($data);
//            }
        } else {
            $data_results = $this->search_return($vararray, 'symptom_name', $data_received[0]);
        }
        
        echo '<table class="table table-hover">';
        echo "<thead><tr><th colspan='2' class='alert alert-danger'>Likely Dieases: Disease Found = ". count($data_results)."</th></tr>"
                . "<tr><th>No.</th><th>Disease Name</th></tr></thead><tbody>";
        
        $index = 0;
        foreach ($data_results as $key) {
            $index += 1;
            echo "<tr><td>".$index . ". </td><td>" . $key['disease_name'] . "</td></tr>";
        }
        echo "</tbody></table>";
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

    public function list_symptom() {

        $datas = $this->case_Model->get_symptom();
        return $datas;
    }

    public function list_disease() {
        $daeta = $this->case_Model->get_disease();
        return $daeta;
    }

    public function edit_symptom() {
        $id = $this->uri->segment(3);
        $data['symptom'] = $this->case_Model->get_symptom_by_id($id);
        $this->load->view('edit_symptom', $data);
    }

    public function edit_disease() {
        $id = $this->uri->segment(3);
        $data['user'] = $this->case_Model->get_by_id($id);
        echo "request Received";
        $this->load->view('home#edit', $data);
    }

    public function delete_symptom($id) {
        $this->case_Model->delete_symptom($id);
        echo "<div class='alert alert-danger'><strong>Symptom Deleted Successfully</strong></div>";
        header('location', base_url() . "index.php/home" . $this->index());
    }

    public function delete_disease($id) {
        $this->case_Model->delete_disease($id);
        echo "<div class='alert alert-danger'><strong>Disease Deleted Successfully</strong></div>";
        header('location', base_url() . "index.php/home" . $this->index());
    }

    public function update_symptom() {
        $data['symptom_name'] = $this->input->post('symptom');

        $update = $this->case_Model->update_symptom($data, $_POST['id']);

        if ($update) {
            echo "<div class='alert alert-info'><strong>Symptom Successfully Updated</strong></div>";
            header('location', base_url() . "index.php/home" . $this->index());
        } else {
            $this->load->view("edit_symptom");
        }
    }

    public function new_symptom() {
        $this->load->view('new_symptom');
    }

    public function new_disease() {
        $this->load->view('new_disease');
    }

    public function submission() {
        $data['symptom_name'] = $this->input->post('symptom');
        $config = array(
            array(
                'field' => 'symptom',
                'label' => 'Symptom',
                'rules' => 'required|min_length[5]|max_length[20]'
            )
        );
        $this->form_validation->set_rules($config);
        if ($this->form_validation->run() == TRUE) {

            $added = $this->case_Model->add_symptom($data);
            if ($added) {
                header('location', base_url() . "index.php/home" . $this->index());
            }
        } else {
            echo "<div class='alert alert-danger'>" . validation_errors() . "</div>";
        }
    }

    public function submissiond() {
        $data['disease_name'] = $this->input->post('disease');
        $config = array(
            array(
                'field' => 'disease',
                'label' => 'Disease',
                'rules' => 'required|min_length[5]|max_length[20]'
            )
        );
        $this->form_validation->set_rules($config);
        if ($this->form_validation->run() == TRUE) {

            $added = $this->case_Model->add_disease($data);
            if ($added) {
                //exit();
                header('location', base_url() . "index.php/home" . $this->index());
            }
        } else {
            echo "<div class='alert alert-danger'>" . validation_errors() . "</div>";
        }
    }

    public function new_case() {
        $data['symptom'] = $this->list_symptom();
        $data['disease'] = $this->list_disease();
        $data_selected['disease_id'] = $this->input->post('selection1');
        $data_selected['symptom_id'] = $this->input->post('selection2');
        if (isset($_POST['selection1']) && isset($_POST['selection2'])) {
            $case_added = $this->case_Model->add_case($data_selected);
            if ($case_added) {
                echo "<div class='alert alert-danger'>" . anchor(base_url("index.php/welcome/new_case"), 'Case Added') . "</div>";
                header('location', base_url() . "index.php/welcome" . $this->index());
            } else {

                $this->load->view('new_case', $data);
            }
        } else {
            $this->load->view('new_case', $data);
        }
    }

    public function displayID() {
        $valuex = $this->input->post('diseaseID');
        $symptoms = $this->case_Model->get_symptom2($valuex);

        //$this->load->view('diseaseID',$data);
        echo json_encode(['SYMPTOMS' => $symptoms]);
    }

}
?>
    


