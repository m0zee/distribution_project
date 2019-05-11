<?php
		    class Company extends MY_Controller{

		    	public function __construct()
	    {
	        parent::__construct();
	        $this->load->model('Company_model');
	        $this->module = 'company';
	        $this->user_type = $this->session->userdata('user_type');
	        $this->id = $this->session->userdata('user_id');
	        $this->permission = $this->get_permission($this->module,$this->user_type);
	    }public function index()
		{
			if ( $this->permission['view'] == '0' && $this->permission['view_all'] == '0' ) 
			{
				redirect('home');
			}
			$this->data['title'] = 'Company';
			if ( $this->permission['view_all'] == '1'){$this->data['company'] = $this->Company_model->all_rows('company');}
			elseif ($this->permission['view'] == '1') {$this->data['company'] = $this->Company_modelget_rows('company',array('user_id'=>$this->id));}
			$this->data['permission'] = $this->permission;
			$this->load->template('company/index',$this->data);
		}public function create()
		{
			if ( $this->permission['created'] == '0') 
			{
				redirect('home');
			}
			$this->data['title'] = 'Create Company';$this->load->template('company/create',$this->data);
		}
		public function insert()
		{
			if ( $this->permission['created'] == '0') 
			{
				redirect('home');
			}
			$data = $this->input->post();
			$data['user_id'] = $this->session->userdata('user_id');$id = $this->Company_model->insert('company',$data);
			if ($id) {
				redirect('company');
			}
		}public function edit($id)
		{
			if ($this->permission['edit'] == '0') 
			{
				redirect('home');
			}
			$this->data['title'] = 'Edit Company';
			$this->data['company'] = $this->Company_model->get_row_single('company',array('id'=>$id));$this->load->template('company/edit',$this->data);
		}

		public function update()
		{
			if ( $this->permission['edit'] == '0') 
			{
				redirect('home');
			}
			$data = $this->input->post();
			$id = $data['id'];
			unset($data['id']);$id = $this->Company_model->update('company',$data,array('id'=>$id));
			if ($id) {
				redirect('company');
			}
		}public function delete($id)
		{
			if ( $this->permission['deleted'] == '0') 
			{
				redirect('home');
			}
			$this->Company_model->delete('company',array('id'=>$id));
			redirect('company');
		}}