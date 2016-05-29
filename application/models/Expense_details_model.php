<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Expense_details_model extends CI_Model {


	public function save($data){
		return execute_sp("sp_expensedetails_ins_upd", $data);
	}

	

    public function select($data)
	{
		$query = execute_sel_sp("sp_expensedetails_sel_selbyid", $data);
		$result = $query->result();
		return $result;
	}


   public function delete($data)
	{
		return execute_sp("sp_expensedetails_del", $data);
	}

/*	public function select_by_id($data)
	{
		$query = execute_sel_sp("sp_expensedetails_sel_selbyid", $data);
		$result = $query->row();
		return $result;	
	}
*/

}
