<?php
		    class Purchase extends MY_Controller{

		    	public function __construct()
	    {
	        parent::__construct();
	        $this->load->model('Purchase_model');
	        $this->module = 'purchase';
	        $this->user_type = $this->session->userdata('user_type');
	        $this->id = $this->session->userdata('user_id');
	        $this->permission = $this->get_permission($this->module,$this->user_type);
	    }public function index()
		{
			if ( $this->permission['view'] == '0' && $this->permission['view_all'] == '0' ) 
			{
				redirect('home');
			}
			$this->data['title'] = 'Purchase';
			if ( $this->permission['view_all'] == '1'){$this->data['purchase'] = $this->Purchase_model->get_purchase();}
			elseif ($this->permission['view'] == '1') {$this->data['purchase'] = $this->Purchase_model->get_purchase($this->id);}
			$this->data['permission'] = $this->permission;
			$this->load->template('purchase/index',$this->data);
		}public function create()
		{
			if ( $this->permission['created'] == '0') 
			{
				redirect('home');
			}
			$this->data['title'] = 'Create Purchase';$this->data['table_company'] = $this->Purchase_model->all_rows('company');$this->load->template('purchase/create',$this->data);
		}
		public function insert()
		{
			if ( $this->permission['created'] == '0') 
			{
				redirect('home');
			}
			$data = $this->input->post();
			$data['user_id'] = $this->session->userdata('user_id');$id = $this->Purchase_model->insert('purchase',$data);
			if ($id) {
				redirect('purchase');
			}
		}public function edit($id)
		{
			if ($this->permission['edit'] == '0') 
			{
				redirect('home');
			}
			$this->data['title'] = 'Edit Purchase';
			$this->data['purchase'] = $this->Purchase_model->get_row_single('purchase',array('id'=>$id));$this->data['table_company'] = $this->Purchase_model->all_rows('company');$this->load->template('purchase/edit',$this->data);
		}

		public function update()
		{
			if ( $this->permission['edit'] == '0') 
			{
				redirect('home');
			}
			$data = $this->input->post();
			$id = $data['id'];
			unset($data['id']);$id = $this->Purchase_model->update('purchase',$data,array('id'=>$id));
			if ($id) {
				redirect('purchase');
			}
		}public function delete($id)
		{
			if ( $this->permission['deleted'] == '0') 
			{
				redirect('home');
			}
			$this->Purchase_model->delete('purchase',array('id'=>$id));
			redirect('purchase');
		}}