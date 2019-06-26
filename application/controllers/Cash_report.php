<?php
class Cash_report extends MY_Controller{

	public function __construct()
    {
        parent::__construct();
        $this->load->model('Dsr_bills_model');
        $this->module = 'cash_report';
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
		if ($this->input->post()) {
			$data = $this->input->post();
			$this->data['post'] = $data;
			$this->data['entries'] = $this->Dsr_bills_model->get_casd_report($data['date']);
		}
		$this->load->template('report/cash',$this->data);
	}
}