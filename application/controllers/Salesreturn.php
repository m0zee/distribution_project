<?php
		    class Salesreturn extends MY_Controller{

		    	public function __construct()
	    {
	        parent::__construct();
	        $this->load->model('Salesreturn_model');
	        $this->module = 'salesreturn';
	        $this->user_type = $this->session->userdata('user_type');
	        $this->id = $this->session->userdata('user_id');
	        $this->permission = $this->get_permission($this->module,$this->user_type);
	    }public function index()
		{
			if ( $this->permission['view'] == '0' && $this->permission['view_all'] == '0' ) 
			{
				redirect('home');
			}
			$this->data['title'] = 'Salesreturn';
			if ( $this->permission['view_all'] == '1'){$this->data['salesreturn'] = $this->Salesreturn_model->get_salesreturn();}
			elseif ($this->permission['view'] == '1') {$this->data['salesreturn'] = $this->Salesreturn_model->get_salesreturn($this->id);}
			$this->data['permission'] = $this->permission;
			$this->load->template('salesreturn/index',$this->data);
		}public function create()
		{
			if ( $this->permission['created'] == '0') 
			{
				redirect('home');
			}
			$this->data['title'] = 'Create Salesreturn';$this->data['table_company'] = $this->Salesreturn_model->all_rows('company');$this->data['table_booker'] = $this->Salesreturn_model->all_rows('booker');$this->data['table_shops'] = $this->Salesreturn_model->all_rows('shops');$this->load->template('salesreturn/create',$this->data);
		}
		public function insert()
		{
			if ( $this->permission['created'] == '0') 
			{
				redirect('home');
			}
			$data = $this->input->post();
			foreach ($data['product'] as &$p) {
				$p['company'] = $this->input->post('company');
				$p['shop'] = $this->input->post('shop');
				$p['booker'] = $this->input->post('booker');
				$p['fresh_qty'] = $p['f_qty'];
				$p['damage_qty'] = $p['d_qty'];
				$p['user_id'] = $this->session->userdata('user_id');
				unset($p['d_qty'], $p['f_qty']);
			}

			$data =  $data['product'];
			$id = $this->Salesreturn_model->insert_batch('salesreturn',$data);
			if ($id) {
				redirect('salesreturn');
			}
		}public function edit($id)
		{
			if ($this->permission['edit'] == '0') 
			{
				redirect('home');
			}
			$this->data['title'] = 'Edit Salesreturn';
			$this->data['salesreturn'] = $this->Salesreturn_model->get_row_single('salesreturn',array('id'=>$id));
			$this->data['table_company'] = $this->Salesreturn_model->all_rows('company');
			$this->data['table_booker'] = $this->Salesreturn_model->all_rows('booker');
			$this->data['table_shops'] = $this->Salesreturn_model->all_rows('shops');
			$this->data['table_products'] = $this->Salesreturn_model->all_rows('product');
			$this->load->template('salesreturn/edit',$this->data);
		}

		public function update()
		{
			if ( $this->permission['edit'] == '0') 
			{
				redirect('home');
			}
			$data = $this->input->post();
			$id = $data['id'];
			unset($data['id']);$id = $this->Salesreturn_model->update('salesreturn',$data,array('id'=>$id));
			if ($id) {
				redirect('salesreturn');
			}
		}public function delete($id)
		{
			if ( $this->permission['deleted'] == '0') 
			{
				redirect('home');
			}
			$this->Salesreturn_model->delete('salesreturn',array('id'=>$id));
			redirect('salesreturn');
		}}