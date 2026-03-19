<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Biller extends Base_Controller {
    public function index()
    {
        $json = json_decode($this->curl->simple_get(URL_API_BACKEND.'gui/biller/getAll'));
        $data['billers'] = $json->result;
        $this->load->view('biller/index',$data);
    }

    public function add()
    {
        $validation = $this->form_validation;
        $validation->set_rules($this->rules());

        $this->session->set_flashdata('post',$this->input->post());
        $post = $this->input->post();
        if ($validation->run()) {
            $pks = $this->_uploadImage($post["billerName"],'pks','biller');
            $api = $this->_uploadImage($post["billerName"],'api','biller');

            $body = array(
                'billerAlias'=>$post["billerAlias"],
                'billerName'=>$post["billerName"],
                'address'=>$post["address"],
                'deedEstNo'=>$post["deedEstNo"],
                'tinNo'=>$post["tinNo"],
                'nibSiupTdpNo'=>$post["nibSiupTdpNo"],
                'depositAccount'=>$post["depositAccount"],
                'depositBankName'=>$post["depositBankName"],
                'depositBranch'=>$post["depositBranch"],
                'depositVA'=>$post["depositVA"],
                'reconSftpIp'=>$post["reconSftpIp"],
                'reconSftpPort'=>$post["reconSftpPort"],
                'reconSftpFolder'=>$post["reconSftpFolder"],
                'reconEmail'=>$post["reconEmail"],
                'pks'=>$pks,
                'api'=>$api,
            );
            if (!$this->session->flashdata('error')) {
                $json = json_decode($this->curl->simple_post(URL_API_BACKEND.'gui/biller/create', $body));
                if ($json->message != 'OK') {
                    $this->session->set_flashdata('error',$json->result);
                } else {
                    for ($x = 0; $x < count($post["team"]); $x++) {
                        $bodyTeam = array(
                            'billerId'=>$json->result->id,
                            'team'=>$post["team"][$x],
                            'name'=>$post["name"][$x],
                            'contact'=>$post["contact"][$x],
                            'email'=>$post["email"][$x],
                        );
                        $jsonPic = json_decode($this->curl->simple_post(URL_API_BACKEND.'gui/billerPic/create', $bodyTeam));
                    }
                    unset($_SESSION['post']);
                    $this->session->set_flashdata('success', 'Biller Successfully Registered');        
                }
            }
        }
        $this->load->view('biller/add');
    }

    public function view($id)
    {
        $json = json_decode($this->curl->simple_get(URL_API_BACKEND.'gui/biller/getById?id='.$id));
        $data['biller'] = $json->result;
        $jsonCategories = json_decode($this->curl->simple_get(URL_API_BACKEND.'gui/billerApi/category/'.$id));
        $data['categories'] = $jsonCategories->result;
        $jsonProduct = json_decode($this->curl->simple_get(URL_API_BACKEND.'gui/api/getAll'));
        $data['products'] = $jsonProduct->result;
        $jsonTransforms = json_decode($this->curl->simple_get(URL_API_BACKEND.'transform/Distinct'));
        $data['transforms'] = $jsonTransforms->result;
        $this->load->view('biller/view',$data);
    }

    public function detail($id)
    {
        $validation = $this->form_validation;
        $validation->set_rules($this->rules());

        $this->session->set_flashdata('post',$this->input->post());
        $post = $this->input->post();
        if ($validation->run()) {
            if (isset($post["team"])) {
                for ($x = 0; $x < count($post["team"]); $x++) {
                    $bodyTeam = array(
                        'billerId'=>$post["id"],
                        'team'=>$post["team"][$x],
                        'name'=>$post["name"][$x],
                        'contact'=>$post["contact"][$x],
                        'email'=>$post["email"][$x],
                    );
                    $jsonPic = json_decode($this->curl->simple_post(URL_API_BACKEND.'gui/billerPic/create', $bodyTeam));
                }
            }
            
            $pks = $this->_uploadImage($post["billerName"],'pks','biller');
            $api = $this->_uploadImage($post["billerName"],'api','biller');

            $body = array(
                'id'=>$post["id"],
                'billerAlias'=>$post["billerAlias"],
                'billerName'=>$post["billerName"],
                'address'=>$post["address"],
                'deedEstNo'=>$post["deedEstNo"],
                'tinNo'=>$post["tinNo"],
                'nibSiupTdpNo'=>$post["nibSiupTdpNo"],
                'depositAccount'=>$post["depositAccount"],
                'depositBankName'=>$post["depositBankName"],
                'depositBranch'=>$post["depositBranch"],
                'depositVA'=>$post["depositVA"],
                'reconSftpIp'=>$post["reconSftpIp"],
                'reconSftpPort'=>$post["reconSftpPort"],
                'reconSftpFolder'=>$post["reconSftpFolder"],
                'reconEmail'=>$post["reconEmail"],
                'pks'=>$pks==='' ? $post["pksOld"] : $pks,
                'api'=>$api==='' ? $post["apiOld"] : $api,
                'username'=>$this->session->userdata('name'),
            );
            if (!$this->session->flashdata('error')) {
                $json = json_decode($this->curl->simple_post(URL_API_BACKEND.'gui/biller/update', $body));
                if ($json->message != 'OK') {
                    $this->session->set_flashdata('error',$json->result);
                } else {
                    unset($_SESSION['post']);
                    $this->session->set_flashdata('success', 'Biller Successfully Updated');        
                }
            }
        }
        $json = json_decode($this->curl->simple_get(URL_API_BACKEND.'gui/biller/getById?id='.$id));
        $data['biller'] = $json->result;

        $jsonPic = json_decode($this->curl->simple_get(URL_API_BACKEND.'gui/billerPic/getByBillerId?id='.$id));
        $data['pics'] = $jsonPic->result;

        $jsonAuditTrail = json_decode($this->curl->simple_get(URL_API_BACKEND.'trail/'.$id));
        $data['auditTrails'] = $jsonAuditTrail->result;

        $this->load->view('biller/detail',$data);
    }

    public function category($id)
    {
        $this->load->view('category/view');
    }

    public function rules() {
        return [
            ['field' => 'billerName',
            'label' => 'Biller Name',
            'rules' => 'required'],
        ];
    }
}
