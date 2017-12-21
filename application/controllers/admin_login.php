<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

session_start();

class Admin_login extends CI_Controller {

    public function __construct() {
        parent::__construct();

      $admin_id = $this->session->userdata('admin_id');
        if ($admin_id != NULL) {
            redirect('welcome', 'refresh');
        }
    }

    public function index() {
        $data = array();
        $data['title'] = 'Log In Form';
        $this->load->view('admin/index');
    }

    public function check_login() {
        $email_address = $this->input->post('admin_email_address', true);
        $password = $this->input->post('admin_password', true);

        //echo '----'.$email_address.'-----'.$password;
        //exit();


        $this->load->model('admin_login_model', 'al_model', true);
        $result = $this->al_model->select_admin($email_address, $password);
        // echo '<pre>';
        // print_r($result);
        if ($result) {
            $data = array();
            $data['admin_id'] = $result->admin_id;
            $data['admin_name'] = $result->email;
            $this->session->set_userdata($data);
            redirect("welcome/home");
        } else {
            $sdata = array();
            $sdata['exception'] = "Sorry!!! No user with such name exist";
            $this->session->set_userdata($sdata);
            redirect("welcome/index");
        }
         
    }
       public function login() {
        $data = array();
        $data['title'] = 'Header Details';
    
         $this->load->view('admin/admin_login', $data);}
    

}

?>