<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {
	function __construct() {
        parent::__construct();
        $this->load->library('form_validation');
	}
	
	public function index() {
		$data = array();
        for ($i = 1; $i < 96; $i++) {
            if ($i != 20) {
                $rand = rand(1, 500);
                $id = substr("0".$i, -2);
                $data[$id] = $rand;
            }
        }
        //load model
        //model récup les données 
                    

        $cookie_name = 'depts_cookie';
        if (!isset($_COOKIE[$cookie_name])) {
            $cookie_data = json_encode($data);
            $cookie_expires = time()+60*60*48;
            setcookie($cookie_name, $cookie_data, $cookie_expires);
        }

        if (isset($_SESSION['login']))
			$this->load->view('welcome_page');
		else {
			$data = [];
			$this->load->view('user_page', $data);
		}
	}

	public function login() {
		$this->load->model('Mapping');
		$x = $this->Mapping->distance(48.86417880, 2.34250440, 43.6008177, 3.8873392);
		$coordinates = $this->Mapping->search('77'.'000');
		
		$lng = $coordinates[0]; $lat = $coordinates[1];
		$dept = $this->Mapping->reverse($lng, $lat);
		var_dump($dept);
	}

	public function register() {
		var_dump('register');
	}
}

  // $from    = 'no-reply@magmap.com';
                    // $to      = 'amaurylrd@yahoo.fr';
                    // $subject = 'le sujet';
                    // $message = 'Bonjour !';
                    // $headers = 'From: '.$from.'\r\n'.
                    //     'Reply-To: '.$to.'\r\n'.
                    //     'X-Mailer: PHP/'.phpversion();

                    // $success = mail($to, $subject, $message, $headers);
                    // if (!$success) {
                    //     $errorMessage = error_get_last()['message'];
                    // }