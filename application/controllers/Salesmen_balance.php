<?php
class Salesmen_balance extends MY_Controller{

	public function __construct()
    {
        parent::__construct();
        $this->load->model('Sales_men_entries_model');
        $this->module = 'salesmen_balance';
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
		$this->data['title'] = 'Salesmen Balance';
		$this->data['permission'] = $this->permission;
		$this->data['salesman'] = $this->Sales_men_entries_model->all_rows('salesmen');
		if ($this->input->post()) {
			$data = $this->input->post();
			$this->data['ledger_entries'] = $this->Sales_men_entries_model->get_ledger($data['salesman'], $data['start'], $data['end']);
			//print_r($this->data['ledger_entries']);die;
		}
		$this->load->template('salesmen_balance/index',$this->data);
	}
}