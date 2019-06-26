<?php
class Sales_report extends MY_Controller{

	public function __construct()
    {
        parent::__construct();
        $this->load->model('Dsr_bills_model');
        $this->module = 'sales_report';
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
			$this->data['entries'] = $this->Dsr_bills_model->get_sales_report($data);
			if ($data['company']) {
				$this->data['type'] = $this->Dsr_bills_model->get_type_report($data);
			}
			$this->data['to'] = 0;
			$this->data['slap'] = 0;
			$this->data['company_discount'] = 0;
			$this->data['extra_discount'] = 0;
			$bills = $this->Dsr_bills_model->get_bills_sales_report($data);
			foreach ($bills as $key => $value) {
				$slap = $value['bills_total'];
				$slap -= $value['t_o'];
				$slap -= ($value['bills_total'] * $data['company_discount'] / 100);
				$slap -= ($value['bills_total'] * $data['extra_discount'] / 100);
				$slap -= $value['final_amount'];
				$this->data['to'] += $value['t_o'];
				$this->data['company_discount'] += ($value['bills_total'] * $data['company_discount'] / 100);
				$this->data['extra_discount'] += ($value['bills_total'] * $data['extra_discount'] / 100);
				$this->data['slap'] += $slap;
			}
		}
		$this->load->template('report/sales',$this->data);
	}
}