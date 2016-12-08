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
                                            <strong class='pull-right primary-font'>". $value['user'] ."</strong>
                                        </div>
                                        <p>"
                                         .$value['message'].   
                                        "</p>
                                    </div>
                                </li>" ;
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

    public function logout() {
        $this->session->unset_userdata('is_logged_in');
        session_destroy();
        redirect('login', 'refresh');
    }

}
