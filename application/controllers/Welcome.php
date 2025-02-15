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
        if (!isset($_SESSION['user_email'])) {
			$this->layout();
        }
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
		//si pas session log 404
		$user = ['email' => $this->input->post('lg_email'), 'password' => $this->input->post('lg_password')];
		if (!$this->User->exists($user))
			$this->layout('autofocus');
		else {
			$this->session->set_userdata('user_email', $user['email']);
			var_dump('session access done');
		}
	}

	public function register() {
		if (empty($_POST))
			$this->load->view('404_page');
		else {
			$this->form_validation->set_rules('rg_email', 'rg_email', 
				array('required', 'valid_email', array('valid_email', array($this->User, 'valid_email'))));
			$this->form_validation->set_rules('rg_password', 'rg_password', 'trim');
			$this->form_validation->set_rules('rg_passconf', 'rg_passconf', 'trim|matches[rg_password]',
				array('matches' => 'Les mots de passe ne correspondent pas.'));
			$this->form_validation->set_rules('rg_birthdate', 'rg_birthdate', 'callback_valid_date');
			$this->form_validation->set_message('valid_email', 'Cette adresse e-mail est déjà utilisée.');
			$this->form_validation->set_message('valid_date', 'Vous devez être majeur(e) pour utiliser ce site.');
			if ($this->form_validation->run() == FALSE)
				$this->layout('autofocus');
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
					$this->load->view('404_page');
				else {
					$this->session->set_userdata('user_email', $user['email']);
					var_dump('insert done, session open');
				}
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



//      	$emails = [];
			// $seed = 'abcdefghijklmnopqrstuvwxyz'.'ABCDEFGHIJKLMNOPQRSTUVWXYZ'.'0123456789';
			// for ($i = 0; $i < 100; $i++) {
			// 	$email = '';	
   //      		for ($j = 0 ; $j < 10 ; $j++)
   //          		$email .= $seed[rand(0, strlen($seed) - 1)];
   //          	$email .= '@gmail.fr';
   //          	$emails[$i] = $email;
   //          	$query = "INSERT INTO `USER`(`email`, `name`, `password`) VALUES ('".$email."', 'random', 'random');";
   //          	echo $query;
   //          }
   //          echo '\n';
   //          $couples = [];
   //          for ($i = 0; $i < 400; $i++) {
   //          	$couple = [];
   //          	$a = ''; $b = '';
   //          	do {
   //          		$a = $emails[rand(0, count($emails) - 1)];
   //          		$b = $emails[rand(0, count($emails) - 1)];
   //          		while ($b == $a)
   //          			$b = $emails[rand(0, count($emails) - 1)];
   //          		$couple = [$a, $b];
   //          	} while (in_array($couple, $couples));
   //          	$couples[$i] = $couple;
   //          	$query = "INSERT INTO `a_demande_b`(`a`, `b`) VALUES ('".$a."','".$b."');";
   //          	echo $query;
   //          }

        	// $this->load->database();
        	// $query = $this->db->select('*')
         //    	->from('a_demande_b')
         //    	->get();
        	// $query = $query->result();
        	
        	// $dictionary = [];
        	// foreach ($query as $tuple) {
        	// 	foreach ($tuple as $key => $value) {
        	// 		if (!in_array($value, $dictionary))
        	// 			array_push($dictionary, $value);
        	// 	}
        	// }

        	// $N = count($dictionary);
        	// $matrix = array_fill(0, $N, array_fill(0, $N, 0));

        	

        	// var_dump($this->filter($query, '0M8fZV5O2B@gmail.fr'));

    //     		var_dump(array_filter($query, function($e) {
    // 				return $e == $dictionary[$i];
				// }));
    //     	}





	// private function f($haystack, $needle) {
 //        $array = [];
 //        for ($haystack as $key => $value) {
 //        	if ($value->{'a'} == $needle) {
 //        		array_push($array, $value);
 //        	}
 //        }
 //        return $array;
 //    }