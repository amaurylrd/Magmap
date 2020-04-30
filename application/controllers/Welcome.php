<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {
	function __construct() {
        parent::__construct();
        $this->load->library('form_validation');
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
        $this->session->sess_destroy(); //à enlever
        if (!isset($_SESSION['user_email']))
			$this->layout();
		else {
			$data = [];
			$this->load->view('user_page', $data);
		}
	}

	public function layout($focus = '') {
		$data['focus'] = $focus;
		$this->load->view('welcome_page', $data);
	}

	public function login() {
		$this->form_validation->set_rules('lg_email', 'adresse e-mail', 'valid_email');
		//message valid email
		$user = ['email' => $this->input->post('lg_email'), 'password' => $this->input->post('lg_password')];
		if ($this->form_validation->run() == FALSE)
			$this->layout();
		else if (!$this->User->exist($user))
			var_dump('erreur user exist');
		else {
			$this->session->set_userdata('user_email', $user['email']);
			var_dump('session access done');
		}
	}

	public function register() {
		$this->form_validation->set_rules('rg_email', 'rg_email', 
			array('required', 'valid_email', array('valid_email', array($this->User, 'valid_email'))));
		$this->form_validation->set_rules('rg_password', 'rg_password', 'trim');
		$this->form_validation->set_rules('rg_passconf', 'rg_passconf', 'trim|matches[rg_password]',
			array('matches' => 'Les mots de passe ne correspondent pas.'));
		$this->form_validation->set_rules('rg_birthdate', 'rg_birthdate', 'callback_valid_date');
		$this->form_validation->set_message('valid_email', 'Cette adresse e-mail est déjà utilisée.');
		$this->form_validation->set_message('valid_date', 'Vous devez être majeur(e) pour utiliser ce site.');
		if ($this->form_validation->run() == FALSE) {
			$this->layout('autofocus');
		}
		else {
			$this->load->model('Mapping');
			$location = $this->Mapping->search($this->input->post('rg_dept').'000');
			$user = [
				'email' => $this->input->post('rg_email'),
				'name' => $this->input->post('rg_username'),
				'password' => $this->input->post('rg_password'),
				'longitude' => $location[0],
				'latitude' => $location[1],
				'creation' => date_create('now', timezone_open('Europe/Paris'))->format('Y-m-d')
			];
			if (!$this->User->insert($user))
				var_dump('insert fails');//$this->layout(TRUE);
			else {
				$this->session->set_userdata('user_email', $user['email']);
				var_dump($location);
				var_dump('insert done, session open');
			}
		}
	}

	function valid_date($date, $format = 'Y-m-d') {
    	date_default_timezone_set('Europe/Paris');
    	$regex = DateTime::createFromFormat($format, $date);
    	if ($regex !== false && !array_sum($regex->getLastErrors()))
    		$date = date("Y-m-d", strtotime($date));
    	return 18 <= date_diff(date_create('now'), date_create($date))->y;
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