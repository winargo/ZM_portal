<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Report extends Base_Controller {
    public function index()
    {
        $this->session->set_flashdata('post',$this->input->post());
        $post = $this->input->post();

        $json = json_decode($this->curl->simple_get(URL_API_BACKEND.'gui/partner/getAll'));
        $data['partners'] = $json->result;

        $json = json_decode($this->curl->simple_get(URL_API_BACKEND.'gui/biller/getAll'));
        $data['billers'] = $json->result;

        $json = json_decode($this->curl->simple_get(URL_API_BACKEND.'gui/api/getCategory'));
        $data['categories'] = $json->result;

        $filterPartner = $post == null ? '' : ($post['partnerSelect'] === '' ? '' : '&partnerId='.$post['partnerSelect']);
        $filterBiller = $post == null ? '' : ($post['billerSelect'] === '' ? '' : '&billerId='.$post['billerSelect']);
        $filterCategory = $post == null ? '' : ($post['categorySelect'] === '' ? '' : '&category='.$post['categorySelect']);
        $filterStartDate = $post == null ? '&startDate='. date('Y-m-d',strtotime("-1 days")) : ($post['start'] === '' ? ''  : '&startDate='.date("Y-m-d", strtotime($post['start'])));
        $filterEndDate = $post == null ? '&endDate='. date("Y-m-d") : ($post['end'] === '' ? '' : '&endDate='.date("Y-m-d", strtotime($post['end'])));

        $json = json_decode($this->curl->simple_get(URL_API_BACKEND.'gui/history/getHistory?'.$filterPartner.$filterBiller.$filterCategory.$filterStartDate.$filterEndDate));
        $data['reports'] = $json->result;
        
        $this->load->view('report/index',$data);
    }
}
