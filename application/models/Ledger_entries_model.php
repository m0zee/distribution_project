<?php
class Ledger_entries_model extends MY_Model
{
    
    public function get_ledger_entries($id = null)
    {
        $this->db->select('ledger_entries.*,company.Name as company')->from('ledger_entries')->join('company', 'company.id = ledger_entries.Company');
        if ($id != null) {
            $this->db->where('ledger_entries.user_id', $id);
        }
        return $this->db->get()->result_array();
    }

    public function get_ledger($id, $start, $end)
    {
    	$this->db->select('sum(Amount) as debit_amount, company.id as company_id')
				 ->from('ledger_entries')
        		 ->join('company', 'company.id = ledger_entries.Company')
        		 ->where('company.id', $id)
        		 ->where('ledger_entries.Date <', $start)
        		 ->where('ledger_entries.Type', 'Debit')
        		 ->group_by('company.id');
		$d = $this->db->get_compiled_select();

		$this->db->select('sum(Amount) as credit_amount, company.id as company_id')
				 ->from('ledger_entries')
        		 ->join('company', 'company.id = ledger_entries.Company')
        		 ->where('company.id', $id)
        		 ->where('ledger_entries.Date <', $start)
        		 ->where('ledger_entries.Type', 'Credit')
        		 ->group_by('company.id');
		$c = $this->db->get_compiled_select();

        $this->db->select('ledger_entries.*,company.Name as company, credit_amount, debit_amount')
        		 ->from('ledger_entries')
        		 ->join('company', 'company.id = ledger_entries.Company')
        		 ->join('('.$d.') d', 'd.company_id = company.id', 'left')
				 ->join('('.$c.') c', 'c.company_id = company.id', 'left')
        		 ->where('company.id', $id)
        		 ->where('ledger_entries.Date >=', $start)
        		 ->where('ledger_entries.Date <=', $end);
        return $this->db->get()->result_array();
    }
}
