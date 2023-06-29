<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class ReportController extends CI_Controller {
		public function __construct()
    {
        parent::__construct();
        $this->load->model(array('ReportModel','ProductModel'));
    }
    public function view_stock_report() {
		
		$data['products'] = $this->ProductModel->getProductList();
        $data['stockReport'] = $this->ReportModel->getStockReport(
            $this->input->post('from_date'),
            $this->input->post('to_date'),
            $this->input->post('product_id'),
        );
		    //print_r($this->db->last_query());    die;
		$this->load->view('common/sidebar');
        $this->load->view('stock_report/view', $data);
    }
	   public function view_transaction_report() {
        $data['stockReport'] = $this->ReportModel->getTransactionReport(
            $this->input->post('from_date'),
            $this->input->post('to_date'),
            $this->input->post('product_id'),
			$this->input->post('type'),
        );
		//print_r($this->db->last_query());    die;
		$this->load->view('common/sidebar');
        $this->load->view('transaction _report/view', $data);
    }
	
}?>