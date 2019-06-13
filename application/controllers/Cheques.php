<?php
		    class Cheques extends MY_Controller{

		    	public function __construct()
	    {
	        parent::__construct();
	        $this->load->model('Cheques_model');
	        $this->module = 'cheques';
	        $this->user_type = $this->session->userdata('user_type');
	        $this->id = $this->session->userdata('user_id');
	        $this->permission = $this->get_permission($this->module,$this->user_type);
	    }public function index()
		{
			if ( $this->permission['view'] == '0' && $this->permission['view_all'] == '0' ) 
			{
				redirect('home');
			}
			$this->data['title'] = 'Cheques';
			$booker = null;
			if ($this->input->post('booker')) {
				$booker = $this->input->post('booker');
			}
			if ( $this->permission['view_all'] == '1'){$this->data['cheques'] = $this->Cheques_model->get_cheques(null, $booker);}
			elseif ($this->permission['view'] == '1') {$this->data['cheques'] = $this->Cheques_model->get_cheques($this->id, $booker);}
			$this->data['permission'] = $this->permission;
			$this->data['booker'] = $this->Cheques_model->all_rows('booker');
			$this->load->template('cheques/index',$this->data);
		}public function create()
		{
			if ( $this->permission['created'] == '0') 
			{
				redirect('home');
			}
			$this->data['title'] = 'Create Cheques';$this->data['table_shops'] = $this->Cheques_model->all_rows('shops');$this->data['table_billing'] = $this->Cheques_model->all_rows('billing');$this->load->template('cheques/create',$this->data);
		}
		public function insert()
		{
			if ( $this->permission['created'] == '0') 
			{
				redirect('home');
			}
			$data = $this->input->post();
			$data['user_id'] = $this->session->userdata('user_id');$id = $this->Cheques_model->insert('cheques',$data);
			if ($id) {
				redirect('cheques');
			}
		}public function edit($id)
		{
			if ($this->permission['edit'] == '0') 
			{
				redirect('home');
			}
			$this->data['title'] = 'Edit Cheques';
			$this->data['cheques'] = $this->Cheques_model->get_row_single('cheques',array('id'=>$id));$this->data['table_shops'] = $this->Cheques_model->all_rows('shops');$this->data['table_billing'] = $this->Cheques_model->all_rows('billing');$this->load->template('cheques/edit',$this->data);
		}

		public function update()
		{
			if ( $this->permission['edit'] == '0') 
			{
				redirect('home');
			}
			$data = $this->input->post();
			$id = $data['id'];
			unset($data['id']);$id = $this->Cheques_model->update('cheques',$data,array('id'=>$id));
			if ($id) {
				redirect('cheques');
			}
		}public function delete($id)
		{
			if ( $this->permission['deleted'] == '0') 
			{
				redirect('home');
			}
			$this->Cheques_model->delete('cheques',array('id'=>$id));
			redirect('cheques');
		}

		public function paid($id)
		{
			$id = $this->Cheques_model->update('cheques',array('Status' => 1),array('id'=>$id));
			if ($id) {
				redirect('cheques');
			}
		}
	}