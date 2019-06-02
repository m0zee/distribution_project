<?php
		    class Purchase extends MY_Controller{

		    	public function __construct()
	    {
	        parent::__construct();
	        $this->load->model('Purchase_model');
	        $this->load->model('product_model');
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


			$data['Company'] = $this->input->post('Company');
			
			$data['user_id'] = $this->session->userdata('user_id');
			$id = $this->Purchase_model->insert('purchase',$data);
			$total = 0;
			$products = $this->input->post('product');
			foreach ($products as $product) {
				$product_data[] = array_merge($product, ['purchase_id' => $id] );
				$qty[$product['product_id']] = $product['qty'];
				$product_ids[] = $product['product_id'];
				$total += $product['total'];
			}
			$this->Purchase_model->insert('ledger_entries',array('name' => 'Purchase','Company' =>$data['Company'], 'Date' => date('Y-m-d'), 'Amount' => $total, 'Type' => 'Debit', 'purchase_id' => $id, 'user_id' => $this->session->userdata('user_id')));
			$this->product_model->insert_batch('purchase_details', $product_data);

			$products = $this->product_model->get_product_by_ids($product_ids);
			foreach ($products as $product) {
				$qty = $product['stock_in_hand'] + $qty[$product['id']];
				$affected = $this->Purchase_model->update('product',['stock_in_hand' => $qty], ['id' => $product['id']]);
			}

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
			$this->data['purchase'] = $this->Purchase_model->get_row_single('purchase',array('id'=>$id));
			$this->data['table_company'] = $this->Purchase_model->all_rows('company');
			$this->data['purchase_details'] = $this->Purchase_model->get_rows('purchase_details', ['purchase_id' => $id]);
			$this->load->template('purchase/edit',$this->data);
		}

		public function update()
		{
			if ( $this->permission['edit'] == '0') 
			{
				redirect('home');
			}
			$data = $this->input->post();
			$purchase_details = $this->product_model->get_rows('purchase_details', ['purchase_id' => $data['id']]);
			foreach ($purchase_details as $pd) {
				$product = $this->Purchase_model->get_row_single('product', ['id' => $pd['product_id']]);
				$qty = $product['stock_in_hand'] - $pd['qty'];
				$affected = $this->Purchase_model->update('product',['stock_in_hand' => $qty], ['id' => $product['id']]);
			}

			$this->Purchase_model->delete('purchase_details', ['purchase_id', $data['id']]);


			$products = $this->input->post('product');
			$qty = [];
			foreach ($products as $product) {
				$product_data[] = array_merge($product, ['purchase_id' => $data['id']] );
				$qty[$product['product_id']] = $product['qty'];
				$product_ids[] = $product['product_id'];
			}

			$this->product_model->insert_batch('purchase_details', $product_data);

			$products = $this->product_model->get_product_by_ids($product_ids);
			foreach ($products as $product) {
				$qty = $product['stock_in_hand'] + $qty[$product['id']];
				$affected = $this->Purchase_model->update('product',['stock_in_hand' => $qty], ['id' => $product['id']]);
			}


			// echo '<pre>FILE: ' . __FILE__ . '<br>LINE: ' . __LINE__ . '<br>';
			// print_r( $purchase_details );
			// echo '</pre>'; die;
			
			// $products = $this->input->post('product');
			// foreach ($products as $product) {
			// 	$product_data[] = array_merge($product, ['purchase_id' => $id] );
			// 	$qty[$product['product_id']] = $product['qty'];
			// 	$product_ids[] = $product['product_id'];
			// }


			// $products = $this->product_model->get_product_by_ids($product_ids);
			// foreach ($products as $product) {
			// 	$qty = $product['stock_in_hand'] + $qty[$product['id']];
			// 	$affected = $this->Purchase_model->update('product',['stock_in_hand' => $qty], ['id' => $product['id']]);
			// }

			// $id = $data['id'];
			// unset($data['id']);$id = $this->Purchase_model->update('purchase',$data,array('id'=>$id));
		
				redirect('purchase');
			// }
		}public function delete($id)
		{
			if ( $this->permission['deleted'] == '0') 
			{
				redirect('home');
			}
			$this->Purchase_model->delete('purchase',array('id'=>$id));
			redirect('purchase');
		}}