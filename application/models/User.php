<?php
class User extends CI_Model {
    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function valid_username($username) {
        $query = $this->db->select('*')
            ->from('MTG_USER')
            ->where('name', $username)
            ->get();
        return count($query->result()) !== 1;
    }

    public function valid_email($email) {
        $query = $this->db->select('*')
            ->from('MTG_USER')
            ->where('mail', $email)
            ->get();
        return count($query->result()) !== 1;
    }

    public function register($user) { //à finir
        //mdp à cacher
        $this->db->insert('MTG_USER', $user);
        return true;
    }
}
?>
