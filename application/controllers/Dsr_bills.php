<?php
class Dsr_bills extends MY_Controller
{
    
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Dsr_bills_model');
        $this->module     = 'dsr_bills';
        $this->user_type  = $this->session->userdata('user_type');
        $this->id         = $this->session->userdata('user_id');
        $this->permission = $this->get_permission($this->module, $this->user_type);
    }
    public function index()
    {
        if ($this->permission['view'] == '0' && $this->permission['view_all'] == '0') {
            redirect('home');
        }
        $this->data['title'] = 'Dsr_bills';
        if ($this->permission['view_all'] == '1') {
            $this->data['dsr_bills'] = $this->Dsr_bills_model->get_dsr_bills();
        } elseif ($this->permission['view'] == '1') {
            $this->data['dsr_bills'] = $this->Dsr_bills_model->get_dsr_bills($this->id);
        }
        $this->data['permission'] = $this->permission;
        $this->load->template('dsr_bills/index', $this->data);
    }
    public function create()
    {
        if ($this->permission['created'] == '0') {
            redirect('home');
        }
        $this->data['title']        = 'Create Dsr_bills';
        $this->data['table_booker'] = $this->Dsr_bills_model->all_rows('booker');
        $this->load->template('dsr_bills/create', $this->data);
    }
    public function insert()
    {
        if ($this->permission['created'] == '0') {
            redirect('home');
        }
        $data                 = $this->input->post();
        $data['user_id']      = $this->session->userdata('user_id');
        $data['Total_Amount'] = $this->Dsr_bills_model->get_bills($data);
        $id                   = $this->Dsr_bills_model->insert('dsr_bills', $data);
        if ($id) {
            redirect('dsr_bills');
        }
    }
    public function edit($id)
    {
        if ($this->permission['edit'] == '0') {
            redirect('home');
        }
        $this->data['title']        = 'Edit Dsr_bills';
        $this->data['dsr_bills']    = $this->Dsr_bills_model->get_row_single('dsr_bills', array(
            'id' => $id
        ));
        $this->data['table_booker'] = $this->Dsr_bills_model->all_rows('booker');
        $this->load->template('dsr_bills/edit', $this->data);
    }
    
    public function update()
    {
        if ($this->permission['edit'] == '0') {
            redirect('home');
        }
        $data = $this->input->post();
        $id   = $data['id'];
        unset($data['id']);
        $id = $this->Dsr_bills_model->update('dsr_bills', $data, array(
            'id' => $id
        ));
        if ($id) {
            redirect('dsr_bills');
        }
    }
    public function delete($id)
    {
        if ($this->permission['deleted'] == '0') {
            redirect('home');
        }
        $this->Dsr_bills_model->delete('dsr_bills', array(
            'id' => $id
        ));
        redirect('dsr_bills');
    }

    public function dsr($id)
    {
    	$this->data['dsr_bills'] = $this->Dsr_bills_model->get_row_single('dsr_bills', array('id' => $id));
    	$this->data['products'] = $this->Dsr_bills_model->get_products($id);
    	//echo '<pre>';print_r($this->data['products']);die;
    	$this->load->view('print/dsr', $this->data);
    }
}