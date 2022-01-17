<?php if(!defined('BASEPATH')) exit ('No direct script access allowed');

    class M_sm extends CI_Model {
        public function __construct()
        {
            parent::__construct();
        }

        public function cek_user($table, $where) {
        //set query
            return $this->db->get_where($table,$where);
        }

        public function update_user($data, $username){
            $this->db->update('users', $data, array('username' => $username));
            return ($this->db->affected_rows() > 0) ? TRUE : FALSE;
        }

        public function add_user($data)
        {
            $this->load->database();
            $this->db->insert('users', $data);
            return $this->db->insert_id();
        }

        public function logout($data, $user){
            $this->db->update('users', $data, array('username' => $user));
            return ($this->db->affected_rows() > 0) ? TRUE : FALSE;
        }
       
    }