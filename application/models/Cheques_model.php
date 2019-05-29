<?php
		    class Cheques_model extends MY_Model{

		    	public function get_cheques($id = null)
					{
						$this->db->select('cheques.*,shops.Name,billing.id')
								 ->from('cheques')->join('shops', 'shops.id = cheques.Party_Name')->join('billing', 'billing.id = cheques.Bill_NO'); if ($id != null) {
								$this->db->where('cheques.user_id', $id);
							}return $this->db->get()->result_array();
					}}