<?php
class Product extends MY_Controller
{
    
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Product_model');
        $this->module     = 'product';
        $this->user_type  = $this->session->userdata('user_type');
        $this->id         = $this->session->userdata('user_id');
        $this->permission = $this->get_permission($this->module, $this->user_type);
    }
    public function index()
    {
        if ($this->permission['view'] == '0' && $this->permission['view_all'] == '0') {
            redirect('home');
        }
        $this->data['title'] = 'Product';
        if ($this->permission['view_all'] == '1') {
            $this->data['product'] = $this->Product_model->get_product();
        } elseif ($this->permission['view'] == '1') {
            $this->data['product'] = $this->Product_model->get_product($this->id);
        }
        $this->data['permission'] = $this->permission;
        $this->load->template('product/index', $this->data);
    }
    public function create()
    {
        if ($this->permission['created'] == '0') {
            redirect('home');
        }
        $this->data['title']         = 'Create Product';
        $this->data['table_company'] = $this->Product_model->all_rows('company');
        $this->data['table_type'] = $this->Product_model->all_rows('product_type');
        $this->load->template('product/create', $this->data);
    }
    public function insert()
    {
        if ($this->permission['created'] == '0') {
            redirect('home');
        }
        $data            = $this->input->post();
        $data['user_id'] = $this->session->userdata('user_id');
        $id              = $this->Product_model->insert('product', $data);
        if ($id) {
            redirect('product');
        }
    }
    public function edit($id)
    {
        if ($this->permission['edit'] == '0') {
            redirect('home');
        }
        $this->data['title']         = 'Edit Product';
        $this->data['product']       = $this->Product_model->get_row_single('product', array(
            'id' => $id
        ));
        $this->data['table_company'] = $this->Product_model->all_rows('company');
        $this->data['table_type'] = $this->Product_model->get_rows('product_type', ['Company' => $this->data['product']['Company']]);
        $this->load->template('product/edit', $this->data);
    }
    
    public function update()
    {
        if ($this->permission['edit'] == '0') {
            redirect('home');
        }
        $data = $this->input->post();
        $id   = $data['id'];
        unset($data['id']);
        $id = $this->Product_model->update('product', $data, array(
            'id' => $id
        ));
        redirect('product');
        // if ($id) {
        //     redirect('product');
        // }
    }
    public function delete($id)
    {
        if ($this->permission['deleted'] == '0') {
            redirect('home');
        }
        $this->Product_model->delete('product', array(
            'id' => $id
        ));
        redirect('product');
    }

    public function get_product()
    {
    	$company_id = $this->input->post('company_id');
        //$products = $this->Product_model->get_rows('product', ['Company' => $company_id]);
    	$products = $this->Product_model->get_company_product($company_id);
    	echo json_encode(['status' => 200, 'data' => $products]); die();
    }
}