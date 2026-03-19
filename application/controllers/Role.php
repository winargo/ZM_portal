<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Role extends Base_Controller {
    public function getPages () {
        return [
            'Biller',
            'Partner',
            'API',
            'Transform',
            'Rates',
            'History',
            'User'
        ];
    }

    public function add() {
        $validation = $this->form_validation;
        $validation->set_rules($this->rules());

        $this->session->set_flashdata('post',$this->input->post());
        $post = $this->input->post();
        if ($validation->run()) {
            $checkedPages = [];
            foreach($this->getPages() as $p) {
                if(strpos($post[str_replace(" ","",$p)],' No Access') === false) {
                    array_push($checkedPages,$post[str_replace(" ","",$p)]);
                }
            }
            $body = array(
                'name'=>$post["name"],
                'pages'=>$checkedPages,
            );
            if (!$this->session->flashdata('error')) {
                $json = json_decode($this->curl->simple_post(URL_API_BACKEND.'Role/Add', $body));
                if ($json->message != 'OK') {
                    $this->session->set_flashdata('error',$json->result);
                } else {
                    unset($_SESSION['post']);
                    $this->session->set_flashdata('success', 'Role Successfully Registered');        
                }
            }
        }
        $data['pages'] = $this->getPages();
        $this->load->view('role/add',$data);
    }

    public function detail($id) {
        $validation = $this->form_validation;
        $validation->set_rules($this->rules());

        $this->session->set_flashdata('post',$this->input->post());
        $post = $this->input->post();
        if ($validation->run()) {
            $checkedPages = [];
            foreach($this->getPages() as $p) {
                if(strpos($post[str_replace(" ","",$p)],' No Access') === false) {
                    array_push($checkedPages,$post[str_replace(" ","",$p)]);
                }
            }
            $body = array(
                'id'=>$post["id"],
                'name'=>$post["name"],
                'pages'=>$checkedPages
            );
            if (!$this->session->flashdata('error')) {
                $json = json_decode($this->curl->simple_post(URL_API_BACKEND.'Role/Update', $body));
                if ($json->message != 'OK') {
                    $this->session->set_flashdata('error',$json->result);
                } else {
                    unset($_SESSION['post']);
                    $this->session->set_flashdata('success', 'Role Successfully Updated');        
                }
            }
        }
        $jsonRole = json_decode($this->curl->simple_get(URL_API_BACKEND.'Role/GetDetail?id='.$id));
        $data['role'] = $jsonRole->result;
        $data['pages'] = $this->getPages();
        $this->load->view('role/edit',$data);
    }

    public function rules() {
        return [
            ['field' => 'name',
            'label' => 'Name',
            'rules' => 'required'],
        ];
    }
}
