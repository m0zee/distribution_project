<?php
class Product_model extends MY_Model{

	public function get_product($id = null)
	{
		$this->db->select('product.*,company.Name as company')
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

	public function get_company_product($company_id)
	{
		$this->db->select('product.*,product_type.Slap')
				 ->from('product')
				 ->join('company', 'company.id = product.Company')
				 ->join('product_type', 'company.id = product_type.Company and product.Type = product_type.id', 'left')
				 ->where('company.id', $company_id); 
		return $this->db->get()->result_array();
	}
}