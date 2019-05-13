<?php
		    class Purchase_model extends MY_Model{

		    	public function get_purchase($id = null)
					{
						$this->db->select('purchase.*,company.Name')
								 ->from('purchase')->join('company', 'company.id = purchase.Company'); if ($id != null) {
								$this->db->where('purchase.user_id', $id);
							}return $this->db->get()->result_array();
					}}