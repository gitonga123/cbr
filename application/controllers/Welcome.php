<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model(array("case_Model", "user_model"));
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
    }

    public function index() {
        $data['title'] = "CBR: Home Page";
        $data['title'] = "Case Management";

        $data['disease'] = $this->case_Model->get_all_disease();
        $data['symptom'] = $this->case_Model->get_all_symptoms();
        $data['users'] = $this->all_users();
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
        for ($i = 0; $i < count($data_received); $i++) {
            $daniel[$data_received[$i]] = count($this->search_return($vararray, 'symptom_name', $data_received[$i]));
        }
        $value_max = 0;
        $possible_symptom = NULL;

        print_r($daniel);
        foreach ($daniel as $key => $value) {
            if ($value > $value_max) {
                $value_max = $value;
                $possible_symptom = $key;
            }
        }


        echo $possible_symptom . "<br />";
        foreach ($data_received as $key => $value) {
            if ($value == $possible_symptom) {
                $hold_key = $key;
            }
        }
        // print_r($data_received);
        //echo $hold_key;
        $data_results = $this->search_return($vararray, 'symptom_name', $data_received[$hold_key]);

        if (count($data_received) > 1) {

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
                echo "Result Sent";
            } else {
                echo "search not complete";
            }
        }
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

    public function all_users() {
        $users = array();
        $users = $this->user_model->get_all_users();
        return $users;
    }

    public function edit_user() {
        $id = $this->uri->segment(3);
        $data['user'] = $this->user_model->get_by_id($id);
        $this->load->view('edit_user', $data);
    }

    public function delete_user($id) {
        $this->user_model->delete_user($id);
    }

    public function update() {
        $data['first_name'] = $this->input->post('first_name');
        $data['surname'] = $this->input->post('surname');
        $data['email'] = $this->input->post('email');
        $data['mobile_number'] = $this->input->post('mobile');
        $data['physical_address'] = $this->input->post('address');
        $data['password'] = $this->input->post('password');
        $data['user_name'] = $this->input->post('username');

        $update = $this->user_model->update_user($data, $_POST['id']);
        if ($update) {
            echo "<div class='alert alert-info'><strong></strong></div>";
        } else {
            echo 'Nothing';
            //$this->edit_user();
        }
    }

    public function new_user() {
        $data['first_name'] = $this->input->post('first_name');
        $data['surname'] = $this->input->post('surname');
        $data['user_name'] = $this->input->post('username');
        $data['email'] = $this->input->post('email');
        $data['mobile_number'] = $this->input->post('mobile');
        $data['physical_address'] = $this->input->post('address');
        $data['password'] = md5($this->input->post('password'));
        
        print_r($data);

        $this->form_validation->set_rules('first_name', 'First Name', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required|is_unique[users.email]');
        $this->form_validation->set_rules('mobile', 'Mobile Number', 'required');
        $this->form_validation->set_rules('username', 'Username', 'required|is_unique[users.user_name]');
        $this->form_validation->set_rules('address', 'Physical Address', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required|min_length[6]|max_length[15]');
        if ($this->form_validation->run() == TRUE) {
            $insert = TRUE;
            //$insert = $this->user_model->new_user($data);
            if ($insert) {
                echo "<div class='alert alert-success'><strong> Account Created Successfully</strong></div>";
            } else {
                echo "Please check all the fields are correctly filled";
            }
        } else {
            echo "<div class='alert alert-warning'> <strong>" . validation_errors() . "</strong> ";
        }
    }

    public function send_message() {
        $data['user'] = $_SESSION['first_name'];
        $data['message'] = $this->input->post('message');
        $data['user_id'] = $_SESSION['user_id'];
        $data['when'] = date("Y-m-d H:i:s");

        $query = $this->user_model->insert_message($data);
        if ($query) {
            $this->print_messages();
        } else {
            echo "Message not sent";
        }
    }

    public function print_messages() {
        $current_time = new DateTime();
        print_r($current_time);
        //$end_time = new DateTime('2007-09-01 04:10:58');
        //$result_date = $current_time->diff($end_time);
        //echo $result_date->i;
        $messages = $this->get_messages();
        $messages = array_reverse($messages);
        //print_r($messages);
        foreach ($messages as $key => $value) {
            $end_time = new DateTime($value['when']);
            $result_date = $current_time->diff($end_time);
            if ($value['user_id'] == $_SESSION['user_id']) {

                echo "<li class='left clearfix'><span class='chat-img pull-left'>
                <img src='/cbr/assets/images/user.png' class='img-circle' alt='Cinque Terre' width='40' height='30' /> 
                                    </span>
                <div class='chat-body clearfix'>
                    <div class='header'>
                       <strong class='primary-font'>";

                echo $value['user'];

                echo "</strong> <small class='pull-right text-muted'>
                            <span class='glyphicon glyphicon-time'></span>" . $result_date->i . "mins ago</small>
                    </div>
                    <p>" . $value['message'] .
                "</p> </div></li>";
            } else {
                echo "
                    <li class='right clearfix'><span class='chat-img pull-right'>
                             <img src='/cbr/assets/images/Spy.png' class='img-circle' alt='Cinque Terre' width='40' height='30' />
                        </span>
                        <div class='chat-body clearfix'>
                            <div class'header-reply'>
                                <small class' text-muted'><span class='glyphicon glyphicon-time'></span>" . $result_date->i . " mins ago</small>
                                <strong class='pull-right primary-font'>";

                echo $value['user'] . "</strong>";

                echo " </div> <p>" . $value['message'] .
                "</p>
                        </div>
                    </li>";
            }
        }
    }

    public function get_messages() {
        $datas = $this->user_model->get_messages();
        return $datas;
    }

    public function inbox() {
        $data = $this->user_model->inbox();

        echo '<table class="table table-hover table-mail"><tbody>';
        if (count($data) <= 0) {
            echo "<div class='alert alert-info'><p>No New Messages</p></div>";
        } else {
            foreach ($data as $key => $value) {
                if ($value['status'] == 'no') {
                    echo '   <tr class="unread">
                            <td class="check-mail">
                                <input type="checkbox" class="checkbox">
                            </td>
                            <td class="mail-ontact"><a href="#"><bold>' . $value['whole_name'] . '</bold>' . '<span class="label label-warning pull-right">New</span></a></td>
                            <td class="mail-subject"><a href="#">' . $value['title'] . '</a></td>
                            <td class=""><i class="fa fa-paperclip"></i></td>
                            <td class="text-right mail-date">' . $value['timestamp'] . '</td>
                        </tr>';
                } else if ($value['status'] == 'yes') {
                    echo '<tr class="read">
                        <td class="check-mail">
                            <input type="checkbox" class="i-checks">
                        </td>
                        <td class="mail-ontact"><a href="#">' . $value['whole_name'] . '</a></td>
                        <td class="mail-subject"><a href="#">' . $value['title'] . '</a></td>
                        <td class=""></td>
                        <td class="text-right mail-date">' . $value['timestamp'] . '</td>
                    </tr>';
                }
            }
        }
        echo '</tbody></table>';
    }

    public function count_inbox() {
        $data = $this->user_model->inbox();
        $size = count($data);
        echo $size;
    }

    public function get_email_address() {
        $data = $this->user_model->get_email_address();
        $email = array();
        foreach ($data as $key => $value) {
            $email[] = $value['email'];
        }
        echo json_encode($email);
    }

    public function send_email() {
        $data['msg_from'] = $_SESSION['email'];
        $data['msg_to'] = $this->input->post('receipt_email');
        $data['title'] = $this->input->post('subject');
        $data['timestamp'] = date("Y-m-d H:i:s");
        $data['status'] = 'no';
        $data['message'] = $this->input->post('message_sent');
        $data['sender'] = $_SESSION['user_id'];
        // print_r($data);
        $send_email = $this->user_model->send_email($data);
        if ($send_email) {
            echo '<p class="alert alert-danger">Message Send Successfully</p>';
        }
    }

    public function get_sent_mail() {
        $data = $this->user_model->get_sent_mail();
        $size = count($data);
        echo '<table class="table table-hover table-mail"><tbody>';
        if ($size >= 0) {
            foreach ($data as $key => $value) {
                if ($value['sender'] == $_SESSION['user_id']) {


                    echo '   <tr class="unread">
                        <td class="check-mail">
                            <input type="checkbox" class="checkbox">
                        </td>
                        <td class="mail-ontact"><a href="#"><bold>' . $value['whole_name'] . '</bold>' . '</a></td>
                        <td class="mail-subject"><a href="#">' . $value['title'] . '</a></td>
                        <td class=""><i class="fa fa-paperclip"></i></td>
                        <td class="text-right mail-date">' . $value['timestamp'] . '</td>
                    </tr>';
                }
            }
        } else {
            echo '<p class="alert alert-danger">Sent Messages Empty</p>';
        }
        echo "</tbody></table>";
    }

    public function case_summary() {
        $case_summy = $this->case_Model->get_case_summary();
        $case_summary = json_decode(json_encode($case_summy), true);
        $values = $case_summary[0]['disease_name'];
        $size = 0;

        foreach ($case_summary as $key => $value) {

            //$values = $value['disease_name'];
            if ($value['disease_name'] == $values) {
                $size += 1;

                $values = $value['disease_name'];
                $sizes[$value['disease_name']] = $size;
            } else {

                $size = 0;
                //echo "<br />".$value['disease_name'];
                $values = $value['disease_name'];
            }
        }
        echo json_encode($sizes);
    }

    public function unaccount_symptom() {
        $result = $this->case_Model->get_unaccounted_symptom();
        
        echo "<table class='table table-responsive table-condensed table-striped table-hover' id='Tabledata'>";
        echo "<thead><tr><th>Symptom ID</th><th>Symptom Name</th></tr></thead><tbody>";
        
        foreach ($result as $key => $value) {
            echo "<tr><td>{$value->symptom_id}</td><td>{$value->symptom_name}</td>";
        }
        echo "<tbody></table>";
        echo '<script>'
        . '$(document).ready(function(){'
                . '$("#Tabledata").DataTable();});'
                . '</script>';
    }

    public function frequent_symptom_searches() {
        $result = $this->case_Model->frequent_symptom_searches();
        $result2 = json_decode(json_encode($result),true);
       foreach($result2 as $key => $values){
           $result3[$values['symptom_name']] = $values['dupe_cnt']; 
       }
       echo json_encode($result3);
    }

    public function frequent_symptom() {
        $result = $this->case_Model->frequent_symptoms();
        $result1 = json_decode(json_encode($result), true);
        foreach ($result1 as $key => $value) {
            $count_result[$value['symptom_name']] = $value['dupe_cnt'];
        }
        echo json_encode($count_result);
    }

}
?>
    


