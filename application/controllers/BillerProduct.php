<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class BillerProduct extends Base_Controller {
    public function add() {
        $validation = $this->form_validation;
        $validation->set_rules($this->rules());
        $this->session->set_flashdata('post',$this->input->post());
        $post = $this->input->post();
        if ($validation->run()) {
            $body = array(
                'billerId'=>$post["billerId"],
                'apiId'=>$post["apiId"],
                'billerCode'=>$post["billerCode"],
                'transformId'=>$post["transformId"],
                'denom'=>$post["denom"],
                'billerPrice'=>$post["billerPrice"],
                'adminFee'=>$post["adminFee"],
                'status'=>true,
            );
            if (!$this->session->flashdata('error')) {
                $json = json_decode($this->curl->simple_post(URL_API_BACKEND.'gui/billerApi/create', $body));
                if ($json->message != 'OK') {
                    $this->session->set_flashdata('error',$json->result);
                } else {
                    unset($_SESSION['post']);
                    $this->session->set_flashdata('success', 'Product Successfully Registered');        
                    return redirect(base_url('/category/'.$post["billerId"].'/'.$json->result->api->apiCategory)); 
                }
            }
        }
    }

    public function edit() {
        $validation = $this->form_validation;
        $validation->set_rules($this->rules());
        $this->session->set_flashdata('post',$this->input->post());
        $post = $this->input->post();
        if ($validation->run()) {
            $body = array(
                'id'=>$post["id"],
                'billerId'=>$post["billerId"],
                'apiId'=>$post["apiId"],
                'billerCode'=>$post["billerCode"],
                'transformId'=>$post["transformId"],
                'denom'=>$post["denom"],
                'billerPrice'=>$post["billerPrice"],
                'adminFee'=>$post["adminFee"],
                'status'=>true,
            );
            if (!$this->session->flashdata('error')) {
                $json = json_decode($this->curl->simple_post(URL_API_BACKEND.'gui/billerApi/update', $body));
                if ($json->message != 'OK') {
                    $this->session->set_flashdata('error',$json->result);
                } else {
                    unset($_SESSION['post']);
                    $this->session->set_flashdata('success', 'Product Successfully Updated');        
                    return redirect(base_url('/category/'.$post["billerId"].'/'.$json->result->api->apiCategory)); 
                }
            }
        }
    }
    
    public function status($id) {
        $json = json_decode($this->curl->simple_get(URL_API_BACKEND.'gui/billerApi/status/toggle/'.$id));
        return redirect(base_url('/category/'.$json->result->biller->id.'/'.$json->result->api->apiCategory)); 
    }
    
    public function rules() {
        return [
            ['field' => 'apiId',
            'label' => 'Product Name',
            'rules' => 'required'],
        ];
    }
}
