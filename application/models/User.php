<?php
class User extends CI_Model {
    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    private function hash($password) {
        $seed = 'abcdefghijklmnopqrstuvwxyz'.'ABCDEFGHIJKLMNOPQRSTUVWXYZ'.'0123456789';
        $salt = '';
        for ($i = 0 ; $i < 4 ; $i++)
            $salt .= $seed[rand(0, strlen($seed))];
        return sha1($password).$salt;
    }

    private function matches($a, $b) {
        return (substr($a, 0, -4) === substr($this->hash($b), 0, -4));
    }

    public function exists($user) {
        $query = $this->db->select('password')
            ->from('USER')
            ->where('email', $user['email'])
            ->get();
        $query = $query->result();
        return count($query) === 1 ? $this->matches($query[0]->password, $user['password']) : FALSE;
    }

    public function valid_email($email) {
        $query = $this->db->select('*')
            ->from('USER')
            ->where('email', $email)
            ->get();
        return count($query->result()) < 1;
    }
}
?>
