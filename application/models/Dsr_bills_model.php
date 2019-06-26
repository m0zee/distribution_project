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

    public function get_products($id)
    {
        $this->db->select('p.Name, sum(bd.qty) as qty, c.Name as company, p.sale_price, d.Date, p.id')
                 ->from('billing b')
                 ->join('billing_detail bd', 'bd.bill_id = b.id')
                 ->join('product p', 'p.id = bd.product_id', 'right')
                 ->join('dsr_bills d', 'd.Date = b.Date and d.Booker = b.Booker')
                 ->join('company c', 'c.id = b.Company')
                 ->group_by('p.id')
                 ->where('d.id', $id);
        return $this->db->get()->result_array();
    }

    public function get_merge_products($data)
    {
        $this->db->select('p.Name, sum(bd.qty) as qty, c.Name as company, p.sale_price, d.Date, p.id')
                 ->from('billing b')
                 ->join('billing_detail bd', 'bd.bill_id = b.id')
                 ->join('product p', 'p.id = bd.product_id', 'right')
                 ->join('dsr_bills d', 'd.Date = b.Date and d.Booker = b.Booker')
                 ->join('company c', 'c.id = b.Company')
                 ->group_by('p.id')
                 ->where('d.Date', $data['date'])
                 ->where('(d.Booker = '.$data['booker'].' or d.Booker = '.$data['first_booker'].')');
        return $this->db->get()->result_array();
    }

    public function get_all_bills($id)
    {
        $this->db->select('b.id, b.Date, b.company_discount, b.Discount, b.t_o, b.extra_discount, b.Total_Amount, booker.Name as booker, shops.Name as shop, c.Name as company, group_concat(bd.qty separator ",") as qty, group_concat(p.Name separator ",") as product, group_concat(bd.rate separator ",") as rate, group_concat(bd.product_discount separator ",") as product_discount, group_concat(bd.product_total separator ",") as product_total, group_concat(bd.id separator ",") as detail_id, group_concat(product_type.Slap separator ",") as slap, d.Total_Amount as dsr_total')
                 ->from('billing b')
                 ->join('billing_detail bd', 'bd.bill_id = b.id')
                 ->join('product p', 'p.id = bd.product_id', 'right')
                 ->join('product_type', 'p.Type = product_type.id', 'left')
                 ->join('dsr_bills d', 'd.Date = b.Date and d.Booker = b.Booker')
                 ->join('company c', 'c.id = b.Company')
                 ->join('booker', 'booker.id = b.Booker')
                 ->join('shops', 'shops.id = b.Shop')
                 ->group_by('b.id')
                 ->where('d.id', $id);
        return $this->db->get()->result_array();
    }
}