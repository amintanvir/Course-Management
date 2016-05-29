<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Income_category_model extends CI_Model {


	public function save($data){
		return execute_sp("sp_incomecategory_ins_upd",$data);
	}

	public function select($data){
		$query = execute_sel_sp("sp_incomecategory_sel_selbyid", $data);
		$result = $query->result();
		return $result;
	}

	public function delete($data)
	{
		return execute_sp("sp_incomecategory_del", $data);
	}

	


}
