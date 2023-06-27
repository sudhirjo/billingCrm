<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PurchaserController extends CI_Controller {
	public function __construct()
    {
        parent::__construct();
        $this->load->model('PurchaserModel');
    }
    public function create() {
		$data['purchaserList'] = $this->PurchaserModel->getPurchasersList();
		$this->load->view('common/sidebar');
        $this->load->view('purchaser/create',$data);
    }

    public function store() {
        $data = array(
            'name' => $this->input->post('name'),
            'gstin' => $this->input->post('gstin'),
            'address' => $this->input->post('address')
        );

        $this->PurchaserModel->create($data);

        redirect('PurchaserController/create');
    }
}
?>