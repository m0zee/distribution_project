<?php
class Sign_bills_report extends MY_Controller{

	public function __construct()
    {
        parent::__construct();
        $this->load->model('Sign_bills_model');
        $this->module = 'sign_bills_report';
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
        $this->data['table_company'] = $this->Sign_bills_model->all_rows('company');
        $this->data['table_booker'] = $this->Sign_bills_model->all_rows('booker');
		if ($this->input->post()) {
			$data = $this->input->post();
			$this->data['post'] = $data;
			$this->data['entries'] = $this->Sign_bills_model->get_bills_report($data);
		}
		$this->load->template('report/bills',$this->data);
	}
}