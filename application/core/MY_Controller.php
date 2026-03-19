<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Base_Controller extends CI_Controller {
    function __construct() {
        parent::__construct();
        $this->load->library(array('session','curl','form_validation','upload','GooglePlus'));
        $this->load->helper(array('form', 'url'));
		if($this->session->userdata('status') != "login"){
			redirect(base_url('/user_authentication'));
		}
    }

    public function _uploadImage($fileName, $nameForm, $folder)
    {
        $upload_path = 'upload/'.$folder;
        $config['upload_path']          = './'.$upload_path;
        $config['allowed_types']        = 'jpeg|jpg|png|doc|docx|pdf';
        $config['overwrite']			= true;
        $config['max_size']             = 5120; // 5MB
        $config['file_name']            = $fileName.'-'.$nameForm.'-'.date("Y-m-d-h-i-s");;

        $this->upload->initialize($config);

        if ($this->upload->do_upload($nameForm)) {
            $upload = $this->upload->data();
            return $upload_path.'/'.$upload['file_name'];
        } else if (isset($_FILES[$nameForm])) {
            if($_FILES[$nameForm]['name'] == '') {
                return '';
            } else {
                $this->session->set_flashdata('error',$this->upload->display_errors());
            }
        }
        return '';
    }
}