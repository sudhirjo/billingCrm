<?php 
class CustomerModel extends CI_Model {
    public function create($data) {
        $this->db->insert('customers', $data);
    }
	
	 public function getCustomersList() {
        return $this->db->get('customers')->result_array();
    }
}
?>