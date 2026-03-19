<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product extends Base_Controller {
    public function index()
    {
        $json = json_decode($this->curl->simple_get(URL_API_BACKEND.'gui/api/getAll'));
        $data['products'] = $json->result;
        $this->load->view('product/index',$data);
    }

    public function add()
    {
        $validation = $this->form_validation;
        $validation->set_rules($this->rules());

        $this->session->set_flashdata('post',$this->input->post());
        $post = $this->input->post();
        if ($validation->run()) {

            $body = array(
                'apiId'=>$post["apiId"],
                'apiName'=>$post["apiName"],
                'apiDescription'=>$post["apiDescription"],
                'apiCategory'=>$post["apiCategory"],
                'apiSelection'=>$post["apiSelection"],
                'nominal'=>$post["nominal"],
            );
            if (!$this->session->flashdata('error')) {
                $json = json_decode($this->curl->simple_post(URL_API_BACKEND.'gui/api/create', $body));
                if ($json->message != 'OK') {
                    $this->session->set_flashdata('error',$json->result);
                } else {
                    unset($_SESSION['post']);
                    $this->session->set_flashdata('success', 'Product Successfully Registered');        
                }
            }
        }

        $this->load->view('product/add');
    }

    public function detail($id)
    {
        $validation = $this->form_validation;
        $validation->set_rules($this->rules());

        $this->session->set_flashdata('post',$this->input->post());
        $post = $this->input->post();
        if ($validation->run()) {
            $body = array(
                'id'=>$id,
                'apiId'=>$post["apiId"],
                'apiName'=>$post["apiName"],
                'apiDescription'=>$post["apiDescription"],
                'apiCategory'=>$post["apiCategory"],
                'apiSelection'=>$post["apiSelection"],
                'nominal'=>$post["nominal"],
            );
            if (!$this->session->flashdata('error')) {
                $json = json_decode($this->curl->simple_post(URL_API_BACKEND.'gui/api/update', $body));
                if ($json->message != 'OK') {
                    $this->session->set_flashdata('error',$json->result);
                } else {
                    unset($_SESSION['post']);
                    $this->session->set_flashdata('success', 'Product Successfully Updated');        
                }
            }
        }

        $json = json_decode($this->curl->simple_get(URL_API_BACKEND.'gui/api/getById?id='.$id));
        $data['product'] = $json->result;

        $this->load->view('product/edit',$data);
    }

    public function rules() {
        return [
            ['field' => 'apiCategory',
            'label' => 'Category',
            'rules' => 'required'],
        ];
    }
}
