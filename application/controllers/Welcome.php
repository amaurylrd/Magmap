<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {
	function __construct() {
        parent::__construct();
        $this->load->library('form_validation');
	}
	
	public function index() {
		$this->load->view('bg');
		//$this->layout(isset($_SESSION['login']));
	}


	//https://dwarves.iut-fbleau.fr/git/abreudia/e-Mento/src/master/e-Mento/application/controllers/Welcome.php

	/*public function layout($sess_log, $data = array('focus' => FALSE)) {
		$this->load->view('template_meta');
		$this->load->view('template_header');
		//si pas log page de register
		
			//var_dump($sess_log);
		
		$this->load->view('template_home', $data);
		$this->load->view('template_footer');
	}

	public function register() { //todo user_model check uniq pas déjà pris
		$this->load->model('User');
		$this->form_validation->set_rules('email', 'Email', 
			array('required', 'valid_email', array('user_mail_callback', array($this->User, 'valid_email'))));
		$this->form_validation->set_rules('login', 'Login',
			array('required', 'trim', array('username_callable', array($this->User, 'valid_username'))));
		$this->form_validation->set_rules('password', 'Password', 'required|trim|min_length[8]');
		$this->form_validation->set_rules('passconf', 'Password', 'required|matches[password]', array('matches' => 'Password do not match...'));
		$this->form_validation->set_message('required', 'You must provide the field {field}.');
		$this->form_validation->set_message('min_length', '{field} must have at least {param} characters.');
		$this->form_validation->set_message('user_mail_callback', 'This {field} is already linked to an account.');
		$this->form_validation->set_message('username_callable', 'This {field} is already being used. Please try another.');

        if ($this->form_validation->run() == FALSE)
            $this->layout(FALSE, array('focus' => TRUE));
		else {
			$login = $this->input->post('login');
			if ($this->User->register(array('name' => $login, 'mail' => $this->input->post('email'), 'password' => $this->input->post('password')))) {
				$_SESSION['login'] = $login;
				//envoie email
				$this->layout(TRUE);
			} else {
				$this->layout(FALSE, array('focus' => TRUE));
			}
		}
       
    }

    public function login() {

	}
	
	public function logout() {
		
	}*/
}