<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Courseteacher_info_model extends CI_Model {


	public function save($data){
		return execute_sp("sp_courseteacher_ins_upd",$data);
	}
    
   	public function select($data)
	{
		$query = execute_sel_sp("sp_courseteacher_sel_selbyid",$data);
		$result = $query->result();
		return $result;
	}
 
	public function select_by_id($data)
	{
		$query = execute_sel_sp("sp_courseteacher_sel_selbyid",$data);
		$result = $query->row();
		return $result;
	}

	public function delete($data)
	{
		return execute_sp("sp_courseteacher_del",$data);	
	}


	public function check_exist($data)
	{
		$query = execute_sel_sp("sp_courseteacher_exist",$data);
		$result = $query->row();
		return $result;
	}

	public function select_by_limit($data)
	{
		$query = execute_sel_sp("sp_courseteacher_selbylimit",$data);
		$result = $query->result();
		return $result;	
	}

	
}
