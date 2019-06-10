<?php
		    class Sales_men_entries extends MY_Controller{

		    	public function __construct()
	    {
	        parent::__construct();
	        $this->load->model('Sales_men_entries_model');
	        $this->module = 'sales_men_entries';
	        $this->user_type = $this->session->userdata('user_type');
	        $this->id = $this->session->userdata('user_id');
	        $this->permission = $this->get_permission($this->module,$this->user_type);
	    }public function index()
		{
			if ( $this->permission['view'] == '0' && $this->permission['view_all'] == '0' ) 
			{
				redirect('home');
			}
			$this->data['title'] = 'Sales_men_entries';
			if ( $this->permission['view_all'] == '1'){$this->data['sales_men_entries'] = $this->Sales_men_entries_model->get_sales_men_entries();}
			elseif ($this->permission['view'] == '1') {$this->data['sales_men_entries'] = $this->Sales_men_entries_model->get_sales_men_entries($this->id);}
			$this->data['permission'] = $this->permission;
			$this->load->template('sales_men_entries/index',$this->data);
		}public function create()
		{
			if ( $this->permission['created'] == '0') 
			{
				redirect('home');
			}
			$this->data['title'] = 'Create Sales_men_entries';$this->data['table_salesmen'] = $this->Sales_men_entries_model->all_rows('salesmen');$this->load->template('sales_men_entries/create',$this->data);
		}
		public function insert()
		{
			if ( $this->permission['created'] == '0') 
			{
				redirect('home');
			}
			$data = $this->input->post();
			$data['user_id'] = $this->session->userdata('user_id');$id = $this->Sales_men_entries_model->insert('sales_men_entries',$data);
			if ($id) {
				redirect('sales_men_entries');
			}
		}public function edit($id)
		{
			if ($this->permission['edit'] == '0') 
			{
				redirect('home');
			}
			$this->data['title'] = 'Edit Sales_men_entries';
			$this->data['sales_men_entries'] = $this->Sales_men_entries_model->get_row_single('sales_men_entries',array('id'=>$id));$this->data['table_salesmen'] = $this->Sales_men_entries_model->all_rows('salesmen');$this->load->template('sales_men_entries/edit',$this->data);
		}

		public function update()
		{
			if ( $this->permission['edit'] == '0') 
			{
				redirect('home');
			}
			$data = $this->input->post();
			$id = $data['id'];
			unset($data['id']);$id = $this->Sales_men_entries_model->update('sales_men_entries',$data,array('id'=>$id));
			if ($id) {
				redirect('sales_men_entries');
			}
		}public function delete($id)
		{
			if ( $this->permission['deleted'] == '0') 
			{
				redirect('home');
			}
			$this->Sales_men_entries_model->delete('sales_men_entries',array('id'=>$id));
			redirect('sales_men_entries');
		}}