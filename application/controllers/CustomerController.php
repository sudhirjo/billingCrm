<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CustomerController extends CI_Controller {
	public function __construct()
    {
        parent::__construct();
        $this->load->model('CustomerModel');
    }
	
    public function create(){		
		$data['customerList'] = $this->CustomerModel->getCustomersList();
		$this->load->view('common/sidebar');
        $this->load->view('customer/create',$data);
    }

    public function store(){
        $data = array(
            'name' => $this->input->post('name'),
            'gstin' => $this->input->post('gstin'),
            'address' => $this->input->post('address'),
        );
		
        $this->CustomerModel->create($data);
        redirect('CustomerController/create');
    }
}
?>