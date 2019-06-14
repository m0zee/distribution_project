<?php
		    class Recovery_model extends MY_Model{

		    	public function get_recovery($id = null)
					{
						$this->db->select('recovery.*,shops.Name,billing.id as bill_id')
								 ->from('recovery')->join('shops', 'shops.id = recovery.Party_Name')->join('billing', 'billing.id = recovery.Bill_NO'); if ($id != null) {
								$this->db->where('recovery.user_id', $id);
							}return $this->db->get()->result_array();
					}}