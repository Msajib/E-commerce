<?php


class Welcome_model extends CI_Model {
    //put your code here
     public function select_all_product() {
        $this->db->select('*');
        $this->db->from('prodect');
         $this->db->where('date',date('Y-m-d'));
        $query_result = $this->db->get();
        $result = $query_result->result();
        return $result;
    }
      public function select_all_daily_product($search) {
        $this->db->select('*');
        $this->db->from('prodect');
         $this->db->where('date',$search);
        $query_result = $this->db->get();
        $result = $query_result->result();
        return $result;
    }
    public function select_first_product() {
        $this->db->select('*');
        $this->db->from('prodect');
        $this->db->where('product_type','রড');
        $query_result = $this->db->get();
        $result = $query_result->result();
        return $result;
    }
     public function select_second_product() {
        $this->db->select('*');
        $this->db->from('prodect');
        $this->db->where('product_type','সিমেন্ট');
        $query_result = $this->db->get();
        $result = $query_result->result();
        return $result;
    }
     public function select_customer($customer) {
        $this->db->select('*');
        $this->db->from('customer');
        $this->db->where('customer_id',$customer);
          $query_result = $this->db->get();
        $result = $query_result->result();
        return $result;
    }
    public function select_customers() {
        $this->db->select('*');
        $this->db->from('customer');
          $query_result = $this->db->get();
        $result = $query_result->result();
        return $result;
    }
    
       public function select_all_customer() {
        
        
        $this->db->select('customer.customer_id,customer_info.customer_info_id,customer.customer_name,customer_info.balance');
        $this->db->from('customer');
        $this->db->join('customer_info','customer_info.customer_id=customer.customer_id');
        $this->db->order_by('customer_info.customer_id', 'desc');
        $this->db->group_by('customer_info.customer_id');
        $query_result = $this->db->get();
        $result = $query_result->result();
        return $result;
    }  
    public function  select_all_mahajon(){
        $this->db->select('*');
        $this->db->from('mahajon');
          $query_result = $this->db->get();
        $result = $query_result->result();
        return $result;
    }
   
      public function select_customer_id() {
        $this->db->select('*');
        $this->db->from('customer');
         $this->db->order_by("customer_id", "desc");
            $this->db->limit(1);
          $query_result = $this->db->get();
        $result = $query_result->result();
        return $result;
    }
        public function select_mahajon_id() {
        $this->db->select('*');
        $this->db->from('mahajon');
         $this->db->order_by("mahajon_id", "desc");
            $this->db->limit(1);
          $query_result = $this->db->get();
        $result = $query_result->result();
        return $result;
    }
    public function select_mahajon($mahajon) {
        $this->db->select('*');
        $this->db->from('mahajon');
        $this->db->where('mahajon_id',$mahajon);
          $query_result = $this->db->get();
        $result = $query_result->result();
        return $result;
    }
         public function select_balance($search) {
        $this->db->select('*');
        $this->db->from('mahajon_info');
         $this->db->where('mahajon_id', $search);
         $this->db->order_by("mahajon_info_id", "desc");
            $this->db->limit(1);
          $query_result = $this->db->get();
        $result = $query_result->result();
        return $result;
    }
        public function select_balances($search) {
        $this->db->select('*');
        $this->db->from('customer_info');
          $this->db->where('customer_id', $search);
         $this->db->order_by("customer_info_id", "desc");
            $this->db->limit(1);
          $query_result = $this->db->get();
        $result = $query_result->result();
        return $result;
    }
       public function select_rate($search,$product_name) {
        $this->db->select('*');
        $this->db->from('purchase_product');
          $this->db->where('customer_id', $search);
            $this->db->where('product_name', $product_name);
          $query_result = $this->db->get();
        $result = $query_result->result();
        return $result;
    }
      public function select_calans($search) {
        $this->db->select('*');
        $this->db->from('customer_info');
          $this->db->where('customer_id', $search);
         $this->db->order_by("calan_number", "desc");
            $this->db->limit(1);
          $query_result = $this->db->get();
        $result = $query_result->result();
        return $result;
    }
     public function select_memo_info($search) {
        $this->db->select('*');
        $this->db->from('purchase_product');
          $this->db->where('customer_id', $search);
       
          $query_result = $this->db->get();
        $result = $query_result->result();
        return $result;
    
     }
      public function select_advance($search) {
        $this->db->select('*');
        $this->db->from('advance_product');
          $this->db->where('customer_id', $search);
         $this->db->order_by("advance_product_id", "desc");
            $this->db->limit(1);
          $query_result = $this->db->get();
        $result = $query_result->result();
        return $result;
    }
      public function delete_product_info_by_product_id($product_name) {
        $this->db->where('product_name', $product_name);
        $this->db->delete('prodect');
    }
     public function delete_customer_info_by_customer_id($customer_id) {
        $this->db->where('customer_id', $customer_id);
        $this->db->delete('customer');
    }
     public function delete_mahajon_info_by_mahajon_id($mahajon_id) {
        $this->db->where('mahajon_id', $mahajon_id);
        $this->db->delete('mahajon');
    }
     public function delete_all_mahajon_info_by_mahajon_id($mahajon_id) {
        $this->db->where('mahajon_id', $mahajon_id);
        $this->db->delete('mahajon_info');
    }
    public function delete_all_customer_info_by_customer_id($customer_id) {
        $this->db->where('customer_id', $customer_id);
        $this->db->delete('customer_info');
    }
    
     public function delete_daily_expenses_info_by_daily_expenses_id($daily_expenses_id) {
        $this->db->where('daily_expenses_id', $daily_expenses_id);
        $this->db->delete('daily_expenses');
    }
   public function delete_daily_earn_info_by_daily_earn_id($daily_earn_id) {
        $this->db->where('daily_earn_id', $daily_earn_id);
        $this->db->delete('daily_earn');
    }
    public function delete_daily_buy_info_by_daily_buy_id($daily_buy_id) {
        $this->db->where('daily_buy_id', $daily_buy_id);
        $this->db->delete('daily_product');
    }
 
   
    public function select_expenses_product() {
 
        $this->db->select('*');
        $this->db->from('daily_expenses');
         $this->db->where('date',date('Y-m-d'));
        $query_result = $this->db->get();
        $result = $query_result->result();
        return $result;
    }
      public function select_payment() {
 
        $this->db->select('*');
        $this->db->from('customer_info');
         $this->db->where('date',date('d-m-Y'));
          $this->db->where('type','debit');
        $query_result = $this->db->get();
        $result = $query_result->result();
        return $result;
    }
   
      public function select_expenses_product_pre($pre_date){
 
        $this->db->select('*');
        $this->db->from('daily_expenses');
        $this->db->where('date',$pre_date);
        $query_result = $this->db->get();
        $result = $query_result->result();
        return $result;
    }
      public function select_daily_order(){
 
        $this->db->select('*');
        $this->db->from('customer_info');
        $this->db->where('date',date('d-m-Y'));
        $query_result = $this->db->get();
        $result = $query_result->result();
        return $result;
    }
      public function select_order_product($search){
        $this->db->select('*');
        $this->db->from('customer_info');
        $this->db->where('date',$search);
        $query_result = $this->db->get();
        $result = $query_result->result();
        return $result;
    }
      public function select_daily_order_pdf($date){
 
        $this->db->select('*');
        $this->db->from('customer_info');
        $this->db->where('date',$date);
        $query_result = $this->db->get();
        $result = $query_result->result();
        return $result;
    }
     public function select_earn_product_pre($pre_date) {
 
        $this->db->select('*');
        $this->db->from('daily_earn');
         $this->db->where('date',$pre_date);
         $this->db->order_by("date", "desc");
         $this->db->limit(1);
        $query_result = $this->db->get();
        $result = $query_result->result();
        return $result;
    }
     public function select_expenses($search) {
 
        $this->db->select('*');
        $this->db->from('daily_expenses');
          $this->db->where('date',$search);
        $query_result = $this->db->get();
        $result = $query_result->result();
        return $result;
    }
     public function select_expense($date) {
 
        $this->db->select('*');
        $this->db->from('daily_expenses');
          $this->db->where('date',$date);
        $query_result = $this->db->get();
        $result = $query_result->result();
        return $result;
    }
    public function select_expenses_sum() {
        $this->db->select('*');
        $this->db->from('daily_earn');
        $this->db->limit(1,0);
        $query_result = $this->db->get();
        $result = $query_result->result();
        return $result;
    }
      public function select_earn_product() {
 
        $this->db->select('*');
        $this->db->from('daily_earn');
         $this->db->where('date',date('Y-m-d'));
        $query_result = $this->db->get();
        $result = $query_result->result();
        return $result;
    }
    
        public function select_earn($search) {
        $this->db->select('*');
        $this->db->from('daily_earn');
         $this->db->where('date',$search);
        $query_result = $this->db->get();
        $result = $query_result->result();
        return $result;
    }
    public function select_customer_info($search) {
 
        $this->db->select('*');
        $this->db->from('customer');
          $this->db->where('customer_id',$search);
        $query_result = $this->db->get();
        $result = $query_result->result();
        return $result;
    }
        public function select_mahajon_info($search) {
 
        $this->db->select('*');
        $this->db->from('mahajon');
          $this->db->where('mahajon_id',$search);
        $query_result = $this->db->get();
        $result = $query_result->result();
        return $result;
    }
    public function select_calan_id($search) {
        $this->db->select('*');
        $this->db->from('order');
         $this->db->where('customer_id', $search);
         $this->db->order_by("order_id", "desc");
            $this->db->limit(1);
          $query_result = $this->db->get();
        $result = $query_result->result();
        return $result;
    }
        public function select_calan_info($search,$id) {
 
        $this->db->select('*');
        $this->db->from('order');
        $this->db->where('customer_id',$search);
         $this->db->where('calan_number',$id);
          $this->db->where('calan_date',date('Y-m-d'));
        $query_result = $this->db->get();
        $result = $query_result->result();
        return $result;
    }
      public function select_customer_info_pdf($customer_id) {
 
        $this->db->select('*');
        $this->db->from('customer_info');
          $this->db->where('customer_id',$customer_id);
        $query_result = $this->db->get();
        $result = $query_result->result();
        return $result;
    }
        public function select_mahajon_info_pdf($mahajon_id) {
 
        $this->db->select('*');
        $this->db->from('mahajon_info');
          $this->db->where('mahajon_id',$mahajon_id);
        $query_result = $this->db->get();
        $result = $query_result->result();
        return $result;
    }
      public function select_customer_infoo($customer_id) {
 
        $this->db->select('*');
        $this->db->from('customer');
          $this->db->where('customer_id',$customer_id);
        $query_result = $this->db->get();
        $result = $query_result->result();
        return $result;
    }
      public function select_ordered_info($search) {
 
        $this->db->select('*');
        $this->db->from('order');
          $this->db->where('customer_id',$search);
          
        $query_result = $this->db->get();
        $result = $query_result->result();
        return $result;
    }
     public function select_payment_info($search) {
 
        $this->db->select('*');
        $this->db->from('payment');
          $this->db->where('customer_id',$search);
        $query_result = $this->db->get();
        $result = $query_result->result();
        return $result;
    }
     public function select_customer_info_again($search) {
 
        $this->db->select('*');
        $this->db->from('customer_info');
          $this->db->where('customer_id',$search);
        $query_result = $this->db->get();
        $result = $query_result->result();
        return $result;
    }
         public function select_mahajon_info_again($search) {
 
        $this->db->select('*');
        $this->db->from('mahajon_info');
          $this->db->where('mahajon_id',$search);
        $query_result = $this->db->get();
        $result = $query_result->result();
        return $result;
    }
      public function select_payment_infoo($search,$reference,$pay) {
 
        $this->db->select('*');
        $this->db->from('customer_info');
          $this->db->where('customer_id',$search);
          $this->db->where('product_name',$reference);
          $this->db->where('amount',$pay);
          $this->db->where('date',date('Y-m-d'));
        $query_result = $this->db->get();
        $result = $query_result->result();
        return $result;
    }
     public function select_earn_daily($date) {
        $this->db->select('*');
        $this->db->from('daily_earn');
         $this->db->where('date',$date);
        $query_result = $this->db->get();
        $result = $query_result->result();
        return $result;
    }
      public function select_daily_buy_product() {
 
        $this->db->select('*');
        $this->db->from('daily_product');
         $this->db->where('date',date('Y-m-d'));
        $query_result = $this->db->get();
        $result = $query_result->result();
        return $result;
    }
    
     public function select_daily_buy($search) {
        $this->db->select('*');
        $this->db->from('daily_product');
         $this->db->where('date',$search);
        $query_result = $this->db->get();
        $result = $query_result->result();
        return $result;
    }
       public function select_daily_buy_item($date){
        $this->db->select('*');
        $this->db->from('daily_product');
         $this->db->where('date',$date);
        $query_result = $this->db->get();
        $result = $query_result->result();
        return $result;
    }
   
     public function select_third_product() {
        $this->db->select('*');
        $this->db->from('prodect');
        $this->db->where('product_type','রিং');
        $query_result = $this->db->get();
        $result = $query_result->result();
        return $result;
    }
    public function select_product() {
        $this->db->select('product_name,product_quantity');
        $this->db->from('prodect');
        $query_result = $this->db->get();
        $result = $query_result->result();
        return $result;
    }
      public function update_product($data,$product_name) {
     $this->db->set('product_quantity', 'product_quantity+'.(float)$data['product_quantity'], false);
    $this->db->where('product_name',$product_name);
    $this->db->update('prodect');
    }
     public function update_product_info($product_name,$product_quantity) {
     $this->db->set('product_quantity', 'product_quantity-'.(float)$product_quantity, false);
    $this->db->where('product_name',$product_name);
    $this->db->update('prodect');
    }
     public function update_advance_product_info($product_name,$product_quantity,$bnl) {
     $this->db->set('total_qty', 'total_qty-'.(float)$product_quantity, false);
     $this->db->set('bundel', 'bundel-'.(float)$bnl, false);
    $this->db->where('product_name',$product_name);
    $this->db->update('purchase_product');
    }
      public function update_advance_info($product_name,$product_quantity,$customer_id) {
     $this->db->set('total_qty', 'total_qty-'.(float)$product_quantity, false);
    $this->db->where('product_name',$product_name);
    $this->db->where('customer_id',$customer_id);
    $this->db->update('advance_product');
    }
     public function select_order($customer,$calan){
        $this->db->select('*');
        $this->db->from('customer_info');
        $this->db->where('customer_id',$customer);
        $this->db->where('calan_number',$calan);
          $this->db->where('date',date('d-m-Y'));
        $query_result = $this->db->get();
        $result = $query_result->result();
        return $result;
    }
     public function select_order_pdf($customer,$calan){
        $this->db->select('*');
        $this->db->from('customer_info');
        $this->db->where('customer_id',$customer);
        $this->db->where('calan_number',$calan);
        $query_result = $this->db->get();
        $result = $query_result->result();
        return $result;
    }
       public function select_order_memo($customer_id,$calan_id) {
         $last_min = date('Y-m-d H:i:s', strtotime('-20 minutes'));
        $this->db->select('*');
        $this->db->from('purchase_product');
        $this->db->where('customer_id',$customer_id);
        $this->db->where('calan_id',$calan_id);
        $query_result = $this->db->get();
        $result = $query_result->result();
        return $result;
    }
    public function update_customer($customer_id,$customer_name,$address,$number){
     $this->db->set('customer_name', $customer_name);
      $this->db->set('address', $address);
       $this->db->set('number', $number);
    $this->db->where('customer_id',$customer_id);
    $this->db->update('customer');
    }
    public function update_mahajon($mahajon_id,$mahajon_name,$address,$number){
     $this->db->set('mahajon_name', $mahajon_name);
      $this->db->set('address', $address);
       $this->db->set('number', $number);
    $this->db->where('mahajon_id',$mahajon_id);
    $this->db->update('mahajon');
    }
     public function select_calan($customer_id) {
       
        $this->db->select('*');
        $this->db->from('calan');
        $this->db->where('customer_id',$customer_id);
      
        $query_result = $this->db->get();
        $result = $query_result->result();
        return $result;
    }
  
    
     public function select_order_infoo($customer_id) {
        $this->db->select('*');
        $this->db->from('order');
        $this->db->where('customer_id',$customer_id);
       
        $query_result = $this->db->get();
        $result = $query_result->result();
        return $result;
    }
     public function select_order_info($search) {
        $this->db->select('*');
        $this->db->from('order');
        $this->db->where('customer_id',$search);
        $query_result = $this->db->get();
        $result = $query_result->result();
        return $result;
    }
     public function select_order_info_($calan_number) {
        $this->db->select('*');
        
        $this->db->from('order');
     $this->db->where('calan_number',$calan_number);
        $query_result = $this->db->get();
        $result = $query_result->result();
        return $result;
    }
      public function select_main_product() {
        $this->db->select('*');
        $this->db->from('prodect');
  
        $query_result = $this->db->get();
        $result = $query_result->result();
        return $result;
    }
     
    public function select_all_customers_again(){
        $this->db->select('*');
        $this->db->from('customer_info');
        $query_result = $this->db->get();
        $result = $query_result->result();
        return $result;
        
    }
    
     
      public function save_instagram_info($data) {
        $this->db->insert('prodect', $data);
        
    }
       public function save_advance_info($data) {
        $this->db->insert('advance_product', $data);
        
    }
     public function save_daily_info($data) {
        $this->db->insert('daily_expenses', $data);
        
    }
    
    public function save_daily_buy_product($data) {
        $this->db->insert('daily_product', $data);
        
    }
      public function save_daily_earn_info($data) {
        $this->db->insert('daily_earn', $data);
        
    }
      public function save_pre($data) {
        $this->db->insert('daily_earn', $data);
        
    }
    public function save_order_info($data) {
        $this->db->insert('order', $data);
        
    }
     public function save_payment_info($data) {
        $this->db->insert('payment', $data);
        
    }
    public function save_total_payment_info($data) {
     $this->db->set('total_amount', 'total_amount + ' . (float) $data['amount'], FALSE);
   $this->db->set('due', 'due+'.(float)$data['due'], false);
        $this->db->insert('payment', $data);
        
    }
 
     public function save_customer_info($data) {
        $this->db->insert('customer', $data);
        
    }
      public function save_mahajon_info($data) {
        $this->db->insert('mahajon', $data);
        
    }
     public function save_customer_info_again($data) {
        $this->db->insert('customer_info', $data);
        
    }
    public function save_customer_info_too($data) {
        $this->db->insert('customer_info', $data);
        
    }
      public function save_item($data) {
        $this->db->insert('item', $data);
        
    }
        public function save_mahajon_info_again($data) {
        $this->db->insert('mahajon_info', $data);
        
    }
    public function save_test($data) {
        $this->db->insert('test', $data);
        
    }
      public function save_user_info($data) {
        $this->db->insert('user', $data);
        
    }
      public function save_memo_info($data) {
        $this->db->insert('calan', $data);
        
		return $this->db->insert_id();
    }
    public function save_memo_product_info($data) {
        $this->db->insert('purchase_product', $data);
        
    }
    public function save_order_product_info($data) {
        $this->db->insert('order_product', $data);
        
    }

     public function add_earn($amount) {
   $this->db->set('total_amount', 'total_amount + ' . (float) $amount, FALSE);
   
    $this->db->update('daily_earn');
     
        
    }
      public function add_payment($data) {
          
 
   $this->db->set('due', 'due-'.(float)$data['pay'], false);
   $this->db->where('customer_id',$data['customer_id']);
    $this->db->update('payment');
     
        
    }
    public function update_instagram_info($data, $product_id) {
        $this->db->where('product_id', product_id);
        $this->db->update('prodect', $data);
    }
 public function select_all_footer() {
        $this->db->select('*');
        $this->db->from('footer');
        $query_result = $this->db->get();
        $result = $query_result->result();
        return $result;
    }
 public function update_admin_info($data, $email_address) {
        $this->db->where('email', $email_address);
        $this->db->update('user', $data);
    }
    
     function lookup($keyword){ 
        $this->db->select('*')->from('prodect'); 
        $this->db->like('product_name',$keyword,'after'); 
        $this->db->or_like('product_type',$keyword,'after'); 
        $query = $this->db->get();     
        return $query->result(); 
    }
    
}


?>
