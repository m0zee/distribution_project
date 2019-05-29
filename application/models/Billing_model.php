<?php
		    class Billing_model extends MY_Model{

		    	public function get_billing($id = null)
					{
						$this->db->select('billing.*,company.Name as company,booker.Name as booker,shops.Name as shop')
								 ->from('billing')->join('company', 'company.id = billing.Company')->join('booker', 'booker.id = billing.Booker')->join('shops', 'shops.id = billing.Shop'); if ($id != null) {
								$this->db->where('billing.user_id', $id);
							}return $this->db->get()->result_array();
					}}