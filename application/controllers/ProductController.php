<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ProductController extends CI_Controller {
	public function __construct()
    {
        parent::__construct();
        $this->load->model('ProductModel');
    }
    public function create() {
		$data['productURL'] = current_url();
		$data['productList'] = $this->ProductModel->getProductList();
		$this->load->view('common/sidebar',$data);
        $this->load->view('product/create',$data);
    }

    public function store() {
        $data = array(
            'name' => $this->input->post('name'),
            'code' => $this->input->post('code'),
            'gst_rate' => $this->input->post('gst_rate')
        );
		
        $this->ProductModel->create($data);

        redirect('ProductController/create');
    }
}
?>