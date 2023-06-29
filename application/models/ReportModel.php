<?php
class ReportModel extends CI_Model {
	
    public function getStockReport($fromDate, $toDate, $productId) {
	
		$this->db->select('p.name AS product_name,COALESCE(SUM(pb.total), 0) AS opening,COALESCE(SUM(pb.total), 0) AS total_purchase,COALESCE(SUM(pb.quantity), 0) AS qty,COALESCE(SUM(sb.total), 0) AS total_sale,              (COALESCE(SUM(pb.quantity), 0) - COALESCE(SUM(sb.quantity), 0)) AS stock');
			$this->db->from('products as p');
			$this->db->join('purchase_bills as pb', 'p.id = pb.product_id','left');
			$this->db->join('sale_bills as sb', 'p.id = sb.product_id','left');
			if(!empty($fromDate)){				
			$this->db->where('pb.date >=', $fromDate);
			}
			if(!empty($toDate)){		
			$this->db->where('pb.date <=', $toDate);
			}
			if(!empty($productId)){		
			$this->db->where('p.id', $productId);
			}
			$this->db->group_by('p.id');
	return $this->db->get()->result_array();
	}
        public function getTransactionReport($fromDate, $toDate, $productId,$type) {
	
		$this->db->select('p.name AS product_name,COALESCE(SUM(pb.total), 0) AS opening,COALESCE(SUM(pb.total), 0) AS total_purchase,COALESCE(SUM(pb.quantity), 0) AS qty,COALESCE(SUM(sb.total), 0) AS total_sale,              (COALESCE(SUM(pb.quantity), 0) - COALESCE(SUM(sb.quantity), 0)) AS stock,pb.date, pc.name as buyer,s.name as seller , pb.rate');
			$this->db->from('products as p');
			$this->db->join('purchase_bills as pb', 'p.id = pb.product_id','left');
			$this->db->join('purchasers as pc', 'pc.id = pb.purchaser_id ');
			$this->db->join('sale_bills as sb', 'p.id = sb.product_id','left');
			$this->db->join('sellers as s', 's.id = pb.seller_id ');

			 
			if(!empty($fromDate)){				
			$this->db->where('pb.date >=', $fromDate);
			}
			if(!empty($toDate)){		
			$this->db->where('pb.date <=', $toDate);
			}
			if(!empty($productId)){		
				$this->db->where('p.id', $productId);
			}
			$this->db->group_by('p.id');
	return $this->db->get()->result_array();
	}
}?>