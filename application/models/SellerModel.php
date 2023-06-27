<?php 
class SellerModel extends CI_Model {
    public function create($data) {
        $this->db->insert('sellers', $data);
    }
	
	 public function getSellerList() {
        return $this->db->get('sellers')->result_array();
    }
}
?>