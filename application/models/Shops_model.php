<?php
		    class Shops_model extends MY_Model{

		    	public function get_shops($id = null)
					{
						$this->db->select('shops.*')
								 ->from('shops'); if ($id != null) {
								$this->db->where('shops.user_id', $id);
							}return $this->db->get()->result_array();
					}}