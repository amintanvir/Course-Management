<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Course_details_model extends CI_Model {


	public function save($data){
		return execute_sp("sp_coursedetails_ins_upd",$data);
	}

	public function select($data)
	{
		$query = execute_sel_sp("sp_coursedetails_sel_selbyid",$data);
		$result = $query->result();
		return $result;
		//return execute_sel_sp("sp_coursedetails_sel_selbyid",$data);
	}

	public function select_by_id($data)
	{
		$query = execute_sel_sp("sp_coursedetails_sel_selbyid",$data);
		$result = $query->row();
		return $result;
	}


	public function select_by_coursecategoryid($data)
	{
		$query = execute_sel_sp("sp_coursedetails_selbycoursecategoryid",$data);
		$result = $query->result();
		return $result;
	}

	public function check_exist($data)
	{
		$query = execute_sel_sp("sp_coursedetails_checkexist",$data);
		$result = $query->row();
		return $result;	
	}

	public function delete($data)
	{
		return execute_sp("sp_coursedetails_del",$data);	
	}

	
	public function search_related_course($value)
	{
		$sql = "SELECT Id, CourseName FROM coursedetails WHERE CourseName LIKE '%".$value."%' GROUP BY CourseName";
		$query = $this->db->query($sql);
		$result = $query->result();
		return $result;
		//echo $sql;
	}

}
