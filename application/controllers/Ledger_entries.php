<?php
		    class Ledger_entries extends MY_Controller{

		    	public function __construct()
	    {
	        parent::__construct();
	        $this->load->model('Ledger_entries_model');
	        $this->module = 'ledger_entries';
	        $this->user_type = $this->session->userdata('user_type');
	        $this->id = $this->session->userdata('user_id');
	        $this->permission = $this->get_permission($this->module,$this->user_type);
	    }public function index()
		{
			if ( $this->permission['view'] == '0' && $this->permission['view_all'] == '0' ) 
			{
				redirect('home');
			}
			$this->data['title'] = 'Ledger_entries';
			if ( $this->permission['view_all'] == '1'){$this->data['ledger_entries'] = $this->Ledger_entries_model->get_ledger_entries();}
			elseif ($this->permission['view'] == '1') {$this->data['ledger_entries'] = $this->Ledger_entries_model->get_ledger_entries($this->id);}
			$this->data['permission'] = $this->permission;
			$this->load->template('ledger_entries/index',$this->data);
		}public function create()
		{
			if ( $this->permission['created'] == '0') 
			{
				redirect('home');
			}
			$this->data['title'] = 'Create Ledger_entries';$this->data['table_company'] = $this->Ledger_entries_model->all_rows('company');$this->load->template('ledger_entries/create',$this->data);
		}
		public function insert()
		{
			if ( $this->permission['created'] == '0') 
			{
				redirect('home');
			}
			$data = $this->input->post();
			$data['user_id'] = $this->session->userdata('user_id');$id = $this->Ledger_entries_model->insert('ledger_entries',$data);
			if ($id) {
				redirect('ledger_entries');
			}
		}public function edit($id)
		{
			if ($this->permission['edit'] == '0') 
			{
				redirect('home');
			}
			$this->data['title'] = 'Edit Ledger_entries';
			$this->data['ledger_entries'] = $this->Ledger_entries_model->get_row_single('ledger_entries',array('id'=>$id));$this->data['table_company'] = $this->Ledger_entries_model->all_rows('company');$this->load->template('ledger_entries/edit',$this->data);
		}

		public function update()
		{
			if ( $this->permission['edit'] == '0') 
			{
				redirect('home');
			}
			$data = $this->input->post();
			$id = $data['id'];
			unset($data['id']);$id = $this->Ledger_entries_model->update('ledger_entries',$data,array('id'=>$id));
			if ($id) {
				redirect('ledger_entries');
			}
		}public function delete($id)
		{
			if ( $this->permission['deleted'] == '0') 
			{
				redirect('home');
			}
			$this->Ledger_entries_model->delete('ledger_entries',array('id'=>$id));
			redirect('ledger_entries');
		}}