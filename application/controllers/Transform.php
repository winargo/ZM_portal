<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Transform extends Base_Controller {
    public function index() {
        $json = json_decode($this->curl->simple_get(URL_API_BACKEND.'transform/All'));
        $data['transforms'] = $json->result;

        $this->load->view('transform/index',$data);
    }

    public function add() {
        $this->load->view('transform/add');
    }

    public function detail($id) {
        $json = json_decode($this->curl->simple_get(URL_API_BACKEND.'transform/'.$id));
        $data['transform'] = $json->result;

        $this->load->view('transform/edit',$data);
    }
}
