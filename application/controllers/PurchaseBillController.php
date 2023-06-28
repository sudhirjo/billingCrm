<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PurchaseBillController extends CI_Controller {
	public function __construct()
    {
        parent::__construct();
        $this->load->model(array('PurchaserModel','ProductModel','SellerModel','PurchaseBillModel'));
		
    }
    public function create() {
        $data['products'] = $this->ProductModel->getProductList();
        $data['sellers'] = $this->SellerModel->getSellerList();
        $data['purchasers'] = $this->PurchaserModel->getPurchasersList();
		$data['purchase_billes'] = $this->PurchaseBillModel->get_purchase_bills();		
		$this->load->view('common/sidebar');
        $this->load->view('purchase_bill/create', $data);
    }
	
	public function get_product_data(){
	$product_id= $this->input->post('product_id');
	$rate = $this->ProductModel->getProductDetail($product_id);
	
 // Perform GST calculation based on the rate set in the product
        $gst = $rate[0]->gst_rate * 0.18; // Assuming GST rate is 18%

        // Return the GST value as JSON response
        $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode(['gst' => $gst]));
	}

    public function store() {
        // Validate and store the submitted purchase bill data
        $data = array(
            'date' => $this->input->post('date'),
            'product_id' => $this->input->post('product_id'),
            'seller_id' => $this->input->post('seller_id'),
            'purchaser_id' => $this->input->post('purchaser_id'),
            'rate' => $this->input->post('rate'),
            'quantity' => $this->input->post('quantity'),
			'gst' => $this->input->post('gst'),
            'total' => $this->input->post('total')
        );

        $this->PurchaseBillModel->create($data);

        // Redirect to the purchase bill list or any other page as needed
        redirect('PurchaseBillController/create');
    }
}
?>