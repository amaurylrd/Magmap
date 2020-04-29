<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {
	function __construct() {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->library('session');
        $this->load->model('User');
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

        if (!isset($_SESSION['user_email']))
			$this->layout();
		else {
			$data = [];
			$this->load->view('user_page', $data);
		}
	}

	public function layout($focus = FALSE) {
		$data['focus'] = $focus;
		$this->load->view('welcome_page', $data);
	}

	public function login() {
		$this->form_validation->set_rules('lg_email', 'adresse e-mail', 'required|valid_email');
		$this->form_validation->set_rules('lg_password', 'mot de passe', 'required');
		$user = ['email' => $this->input->post('lg_email'), 'password' => $this->input->post('lg_password')];
		if ($this->form_validation->run() == FALSE)
			$this->layout();
		else if (!$this->User->exist($user))
			var_dump('erreur user exist');
		else {
			$this->session->set_userdata('user_email', $user['email']);
			var_dump('session');
		}




		$this->load->model('Mapping');
		$km = $this->Mapping->distance(48.86417880, 2.34250440, 43.6008177, 3.8873392);
		$coordinates = $this->Mapping->search('77'.'000');		
		$lng = $coordinates[0]; $lat = $coordinates[1];
		$dept = $this->Mapping->reverse($lng, $lat);
	}

	public function register() {
		$this->form_validation->set_rules('rg_email', 'adresse e-mail', 
			array('required', 'valid_email', array('user_mail_callback', array($this->User, 'valid_email'))));
		$this->form_validation->set_rules('rg_username', 'nom d\'utilisateur', 'required');
		$this->form_validation->set_rules('rg_password', 'mot de passe', 'required');
		$this->form_validation->set_rules('rg_passconf', 'confirmation du mot de passe', 'required|matches[password]');
			//birthdate > à 18 ans
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