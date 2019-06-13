<?php
		    class Sign_bills extends MY_Controller{

		    	public function __construct()
	    {
	        parent::__construct();
	        $this->load->model('Sign_bills_model');
	        $this->module = 'sign_bills';
	        $this->user_type = $this->session->userdata('user_type');
	        $this->id = $this->session->userdata('user_id');
	        $this->permission = $this->get_permission($this->module,$this->user_type);
	    }public function index()
		{
			if ( $this->permission['view'] == '0' && $this->permission['view_all'] == '0' ) 
			{
				redirect('home');
			}
			$this->data['title'] = 'Sign_bills';
			$booker = null;
			if ($this->input->post('booker')) {
				$booker = $this->input->post('booker');
			}
			if ( $this->permission['view_all'] == '1'){$this->data['sign_bills'] = $this->Sign_bills_model->get_sign_bills(null, $booker);}
			elseif ($this->permission['view'] == '1') {$this->data['sign_bills'] = $this->Sign_bills_model->get_sign_bills($this->id, $booker);}
			$this->data['permission'] = $this->permission;
			$this->data['booker'] = $this->Sign_bills_model->all_rows('booker');
			$this->load->template('sign_bills/index',$this->data);
		}public function create()
		{
			if ( $this->permission['created'] == '0') 
			{
				redirect('home');
			}
			$this->data['title'] = 'Create Sign_bills';$this->data['table_shops'] = $this->Sign_bills_model->all_rows('shops');$this->data['table_billing'] = $this->Sign_bills_model->all_rows('billing');$this->load->template('sign_bills/create',$this->data);
		}
		public function insert()
		{
			if ( $this->permission['created'] == '0') 
			{
				redirect('home');
			}
			$data = $this->input->post();
			$data['user_id'] = $this->session->userdata('user_id');$id = $this->Sign_bills_model->insert('sign_bills',$data);
			if ($id) {
				redirect('sign_bills');
			}
		}public function edit($id)
		{
			if ($this->permission['edit'] == '0') 
			{
				redirect('home');
			}
			$this->data['title'] = 'Edit Sign_bills';
			$this->data['sign_bills'] = $this->Sign_bills_model->get_row_single('sign_bills',array('id'=>$id));$this->data['table_shops'] = $this->Sign_bills_model->all_rows('shops');$this->data['table_billing'] = $this->Sign_bills_model->all_rows('billing');$this->load->template('sign_bills/edit',$this->data);
		}

		public function update()
		{
			if ( $this->permission['edit'] == '0') 
			{
				redirect('home');
			}
			$data = $this->input->post();
			$id = $data['id'];
			unset($data['id']);$id = $this->Sign_bills_model->update('sign_bills',$data,array('id'=>$id));
			if ($id) {
				redirect('sign_bills');
			}
		}public function delete($id)
		{
			if ( $this->permission['deleted'] == '0') 
			{
				redirect('home');
			}
			$this->Sign_bills_model->delete('sign_bills',array('id'=>$id));
			redirect('sign_bills');
		}}