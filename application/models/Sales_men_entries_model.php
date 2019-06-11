<?php
		    class Sales_men_entries_model extends MY_Model{

		    	public function get_sales_men_entries($id = null)
					{
						$this->db->select('sales_men_entries.*,salesmen.Name as salesmen')
								 ->from('sales_men_entries')->join('salesmen', 'salesmen.id = sales_men_entries.Salesmen'); if ($id != null) {
								$this->db->where('sales_men_entries.user_id', $id);
							}return $this->db->get()->result_array();
					}


	public function get_ledger($id, $start, $end)
    {
    	$this->db->select('sum(Amount) as debit_amount, salesmen.id as company_id')
				 ->from('sales_men_entries')
        		 ->join('salesmen', 'salesmen.id = sales_men_entries.Salesmen')
        		 ->where('salesmen.id', $id)
        		 ->where('sales_men_entries.Date <', $start)
        		 ->where('sales_men_entries.Type', 'Add')
        		 ->group_by('salesmen.id');
		$d = $this->db->get_compiled_select();

		$this->db->select('sum(Amount) as credit_amount, salesmen.id as salesmen_id')
				 ->from('sales_men_entries')
        		 ->join('salesmen', 'salesmen.id = sales_men_entries.Salesmen')
        		 ->where('salesmen.id', $id)
        		 ->where('sales_men_entries.Date <', $start)
        		 ->where('sales_men_entries.Type', 'Subtract')
        		 ->group_by('salesmen.id');
		$c = $this->db->get_compiled_select();

        $this->db->select('sales_men_entries.*,salesmen.Name as salesmen, credit_amount, debit_amount')
        		 ->from('sales_men_entries')
        		 ->join('salesmen', 'salesmen.id = sales_men_entries.Salesmen')
        		 ->join('('.$d.') d', 'd.salesmen_id = salesmen.id', 'left')
				 ->join('('.$c.') c', 'c.salesmen_id = salesmen.id', 'left')
        		 ->where('salesmen.id', $id)
        		 ->where('sales_men_entries.Date >=', $start)
        		 ->where('sales_men_entries.Date <=', $end);
        return $this->db->get()->result_array();
    



}
				}