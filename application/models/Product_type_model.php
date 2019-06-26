<?php
		    class Product_type_model extends MY_Model{

		    	public function get_product_type($id = null)
					{
						$this->db->select('product_type.*,company.Name as company')
								 ->from('product_type')->join('company', 'company.id = product_type.Company'); if ($id != null) {
								$this->db->where('product_type.user_id', $id);
							}return $this->db->get()->result_array();
					}}