<?php 
    class Login_model extends CI_Model 
    {
        function cek_login($username , $pass){
            $this->db->where('username', $username);
            $this->db->where('password', $pass);
            return $this->db->get('data_login');
        }
    }
?>