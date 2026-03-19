<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Category extends Base_Controller {

    public function view($billerId, $category) {
        $data['billerId'] = $billerId;
        $data['category'] = $category;

        $jsonProduct = json_decode($this->curl->simple_get(URL_API_BACKEND.'gui/api/getByCategory/'.$category));
        $data['products'] = $jsonProduct->result;

        $jsonTransforms = json_decode($this->curl->simple_get(URL_API_BACKEND.'transform/Distinct'));
        $data['transforms'] = $jsonTransforms->result;

        $jsonBillerProduct = json_decode($this->curl->simple_get(URL_API_BACKEND.'gui/billerApi/getByBillerIdAndCategory/'.$billerId.'/'.$category));
        $data['billerProducts'] = $jsonBillerProduct->result;

        $this->load->view('category/view',$data);
    }
}
