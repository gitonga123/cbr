<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model(array("case_Model", "user_model"));
        $this->load->helper('url');
        $this->load->library('form_validation');
        $this->load->helper('form');
    }

    public function index() {
        $data['users'] = $this->all_users();

        $data['disease2'] = $this->list_disease();

        $this->load->view('welcome_message', $data);
    }

    public function list_symptom() {
        $datas = $this->case_Model->get_symptom();
        return $datas;
    }

    public function list_disease() {
        $daeta = $this->case_Model->get_disease();
        return $daeta;
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



        $this->form_validation->set_rules('first_name', 'First Name', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required|is_unique[users.email]');
        $this->form_validation->set_rules('mobile', 'Mobile Number', 'required');
        $this->form_validation->set_rules('username', 'Username', 'required|is_unique[users.user_name]');
        $this->form_validation->set_rules('address', 'Physical Address', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required|min_length[6]|max_length[15]');
        if ($this->form_validation->run() == TRUE) {

            $insert = $this->user_model->new_user($data);
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

    public function chat() {
        $data['title'] = "Live Consulation";
        $this->load->view('chat', $data);
    }

    public function message() {
        $data['title'] = "Send Mail";

        $this->load->view('message', $data);
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
        $hold_message = "";
        if (count($data) <= 0) {
            echo "<div class='alert alert-info'><p>No New Messages</p></div>";
        } else {
            echo "<div class='deleted_message_info'> </div>";
            foreach ($data as $key => $value) {
                if ($value['status'] == 'no' && $value['delete_msg'] != 'yes') {
                    echo '   <tr class="unread">
                            <td class="check-mail">
                                <input type="checkbox" class="checkbox" id="msg_checkbox" value="' . $value['msg_id'] . '">
                            </td>
                            <td class="mail-contact"><a href="/cbr/welcome/read_mail?id=' . $value['msg_id'] . '"><bold>' . $value['whole_name'] . '</bold>' . '<span class="label label-warning pull-right">New</span></a></td>
                            <td class="mail-subject"><a href="/cbr/welcome/read_mail?id=' . $value['msg_id'] . '">' . $value['title'] . '</a></td>
                            <td class=""><i class="fa fa-paperclip"></i></td>
                            <td class="text-right mail-date">' . $value['timestamp'] . '</td>
                        </tr>';
                } else if ($value['status'] == 'yes' && $value['delete_msg'] != 'yes') {
                    echo '<tr class="read">
                        <td class="check-mail">
                            <input type="checkbox" class="i-checks">
                        </td>
                        <td class="mail-ontact"><a href="/cbr/welcome/read_mail?id={$value["msg_id"]}">' . $value['whole_name'] . '</a></td>
                        <td class="mail-subject"><a href="/cbr/welcome/read_mail?id={$value["msg_id"]}">' . $value['title'] . '</a></td>
                        <td class=""></td>
                        <td class="text-right mail-date">' . $value['timestamp'] . '</td>
                    </tr>';
                } else {
                    //$hold_message = "<div class='alert alert-info'><p>No New Messages</p></div>";
                }
            }

            echo "<script>
                   function delete_msg() {
                        var checkedValue = $('#msg_checkbox:checked').val();
                        \$srvrequest = $.ajax({
                                url: 'http://localhost/cbr/index.php/welcome/delete_text',
                                type: 'post',
                                data: {msg_id: checkedValue},
                                datatype: 'text',

                            });
                            srvRqst.done(function (response) {
                                 var html = '<p class=\"alert alert-danger\">Message Deleted</p>';
                                 $('div.deleted_message_info').html(html);  
                            });
                }
                function mark_important(){
                        var checkedValue = $('#msg_checkbox:checked').val();
                        \$srvrequest = $.ajax({
                                url: 'http://localhost/cbr/index.php/welcome/mark_import',
                                type: 'post',
                                data: {msg_id: checkedValue},
                                datatype: 'text',

                            });
                            srvRqst.done(function (response) {
                                 var html = '<p class=\"alert alert-danger\">Message Marked Important</p>';
                                 $('div.deleted_message_info').html(html);  
                            });
                }
                 </script>";
            echo $hold_message;
        }
        echo '</tbody></table>';
    }

    public function delete_text() {

        $value = $this->input->post('msg_id');
        $this->user_model->delete_email($value);
    }

    public function mark_import() {

        $value = $this->input->post('msg_id');
        $this->user_model->important_email($value);
    }

    public function read_mail() {

        $id = $this->input->get('id');
        $this->user_model->read_email($id);
        $data['mail_content'] = $this->user_model->get_mail($id);

        $this->load->view('readmail', $data);
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
        if ($size > 0) {
            foreach ($data as $key => $value) {
                if ($value['sender'] == $_SESSION['user_id']) {


                    echo '   <tr class="unread">
                        <td class="check-mail">
                            <input type="checkbox" class="Messagecheckbox" onclick ="delete()">
                        </td>
                        <td class="mail-ontact"><a href="/cbr/welcome/read_mail?id=' . $value['msg_id'] . '"><bold>' . $value['whole_name'] . '</bold>' . '</a></td>
                        <td class="mail-subject"><a href="/cbr/welcome/read_mail?id=' . $value['msg_id'] . '">' . $value['title'] . '</a></td>
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

    public function get_important() {

        $data = $this->user_model->inbox();
        $size = count($data);
        echo '<table class="table table-hover table-mail"><tbody>';
        if ($size >= 0) {
            foreach ($data as $key => $value) {
                if ($value['important'] == 'yes' && $value['delete_msg'] != 'yes') {
                 echo '   <tr class="unread">
                        <td class="check-mail">
                            <input type="checkbox" class="Messagecheckbox" onclick ="delete()">
                        </td>
                        <td class="mail-ontact"><a href="/cbr/welcome/read_mail?id=' . $value['msg_id'] . '"><bold>' . $value['whole_name'] . '</bold>' . '</a></td>
                        <td class="mail-subject"><a href="/cbr/welcome/read_mail?id=' . $value['msg_id'] . '">' . $value['title'] . '</a></td>
                        <td class=""><i class="fa fa-paperclip"></i></td>
                        <td class="text-right mail-date">' . $value['timestamp'] . '</td>
                    </tr>';
                }
            }
        } else {
            echo '<p class="alert alert-danger">No Important Messages</p>';
        }
        echo "</tbody></table>";
    }
    
    public function report() {
        $data['title'] = 'Reports';
        $this->load->view('report');
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
        $result2 = json_decode(json_encode($result), true);
        foreach ($result2 as $key => $values) {
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
    


