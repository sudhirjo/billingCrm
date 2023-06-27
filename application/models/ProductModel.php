<?php 
class ProductModel extends CI_Model {
	
    public function create($data) {
        // Insert the product into the database
        $this->db->insert('products', $data);
    }
	
	 public function getProductList() {
        return $this->db->get('products')->result_array();
    }
	
	public function getProductDetail($id){
			$this->db->select('gst_rate');
			$this->db->from('products');
			$this->db->where('id',$id);
			return $this->db->get()->result();
		}
}
?>