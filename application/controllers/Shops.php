<?php
		    class Shops extends MY_Controller{

		    	public function __construct()
	    {
	        parent::__construct();
	        $this->load->model('Shops_model');
	        $this->module = 'shops';
	        $this->user_type = $this->session->userdata('user_type');
	        $this->id = $this->session->userdata('user_id');
	        $this->permission = $this->get_permission($this->module,$this->user_type);
	    }public function index()
		{
			if ( $this->permission['view'] == '0' && $this->permission['view_all'] == '0' ) 
			{
				redirect('home');
			}
			$this->data['title'] = 'Shops';
			if ( $this->permission['view_all'] == '1'){$this->data['shops'] = $this->Shops_model->get_shops();}
			elseif ($this->permission['view'] == '1') {$this->data['shops'] = $this->Shops_model->get_shops($this->id);}
			$this->data['permission'] = $this->permission;
			$this->load->template('shops/index',$this->data);
		}public function create()
		{
			if ( $this->permission['created'] == '0') 
			{
				redirect('home');
			}
			$this->data['title'] = 'Create Shops';$this->data['table_booker'] = $this->Shops_model->all_rows('booker');$this->load->template('shops/create',$this->data);
		}
		public function insert()
		{
			if ( $this->permission['created'] == '0') 
			{
				redirect('home');
			}
			$data = $this->input->post();
			$data['user_id'] = $this->session->userdata('user_id');$id = $this->Shops_model->insert('shops',$data);
			if ($id) {
				redirect('shops');
			}
		}public function edit($id)
		{
			if ($this->permission['edit'] == '0') 
			{
				redirect('home');
			}
			$this->data['title'] = 'Edit Shops';
			$this->data['shops'] = $this->Shops_model->get_row_single('shops',array('id'=>$id));$this->data['table_booker'] = $this->Shops_model->all_rows('booker');$this->load->template('shops/edit',$this->data);
		}

		public function update()
		{
			if ( $this->permission['edit'] == '0') 
			{
				redirect('home');
			}
			$data = $this->input->post();
			$id = $data['id'];
			unset($data['id']);$id = $this->Shops_model->update('shops',$data,array('id'=>$id));
			if ($id) {
				redirect('shops');
			}
		}public function delete($id)
		{
			if ( $this->permission['deleted'] == '0') 
			{
				redirect('home');
			}
			$this->Shops_model->delete('shops',array('id'=>$id));
			redirect('shops');
		}}