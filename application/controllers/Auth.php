<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->library(array('session','curl','form_validation'));
        $this->load->helper(array('form', 'url'));
    }

    public function login() {
        $validation = $this->form_validation;
        $validation->set_rules($this->rules());

        $post = $this->input->post();
        if ($validation->run()) {
            $body = array(
                'email' => $post["email"],
                'password' => $post["password"],
            );
            if (!$this->session->flashdata('error')) {
                // $json = json_decode($this->curl->simple_post(URL_API_BACKEND.'User/Validate', $body));
                // if ($json->message==='OK') {
                    unset($_SESSION['post']);
                    $jsonForbiddenName = json_decode($this->curl->simple_get(URL_API_BACKEND.'KasprobankConfigGet?id=2357'));
    
                    $data_session = array(
                        'email' => $post["email"],
                        'name' => 'username',
                        'token' => '',
                        'role' => 'Administrator',
                        'status' => 'login',
                    );
                    $this->session->set_userdata($data_session);
                    return redirect(base_url()); 
                // } else {
                //     $this->session->set_flashdata('error', 'Invalid Username or Password');
                // }
            }
        }
        $this->load->view('auth/login');
    }

    public function logout() {
        $this->session->sess_destroy();
        redirect(base_url('user_authentication'));
    }

    public function forgetPassword() {
        $this->load->view('auth/forget-password');
    }

    public function rules() {
        return [
            ['field' => 'email',
            'label' => 'email',
            'rules' => 'required'],

            ['field' => 'password',
            'label' => 'Password',
            'rules' => 'required'],
        ];
    }
}