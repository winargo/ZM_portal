<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends Base_Controller {

    public function index() {
        $jsonUsers = json_decode($this->curl->simple_get(URL_API_BACKEND.'User/Get'));
        $data['users'] = $jsonUsers->result;

        $jsonRoles = json_decode($this->curl->simple_get(URL_API_BACKEND.'Role/Get'));
        $data['roles'] = $jsonRoles->result;
        $this->load->view('user/index',$data);
    }

    public function add()
    {
        $validation = $this->form_validation;
        $validation->set_rules($this->rules());

        $this->session->set_flashdata('post',$this->input->post());
        $post = $this->input->post();
        if ($validation->run()) {

            $body = array(
                'email'=>$post["email"],
                'username'=>$post["email"],
                'role'=>$post["role"],
            );
            if (!$this->session->flashdata('error')) {
                $json = json_decode($this->curl->simple_post(URL_API_BACKEND.'User/Add', $body));
                if ($json->message != 'OK') {
                    $this->session->set_flashdata('error',$json->result);
                } else {
                    unset($_SESSION['post']);
                    $this->session->set_flashdata('success', 'User Successfully Registered');        
                }
            }
        }
        $jsonRoles = json_decode($this->curl->simple_get(URL_API_BACKEND.'Role/Get'));
        $data['roles'] = $jsonRoles->result;
        $this->load->view('user/add', $data);
    }

    public function detail($id) {
        $validation = $this->form_validation;
        $validation->set_rules($this->rules());

        $this->session->set_flashdata('post',$this->input->post());
        $post = $this->input->post();
        if ($validation->run()) {

            $body = array(
                'id'=>$post["id"],
                'role'=>$post["role"],
            );
            if (!$this->session->flashdata('error')) {
                $json = json_decode($this->curl->simple_post(URL_API_BACKEND.'User/Update', $body));
                if ($json->message != 'OK') {
                    $this->session->set_flashdata('error',$json->result);
                } else {
                    unset($_SESSION['post']);
                    $this->session->set_flashdata('success', 'User Successfully Updated');        
                }
            }
        }
        $jsonUser = json_decode($this->curl->simple_get(URL_API_BACKEND.'User/GetDetail?id='.$id));
        $data['user'] = $jsonUser->result;

        $jsonRoles = json_decode($this->curl->simple_get(URL_API_BACKEND.'Role/Get'));
        $data['roles'] = $jsonRoles->result;
        $this->load->view('user/edit',$data);
    }

    public function rules() {
        return [
            ['field' => 'role',
            'label' => 'Role',
            'rules' => 'required'],
        ];
    }
}
