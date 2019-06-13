<?php
		    class Sign_bills_model extends MY_Model{

		    	public function get_sign_bills($id = null)
					{
						$this->db->select('sign_bills.*,shops.Name,billing.id as bill_id, booker.Name as booker')
								 ->from('sign_bills')->join('shops', 'shops.id = sign_bills.Party_Name')->join('billing', 'billing.id = sign_bills.Bill_NO')->join('booker', 'booker.id = billing.Booker'); if ($id != null) {
								$this->db->where('sign_bills.user_id', $id);
							}return $this->db->get()->result_array();
					}}