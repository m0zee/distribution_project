<?php
		    class Sign_bills_model extends MY_Model{

		    	public function get_sign_bills($id = null, $booker = null)
					{
						$this->db->select('sign_bills.*,shops.Name,billing.id as bill_id, booker.Name as booker')
								 ->from('sign_bills')->join('shops', 'shops.id = sign_bills.Party_Name')->join('billing', 'billing.id = sign_bills.Bill_NO')->join('booker', 'booker.id = billing.Booker'); if ($id != null) {
								$this->db->where('sign_bills.user_id', $id);
							}
							if ($booker != null) {
								$this->db->where('booker.id', $booker);
							}
							return $this->db->get()->result_array();
					}


	public function get_bills_report($data)
	{
		$this->db->select('sign_bills.id, shops.Name as shop, booker.Name as booker, company.Name as company, sum(Signed_Amount - Rcvd_Amount) as amount')
				 ->from('sign_bills')
				 ->join('shops', 'shops.id = sign_bills.Party_Name')
				 ->join('billing', 'billing.id = sign_bills.Bill_NO')
				 ->join('booker', 'booker.id = billing.Booker')
				 ->join('company', 'company.id = billing.Company')
				 ->having('amount > 0');
		if ($data['booker']) {
			$this->db->where('booker.id', $data['booker']);
		}
		if ($data['company']) {
			$this->db->where('company.id', $data['company']);
		}
		return $this->db->get()->result_array();
	}


				}