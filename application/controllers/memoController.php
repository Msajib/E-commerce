<?php

class memo extends CI_Controller{
    

    public function genarate_memo(){
        $this->memoprice();
    }
    
    public function memoprice(){
        
        $data['var1'] = $_POST['quantity']; 
        $data['var2'] = $_POST['rate'];
        
        $this->load->model("memo");
        $data['price'] = $this->memo()->price(add($data['var1'],$data['var2']));
        
        $this->load->view("genarate_memo",$data);
        
    }
        
}

