<?php
		    class Recovery extends MY_Controller{

		    	public function __construct()
	    {
	        parent::__construct();
	        $this->load->model('Recovery_model');
	        $this->module = 'recovery';
	        $this->user_type = $this->session->userdata('user_type');
	        $this->id = $this->session->userdata('user_id');
	        $this->permission = $this->get_permission($this->module,$this->user_type);
	    }public function index()
		{
			if ( $this->permission['view'] == '0' && $this->permission['view_all'] == '0' ) 
			{
				redirect('home');
			}
			$this->data['title'] = 'Recovery';
			if ( $this->permission['view_all'] == '1'){$this->data['recovery'] = $this->Recovery_model->get_recovery();}
			elseif ($this->permission['view'] == '1') {$this->data['recovery'] = $this->Recovery_model->get_recovery($this->id);}
			$this->data['permission'] = $this->permission;
			$this->load->template('recovery/index',$this->data);
		}public function create()
		{
			if ( $this->permission['created'] == '0') 
			{
				redirect('home');
			}
			$this->data['title'] = 'Create Recovery';$this->data['table_shops'] = $this->Recovery_model->all_rows('shops');$this->data['table_billing'] = $this->Recovery_model->all_rows('billing');$this->load->template('recovery/create',$this->data);
		}
		public function insert()
		{
			if ( $this->permission['created'] == '0') 
			{
				redirect('home');
			}
			$data = $this->input->post();
			$data['user_id'] = $this->session->userdata('user_id');$id = $this->Recovery_model->insert('recovery',$data);
			
			if ($id) {
				if (!empty($data['Cheque_NO'])) {
					$data2 = array(
						'Party_Name' => $data['Party_Name'],
						'Address' => $data['Address'],
						'Bill_NO' => $data['Bill_NO'],
						'Cheq_Amount' => $data['Rcvd_Amount'],
						'Cheque_Date' => $data['Chaque_Date_']
						'Party_Bank' => $data['Party_Bank'],
						'user_id' => $this->session->userdata('user_id')
					);
					$this->Recovery_model->insert('cheques',$data2);
				}
				$bill = $this->Recovery_model->get_row_single('sign_bills',array('Bill_NO'=>$data['Bill_NO']));
				$amount = $bill['Rcvd_Amount'] + $data['Rcvd_Amount'];
				$this->Recovery_model->update('sign_bills',array('Rcvd_Amount' => $amount),array('id'=>$data['id']));
				redirect('recovery');
			}
		}public function edit($id)
		{
			if ($this->permission['edit'] == '0') 
			{
				redirect('home');
			}
			$this->data['title'] = 'Edit Recovery';
			$this->data['recovery'] = $this->Recovery_model->get_row_single('recovery',array('id'=>$id));$this->data['table_shops'] = $this->Recovery_model->all_rows('shops');$this->data['table_billing'] = $this->Recovery_model->all_rows('billing');$this->load->template('recovery/edit',$this->data);
		}

		public function update()
		{
			if ( $this->permission['edit'] == '0') 
			{
				redirect('home');
			}
			$data = $this->input->post();
			$id = $data['id'];
			unset($data['id']);$id = $this->Recovery_model->update('recovery',$data,array('id'=>$id));
			if ($id) {
				redirect('recovery');
			}
		}public function delete($id)
		{
			if ( $this->permission['deleted'] == '0') 
			{
				redirect('home');
			}
			$this->Recovery_model->delete('recovery',array('id'=>$id));
			redirect('recovery');
		}}