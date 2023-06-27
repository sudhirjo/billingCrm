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
            $this->input->post('product_id')
        );
		
		$this->load->view('common/sidebar');
        $this->load->view('stock_report/view', $data);
    }
	   public function view_transaction_report() {
        $data['stockReport'] = $this->ReportModel->getTransactionReport(
            $this->input->get('from_date'),
            $this->input->get('to_date'),
            $this->input->get('product_id'),
			$this->input->get('type'),
        );
		$this->load->view('common/sidebar');
        $this->load->view('transaction _report/view', $data);
    }
	
}?>