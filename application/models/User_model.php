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
        $this->db->where('user_name',$username);
        $this->db->where('password',$password);
        $query = $this->db->get('users');
        
        if($query->num_rows() == 1){
            return TRUE;
        }else{
            return FALSE;
        }
    }
    
    public function get_specific_user($username){
        $query = $this->db->get_where('users', array('user_name' => $username));
        return $query->row_array();
    }

}
