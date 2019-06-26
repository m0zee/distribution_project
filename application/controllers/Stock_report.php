<?php
class Stock_report extends MY_Controller{

	public function __construct()
    {
        parent::__construct();
        $this->load->model('Product_model');
        $this->module = 'stock_report';
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
        $this->data['table_company'] = $this->Product_model->all_rows('company');
		if ($this->input->post()) {
			$data = $this->input->post();
			$this->data['post'] = $data;
			$this->data['entries'] = $this->Product_model->get_rows('product', array('Company'=>$data['company']));
		}
		$this->load->template('report/stock',$this->data);
	}
}