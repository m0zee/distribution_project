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

    public function get_casd_report($date)
    {
        $this->db->select('s.Name as name, d.dsr_cash as amount, d.id')
                 ->from('dsr_bills d')
                 ->join('salesmen s', 's.id = d.salesmen', 'left')
                 ->where('DATE(d.created_at)', $date);
        return $this->db->get()->result_array();
    }

    public function get_sales_report($date)
    {
        $this->db->select('sign_bills.id, Date as date, booker.Name as booker, company.Name as company, sum(Total_Amount - return_amount) as amount, dsr_sales_return')
                 ->from('dsr_bills')
                 ->join('booker', 'booker.id = dsr_bills.Booker')
                 ->join('company', 'company.id = dsr_bills.Company')
                 ->where('Date >=', $data['start'])
                 ->where('Date <=', $data['end']);
        if ($data['booker']) {
            $this->db->where('booker.id', $data['booker']);
        }
        if ($data['company']) {
            $this->db->where('company.id', $data['company']);
        }
        return $this->db->get()->result_array();
    }

    public function get_bills_sales_report($data)
    {
        $this->db->select('sum(billing_detail.final_total) as bills_total, billing.company_discount, billing.Discount, billing.t_o, billing.extra_discount, billing.final_amount')
                 ->from('billing')
                 ->join('billing_detail', 'billing_detail.bill_id = billing.id')
                 ->where('billing.Date >=', $data['start'])
                 ->where('billing.Date <=', $data['end'])
                 ->group_by('billing.id');
        if ($data['booker']) {
            $this->db->where('billing.Booker', $data['booker']);
        }
        if ($data['company']) {
            $this->db->where('billing.Company', $data['company']);
        }     
        return $this->db->get()->result_array();    
    }

    public function get_type_report($data)
    {
        $this->db->select('product_type.Name, sum(billing_detail.final_total) as amount')
                 ->from('product')
                 ->join('product_type', 'product.Type = product_type.id')
                 ->join('billing_detail', 'billing_detail.product_id = product.id')
                 ->join('billing', 'billing_detail.bill_id = billing.id')
                 ->where('billing.Date >=', $data['start'])
                 ->where('billing.Date <=', $data['end'])
                 ->group_by('product_type.id');
        if ($data['booker']) {
            $this->db->where('billing.Booker', $data['booker']);
        }
        if ($data['company']) {
            $this->db->where('billing.Company', $data['company']);
        }     
        return $this->db->get()->result_array();    
    }
}