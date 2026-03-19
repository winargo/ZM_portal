<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Rates extends Base_Controller {
    public function index()
    {
        $this->session->set_flashdata('get',$this->input->get());
        $get = $this->input->get();

        $jsonPartner = json_decode($this->curl->simple_get(URL_API_BACKEND.'gui/partner/getAll'));
        $data['partners'] = $jsonPartner->result;

        $json = json_decode($this->curl->simple_get(URL_API_BACKEND.'gui/api/getCategory'));
        $data['categories'] = $json->result;

        $data['products'] = [];
        $data['partnerProducts'] = [];
        $data['billerProducts'] = [];
        if($get && isset($get['p']) && isset($get['c']) && $get['p'] != '' && $get['c'] != '') {
            $jsonProduct = json_decode($this->curl->simple_get(URL_API_BACKEND.'gui/api/getByCategory/'.$get['c']));
            $data['products'] = $jsonProduct->result;

            $jsonPartnerProduct = json_decode($this->curl->simple_get(URL_API_BACKEND.'gui/partnerApi/getByPartnerIdAndCategory/'.$get['p'].'/'.$get['c']));
            $data['partnerProducts'] = $jsonPartnerProduct->result;

            $jsonBillerProduct = json_decode($this->curl->simple_get(URL_API_BACKEND.'gui/billerApi/getByCategory/'.$get['c']));
            $data['billerProducts'] = $jsonBillerProduct->result;
        }

        $this->load->view('rates/index',$data);
    }

    public function add() {
        $validation = $this->form_validation;
        $validation->set_rules($this->rules());

        $this->session->set_flashdata('post',$this->input->post());
        $post = $this->input->post();
        if ($validation->run()) {
            $billerProductIds = [];
            if ($post['biller1Select'] != '') {
                array_push($billerProductIds,$post['biller1Select']);
            }
            if ($post['biller2Select'] != '') {
                array_push($billerProductIds,$post['biller2Select']);
            }
            if ($post['biller3Select'] != '') {
                array_push($billerProductIds,$post['biller3Select']);
            }
            $body = array(
                'partnerId'=>$post["partnerId"],
                'apiId'=>$post["apiId"],
                'partnerFee'=>$post["partnerFee"],
                'partnerPrice'=>$post["partnerPrice"],
                'url'=>$post["url"],
                'billerApiId'=>$billerProductIds,
            );
            if (!$this->session->flashdata('error')) {
                $json = json_decode($this->curl->simple_post(URL_API_BACKEND.'gui/partnerApi/create', $body));
                if ($json->message != 'OK') {
                    $this->session->set_flashdata('error',$json->result);
                } else {
                    unset($_SESSION['post']);
                    $this->session->set_flashdata('success', 'Product Successfully Registered');    
                    return redirect(base_url('/rates?p='.$json->result->partner->id.'&c='.$json->result->api->apiCategory)); 
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
            $billerProductIds = [];
            if ($post['biller1Select'] != '') {
                array_push($billerProductIds,$post['biller1Select']);
            }
            if ($post['biller2Select'] != '') {
                array_push($billerProductIds,$post['biller2Select']);
            }
            if ($post['biller3Select'] != '') {
                array_push($billerProductIds,$post['biller3Select']);
            }
            $body = array(
                'id'=>$post["id"],
                'partnerId'=>$post["partnerId"],
                'apiId'=>$post["apiId"],
                'partnerFee'=>$post["partnerFee"],
                'partnerPrice'=>$post["partnerPrice"],
                'url'=>$post["url"],
                'billerApiId'=>$billerProductIds,
            );
            if (!$this->session->flashdata('error')) {
                $json = json_decode($this->curl->simple_post(URL_API_BACKEND.'gui/partnerApi/update', $body));
                if ($json->message != 'OK') {
                    $this->session->set_flashdata('error',$json->result);
                } else {
                    unset($_SESSION['post']);
                    $this->session->set_flashdata('success', 'Product Successfully Updated');    
                    return redirect(base_url('/rates?p='.$json->result->partner->id.'&c='.$json->result->api->apiCategory)); 
                }
            }
        }
    }

    public function delete() {
        $validation = $this->form_validation;
        $validation->set_rules($this->rules());

        $this->session->set_flashdata('post',$this->input->post());
        $post = $this->input->post();
        if ($validation->run()) {
            $body = array(
                'id'=>$post["id"],
            );
            if (!$this->session->flashdata('error')) {
                $json = json_decode($this->curl->simple_post(URL_API_BACKEND.'gui/partnerApi/delete', $body));
                if ($json->message != 'OK') {
                    $this->session->set_flashdata('error',$json->result);
                } else {
                    $this->session->set_flashdata('success', 'Product Successfully Deleted');    
                    return redirect(base_url('/rates?p='.$post['partnerId'].'&c='.$post['category'])); 
                }
            }
        }        
    }

    public function rules() {
        return [
            ['field' => 'apiId',
            'label' => 'Product',
            'rules' => 'required'],
        ];
    }
}
