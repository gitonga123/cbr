<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model("user_model");
    }

    public function index() {
        $this->load->view('user_show');
    }

    public function send_message() {
        $data['user'] = $_SESSION['first_name'];
        $data['message'] = $this->input->post('message');
        $data['user_id'] = $_SESSION['user_id'];
        $data['when'] = date("Y-m-d H:i:s");

        $query = $this->user_model->insert_message($data);
        if ($query) {
            $messages = $this->get_messages();

            foreach ($messages as $key => $value) {
                if ($value['user_id'] == $_SESSION['user_id']) {
                    echo "<li class='left clearfix'><span class='chat-img pull-left'>
                <img src='/cbr/assets/images/user.png' class='img-circle' alt='Cinque Terre' width='40' height='30' /> 
                                    </span>
                <div class='chat-body clearfix'>
                    <div class='header'>
                       <strong class='primary-font'>" . $value['user'] . "</strong> <small class='pull-right text-muted'>
                            <span class='glyphicon glyphicon-time'></span>12 mins ago</small>
                    </div>
                    <p>" . $value['message'] .
                    "</p> </div></li>";
                } else {
                    echo "
                                <li class='right clearfix'><span class='chat-img pull-right'>
                                        <img src='http://placehold.it/50/FA6F57/fff&amp;text=ME' alt='User Avatar' class='img-circle'>
                                    </span>
                                    <div class='chat-body clearfix'>
                                        <div class'header-reply'>
                                            <small class' text-muted'><span class='glyphicon glyphicon-time'></span>13 mins ago</small>
                                            <strong class='pull-right primary-font'>" . $value['user'] . "</strong>
                                        </div>
                                        <p>"
                    . $value['message'] .
                    "</p>
                                    </div>
                                </li>";
                }
            }
        } else {
            echo "Message not sent";
        }
    }

    public function get_messages() {
        $data['user_id'] = $_SESSION['user_id'];
        $datas = $this->user_model->get_messages();
        return $datas;
    }

    public function view_all_users() {
        $users = $this->user_model->get_all_users();
        echo '<table class="table table-bordered">
            <tr>
                <th scope="col">User ID</th>
                <th scope="col">Surname</th>
                <th scope="col">First Name</th>
                <th scope="col">Username</th>
                <th scope="col">Role</th>
                
                <th scope="col">Email</th>
                <th scope="col">Address</th>
                <th scope="col">Mobile</th>
                <th scope="col" colspan="3">Action</th>
            </tr>';

        foreach ($users as $details) {
            echo "<tr>
                   <td> {$details->user_id }</td>
                   <td> {$details->first_name }</td>
                   <td> {$details->surname }</td>
                   <td> {$details->user_name}</td>
                   <td> {$details->user_category }</td>
                   <td> {$details->email }</td>
                   <td> {$details->physical_address}</td>
                   <td> {$details->mobile_number}</td>";
            if ($details->activated == 1) {
                echo "<td>Active</td>";
            } else {
                echo "<td>Inactive</td>";
            }
            echo "<td width='40' align='left'><a href='#' onClick='show_confirm(\"edit_user\",$details->user_id)'>Edit</a></td>";
            echo "<td width='40' align='left' ><a href='#' onClick='show_confirm(\"delete_user\",$details->user_id)'>Delete </a></td>
               </tr>
                ";
        }
        echo '</table>';
    }

    public function logout() {
        $this->session->unset_userdata('is_logged_in');
        session_destroy();
        redirect('login', 'refresh');
    }

}
