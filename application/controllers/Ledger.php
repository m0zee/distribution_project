<?php
class Ledger extends MY_Controller{

	public function __construct()
    {
        parent::__construct();
        $this->load->model('Ledger_entries_model');
        $this->module = 'ledger';
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
		$this->data['company'] = $this->Ledger_entries_model->all_rows('company');
		if ($this->input->post()) {
			$data = $this->input->post();
			$this->data['ledger_entries'] = $this->Ledger_entries_model->get_ledger($data['company'], $data['start'], $data['end']);
			//print_r($this->data['ledger_entries']);die;
		}
		$this->load->template('ledger/index',$this->data);
	}
}