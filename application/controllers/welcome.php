<?php
session_start();
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Welcome extends CI_Controller {

public function __construct() {
        parent::__construct();
        $this->load->model('super_admin_model', 'sa_model', true);
        $this->load->model('welcome_model', 'w_model', true);
         $admin_id = $this->session->userdata('admin_id');
        if ($admin_id == NULL) {
            redirect('admin_login', 'refresh');
        }
        
    }

    public function index() {
        $data = array();
        $this->load->view('home', $data);
    }

    public function home() {
        $data = array();
        $data['first_product'] = $this->w_model->select_first_product();
        $data['second_product'] = $this->w_model->select_second_product();
        $data['third_product'] = $this->w_model->select_third_product();
           $data['all_product'] = $this->w_model->select_product();
        $this->load->view('home', $data);
    }

    public function customer() {
        $data = array();
        $data['all_customers'] = $this->w_model->select_all_customer();
        $data['all_customer_id'] = $this->w_model->select_customer_id();
        $this->load->view('customer', $data);
    }
    public function edit_customer($customer_id){
        $data=  array();
        $customer=$customer_id;
        $data['all_customer']=$this->w_model->select_customer($customer);
        $this->load->view('edit_customer',$data);
        
    }
    public function update_customer(){
        
        $customer_id = $this->input->post('customer_id', true);
         $search = $this->input->post('customer_id', true);
        $customer_name = $this->input->post('customer_name', true);
        $address = $this->input->post('address', true);
        $number = $this->input->post('number', true);
        $this->w_model->update_customer($customer_id,$customer_name,$address,$number);
          $data['all_balance'] = $this->w_model->select_balances($search);
        $data['all_payment_info'] = $this->w_model->select_payment_info($search);
        $data['all_customer_info'] = $this->w_model->select_customer_info($search);
        $data['all_order_info'] = $this->w_model->select_ordered_info($search);
           $data['all_customer_info_again'] = $this->w_model->select_customer_info_again($search);
        $data['all_customers'] = $this->w_model->select_customers();
        $data['all_customers_again'] = $this->w_model->select_all_customers_again();
         $this->load->view('customer_infoo', $data);
        
    }
public function update_mahajon(){
         $data = array();
        $mahajon_id = $this->input->post('mahajon_id', true);
         $search = $this->input->post('mahajon_id', true);
        $mahajon_name = $this->input->post('mahajon_name', true);
        $address = $this->input->post('address', true);
        $number = $this->input->post('number', true);
        $this->w_model->update_mahajon($mahajon_id,$mahajon_name,$address,$number);
          $data['all_mahajon_id'] = $this->w_model->select_mahajon_id();
        $search = '0';
         $data['edit_all_mahajon']=$this->w_model->select_mahajon($mahajon_id);
      
        $data['all_mahajon_id'] = $this->w_model->select_mahajon_id();
       $data['all_mahajon'] = $this->w_model->select_all_mahajon(); 
       $data['all_mahajon_info'] = $this->w_model->select_mahajon_info($search);
       $data['all_balance'] = $this->w_model->select_balance($search);
        $data['all_mahajon_info_again'] = $this->w_model->select_mahajon_info_again($search);
       
        $this->load->view('mahajon_infoo', $data);
}
        public function mahajon() {
        $data = array();
        $data['all_mahajon_id'] = $this->w_model->select_mahajon_id();
        $search = '0';
        $data['all_mahajon_id'] = $this->w_model->select_mahajon_id();
       $data['all_mahajon'] = $this->w_model->select_all_mahajon(); 
       $data['all_mahajon_info'] = $this->w_model->select_mahajon_info($search);
       $data['all_balance'] = $this->w_model->select_balance($search);
        $data['all_mahajon_info_again'] = $this->w_model->select_mahajon_info_again($search);
       
        $this->load->view('mahajon_infoo', $data);
    }
     public function edit_mahajon($mahajon_id){
        $data=  array();
        $mahajon=$mahajon_id;
        $data['edit_all_mahajon']=$this->w_model->select_mahajon($mahajon);
        $this->load->view('edit_mahajon',$data);
        
    }
    public function daily() {
        $data = array();
         $pre_date=date('Y-m-d',strtotime("-1 days"));
        $data['all_expenses'] = $this->w_model->select_expenses_product();
       $data['all_order'] = $this->w_model->select_daily_order();
        $data['all_earn'] = $this->w_model->select_earn_product();
        $data['all_earn_again'] = $this->w_model->select_earn_product();
        $data['all_payment'] = $this->w_model->select_payment();
        $data['all_expenses_pre'] = $this->w_model->select_expenses_product_pre($pre_date);
        $data['all_earn_pre'] = $this->w_model->select_earn_product_pre($pre_date);
        $data['all_sum'] = $this->w_model->select_expenses_sum();
        $data['all_product'] = $this->w_model->select_all_product();
        $data['all_daily_product'] = $this->w_model->select_daily_buy_product();

        $this->load->view('daily', $data);
    }
 

    public function daily_info_search() {
        $search = $this->input->post('search', true);
        $newdate = strtotime ( '-1 day' , strtotime ( $search ) ) ;
        $newdate = date ('Y-m-d' , $newdate );
         
        $sdata = array();
        $pre_date=date('Y-m-d',strtotime("-1 days"));
        $data['all_earn'] = $this->w_model->select_earn($search);
        $data['all_daily_product'] = $this->w_model->select_daily_buy($search);
        $data['all_order'] = $this->w_model->select_order_product($search);
        $data['all_expenses_pre'] = $this->w_model->select_expenses_product_pre($pre_date);
        $data['all_earn_pre'] = $this->w_model->select_earn_product_pre($newdate);
        $data['all_expenses'] = $this->w_model->select_expenses($search);
        $data['all_sum'] = $this->w_model->select_expenses_sum();
        $sdata['message'] = 'Data Successfully !';
        $this->session->set_userdata($sdata);
        $this->load->view('daily', $data);
    }


    
     public function search_calan_info() {
        $search = $this->input->post('search', true);
        $sdata = array();
        $data['all_product'] = $this->w_model->select_product();
        $id='0';
     $b = $this->w_model->select_calan_id($search);
          foreach ($b as $gallery_image){
          $id= $gallery_image->calan_number;
          
          }
          $data['all_customer_info'] = $this->w_model->select_customer_info($search);
        $data['all_calan_info'] = $this->w_model->select_calan_info($search,$id);
     $data['all_calan'] = $this->w_model->select_calans($search);
    $data['all_memo'] = $this->w_model->select_memo_info($search);
        $sdata['message'] = 'Save Data Successfully !';
        $this->session->set_userdata($sdata);
        $this->load->view('calan', $data);
    }
      public function search_mahajon_info() {
        $search = $this->input->post('search', true);
        $sdata = array();
       
        $data['all_mahajon_info'] = $this->w_model->select_mahajon_info($search);
       $data['all_balance'] = $this->w_model->select_balance($search);
        $data['all_mahajon_info_again'] = $this->w_model->select_mahajon_info_again($search);
    
        $sdata['message'] = 'Save Data Successfully !';
        $this->session->set_userdata($sdata);
        $this->load->view('mahajon_info', $data);
    }

    public function customer_info_pdf($customer_id) {

        $sdata = array();
        
      $data['all_customer_info'] = $this->w_model->select_customer_info($customer_id);
        $data['all_customer_info_pdf'] = $this->w_model->select_customer_info_pdf($customer_id);
        $data['all_payment_info'] = $this->w_model->select_payment_info($customer_id);
        $data['all_order_info'] = $this->w_model->select_ordered_info($customer_id);
       
        $sdata['message'] = 'Save Data Successfully !';
        $this->session->set_userdata($sdata);
        $this->load->view('customer_pdf', $data);
    }
        public function mahajon_info_pdf($mahajon_id) {

        $sdata = array();
        
      $data['all_mahajon_info'] = $this->w_model->select_mahajon_info($mahajon_id);
        $data['all_mahajon_info_pdf'] = $this->w_model->select_mahajon_info_pdf($mahajon_id);
   

        $sdata['message'] = 'Save Data Successfully !';
        $this->session->set_userdata($sdata);
        $this->load->view('mahajon_pdf', $data);
    }


    public function daily_expenses() {
        
          $data = array();
         $pre_date=date('Y-m-d',strtotime("-1 days"));
        $data['date'] = $this->input->post('date', true);
        $data['expenses_details'] =$this->input->post('expenses_details', true);
        $data['amount'] = (double)$this->input->post('amount', true);
        $amount = $this->input->post('amaout', true);
        $this->w_model->save_daily_info($data);
        $sdata = array();
         $data['all_payment'] = $this->w_model->select_payment();
        $data['all_earn'] = $this->w_model->select_earn_product();
        $data['all_daily_product'] = $this->w_model->select_daily_buy_product();
        $data['all_expenses_pre'] = $this->w_model->select_expenses_product_pre($pre_date);
        $data['all_earn_pre'] = $this->w_model->select_earn_product_pre($pre_date);
        $data['all_expenses'] = $this->w_model->select_expenses_product();
        $data['all_sum'] = $this->w_model->select_expenses_sum();
         $data['all_order'] = $this->w_model->select_daily_order();
        $sdata['message'] = 'Save Data Successfully !';
        $this->session->set_userdata($sdata);
        $this->load->view('daily', $data);
        
    }

    public function delete_daily_expenses($daily_expenses_id) {
        $this->w_model->delete_daily_expenses_info_by_daily_expenses_id($daily_expenses_id);
        $data = array();
        $data['message'] = "Data deleted Successfully";
        $this->session->set_userdata($data);
        redirect('welcome/daily');
    }
    public function delete_daily_earn($daily_earn_id) {
        $this->w_model->delete_daily_earn_info_by_daily_earn_id($daily_earn_id);
        $data = array();
        $data['message'] = "Data deleted Successfully";
        $this->session->set_userdata($data);
        redirect('welcome/daily');
    }
       public function delete_daily_buy($daily_buy_id) {
        $this->w_model->delete_daily_buy_info_by_daily_buy_id($daily_buy_id);
        $data = array();
        $data['message'] = "Data deleted Successfully";
        $this->session->set_userdata($data);
        redirect('welcome/daily');
    }

    public function buy_daily_product() {

        $data['date'] = $this->input->post('date', true);
        $data['product_name'] = $this->input->post('product_name', true);
        $data['quantity'] = $this->input->post('quantity', true);
        $data['amount'] = (double)$this->input->post('amount', true);
        $this->w_model->save_daily_buy_product($data);
        $sdata = array();
         $pre_date=date('Y-m-d',strtotime("-1 days"));
  $data['all_expenses_pre'] = $this->w_model->select_expenses_product_pre($pre_date);
        $data['all_earn_pre'] = $this->w_model->select_earn_product_pre($pre_date);
        $data['all_expenses'] = $this->w_model->select_expenses_product();
        $data['all_earn'] = $this->w_model->select_earn_product();
           $data['all_payment'] = $this->w_model->select_payment();
        $data['all_order'] = $this->w_model->select_daily_order();
        $data['all_daily_product'] = $this->w_model->select_daily_buy_product();
        $sdata['message'] = 'Save Data Successfully !';
        $this->session->set_userdata($sdata);
        $this->load->view('daily', $data);
    }

    public function daily_earn() {
         $pre_date=date('Y-m-d',strtotime("-1 days"));
        $data['date'] = $this->input->post('date', true);
        $data['pre'] = $this->input->post('pre', true);
        $data['earn_details'] = $this->input->post('earn_details', true);
        $data['amount'] = (double)$this->input->post('amount', true);
        $amount = $this->input->post('amount', true);
        $this->w_model->save_daily_earn_info($data);
        $this->w_model->add_earn($amount);
        $sdata = array();
        $data['all_expenses'] = $this->w_model->select_expenses_product();
        $data['all_earn'] = $this->w_model->select_earn_product();
           $data['all_payment'] = $this->w_model->select_payment();
         $data['all_order'] = $this->w_model->select_daily_order();
        $data['all_daily_product'] = $this->w_model->select_daily_buy_product();
     $data['all_expenses_pre'] = $this->w_model->select_expenses_product_pre($pre_date);
        $data['all_earn_pre'] = $this->w_model->select_earn_product_pre($pre_date);
        $sdata['message'] = 'Save Data Successfully !';
        $this->session->set_userdata($sdata);
        $this->load->view('daily', $data);
    }

    public function cash_memu() {
        $data = array();
        $data['first_product'] = $this->w_model->select_first_product();
        $data['second_product'] = $this->w_model->select_second_product();
        $data['third_product'] = $this->w_model->select_third_product();
         $data['all_product'] = $this->w_model->select_product();
         $data['all_customers'] = $this->w_model->select_all_customer();
          $data['all_customer_id'] = $this->w_model->select_customer_id();
        $this->load->view('cash_memu', $data);
          
    }

    public function genarate_memo() {
        
        
        
         $data = array();
        $data['calan_date'] = date('Y-m-d');
        $data['customer_id'] = $this->input->post('customer_id', true);
        $customer_id=$this->input->post('customer_id', true);
        $search=$this->input->post('customer_id', true);
         $data['transport_cost'] = $this->input->post('t_cost', true);
        $t_cost= $this->input->post('t_cost', true);
         $data['total_cost'] = $this->input->post('total_price', true);
        $data['laber_cost'] = $this->input->post('l_cost', true);
        $l_cost= $this->input->post('l_cost', true);
        $data['due_amount'] = $this->input->post('due_amount', true);
        $data['advance_payment'] = $this->input->post('pay', true);
        $payment=$this->input->post('pay', true);
        $calan_id  = $this->w_model->save_memo_info($data);
		
                $product = $this->input->post('product', true);
		$total_price = $this->input->post('price', true);
		$total_qty = $this->input->post('qty', true);
		$bundel = $this->input->post('bundel', true);
                $type = $this->input->post('type', true);
       // $count_product =$product['size'];

        $purchase_table = array();
		  // $i = 0;
		   foreach($product as $key => $value){
			   $purchase_table['product_name'] = $value;
			   $purchase_table['total_price'] = $total_price[$key];
			   $purchase_table['total_qty'] = $total_qty[$key];
			   $purchase_table['bundel'] = $bundel[$key];
                           $purchase_table['type'] = $type[$key];
			   $purchase_table['calan_id'] = $calan_id;
                            $purchase_table['customer_id'] =$customer_id;
                            $purchase_table['time'] =date('Y-m-d');
			   $this->w_model->save_memo_product_info($purchase_table);
			  
			  
			   //$i++;
		   }
        
        $paydata = array();
        
          $balance='0';
     $bb = $this->w_model->select_balances($search);
          foreach ($bb as $value){
          $balance= $value->balance;
          
          }
          $paydata['customer_id']=$customer_id; 
        $paydata['date']=date('d-n-Y');  
         $paydata['type']='debit';
         $paydata['amount']=$payment; 
         $paydata['product_name']=' সর্বমোট জমা'.''.''.''.'('.'লেবার চার্জ='.$this->input->post('l_cost', true).'.'.','.'গাড়ী ভাড়া = '.$this->input->post('t_cost', true).''.','.''.''.''.')';
        $paydata['balance'] = ($balance+$payment)-($t_cost+$l_cost);
        $this->w_model->save_customer_info_again($paydata);
         $sdata = array();
         $sdata['date'] =date('Y-m-d');
        $sdata['earn_details'] = ' ('.$customer_id.') সর্বমোট জমা';
        $sdata['amount'] = (double)$payment;
        $this->w_model->save_daily_earn_info($sdata);
        
        $data['all_customer'] = $this->w_model->select_customer($customer_id);
        $data['all_order'] = $this->w_model->select_order_memo($customer_id,$calan_id);
        $data['all_calan'] = $this->w_model->select_calan($customer_id);
        $this->load->view('genarate_memo', $data);
    }

    public function calan() {
        $data = array();
      
  
        $data['all_product'] = $this->w_model->select_product();
          
        $this->load->view('calan', $data);
    }

    public function payment() {
        $data = array();
      

        $this->load->view('payment', $data);
    }
    

   

    public function payment_pdf() {
      
         $data = array();
         
        $customer_id = $this->input->post('customer_id', true);
         $data['date'] = $this->input->post('date', true);
        $data['customer_id'] = $this->input->post('customer_id', true);
        $data['product_name'] = $this->input->post('reference', true);
         $q_type='debit';
        $data['type'] = $q_type;
        $search = $this->input->post('customer_id', true);
        $data['amount'] = $this->input->post('amount', true);
   
       $pay = $this->input->post('amount', true);
        $reference = $this->input->post('reference', true);
      
         $id='0';
     $b = $this->w_model->select_balances($search);
          foreach ($b as $gallery_image){
          $id= $gallery_image->balance;
          
          }
        $data['balance'] = $id+ $this->input->post('amount', true);
        $this->w_model->save_customer_info_again($data);
        $sdata = array();
         $sdata['date'] =date('Y-m-d');
        $sdata['earn_details'] = '('.$customer_id.')'.''.''.''.''.''.'মারফৎ'.'='.''.$reference;
        $sdata['amount'] = (double)$pay;
        $this->w_model->save_daily_earn_info($sdata);
          $data['all_customer_infoo'] = $this->w_model->select_customer_infoo($customer_id);
        $data['all_payment_info'] = $this->w_model->select_payment_infoo($search, $reference, $pay);
        $sdata = array();
        $sdata['message'] = 'Save Data Successfully !';
        $this->session->set_userdata($sdata);
       
 
    
        $this->load->view('payment_pdf', $data);
        
    }   public function daily_pdf() {
        /* @var $dat3e type */
        $data = array();
        $date=$this->input->post('date', true);
        $data['pre']=$this->input->post('pre', true);
        $data['date']=$this->input->post('date', true);
        $this->w_model->save_pre($data);
        $data['all'] = $date;
        $pre_date=date('Y-m-d',strtotime("-1 days"));
        $data['all_order_pdf'] = $this->w_model->select_daily_order($date);
        $data['all_earn_daily'] = $this->w_model->select_earn_daily($date);
        $data['all_daily_item'] = $this->w_model->select_daily_buy_item($date);
        $data['all_expense'] = $this->w_model->select_expense($date);
        $data['all_payment'] = $this->w_model->select_payment($date);
        $data['all_expenses_pre'] = $this->w_model->select_expenses_product_pre($pre_date);
        $data['all_earn_pre'] = $this->w_model->select_earn_product_pre($pre_date);
        $data['all_sum'] = $this->w_model->select_expenses_sum();

        $this->load->view('daily_pdf', $data);
    }

 

    public function customer_info() {
        $data = array();
        $search = '0';
       
         $data['all_balance'] = $this->w_model->select_balances($search);
        $data['all_payment_info'] = $this->w_model->select_payment_info($search);
        $data['all_customer_info'] = $this->w_model->select_customer_info($search);
        $data['all_order_info'] = $this->w_model->select_ordered_info($search);
           $data['all_customer_info_again'] = $this->w_model->select_customer_info_again($search);
        $data['all_customers'] = $this->w_model->select_all_customer();
        $data['all_customers_again'] = $this->w_model->select_all_customers_again();
        $this->load->view('customer_info', $data);
    }
       public function customer_infoo() {
        $data = array();
        $search = '0';
       
         $data['all_balance'] = $this->w_model->select_balances($search);
        $data['all_payment_info'] = $this->w_model->select_payment_info($search);
        $data['all_customer_info'] = $this->w_model->select_customer_info($search);
        $data['all_order_info'] = $this->w_model->select_ordered_info($search);
           $data['all_customer_info_again'] = $this->w_model->select_customer_info_again($search);
        $data['all_customers'] = $this->w_model->select_customers();
        $data['all_customers_again'] = $this->w_model->select_all_customers_again();
        $this->load->view('customer_infoo', $data);
    }
    
        public function search_customer_info() {
        $search = $this->input->post('search', true);
        $sdata = array();
          $data['all_product'] = $this->w_model->select_product();
       $data['all_balance'] = $this->w_model->select_balances($search);
       $data['all_advance'] = $this->w_model->select_advance($search);
        $data['all_customer_info'] = $this->w_model->select_customer_info($search);
        $data['all_payment_info'] = $this->w_model->select_payment_info($search);
        $data['all_order_info'] = $this->w_model->select_ordered_info($search);
        $data['all_customer_info_again'] = $this->w_model->select_customer_info_again($search);
        $data['all_customers'] = $this->w_model->select_all_customer();
        $sdata['message'] = 'Save Data Successfully !';
        $this->session->set_userdata($sdata);
        $this->load->view('customer_info', $data);
    }
         public function save_info() {
        $data = array();
        $customer_id = $this->input->post('customer_id', true);
        $search=$this->input->post('customer_id', true);
         $data['date'] = $this->input->post('date', true);
        $data['customer_id'] = $this->input->post('customer_id', true);
        $data['details'] = $this->input->post('details', true);
        $data['rate'] = $this->input->post('rate', true);
        $data['amount'] =(double) $this->input->post('amount', true);
        $data['type'] = $this->input->post('type', true);
        $amount=$this->input->post('amount', true);
        
        $type=$this->input->post('type', true);
         if($type=='credit')
        {
         $data['balance'] = (double)$this->input->post('balance', true)+ (double)$this->input->post('amount', true);
        $this->w_model->save_customer_info_again($data);
          $data['all_product'] = $this->w_model->select_product();
       $data['all_balance'] = $this->w_model->select_balances($search);
       $data['all_advance'] = $this->w_model->select_advance($search);
        $data['all_customer_info'] = $this->w_model->select_customer_info($search);
        $data['all_payment_info'] = $this->w_model->select_payment_info($search);
        $data['all_order_info'] = $this->w_model->select_ordered_info($search);
        $data['all_customer_info_again'] = $this->w_model->select_customer_info_again($search);
        $data['all_customers'] = $this->w_model->select_all_customer();
        $sdata['message'] = 'Save Data Successfully !';
        $this->session->set_userdata($sdata);
        $this->load->view('customer_info', $data);
        }
        else if($type=='debit') {
          $data['balance'] =(double) $this->input->post('balance', true)- (double)$this->input->post('amount', true);  
        $this->w_model->save_customer_info_again($data);
   
          $data['all_product'] = $this->w_model->select_product();
       $data['all_balance'] = $this->w_model->select_balances($search);
       $data['all_advance'] = $this->w_model->select_advance($search);
        $data['all_customer_info'] = $this->w_model->select_customer_info($search);
        $data['all_payment_info'] = $this->w_model->select_payment_info($search);
        $data['all_order_info'] = $this->w_model->select_ordered_info($search);
        $data['all_customer_info_again'] = $this->w_model->select_customer_info_again($search);
        $data['all_customers'] = $this->w_model->select_all_customer();
        $sdata['message'] = 'Save Data Successfully !';
        $this->session->set_userdata($sdata);
        $this->load->view('customer_info', $data);
        }
         else {
          $data['balance'] =(double) $this->input->post('balance', true);  
        $this->w_model->save_customer_info_again($data);
        $sdata = array();
        $sdata['message'] = 'Save Data Successfully !';
        $this->session->set_userdata($sdata);
        redirect('welcome/customer_info',$data);
        }
        
        
       
    }
    
    public function mahajon_info() {
        $data = array();
        $search = '0';
       $data['all_mahajon'] = $this->w_model->select_all_mahajon(); 
       $data['all_mahajon_info'] = $this->w_model->select_mahajon_info($search);
       $data['all_balance'] = $this->w_model->select_balance($search);
        $data['all_mahajon_info_again'] = $this->w_model->select_mahajon_info_again($search);
        $this->load->view('mahajon_info', $data);
    }
    public function mahajon_infoo() {
        $data = array();
        $search = '0';
        $data['all_mahajon_id'] = $this->w_model->select_mahajon_id();
       $data['all_mahajon'] = $this->w_model->select_all_mahajon(); 
       $data['all_mahajon_info'] = $this->w_model->select_mahajon_info($search);
       $data['all_balance'] = $this->w_model->select_balance($search);
        $data['all_mahajon_info_again'] = $this->w_model->select_mahajon_info_again($search);
        $this->load->view('mahajon_infoo', $data);
    }
  
     public function save_new_customer() {
        $data = array();
        $search= $this->input->post('customer_id', true);
        $data['customer_id'] = $this->input->post('customer_id', true);
        $data['customer_name'] = $this->input->post('customer_name', true);
        $data['address'] = $this->input->post('address', true);
        $data['number'] = $this->input->post('number', true);
        
        $this->w_model->save_customer_info($data);
        $sdat=array();
        $sdata['date']=date('d-m-Y');
        $sdata['customer_id'] = $this->input->post('customer_id', true);
        $sdata['balance'] = '0.00';
        $this->w_model->save_customer_info_too($sdata);
        
     $data['all_customer_id'] = $this->w_model->select_customer_id();
        $data['all_product'] = $this->w_model->select_product();
         $data['all_customers'] = $this->w_model->select_all_customer();
        $sdata['message'] = 'Save Data Successfully !';
        $this->session->set_userdata($sdata);
        $this->load->view('cash_memu', $data);
    }
        public function save_mahajon() {
        $data = array();
        $mahajon_id = $this->input->post('mahajon_id', true);
        $data['mahajon_id'] = $this->input->post('mahajon_id', true);
        $data['mahajon_name'] = $this->input->post('mahajon_name', true);
        $data['address'] = $this->input->post('address', true);
        $data['number'] = $this->input->post('number', true);
        $this->w_model->save_mahajon_info($data);
        $sdata = array();
        $sdata['message'] = 'Save Data Successfully !';
        $this->session->set_userdata($sdata);
        redirect('welcome/mahajon_info',$mahajon_id);
    }
public function save_memo() {
        $data = array();
        $data['calan_date'] = date('Y-m-d');
        $data['customer_id'] = $this->input->post('customer_id', true);
        $customer_id=$this->input->post('customer_id', true);
        $data['transport_cost'] = $this->input->post('t_cost', true);
         $data['total_cost'] = $this->input->post('total_price', true);
        $data['laber_cost'] = $this->input->post('l_cost', true);
        $data['due_amount'] = $this->input->post('due_amount', true);
        $data['advance_payment'] = $this->input->post('pay', true);
        $calan_id  = $this->w_model->save_memo_info($data);
		
                $product = $this->input->post('product', true);
		$total_price = $this->input->post('price', true);
		$total_qty = $this->input->post('qty', true);
                $type = $this->input->post('type', true);
       // $count_product =$product['size'];

        $purchase_table = array();
		  // $i = 0;
		   foreach($product as $key => $value){
			   $purchase_table['product_name'] = $value;
			   $purchase_table['total_price'] = $total_price[$key];
			   $purchase_table['total_qty'] = $total_qty[$key];
                           $purchase_table['type'] = $type[$key];
			   $purchase_table['calan_id'] = $calan_id;
                            $purchase_table['customer_id'] =$customer_id;
                            $purchase_table['time'] =date('h:i');
			   $this->w_model->save_memo_product_info($purchase_table);
			  
			   $this->w_model->save_advance_info($purchase_table);
			   //$i++;
		   }
        $sdata = array();
        $sdata['message'] = 'Save Data Successfully !';
        $this->session->set_userdata($sdata);
        redirect('welcome/cash_memu',$mahajon_id);
    }
    public function save_order() {
         $product = $this->input->post('product_name', true);
		$customer_id= $this->input->post('customer_id', true);
               
                $calan_number= $this->input->post('calan_number', true);
		$total_qty = $this->input->post('quantity', true);
                $type = $this->input->post('type', true);
                 $bundle = $this->input->post('bundle', true);
              

        $purchase_table = array();
		  // $i = 0;
                   $customer=0;
                   $calan=0;
                  
		   foreach($product as $key => $value){
			   $purchase_table['product_name'] = $value;
			   $purchase_table['total_qty'] = $total_qty[$key];
                           $purchase_table['type'] = $type[$key];
                             $purchase_table['q_type'] = 'credit';
                           $purchase_table['bundle'] = $bundle[$key];
                           $purchase_table['date'] = date('d-m-Y');
			   $purchase_table['calan_number'] = $calan_number[$key];
                            $calan= $calan_number[$key];
                             $customer= $customer_id[$key];
                           
                           
			   $purchase_table['customer_id'] =$customer_id[$key];
                           $product_name=$value;
                           $product_quantity=$total_qty[$key];
                           $bnl=$bundle[$key];
                           $this->w_model->update_product_info($product_name, $product_quantity);
                             $this->w_model->update_advance_product_info($product_name, $product_quantity,$bnl);
			   $qty= $total_qty[$key];
                           if($qty>0){
                             $search=$customer_id[$key];   
                             
                                $b = $this->w_model->select_rate($search,$product_name);
                                $rate=0;
                                foreach ($b as $gallery_image){
                                  $rate=$gallery_image->total_price;
                                }
                                  $balance='0';
                                $bb = $this->w_model->select_balances($search);
                                     foreach ($bb as $value){
                                     $balance= $value->balance;
          
                                      }
                                      $purchase_table['rate']=$rate;
                                      $purchase_table['amount']=$rate*$product_quantity;
                                      $purchase_table['balance']=$balance-($product_quantity*$rate);
                                 $this->w_model->save_customer_info_again($purchase_table);
          
                   }
                   }
                 
       
        $data['all_customer'] = $this->w_model->select_customer($customer);
        $data['all_order'] = $this->w_model->select_order($customer, $calan);
         $data['all_memo'] = $this->w_model->select_memo_info($search);
        $this->load->view('calan_pdf', $data);
    }
     public function save_mahajon_info() {
        $data = array();
        $mahajon_id = $this->input->post('mahajon_id', true);
         $search = $this->input->post('mahajon_id', true);
         $data['date'] = $this->input->post('date', true);
        $data['mahajon_id'] = $this->input->post('mahajon_id', true);
        $data['details'] = $this->input->post('details', true);
        $data['rate'] = $this->input->post('rate', true);
        $data['amount'] = (double)$this->input->post('amount', true);
        $amount=$this->input->post('amount', true);
         
        $data['type'] = $this->input->post('type', true);
        $type=$this->input->post('type', true);
        if($type=='credit')
        {
         $data['balance'] = (double)$this->input->post('balance', true)+(double) $this->input->post('amount', true);
        $this->w_model->save_mahajon_info_again($data);
         $data['all_mahajon_info'] = $this->w_model->select_mahajon_info($search);
       $data['all_balance'] = $this->w_model->select_balance($search);
        $data['all_mahajon_info_again'] = $this->w_model->select_mahajon_info_again($search);
      $bdata = array();
        $bdata['date'] = date('Y-m-d');
        $bdata['expenses_details'] =$this->input->post('details', true);
        $bdata['amount'] =$amount;
      //$this->w_model->save_daily_info($bdata);
        $sdata['message'] = 'Save Data Successfully !';
        $this->session->set_userdata($sdata);
        $this->load->view('mahajon_info', $data);
        }
        else if($type=='debit') {
          $data['balance'] =(double) $this->input->post('balance', true)- (double)$this->input->post('amount', true);  
        $this->w_model->save_mahajon_info_again($data);
         $data['all_mahajon_info'] = $this->w_model->select_mahajon_info($search);
       $data['all_balance'] = $this->w_model->select_balance($search);
        $data['all_mahajon_info_again'] = $this->w_model->select_mahajon_info_again($search);
        
      
        
        $sdata['message'] = 'Save Data Successfully !';
        $this->session->set_userdata($sdata);
        $this->load->view('mahajon_info', $data);
        }
         else {
          $data['balance'] =(double) $this->input->post('balance', true);  
        $this->w_model->save_mahajon_info_again($data);
          $data['all_mahajon_info'] = $this->w_model->select_mahajon_info($search);
       $data['all_balance'] = $this->w_model->select_balance($search);
        $data['all_mahajon_info_again'] = $this->w_model->select_mahajon_info_again($search);
    
        $sdata['message'] = 'Save Data Successfully !';
        $this->session->set_userdata($sdata);
        $this->load->view('mahajon_info', $data);
        }
        
       
    }
    public function product(){
        $sdata = array();
          
            $type=$this->input->post('quantity_type', true);
            if($type=='ton'){
               $data['product_type'] = $this->input->post('product_type', true);
            $data['product_name'] = $this->input->post('product_name', true);
            $data['product_quantity'] = $this->input->post('product_quantity', true);  
            $data['quantity_type'] = $this->input->post('quantity_type', true);
             $data['date'] = $this->input->post('date', true);
            $this->w_model->save_instagram_info($data);
            redirect("welcome/home");
            }
            else if($type=='mon')
            {
 
              $data['product_type'] = $this->input->post('product_type', true);
            $data['product_name'] = $this->input->post('product_name', true);
            $data['product_quantity'] = $this->input->post('product_quantity', true)*40;  
            $data['quantity_type'] = $this->input->post('quantity_type', true);
             $data['date'] = $this->input->post('date', true);
            $this->w_model->save_instagram_info($data);
            redirect("welcome/home");
            }
            else{
                
              $data['product_type'] = $this->input->post('product_type', true);
            $data['product_name'] = $this->input->post('product_name', true);
            $data['product_quantity'] = $this->input->post('product_quantity', true);  
            $data['quantity_type'] = $this->input->post('quantity_type', true);
             $data['date'] = $this->input->post('date', true);
            $this->w_model->save_instagram_info($data);
            redirect("welcome/home");
            }
           
        
    }
     public function advance_product(){
        $sdata = array();
          
            $type=$this->input->post('quantity_type', true);
            if($type=='mon'){
               $data['customer_id'] = $this->input->post('customer_id', true);
            $data['product_name'] = $this->input->post('product_name', true);
            $data['product_quantity'] = $this->input->post('product_quantity', true)*40;  
            $data['quantity_type'] = $this->input->post('quantity_type', true);
         
            $this->w_model->save_advance_info($data);
            redirect("welcome/customer_info");
            }
             else if($type=='paket'){
                
              $data['customer_id'] = $this->input->post('customer_id', true);
            $data['product_name'] = $this->input->post('product_name', true);
            $data['product_quantity'] = $this->input->post('product_quantity', true);  
            $data['quantity_type'] = $this->input->post('quantity_type', true);
          
            $this->w_model->save_advance_info($data);
            redirect("welcome/customer_info");
            }
            else if($type='ton')
            {
 
              $data['customer_id'] = $this->input->post('customer_id', true);
            $data['product_name'] = $this->input->post('product_name', true);
            $data['product_quantity'] = $this->input->post('product_quantity', true)*1000;  
            $data['quantity_type'] = $this->input->post('quantity_type', true);
          
            $this->w_model->save_advance_info($data);
            redirect("welcome/customer_info");
            }
             else if($type='kg')
            {
 
              $data['customer_id'] = $this->input->post('customer_id', true);
            $data['product_name'] = $this->input->post('product_name', true);
            $data['product_quantity'] = $this->input->post('product_quantity', true)*1;  
            $data['quantity_type'] = $this->input->post('quantity_type', true);
          
            $this->w_model->save_advance_info($data);
            redirect("welcome/customer_info");
            }
           
           
        
    }
    
            

                            public static $bn = ["১", "২", "৩", "৪", "৫", "৬", "৭", "৮", "৯", "০"];
                            public static $en = ["1", "2", "3", "4", "5", "6", "7", "8", "9", "0"];

                            public static function bn2en($number) {
                                return str_replace(self::$bn, self::$en, $number);
                            }

                            public static function en2bn($number) {
                                return str_replace(self::$en, self::$bn, $number);
                            }

                     

    public function product_update() {
        $data = array();

        $data['product_type'] = $this->input->post('product_type', true);
        $data['product_name'] = $this->input->post('product_name', true);
        $product_name = $this->input->post('product_name', true);
        $data['product_quantity'] = $this->input->post('product_quantity', true);
        $data['quantity_type'] = $this->input->post('quantity_type', true);
        $data['date'] = $this->input->post('date', true);

        $result = $this->w_model->select_main_product();
        // echo '<pre>';
        // print_r($result);
        $name = $result->product_name;
        if ($result) {
            
            $data = array();
            $type= $this->input->post('quantity_type', true);
            if($type=='ton'){
                $product_name = $this->input->post('product_name', true);
                
            $data['product_quantity'] = $this->input->post('product_quantity', true);
            $data['quantity_type'] = $this->input->post('quantity_type', true);
            $data['date'] = $this->input->post('date', true);
            $data['product_name'] = $result->prodect_name;
            $this->w_model->update_product($data, $product_name);
            $this->session->set_userdata($data);
            redirect("welcome/home");
            }
            else if($type=='mon'){
             $product_name = $this->input->post('product_name', true);
            $data['product_quantity'] = $this->input->post('product_quantity', true)*40;
            $data['quantity_type'] = $this->input->post('quantity_type', true);
            $data['date'] = $this->input->post('date', true);
            $data['product_name'] = $result->prodect_name;
            $this->w_model->update_product($data, $product_name);
            $this->session->set_userdata($data);
            redirect("welcome/home");
            }
             else if($type=='paket'){
             $product_name = $this->input->post('product_name', true);
            $data['product_quantity'] = $this->input->post('product_quantity', true);
            $data['quantity_type'] = $this->input->post('quantity_type', true);
            $data['date'] = $this->input->post('date', true);
            $data['product_name'] = $result->prodect_name;
            $this->w_model->update_product($data, $product_name);
            $this->session->set_userdata($data);
            redirect("welcome/home");
            }
                else if($type=='kg'){
             $product_name = $this->input->post('product_name', true);
            $data['product_quantity'] = $this->input->post('product_quantity', true);
            $data['quantity_type'] = $this->input->post('quantity_type', true);
            $data['date'] = $this->input->post('date', true);
            $data['product_name'] = $result->prodect_name;
            $this->w_model->update_product($data, $product_name);
            $this->session->set_userdata($data);
            redirect("welcome/home");
            }
            
        } else {
            $sdata = array();
            $data['product_type'] = $this->input->post('product_type', true);
            $data['product_name'] = $this->input->post('product_name', true);
            $data['product_quantity'] = $this->input->post('product_quantity', true);
            $data['quantity_type'] = $this->input->post('quantity_type', true);
            $data['date'] = $this->input->post('date', true);
            $this->w_model->save_instagram_info($data);
            redirect("welcome/home");
        }
    }

    public function delete_product() {
         $product_name = $this->input->post('product_name', true);
        $this->w_model->delete_product_info_by_product_id($product_name);
        $data = array();
        $data['message'] = "Data deleted Successfully";
        $this->session->set_userdata($data);
        redirect('welcome/home');
    }
     public function delete_customer() {
         $customer_id = $this->input->post('customer_id', true);
        $this->w_model->delete_customer_info_by_customer_id($customer_id);
        $this->w_model->delete_all_customer_info_by_customer_id($customer_id);
        $data = array();
        $data['message'] = "Data deleted Successfully";
        $this->session->set_userdata($data);
        redirect('welcome/customer_infoo');
    }
       public function delete_mahajon() {
         $mahajon_id = $this->input->post('mahajon_id', true);
        $this->w_model->delete_mahajon_info_by_mahajon_id($mahajon_id);
        $this->w_model->delete_all_mahajon_info_by_mahajon_id($mahajon_id);
        $data = array();
        $data['message'] = "Data deleted Successfully";
        $this->session->set_userdata($data);
        redirect('welcome/mahajon_infoo');
    }

    public function order() {
        $data = array();
      
        $p_type= $this->input->post('type', true);
        $search = $this->input->post('customer_id', true);
      
       if($p_type=='kg'){
              $data['customer_id'] = $this->input->post('customer_id', true);
        $data['product_code'] = $this->input->post('product_code', true);
        $data['product_detial'] = $this->input->post('porduct_detail', true);
        $product=$this->input->post('porduct_detail', true);
        $quantity=$this->input->post('quantity', true);
        $product_quantity =$quantity;
        $data['quantity'] = $product_quantity;
        $data['bundle'] =  $this->input->post('bundle', true);
        $data['type'] = $this->input->post('type', true);
        $data['calan_number'] = $this->input->post('calan_number', true);
        $data['calan_date'] = $this->input->post('calan_date', true);
        $customer_id= $this->input->post('customer_id', true);
        $product_name = $this->input->post('porduct_detail', true);
         $this->w_model->update_product_info($product_name, $product_quantity);
        $this->w_model->save_order_info($data);
        $this->w_model->update_advance_info($product_name, $product_quantity,$customer_id);
            $data['all_customer_info'] = $this->w_model->select_customer_info($search);
     $b = $this->w_model->select_rate($search);
          foreach ($b as $gallery_image){
          $data = array();
        $customer_id = $this->input->post('customer_id', true);
         $data['date'] =date('d-m-Y');
        $data['customer_id'] = $this->input->post('customer_id', true);
        $data['details'] = $product;
         $type='credit';
        $data['type'] = $type;
        $search = $this->input->post('customer_id', true);
          $id= $gallery_image->total_price;
          $p_name=$gallery_image->product_name;
          if($p_name==$product){
        
           $balance='0';
     $bb = $this->w_model->select_balances($search);
          foreach ($bb as $value){
          $balance= $value->balance;
          
          }
          $amount=$product_quantity*$id;
          $data['rate']=$id;
          $data['quantity']=$product_quantity;
            $data['amount'] =$amount; 
            $data['q_type']='kg';
        $data['balance'] = $balance+$amount;
        $this->w_model->save_customer_info_again($data);
          }
          }
        }
      
  
    elseif ($p_type=='mon') {
          $data['customer_id'] = $this->input->post('customer_id', true);
        $data['product_code'] = $this->input->post('product_code', true);
        $data['product_detial'] = $this->input->post('porduct_detail', true);
        $data['quantity'] = $this->input->post('quantity', true);
        $data['type'] = $this->input->post('type', true);
        $data['calan_number'] = $this->input->post('calan_number', true);
        $data['calan_date'] = $this->input->post('calan_date', true);
        $customer_id= $this->input->post('customer_id', true);
         $data['bundle'] =  $this->input->post('bundle', true);
        $product_name = $this->input->post('porduct_detail', true);
        $product_quantity = $this->input->post('quantity', true)*40;
       
         $this->w_model->update_product_info($product_name, $product_quantity);
        $this->w_model->save_order_info($data);
        $this->w_model->update_advance_info($product_name, $product_quantity,$customer_id);
        
         $b = $this->w_model->select_rate($search);
          foreach ($b as $gallery_image){
          $data = array();
        $customer_id = $this->input->post('customer_id', true);
         $data['date'] =date('d-m-Y');
        $data['customer_id'] = $this->input->post('customer_id', true);
        $data['details'] = $product_name;
        
         $type='credit';
        $data['type'] = $type;
        $search = $this->input->post('customer_id', true);
      
   
    
          $id= $gallery_image->total_price;
          $p_name=$gallery_image->product_name;
          if($p_name==$product_name){
        
           $balance='0';
     $bb = $this->w_model->select_balances($search);
          foreach ($bb as $value){
          $balance= $value->balance;
          
          }
          $amount=$product_quantity*$id;
          $data['rate']=$id;
          $data['quantity']=$product_quantity;
            $data['amount'] =$amount; 
            $data['q_type']='kg';
        $data['balance'] = $balance+$amount;
        $this->w_model->save_customer_info_again($data);
          }
          }
        }
   
    
     elseif ($p_type=='paket') {
          $data['customer_id'] = $this->input->post('customer_id', true);
        $data['product_code'] = $this->input->post('product_code', true);
        $data['product_detial'] = $this->input->post('porduct_detail', true);
        $data['quantity'] = $this->input->post('quantity', true);
        $data['type'] = $this->input->post('type', true);
         $data['bundle'] =  $this->input->post('bundle', true);
        $data['calan_number'] = $this->input->post('calan_number', true);
        $data['calan_date'] = $this->input->post('calan_date', true);
        $customer_id= $this->input->post('customer_id', true);
        $product_name = $this->input->post('porduct_detail', true);
        $product_quantity = $this->input->post('quantity', true);
        
         $this->w_model->update_product_info($product_name, $product_quantity);
        $this->w_model->save_order_info($data);
        $this->w_model->update_advance_info($product_name, $product_quantity,$customer_id);
         $b = $this->w_model->select_rate($search);
          foreach ($b as $gallery_image){
          $data = array();
        $customer_id = $this->input->post('customer_id', true);
         $data['date'] =date('d-m-Y');
        $data['customer_id'] = $this->input->post('customer_id', true);
        $data['details'] = $product_name;
        
         $type='credit';
        $data['type'] = $type;
        $search = $this->input->post('customer_id', true);
      
   
    
          $id= $gallery_image->total_price;
          $p_name=$gallery_image->product_name;
          if($p_name==$product_name){
        
           $balance='0';
     $bb = $this->w_model->select_balances($search);
          foreach ($bb as $value){
          $balance= $value->balance;
          
          }
          $amount=$product_quantity*$id;
          $data['rate']=$id;
          $data['quantity']=$product_quantity;
            $data['amount'] =$amount; 
            $data['q_type']='kg';
        $data['balance'] = $balance+$amount;
        $this->w_model->save_customer_info_again($data);
          }
          }
        }
   
    
       
        $data['all_order'] = $this->w_model->select_order_infoo($customer_id);     
       $sdata = array();
        $data['all_product'] = $this->w_model->select_product();
        $id='0';
     $b = $this->w_model->select_calan_id($search);
          foreach ($b as $gallery_image){
          $id= $gallery_image->calan_number;
          
          }
        $data['all_calan_info'] = $this->w_model->select_calan_info($search,$id);
     $data['all_calan'] = $this->w_model->select_calans($search);
      $data['all_customer_info'] = $this->w_model->select_customer_info($search);
        $sdata['message'] = 'Save Data Successfully !';
        $this->session->set_userdata($sdata);
        $this->load->view('calan', $data);
    }

    public function save_payment() {
        $data = array();
        $data['customer_id'] = $this->input->post('customer_id', true);
        $data['calan_number'] = $this->input->post('calan_number', true);
        $data['rate'] = $this->input->post('rate', true);
        $data['amount'] = $this->input->post('amount', true);

        $data['pay'] = $this->input->post('pay', true);
        $data['due'] = $this->input->post('due', true);
        $data['date'] = $this->input->post('date', true);
        $this->w_model->save_payment_info($data);


        $sdata = array();
        $sdata['message'] = 'Save Data Successfully !';
        $this->session->set_userdata($sdata);
        redirect('welcome/genarate_memo');
    }

    public function add_payment() {

        $data = array();
        $data['customer_id'] = $this->input->post('customer_id', true);
        $data['reference'] = $this->input->post('reference', true);
        $data['pay'] = $this->input->post('amount', true);
        $data['date'] = $this->input->post('date', true);
        $this->w_model->add_payment($data);
        $this->w_model->save_payment_info($data);
        $sdata['message'] = 'Save Data Successfully !';
        $this->session->set_userdata($sdata);
        $this->load->view('payment', $data);
    }

    public function pdf() {
        $data = array();
        $data['title'] = 'Header Details';

        $this->load->view('pdf', $data);
    }

    public function calan_pdf() {
        $data = array();
        $data['title'] = 'Header Details';
        $customer = $this->input->post('customer_id', true);
         $customer_id = $this->input->post('customer_id', true);
        $search=$this->input->post('customer_id', true);
        $calan= $this->input->post('calan_number', true);
        $data['all_customer'] = $this->w_model->select_customer($customer);
        $data['all_order'] = $this->w_model->select_order_pdf($customer, $calan);
         $data['all_memo'] = $this->w_model->select_memo_info($search);
        $this->load->view('calan_pdf', $data);
    }

    public function login() {
        $data = array();
        $data['title'] = 'Header Details';

        $this->load->view('admin/admin_login', $data);
    }

    public function registration() {
        $data = array();

        $data['fullname'] = $this->input->post('fullname', true);
        $data['email'] = $this->input->post('email', true);
        $data['password'] = $this->input->post('password', true);
        $data['address'] = $this->input->post('address', true);
        $data['number'] = $this->input->post('number', true);
        $this->w_model->save_user_info($data);
        $sdata = array();
        $sdata['message'] = 'Registration Successfully !';
        $this->session->set_userdata($sdata);
        redirect('welcome/daily');
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

    public function logout() {
       session_destroy();
        $this->session->unset_userdata('admin_id');
        $data=array();
        $data['message']='You Are Successfully Logout !';
        $this->session->set_userdata($data);
        redirect('admin_login');
        
    }
    

    public function password(){
         $data = array();

        $this->load->view('password', $data);
    }
      public function change_password() {
     $email_address = $this->input->post('admin_email_address', true);
        $old_password = $this->input->post('old_admin_password', true);
        $new_password = $this->input->post('new_admin_password', true);
 
        $this->load->model('admin_login_model', 'al_model', true);
        $result = $this->al_model->select_admin($email_address, $old_password);
 
        if ($result) {
            $data = array();
             
        $data['password'] =($this->input->post('new_admin_password', true));
 
        $this->w_model->update_admin_info($data, $email_address);
            $this->session->set_userdata($data);
            redirect("welcome");
        } else {
            $sdata = array();
            $sdata['exception'] = "Enter valid Email and Password!";
            $this->session->set_userdata($sdata);
            redirect("welcome/password");
        }
    }

 public function show(){  
        $this->load->view('show');  
    }  
    public function amount(){
        alert('your alert');
        $customer_id = $this->input->post('customer_id');
        
           $data['all_customer_info_again'] = $this->w_model->select_customer_info_again($customer_id);
          alert('your alert');
        exit();
    }
        
    public function lookup(){  
        // process posted form data  
        $keyword = $this->input->post('term');  
        $data['response'] = 'false'; //Set default response  
        $query = $this->welcome_model->lookup($keyword); //Search DB  
        if( ! empty($query) )  
        {  
            $data['response'] = 'true'; //Set response  
            $data['message'] = array(); //Create array  
            foreach( $query as $row )  
            {  
                $data['message'][] = array(   
                                        'id'=>$row->product_id,  
                                        'value' => $row->product_name,  
                                        ' productQ'=> $row->product_quantity, 
                                     );  //Add a row to array  
            }  
        }  
        if('IS_AJAX')  
        {  
            echo json_encode($data); //echo json string if ajax request  
        }  
        else 
        {  
            $this->load->view('show',$data); //Load html view of search results  
        }  
    }
}
?>