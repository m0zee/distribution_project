<?php
		    class Booker extends MY_Controller{

		    	public function __construct()
	    {
	        parent::__construct();
	        $this->load->model('Booker_model');
	        $this->module = 'booker';
	        $this->user_type = $this->session->userdata('user_type');
	        $this->id = $this->session->userdata('user_id');
	        $this->permission = $this->get_permission($this->module,$this->user_type);
	    }public function index()
		{
			if ( $this->permission['view'] == '0' && $this->permission['view_all'] == '0' ) 
			{
				redirect('home');
			}
			$this->data['title'] = 'Booker';
			if ( $this->permission['view_all'] == '1'){$this->data['booker'] = $this->Booker_model->all_rows('booker');}
			elseif ($this->permission['view'] == '1') {$this->data['booker'] = $this->Booker_modelget_rows('booker',array('user_id'=>$this->id));}
			$this->data['permission'] = $this->permission;
			$this->load->template('booker/index',$this->data);
		}public function create()
		{
			if ( $this->permission['created'] == '0') 
			{
				redirect('home');
			}
			$this->data['title'] = 'Create Booker';$this->load->template('booker/create',$this->data);
		}
		public function insert()
		{
			if ( $this->permission['created'] == '0') 
			{
				redirect('home');
			}
			$data = $this->input->post();
			$data['user_id'] = $this->session->userdata('user_id');$id = $this->Booker_model->insert('booker',$data);
			if ($id) {
				redirect('booker');
			}
		}public function edit($id)
		{
			if ($this->permission['edit'] == '0') 
			{
				redirect('home');
			}
			$this->data['title'] = 'Edit Booker';
			$this->data['booker'] = $this->Booker_model->get_row_single('booker',array('id'=>$id));$this->load->template('booker/edit',$this->data);
		}

		public function update()
		{
			if ( $this->permission['edit'] == '0') 
			{
				redirect('home');
			}
			$data = $this->input->post();
			$id = $data['id'];
			unset($data['id']);$id = $this->Booker_model->update('booker',$data,array('id'=>$id));
			if ($id) {
				redirect('booker');
			}
		}public function delete($id)
		{
			if ( $this->permission['deleted'] == '0') 
			{
				redirect('home');
			}
			$this->Booker_model->delete('booker',array('id'=>$id));
			redirect('booker');
		}}