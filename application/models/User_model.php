<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model {


	public function user_login($data)
	{
		$query = execute_sel_sp("sp_user_login",$data);
		$result = $query->row();
		return $result;
	}


	public function select($data)
	{

	}

	public function select_by_id($data)
	{
		$query = execute_sel_sp("sp_user_sel_selbyid",$data);
		$result = $query->row();
		return $result;
	}
	

	public function change_password($data)
	{
		return execute_sp("sp_user_change_password",$data);
	}

}
