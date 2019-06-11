<?php
		    class Billing extends MY_Controller{

		    	public function __construct()
	    {
	        parent::__construct();
	        $this->load->model('Billing_model');
	        $this->module = 'billing';
	        $this->user_type = $this->session->userdata('user_type');
	        $this->id = $this->session->userdata('user_id');
	        $this->permission = $this->get_permission($this->module,$this->user_type);
	    }public function index()
		{
			if ( $this->permission['view'] == '0' && $this->permission['view_all'] == '0' ) 
			{
				redirect('home');
			}
			$this->data['title'] = 'Billing';
			if ( $this->permission['view_all'] == '1'){$this->data['billing'] = $this->Billing_model->get_billing();}
			elseif ($this->permission['view'] == '1') {$this->data['billing'] = $this->Billing_model->get_billing($this->id);}
			$this->data['permission'] = $this->permission;
			$this->load->template('billing/index',$this->data);
		}public function create()
		{
			if ( $this->permission['created'] == '0') 
			{
				redirect('home');
			}
			$this->data['title'] = 'Create Billing';
			$this->data['table_company'] = $this->Billing_model->all_rows('company');
			$this->data['table_booker'] = $this->Billing_model->all_rows('booker');
			$this->data['table_shops'] = $this->Billing_model->all_rows('shops');
			$this->data['table_product'] = $this->Billing_model->all_rows('product');
			$this->load->template('billing/create',$this->data);
		}
		public function insert()
		{
			if ( $this->permission['created'] == '0') 
			{
				redirect('home');
			}
			$data = $this->input->post();
			foreach ($data['Company'] as $key => $value) {
				$bill = array(
					'Company' => $value, 
					'Booker' => $data['Booker'][$key], 
					'Date' => $data['Date'][$key], 
					'Shop' => $data['Shop'][$key], 
					'Discount' => $data['Discount'][$key], 
					'company_discount' => $data['company_discount'][$key], 
					'Total_Amount' => $data['Total_Amount'][$key],
					'user_id' => $this->session->userdata('user_id'),
				);
				$bill_id = $this->Billing_model->insert('billing',$bill);
				foreach ($data['product'][$key] as $k => $v) {
					$bill_detail = array(
						'bill_id' => $bill_id, 
						'product_id	' => $v, 
						'qty' => $data['quantity'][$key][$k], 
					);
					$this->Billing_model->insert('billing_detail',$bill_detail);
				}
			}
			redirect('billing');
			//echo '<pre>';print_r($data);echo '</pre>';die;
			// $data['user_id'] = $this->session->userdata('user_id');
			// $id = $this->Billing_model->insert('billing',$data);
			// if ($id) {
			// 	redirect('billing');
			// }
		}public function edit($id)
		{
			if ($this->permission['edit'] == '0') 
			{
				redirect('home');
			}
			$this->data['title'] = 'Edit Billing';
			$this->data['billing'] = $this->Billing_model->get_row_single('billing',array('id'=>$id));$this->data['table_company'] = $this->Billing_model->all_rows('company');$this->data['table_booker'] = $this->Billing_model->all_rows('booker');$this->data['table_shops'] = $this->Billing_model->all_rows('shops');$this->load->template('billing/edit',$this->data);
		}

		public function update()
		{
			if ( $this->permission['edit'] == '0') 
			{
				redirect('home');
			}
			$data = $this->input->post();
			$id = $data['id'];
			unset($data['id']);$id = $this->Billing_model->update('billing',$data,array('id'=>$id));
			if ($id) {
				redirect('billing');
			}
		}public function delete($id)
		{
			if ( $this->permission['deleted'] == '0') 
			{
				redirect('home');
			}
			$this->Billing_model->delete('billing',array('id'=>$id));
			redirect('billing');
		}}