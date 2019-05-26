<?php
class Product_model extends MY_Model{

	public function get_product($id = null)
	{
		$this->db->select('product.*,company.id')
				->from('product')->join('company', 'company.id = product.Company'); 
		if ($id != null) {
			$this->db->where('product.user_id', $id);
		}
		return $this->db->get()->result_array();
	}


	public function get_product_by_ids($ids)
	{
		return $this->db->where_in('id', $ids)->get('product')->result_array();
	}
}