<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SellerController extends CI_Controller {
	
	public function __construct()
    {
        parent::__construct();
        $this->load->model('SellerModel');
    }
    public function create() {
		$data['sellerList'] = $this->SellerModel->getSellerList();
		$this->load->view('common/sidebar');
        $this->load->view('seller/create',$data);
    }

    public function store() {
        $data = array(
            'name' => $this->input->post('name'),
            'gstin' => $this->input->post('gstin'),
            'address' => $this->input->post('address')
        );

        $this->SellerModel->create($data);

        redirect('SellerController/create');
    }
}
?>