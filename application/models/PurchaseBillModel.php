<?php
	class PurchaseBillModel extends CI_Model {
		public function create($data) {
			// Insert the purchase bill into the database
			$this->db->insert('purchase_bills', $data);
		}		
		
		public function get_purchase_bills() {
			$this->db->select('purchase_bills.date,purchase_bills.quantity, products.name AS product_name, purchasers.name AS purchaser_name, sellers.name AS seller_name, rate,gst,total');
			$this->db->from('purchase_bills');
			$this->db->join('products', 'products.id = purchase_bills.product_id');
			$this->db->join('sellers', 'sellers.id = purchase_bills.seller_id');
			$this->db->join('purchasers', 'purchasers.id = purchase_bills.purchaser_id');
			return $this->db->get()->result_array();
		}
	}
?>