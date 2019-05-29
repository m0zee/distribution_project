<?php
		    class Ledger_entries_model extends MY_Model{

		    	public function get_ledger_entries($id = null)
					{
						$this->db->select('ledger_entries.*,company.Name')
								 ->from('ledger_entries')->join('company', 'company.id = ledger_entries.Company'); if ($id != null) {
								$this->db->where('ledger_entries.user_id', $id);
							}return $this->db->get()->result_array();
					}}