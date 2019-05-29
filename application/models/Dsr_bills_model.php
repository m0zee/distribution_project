<?php
class Dsr_bills_model extends MY_Model
{
    
    public function get_dsr_bills($id = null)
    {
        $this->db->select('dsr_bills.*,booker.Name')->from('dsr_bills')->join('booker', 'booker.id = dsr_bills.Booker');
        if ($id != null) {
            $this->db->where('dsr_bills.user_id', $id);
        }
        return $this->db->get()->result_array();
    }

    public function get_bills($data)
    {
    	$this->db->select('sum(Total_Amount) as total')
    			 ->from('billing')
    			 ->where('Booker', $data['Booker'])
    			 ->where('Date', $data['Date'])
    			 ->group_by(array('Booker','Date'));
    	return $this->db->get()->row()->total;
    }
}