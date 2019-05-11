<?php
		    class Salesmen extends MY_Controller{

		    	public function __construct()
	    {
	        parent::__construct();
	        $this->load->model('Salesmen_model');
	        $this->module = 'salesmen';
	        $this->user_type = $this->session->userdata('user_type');
	        $this->id = $this->session->userdata('user_id');
	        $this->permission = $this->get_permission($this->module,$this->user_type);
	    }public function index()
		{
			if ( $this->permission['view'] == '0' && $this->permission['view_all'] == '0' ) 
			{
				redirect('home');
			}
			$this->data['title'] = 'Salesmen';
			if ( $this->permission['view_all'] == '1'){$this->data['salesmen'] = $this->Salesmen_model->all_rows('salesmen');}
			elseif ($this->permission['view'] == '1') {$this->data['salesmen'] = $this->Salesmen_modelget_rows('salesmen',array('user_id'=>$this->id));}
			$this->data['permission'] = $this->permission;
			$this->load->template('salesmen/index',$this->data);
		}public function create()
		{
			if ( $this->permission['created'] == '0') 
			{
				redirect('home');
			}
			$this->data['title'] = 'Create Salesmen';$this->load->template('salesmen/create',$this->data);
		}
		public function insert()
		{
			if ( $this->permission['created'] == '0') 
			{
				redirect('home');
			}
			$data = $this->input->post();
			$data['user_id'] = $this->session->userdata('user_id');$id = $this->Salesmen_model->insert('salesmen',$data);
			if ($id) {
				redirect('salesmen');
			}
		}public function edit($id)
		{
			if ($this->permission['edit'] == '0') 
			{
				redirect('home');
			}
			$this->data['title'] = 'Edit Salesmen';
			$this->data['salesmen'] = $this->Salesmen_model->get_row_single('salesmen',array('id'=>$id));$this->load->template('salesmen/edit',$this->data);
		}

		public function update()
		{
			if ( $this->permission['edit'] == '0') 
			{
				redirect('home');
			}
			$data = $this->input->post();
			$id = $data['id'];
			unset($data['id']);$id = $this->Salesmen_model->update('salesmen',$data,array('id'=>$id));
			if ($id) {
				redirect('salesmen');
			}
		}public function delete($id)
		{
			if ( $this->permission['deleted'] == '0') 
			{
				redirect('home');
			}
			$this->Salesmen_model->delete('salesmen',array('id'=>$id));
			redirect('salesmen');
		}}