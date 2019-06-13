<?php
		    class Cheques_model extends MY_Model{

		    	public function get_cheques($id = null, $booker = null)
					{
						$this->db->select('cheques.*,shops.Name, booker.Name as booker')
								 ->from('cheques')->join('shops', 'shops.id = cheques.Party_Name')->join('billing', 'billing.id = cheques.Bill_NO')->join('booker', 'booker.id = billing.Booker'); if ($id != null) {
								$this->db->where('cheques.user_id', $id);
							}
							if ($booker != null) {
								$this->db->where('booker.id', $booker);
							}
							return $this->db->get()->result_array();
					}}