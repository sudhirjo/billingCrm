<?php 
class PurchaserModel extends CI_Model {
    public function create($data) {
        $this->db->insert('purchasers', $data);
    }
	
	 public function getPurchasersList() {
        return $this->db->get('purchasers')->result_array();
    }
}
?>