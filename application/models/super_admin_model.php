<?php

class super_admin_model extends CI_Model {

    //put your code herep



    public function save_header_info($data) {
        $this->db->insert('header', $data);
    }

    public function select_all_header() {
        $this->db->select('*');
        $this->db->from('header');
        $query_result = $this->db->get();
        $result = $query_result->result();
        return $result;
    }

    public function delete_header_info_by_header_id($header_id) {
        $this->db->where('header_id', $header_id);
        $this->db->delete('header');
    }

    public function select_header_info_by_header_id($header_id) {
        $this->db->select('*');
        $this->db->from('header');
        $this->db->where('header_id', $header_id);
        $query_result = $this->db->get();
        $result = $query_result->row();
        return $result;
    }

    public function update_header_info($data, $header_id) {
        $this->db->where('header_id', $header_id);
        $this->db->update('header', $data);
    } 
    
 
    
}

?>
