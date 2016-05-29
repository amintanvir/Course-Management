<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Course_registration_model extends CI_Model {


	public function save($data){
		return execute_sp("sp_courseregistration_ins_upd",$data);
	}

	public function select($data){
		$query = execute_sel_sp("sp_courseregistration_sel_selbyid", $data);
		$result = $query->result();
		return $result;
	}


	public function delete($data)
	{
		return execute_sp("sp_courseregistration_del", $data);
	}

	public function select_due_today($data)
	{
		$query = execute_sel_sp("sp_courseregistration_sel_due_date", $data);
		$result = $query->result();
		return $result;	
	}


	

}
