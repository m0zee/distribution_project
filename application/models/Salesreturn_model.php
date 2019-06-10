<?php
		    class Salesreturn_model extends MY_Model{

		    	public function get_salesreturn($id = null)
					{
						$this->db->select('salesreturn.*,company.Name,booker.Name,shops.Name')
								 ->from('salesreturn')->join('company', 'company.id = salesreturn.company')->join('booker', 'booker.id = salesreturn.booker')->join('shops', 'shops.id = salesreturn.shop'); if ($id != null) {
								$this->db->where('salesreturn.user_id', $id);
							}return $this->db->get()->result_array();
					}}