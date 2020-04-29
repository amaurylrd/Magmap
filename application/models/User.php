<?php
class User extends CI_Model {
    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    function hash($password) {
        $seed = 'abcdefghijklmnopqrstuvwxyz'.'ABCDEFGHIJKLMNOPQRSTUVWXYZ'.'0123456789';
        $salt = '';
        for ($i = 0 ; $i < 4 ; $i++)
            $salt .= $seed[rand(0, strlen($seed))];
        return sha1($password).$salt;
    }
}
?>
