<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Partner extends Base_Controller {
    public function index()
    {
        $json = json_decode($this->curl->simple_get(URL_API_BACKEND.'gui/partner/getAll'));
        $data['partners'] = $json->result;
        $this->load->view('partner/index',$data);
    }

    public function add()
    {
        $validation = $this->form_validation;
        $validation->set_rules($this->rules());

        $this->session->set_flashdata('post',$this->input->post());
        $post = $this->input->post();
        if ($validation->run()) {
            $attachIncorporationDeed = $this->_uploadImage($post["alias"],'attachIncorporationDeed','partner');
            $attachSkKemenkumham = $this->_uploadImage($post["alias"],'attachSkKemenkumham','partner');
            $attachAmendmentDeed = $this->_uploadImage($post["alias"],'attachAmendmentDeed','partner');
            $attachTin = $this->_uploadImage($post["alias"],'attachTin','partner');
            $attachNib = $this->_uploadImage($post["alias"],'attachNib','partner');
            $attachPic = $this->_uploadImage($post["alias"],'attachPic','partner');
            $attachStatementLetter = $this->_uploadImage($post["alias"],'attachStatementLetter','partner');
            $attachBusinessPhoto = $this->_uploadImage($post["alias"],'attachBusinessPhoto','partner');

            $body = array(
                'alias'=>$post["alias"],
                'name'=>$post["name"],
                'address'=>$post["address"],
                'deedEstNo'=>$post["deedEstNo"],
                'tinNo'=>$post["deedEstNo"],
                'nibSiupTdpNo'=>$post["nibSiupTdpNo"],
                'picName'=>$post["picName"],
                'picAddress'=>$post["picAddress"],
                'picIdNumber'=>$post["picIdNumber"],
                'picTinNumber'=>$post["picTinNumber"],
                'picPhoneNumber'=>'62'.$post["picPhoneNumber"],
                'picEmail'=>$post["picEmail"],
                'coopBankName'=>$post["coopBankName"],
                'coopAccountNumber'=>$post["coopAccountNumber"],
                'coopAccountName'=>$post["coopAccountName"],
                'coopSettlementPeriod'=>$post["coopSettlementPeriod"],
                'coopType'=>$post["coopType"],
                'coopPeriod'=>$post["coopPeriod"],
                'coopNominal'=>$post["coopNominal"],
                'attachIncorporationDeed'=>$attachIncorporationDeed,
                'attachSkKemenkumham'=>$attachSkKemenkumham,
                'attachAmendmentDeed'=>$attachAmendmentDeed,
                'attachTin'=>$attachTin,
                'attachNib'=>$attachNib,
                'attachPic'=>$attachPic,
                'attachStatementLetter'=>$attachStatementLetter,
                'attachBusinessPhoto'=>$attachBusinessPhoto,
            );
            if (!$this->session->flashdata('error')) {
                $json = json_decode($this->curl->simple_post(URL_API_BACKEND.'gui/partner/create', $body));
                if ($json->message != 'OK') {
                    $this->session->set_flashdata('error',$json->result);
                } else {
                    unset($_SESSION['post']);
                    $this->session->set_flashdata('success', 'Partner Successfully Registered');        
                }
            }
        }
        $this->load->view('partner/add');
    }

    public function detail($id)
    {
        $validation = $this->form_validation;
        $validation->set_rules($this->rules());

        $this->session->set_flashdata('post',$this->input->post());
        $post = $this->input->post();
        if ($validation->run()) {
            $attachIncorporationDeed = $this->_uploadImage($post["alias"],'attachIncorporationDeed','partner');
            $attachSkKemenkumham = $this->_uploadImage($post["alias"],'attachSkKemenkumham','partner');
            $attachAmendmentDeed = $this->_uploadImage($post["alias"],'attachAmendmentDeed','partner');
            $attachTin = $this->_uploadImage($post["alias"],'attachTin','partner');
            $attachNib = $this->_uploadImage($post["alias"],'attachNib','partner');
            $attachPic = $this->_uploadImage($post["alias"],'attachPic','partner');
            $attachStatementLetter = $this->_uploadImage($post["alias"],'attachStatementLetter','partner');
            $attachBusinessPhoto = $this->_uploadImage($post["alias"],'attachBusinessPhoto','partner');

            $body = array(
                'id'=>$post["id"],
                'alias'=>$post["alias"],
                'name'=>$post["name"],
                'address'=>$post["address"],
                'deedEstNo'=>$post["deedEstNo"],
                'tinNo'=>$post["deedEstNo"],
                'nibSiupTdpNo'=>$post["nibSiupTdpNo"],
                'picName'=>$post["picName"],
                'picAddress'=>$post["picAddress"],
                'picIdNumber'=>$post["picIdNumber"],
                'picTinNumber'=>$post["picTinNumber"],
                'picPhoneNumber'=>'62'.$post["picPhoneNumber"],
                'picEmail'=>$post["picEmail"],
                'coopBankName'=>$post["coopBankName"],
                'coopAccountNumber'=>$post["coopAccountNumber"],
                'coopAccountName'=>$post["coopAccountName"],
                'coopSettlementPeriod'=>$post["coopSettlementPeriod"],
                'coopType'=>$post["coopType"],
                'coopPeriod'=>$post["coopPeriod"],
                'coopNominal'=>$post["coopNominal"],
                'attachIncorporationDeed'=>$attachIncorporationDeed==='' ? $post["attachIncorporationDeedOld"] : $attachIncorporationDeed,
                'attachSkKemenkumham'=>$attachSkKemenkumham=== '' ? $post["attachSkKemenkumhamOld"] : $attachSkKemenkumham,
                'attachAmendmentDeed'=>$attachAmendmentDeed=== '' ? $post["attachAmendmentDeedOld"] : $attachAmendmentDeed,
                'attachTin'=>$attachTin=== '' ? $post["attachTinOld"] : $attachTin,
                'attachNib'=>$attachNib=== '' ? $post["attachNibOld"] : $attachNib,
                'attachPic'=>$attachPic=== '' ? $post["attachPicOld"] : $attachPic,
                'attachStatementLetter'=>$attachStatementLetter=== '' ? $post["attachStatementLetterOld"] : $attachStatementLetter,
                'attachBusinessPhoto'=>$attachBusinessPhoto=== '' ? $post["attachBusinessPhotoOld"] : $attachBusinessPhoto,
                'username'=>$this->session->userdata('name'),
            );

            if (!$this->session->flashdata('error')) {
                $json = json_decode($this->curl->simple_post(URL_API_BACKEND.'gui/partner/update', $body));
                if ($json->message != 'OK') {
                    $this->session->set_flashdata('error',$json->result);
                } else {
                    unset($_SESSION['post']);
                    $this->session->set_flashdata('success', 'Partner Successfully Updated');        
                }
            }
        }
        $json = json_decode($this->curl->simple_get(URL_API_BACKEND.'gui/partner/getById?id='.$id));
        $data['partner'] = $json->result;

        $jsonAuditTrail = json_decode($this->curl->simple_get(URL_API_BACKEND.'trail/'.$id));
        $data['auditTrails'] = $jsonAuditTrail->result;

        $this->load->view('partner/edit',$data);
    }

    public function status($id) {
        $json = json_decode($this->curl->simple_get(URL_API_BACKEND.'gui/partner/status/toggle/'.$id));
        return redirect('/partner');
    }

    public function rules() {
        return [
            ['field' => 'coopSettlementPeriod',
            'label' => 'Settlement Period',
            'rules' => 'required'],

            ['field' => 'coopPeriod',
            'label' => 'Cooperation Period',
            'rules' => 'required'],
        ];
    }
}
