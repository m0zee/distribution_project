<?php
		    class Product_type extends MY_Controller{

		    	public function __construct()
	    {
	        parent::__construct();
	        $this->load->model('Product_type_model');
	        $this->module = 'product_type';
	        $this->user_type = $this->session->userdata('user_type');
	        $this->id = $this->session->userdata('user_id');
	        $this->permission = $this->get_permission($this->module,$this->user_type);
	    }public function index()
		{
			if ( $this->permission['view'] == '0' && $this->permission['view_all'] == '0' ) 
			{
				redirect('home');
			}
			$this->data['title'] = 'Product_type';
			if ( $this->permission['view_all'] == '1'){$this->data['product_type'] = $this->Product_type_model->get_product_type();}
			elseif ($this->permission['view'] == '1') {$this->data['product_type'] = $this->Product_type_model->get_product_type($this->id);}
			$this->data['permission'] = $this->permission;
			$this->load->template('product_type/index',$this->data);
		}public function create()
		{
			if ( $this->permission['created'] == '0') 
			{
				redirect('home');
			}
			$this->data['title'] = 'Create Product_type';$this->data['table_company'] = $this->Product_type_model->all_rows('company');$this->load->template('product_type/create',$this->data);
		}
		public function insert()
		{
			if ( $this->permission['created'] == '0') 
			{
				redirect('home');
			}
			$data = $this->input->post();
			$data['user_id'] = $this->session->userdata('user_id');$id = $this->Product_type_model->insert('product_type',$data);
			if ($id) {
				redirect('product_type');
			}
		}public function edit($id)
		{
			if ($this->permission['edit'] == '0') 
			{
				redirect('home');
			}
			$this->data['title'] = 'Edit Product_type';
			$this->data['product_type'] = $this->Product_type_model->get_row_single('product_type',array('id'=>$id));$this->data['table_company'] = $this->Product_type_model->all_rows('company');$this->load->template('product_type/edit',$this->data);
		}

		public function update()
		{
			if ( $this->permission['edit'] == '0') 
			{
				redirect('home');
			}
			$data = $this->input->post();
			$id = $data['id'];
			unset($data['id']);$id = $this->Product_type_model->update('product_type',$data,array('id'=>$id));
			if ($id) {
				redirect('product_type');
			}
		}public function delete($id)
		{
			if ( $this->permission['deleted'] == '0') 
			{
				redirect('home');
			}
			$this->Product_type_model->delete('product_type',array('id'=>$id));
			redirect('product_type');
		}


		public function get_product_type_by_company_id()
		{
			$company_id = $this->input->post('company_id');
			$product_type =  $this->Product_type_model->get_rows('product_type', ['Company' => $company_id]);
			echo json_encode(['status' => 200, 'data' => $product_type]);
		}


	}