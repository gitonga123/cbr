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

}
