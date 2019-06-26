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
        $this->data['table_company'] = $this->Dsr_bills_model->all_rows('company');
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
        $this->data['table_company'] = $this->Dsr_bills_model->all_rows('company');
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

    public function merge()
    {
        if ($this->permission['created'] == '0') {
            redirect('home');
        }
        if ($this->input->post()) {
            $data = $this->input->post();
            $this->data['products'] = $this->Dsr_bills_model->get_merge_products($data);
            //print_r($this->db->last_query());
            //print_r($this->data['products']);die;
            $this->data['merge'] = true;
            $this->load->view('print/load_sheet', $this->data);
            //die;
        }
        else{
            $this->data['title']        = 'Merge Load Sheet';
            $this->data['table_booker'] = $this->Dsr_bills_model->all_rows('booker');
            $this->data['table_company'] = $this->Dsr_bills_model->all_rows('company');
            $this->load->template('dsr_bills/merge', $this->data);
        }
    }

    public function bills($id)
    {
        //$this->data['dsr_bills'] = $this->Dsr_bills_model->get_rows('dsr_bills', array('id' => $id));
        $this->data['dsr_bills'] = $this->Dsr_bills_model->get_all_bills($id);
        //$this->data['products'] = $this->Dsr_bills_model->get_products($id);
        //echo '<pre>';print_r($this->data['dsr_bills']);die;
        $this->load->view('print/bills', $this->data);
    }

    public function print_dsr($id)
    {
        //$this->data['dsr_bills'] = $this->Dsr_bills_model->get_rows('dsr_bills', array('id' => $id));
        $this->data['dsr_bills'] = $this->Dsr_bills_model->get_all_bills($id);
        //$this->data['products'] = $this->Dsr_bills_model->get_products($id);
        //echo '<pre>';print_r($this->data['dsr_bills']);die;
        $this->load->view('print/print_dsr', $this->data);
    }

    public function load_sheet($id)
    {
        $this->data['id'] = $id;
        $this->data['products'] = $this->Dsr_bills_model->get_products($id);
        //echo '<pre>';print_r($this->data['products']);die;
        $this->load->view('print/load_sheet', $this->data);
    }

    public function dsr($id)
    {
    	$this->data['dsr_bills'] = $this->Dsr_bills_model->get_row_single('dsr_bills', array('id' => $id));
    	$this->data['products'] = $this->Dsr_bills_model->get_products($id);
    	//echo '<pre>';print_r($this->data['products']);die;
    	$this->load->view('print/dsr', $this->data);
    }

    public function submit_return($id)
    {
        if ($this->permission['created'] == '0') {
            redirect('home');
        }
        if ($this->input->post()) {
            $data = $this->input->post();
            $total = 0;
            foreach ($data['bill_id'] as $key => $value) {
                $total += $data['bill_total'][$key];
                $this->Dsr_bills_model->update('billing',array('final_amount'=>$data['bill_total'][$key]),array('id'=>$value));
                foreach ($data['bill_detail_id'][$value] as $k => $v) {
                    $this->Dsr_bills_model->update('billing_detail',array('final_total'=>$data['final_total'][$value][$k], 'return_qty'=>$data['return_qty'][$value][$k]),array('id'=>$v));
                    $product_id = $this->Dsr_bills_model->get_row_single('billing_detail', array('id' => $v));
                    $product_id = $product_id['product_id'];
                    $product = $this->Dsr_bills_model->get_row_single('product', ['id' => $product_id]);
                    $stock_in_hand = $product['stock_in_hand'] + $data['return_qty'][$value][$k]; 
                    $stock_data = [
                        'stock_in_hand' => $stock_in_hand
                    ];
                    $this->Dsr_bills_model->update('product', $stock_data, ['id' => $product_id]); 
                }
            }
            $dsr = $this->Dsr_bills_model->get_row_single('dsr_bills', array('id' => $id));
            $return_total = $dsr['Total_Amount'] - $total;
            $this->Dsr_bills_model->update('dsr_bills',array('return_amount'=>$return_total),array('id'=>$id));
            redirect('dsr_bills');
            //echo '<pre>';print_r($this->input->post());echo '</pre>';die;
        }
        $this->data['title']        = 'Submit Return';
        $this->data['dsr_bills'] = $this->Dsr_bills_model->get_all_bills($id);
        $this->load->template('dsr_bills/submit_return', $this->data);

    }

    public function submit_dsr($id)
    {
        if ($this->permission['created'] == '0') {
            redirect('home');
        }

        $this->data['title']        = 'Create Dsr_bills';
        $this->data['table_salesmen'] = $this->Dsr_bills_model->all_rows('salesmen');
        $this->data['dsr']    = $this->Dsr_bills_model->get_row_single('dsr_bills', array('id' => $id));
        $this->data['bills']    = $this->Dsr_bills_model->get_rows('billing', array('Booker' => $this->data['dsr']['Booker'], 'Date' => $this->data['dsr']['Date']));
        $this->data['shops']    = $this->Dsr_bills_model->all_rows('shops');
        $this->data['company_id'] = $this->data['bills'][0]['Company'];
        $this->data['products']    = $this->Dsr_bills_model->get_rows('product', array('Company' => $this->data['company_id']));
        $this->data['bill'] = $this->Dsr_bills_model->all_rows('billing');


        if ($this->input->post()) {
            $data = $this->input->post();
            //echo '<pre>';print_r($data);echo '</pre>';die;
            if (isset($data['salesmen'])) {
                $dsr_data = array(
                    'salesmen' => $data['salesmen'],
                    'dsr_sales_return' => $data['dsr_sales_return'],
                    'dsr_cheque' => $data['dsr_cheque'],
                    'dsr_sign_bills' => $data['dsr_sign_bills'],
                    'dsr_recovery' => $data['dsr_recovery'],
                    'dsr_total' => $data['dsr_total'],
                    'dsr_cash' => $data['dsr_cash'],
                );
                $this->Dsr_bills_model->update('dsr_bills', $dsr_data, array('id' => $id));
            }
            if (isset($data['salesretun'])) {
                $salesretun = $data['salesretun'];
                $post = array();
                foreach ($salesretun['product_id'] as $key => $value) {
                    $post[] = array(
                        'booker' => $this->data['dsr']['Booker'],
                        'company' => $this->data['company_id'],
                        'gross_value' => $salesretun['gross_value'][$key],
                        'product_id' => $salesretun['product_id'][$key],
                        'shop' => $salesretun['shop'][$key],
                        'fresh_qty' => $salesretun['fresh_qty'][$key],
                        'damage_qty' => $salesretun['damage_qty'][$key],
                        'rate' => $salesretun['rate'][$key],
                        'discount' => $salesretun['discount'][$key],
                        'total' => $salesretun['total'][$key],
                        'user_id' => $this->session->userdata('user_id')
                    );

                    $product = $this->Product_model->get_row_single('product', ['id' => $salesretun['product_id'][$key]]);
                    $stock_in_hand = $product['stock_in_hand'] + $salesretun['fresh_qty'][$key]; 
                    $stock_data = [
                        'stock_in_hand' => $stock_in_hand
                    ];
                    $this->Dsr_bills_model->update('product', $stock_data, ['id' => $salesretun['product_id'][$key]]); 
                }
                $this->Dsr_bills_model->insert_batch('salesreturn',$post);
            }
            if (isset($data['chaque'])) {
                $chaque = $data['chaque'];
                $post = array();
                foreach ($chaque['Party_Name'] as $key => $value) {
                    $post[] = array(
                        'Party_Name' => $chaque['Party_Name'][$key],
                        'Address' => $chaque['Address'][$key],
                        'Bill_NO' => $chaque['Bill_NO'][$key],
                        'Cheq_Amount' => $chaque['Cheq_Amount'][$key],
                        'Cheque_Date' => $chaque['Cheque_Date'][$key],
                        'Party_Bank' => $chaque['Party_Bank'][$key],
                        'user_id' => $this->session->userdata('user_id')
                    );
                }
                $this->Dsr_bills_model->insert_batch('cheques',$post);
            }
            if (isset($data['sign_bills'])) {
                $sign_bills = $data['sign_bills'];
                $post = array();
                foreach ($sign_bills['Party_Name'] as $key => $value) {
                    $post[] = array(
                        'Party_Name' => $sign_bills['Party_Name'][$key],
                        'Address' => $sign_bills['Address'][$key],
                        'Bill_NO' => $sign_bills['Bill_NO'][$key],
                        'Net_Amount' => $sign_bills['Net_Amount'][$key],
                        'Signed_Amount' => $sign_bills['Signed_Amount'][$key],
                        'Due_Date' => $sign_bills['Due_Date'][$key],
                        'user_id' => $this->session->userdata('user_id')
                    );
                }
                $this->Dsr_bills_model->insert_batch('sign_bills',$post);
            }

            if (isset($data['recovery'])) {
                $recovery = $data['recovery'];
                foreach ($recovery['Party_Name'] as $key => $value) {
                    $post = array(
                        'Party_Name' => $recovery['Party_Name'][$key],
                        'Address' => $recovery['Address'][$key],
                        'Bill_NO' => $recovery['Bill_NO'][$key],
                        'Rcvd_Amount' => $recovery['Rcvd_Amount'][$key],
                        'Cheque_NO' => $recovery['Cheque_NO'][$key],
                        'Chaque_Date_' => $recovery['Chaque_Date_'][$key],
                        'Party_Bank' => $recovery['Party_Bank'][$key],
                        'user_id' => $this->session->userdata('user_id')
                    );
                    $recovery_id = $this->Dsr_bills_model->insert('recovery',$post);
                    if ($id) {
                        if (!empty($recovery['Cheque_NO'])) {
                            $data2 = array(
                                'Party_Name' => $recovery['Party_Name'][$key],
                                'Address' => $recovery['Address'][$key],
                                'Bill_NO' => $recovery['Bill_NO'][$key],
                                'Cheq_Amount' => $recovery['Rcvd_Amount'][$key],
                                'Cheque_Date' => $recovery['Chaque_Date_'][$key],
                                'Party_Bank' => $recovery['Party_Bank'][$key],
                                'user_id' => $this->session->userdata('user_id')
                            );
                            $this->Dsr_bills_model->insert('cheques',$data2);
                        }
                        $bill = $this->Dsr_bills_model->get_row_single('sign_bills',array('Bill_NO'=>$recovery['Bill_NO'][$key]));
                        $amount = $bill['Rcvd_Amount'] + $recovery['Rcvd_Amount'][$key];
                        $this->Dsr_bills_model->update('sign_bills',array('Rcvd_Amount' => $amount),array('id'=>$bill['id']));
                    }
                }
            }
            redirect('dsr_bills');
            //echo '<pre>';print_r($data);echo '</pre>';die;
        }



        $this->load->template('dsr_bills/submit_dsr', $this->data);
    	//$this->data['dsr_bills'] = $this->Dsr_bills_model->get_row_single('dsr_bills', array('id' => $id));
    	//$this->data['products'] = $this->Dsr_bills_model->get_products($id);
    	//echo '<pre>';print_r($this->data['products']);die;
    	//$this->load->view('print/submit_dsr', $this->data);
    }
}