<?php
session_start();
class Super_admin extends CI_Controller {
    
    
    public function __construct() {
        parent::__construct();
        static $data;
        
         $this->load->model('super_admin_model', 'sa_model', TRUE);
        $this->load->model('welcome_model', 'w_model', true);
      

        
    }

    private static $maincontent = null;

    public function index() {
        $data = array();
        $data['test'] = "test text";
        $this->load->view('admin/admin_master',$data);
        
    }
    public function header() {
        $data = array();
        $data['title'] = 'Header Details';
        $data['all_header'] = $this->sa_model->select_all_header();
        $data['all_header'] = $this->w_model->select_all_header();
        $data['maincontent'] = $this->load->view('admin/header', $data, true);
        $this->load->view('admin/admin_master', $data);
    }

    public function save_header() {
        $data = array();
        $data['header_id'] = $this->input->post('header_id', true);
        $data['logo'] = $this->input->post('logo', true);
        $data['title'] = $this->input->post('title', true);
       
        $this->sa_model->save_header_info($data);
        $sdata = array();
        $sdata['message'] = 'Save Data Successfully !';
        $this->session->set_userdata($sdata);
        redirect('super_admin/header');
    }

    public function delete_header($header_id) {
        $this->sa_model->delete_header_info_by_header_id($header_id);
        $data = array();
        $data['message'] = "Data deleted Successfully";
        $this->session->set_userdata($data);
        redirect('super_admin/header');
    }

    public function edit_header($header_id) {
        $data = array();
        $data['title'] = 'Edit Welcome Message Dtails';
       $data['header_info'] = $this->sa_model->select_header_info_by_header_id($header_id);
        $data['maincontent'] = $this->load->view('admin/edit_header', $data, true);
        $this->load->view('admin/admin_master', $data);
    }

    public function update_header() {
        $data = array();
        
        
        //this was an error
        //$data['header_id'] = $this->input->post('header_id', true);
        
        
         $header_id = $this->input->post('header_id', true);
        $data['logo'] = $this->input->post('logo', true);
        $data['title'] = $this->input->post('title', true);

        $this->sa_model->update_header_info($data, $header_id);
        $sdata = array();
        $sdata['message'] = "Updated Data Successfully";
        $this->session->set_userdata($sdata);
        redirect('super_admin/edit_header/' . $header_id);
    }
    
    
    
    public  function logout()
    {
        session_destroy();
        $this->session->unset_userdata('admin_id');
        $data=array();
        $data['message']='You Are Successfully Logout !';
        $this->session->set_userdata($data);
        redirect('admin_login/login');
    }
    
    
    
    
    
    
}
   ?>