<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_Authentication extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->library(array('session','curl','form_validation','upload','GooglePlus'));
        $this->load->helper(array('form', 'url'));
    }

	public function index(){
		if($this->session->userdata('status') == 'login'){
			redirect('/');
		}
		
		if (isset($_GET['code'])) {
			$this->googleplus->getAuthenticate();
			$user_profile = $this->googleplus->getUserInfo();
			
			$data_session = array(
				'token' => $_GET['code'],
			);
			$this->session->set_userdata($data_session);

			$jsonUser = json_decode($this->curl->simple_get(URL_API_BACKEND.'User/GetByEmail?email='.$user_profile['email']));
			if ($jsonUser->message != 'OK') {
				$this->session->sess_destroy();
				$this->googleplus->revokeToken();
				return $this->load->view('unauthorized_message');
			}
	
			$data_session = array(
				'id' => $user_profile['id'],
				'email' => $user_profile['email'],
				'name' => $user_profile['name'],
				'picture' => $user_profile['picture'],
				'token' => $_GET['code'],
				'role' => $jsonUser->result->role->name,
				'pages' => explode("|", $jsonUser->result->role->pages),
				'status' => 'login',
			);
			$this->session->set_userdata($data_session);
			redirect('/');
		}
			
		$data['login_url'] = $this->googleplus->loginURL();
		$this->load->view('welcome_message',$data);
	}
	
	public function profile(){
		
		if($this->session->userdata('login') != true){
			redirect('');
		}
		
		$contents['user_profile'] = $this->session->userdata('user_profile');
		$this->load->view('profile',$contents);
		
	}
	
	public function logout(){
		
		$this->session->sess_destroy();
		$this->googleplus->revokeToken();
		redirect('');
		
	}
	
}
