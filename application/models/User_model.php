<?php

defined('BASEPATH') or exit("No direct script access allowed");

class User_model extends CI_Model {

    function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function get_all_users() {
        $query = $this->db->get('users');

        return $query->result();
    }

    public function new_user($data) {
        return $this->db->insert('users', $data);
    }

    public function get_by_id($id) {
        $query = $this->db->get_where('users', array('user_id' => $id));
        return $query->row_array();
    }

    public function get_mail($id) {
        $query = $this->db->get_where('inbox', array('msg_id' => $id));
        return $query->row_array();
    }

    public function update_user($data, $id) {
        $this->db->where('users.user_id', $id);
        return $this->db->update('users', $data);
    }

    public function delete_user($id) {
        $this->db->where('users.user_id', $id);
        return $this->db->delete('users');
    }

    public function validate($data) {
        extract($data);
        $this->db->where('user_name', $username);
        $this->db->where('password', $password);
        $query = $this->db->get('users');

        if ($query->num_rows() == 1) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function get_specific_user($username) {
        $query = $this->db->get_where('users', array('user_name' => $username));
        return $query->row_array();
    }

    public function get_user_specific($id) {
        $query = $this->db->get_where('users', array('user_id' => $id));
        return $query->row_array();
    }

    public function insert_message($data) {
        return $this->db->insert('s_chat_messages', $data);
    }

    public function get_messages() {

        $result = array();
        $this->db->limit(6);
        $this->db->order_by('id', 'DESC');
        $query = $this->db->get('chat_message');
        if ($query->num_rows() > 0) {

            return $query->result_array();
        }
    }

    public function store_session($data) {

        return $this->db->insert('store_session', $data);
    }

    public function destroy_session($id) {
        $this->db->where('store_session.user_id', $id);
        return $this->db->delete('store_session');
    }

    public function inbox() {
        $this->db->where('inbox.msg_to', $_SESSION['email']);
        $query = $this->db->get('inbox');

        if ($query->num_rows() > 0) {
            return $query->result_array();
        }
    }

    public function get_email_address() {
        $this->db->select('email');
        $this->db->where('user_id !=', $_SESSION['user_id']);
        $query = $this->db->get('users');
        return $query->result_array();
    }

    public function send_email($data) {
        return $this->db->insert('private_message_send', $data);
    }

    public function get_sent_mail() {
        $this->db->where('inbox.sender', $_SESSION['user_id']);
        $query = $this->db->get('inbox');
        if ($query->num_rows() > 0) {
            return $query->result_array();
        }
    }

    public function delete_email($id) {
        $data = array(
            'delete_msg' => 'yes'
        );
        $this->db->where('private_message_send.msg_id', $id);
        return $this->db->update('private_message_send', $data);
    }
    
    public function important_email($id) {
        $data = array(
            'important' => 'yes'
        );
        $this->db->where('private_message_send.msg_id', $id);
        return $this->db->update('private_message_send', $data);
    }

    public function insert_file($filename) {
        $this->db->insert('users', $filename);
        return $this->db->insert_id();
    }
    
    public function read_email($id){
        $data = array(
          'status' => 'yes'  
        );
        $this->db->where('private_message_send.msg_id', $id);
        return $this->db->update('private_message_send', $data);
    }

}
