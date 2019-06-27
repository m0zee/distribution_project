<?php
class Product_sales_report extends MY_Controller{

	public function __construct()
    {
        parent::__construct();
        $this->load->model('Dsr_bills_model');
        $this->module = 'product_sales_report';
        $this->user_type = $this->session->userdata('user_type');
        $this->id = $this->session->userdata('user_id');
        $this->permission = $this->get_permission($this->module,$this->user_type);
    }
    public function index()
	{
		if ( $this->permission['view'] == '0' && $this->permission['view_all'] == '0' ) 
		{
			redirect('home');
		}
		$this->data['title'] = 'Ledger';
		$this->data['permission'] = $this->permission;
        $this->data['table_company'] = $this->Dsr_bills_model->all_rows('company');
        $this->data['table_booker'] = $this->Dsr_bills_model->all_rows('booker');
		if ($this->input->post()) {
			$data = $this->input->post();
			$this->data['post'] = $data;
			$this->data['entries'] = $this->Dsr_bills_model->get_product_sales_report($data);
		}
		$this->load->template('report/product',$this->data);
	}
}