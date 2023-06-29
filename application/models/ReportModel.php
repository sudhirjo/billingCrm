<?php
class ReportModel extends CI_Model {
	
    public function getStockReport($fromDate, $toDate, $productId) {
	
		$this->db->select('p.name AS product_name,COALESCE(SUM(pb.total), 0) AS opening,COALESCE(SUM(pb.total), 0) AS total_purchase,(sb.rate * sb.quantity + sb.gst ) AS total_sale,(COALESCE(SUM(pb.quantity), 0) - COALESCE(SUM(sb.quantity), 0)) AS stock,pb.quantity');
			$this->db->from('products as p');
			$this->db->join('purchase_bills as pb', 'p.id = pb.product_id');
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
        public function getTransactionReport($fromDate, $toDate, $productId,$type) 
		{
		$this->db->select('pb.date AS bill_date, pb.product_id,  s.name as seller, pr.name as buyer,pb.type, pb.quantity,pb.rate,( pb.rate * pb.quantity) AS amount, pb.gst,(pb.rate * pb.quantity + pb.gst ) AS total');
        $this->db->from('purchase_bills as pb');
		$this->db->join('products as p', 'p.id = pb.product_id ');
		$this->db->join('purchasers as pr', 'pr.id = pb.purchaser_id');
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
		if(!empty($type)){		
			$this->db->where('pb.type', $type);
		}
		 $this->db->group_by('p.id');

		$query1 = $this->db->get_compiled_select();
		$this->db->select('sb.date AS bill_date, sb.product_id,  c.name as seller, pr.name as buyer,sb.type, sb.quantity,  sb.rate,( sb.rate * sb.quantity) AS amount, sb.gst,(sb.rate * sb.quantity + sb.gst ) AS total');
   
        $this->db->from('sale_bills as sb');
		$this->db->join('purchasers as pr', 'pr.id = sb.purchaser_id');
		$this->db->join('products as p', 'p.id = sb.product_id ');
		$this->db->join('customers as c', 'c.id = sb.customer_id ');    	 
		if(!empty($fromDate)){				
		$this->db->where('sb.date >=', $fromDate);
		}
		if(!empty($toDate)){		
		$this->db->where('sb.date <=', $toDate);
		}
		if(!empty($productId)){		
			$this->db->where('p.id', $productId);
		}
		if(!empty($type)){		
			$this->db->where('sb.type', $type);
		}

        $this->db->group_by('p.id');
		$query2 = $this->db->get_compiled_select();
		$query = $this->db->query($query1 . ' UNION ALL ' . $query2);
		return $query->result_array();  	
	}
}?>