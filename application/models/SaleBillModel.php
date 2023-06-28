<?php
	class SaleBillModel extends CI_Model {
		public function create($data) {
			// Insert the sales bill into the database
			$this->db->insert('sale_bills', $data);
		}
		public function getProductQty($product_id){
			$this->db->select('sum(quantity) as qty');
			$this->db->from('purchase_bills');
			$this->db->where('product_id',$product_id);
			$this->db->group_by('product_id');
			return $this->db->get()->row();
		}
		
		public function get_sale_bills() {
			$this->db->select('sale_bills.date, sale_bills.quantity,products.name AS product_name, purchasers.name AS purchaser_name, customers.name AS customer_name, rate,gst,total');
			$this->db->from('sale_bills');
			$this->db->join('products', 'products.id = sale_bills.product_id');
			$this->db->join('purchasers', 'purchasers.id = sale_bills.purchaser_id');
			$this->db->join('customers', 'customers.id = sale_bills.customer_id');
			return $this->db->get()->result_array();
		}
	}
?>