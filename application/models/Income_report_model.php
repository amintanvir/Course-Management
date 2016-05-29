<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Income_report_model extends CI_Model {


	public function income_date_range($fromDate, $toDate){
		$sql = "SELECT inc.IncomeTitle, inc.IncomeDescription, inc.IncomeMoney, inc.IncomeDate, (SELECT FullName FROM user WHERE Id = inc.CreatedBy) AS CreatedBy, (SELECT FullName FROM user WHERE Id = inc.ModifiedBy) AS ModifiedBy, inct.IncomeCategoryName FROM incomedetails inc,  incomecategory inct WHERE inc.IncomeCategoryId = inct.Id AND inc.Status<>9 ";
		if($fromDate!=""){
			$sql .= " AND inc.IncomeDate>='".$fromDate."' ";
		}
		if($toDate!=""){
			$sql .= " AND inc.IncomeDate<='".$toDate."'";
		}
		$query = $this->db->query($sql);
		$result = $query->result();
		return $result;
	}


	public function income_specific_date($specificDate){
		$sql = "SELECT inc.IncomeTitle, inc.IncomeDescription, inc.IncomeMoney, inc.IncomeDate, (SELECT FullName FROM user WHERE Id = inc.CreatedBy) AS CreatedBy, (SELECT FullName FROM user WHERE Id = inc.ModifiedBy) AS ModifiedBy, inct.IncomeCategoryName FROM incomedetails inc,  incomecategory inct WHERE inc.IncomeCategoryId = inct.Id  AND inc.Status<>9";
		if($specificDate!=""){
			$sql .= " AND inc.IncomeDate='".$specificDate."' ";
		}
		$query = $this->db->query($sql);
		$result = $query->result();
		return $result;
	}

	public function course_registration_income_date_range($fromDate, $toDate){
		$sql = "SELECT  cr.PaidAmount, cr.PaybleAmount, cr.PaymentDate,  cr.CreationDate, cr.ModifiedBy, cr.ModifyDate, cr.Status, (SELECT UserName FROM user WHERE Id = cr.CreatedBy) AS CreatedByUserName, (SELECT UserName FROM user WHERE Id = cr.ModifiedBy) AS ModifiedByUserName, cd.CourseName, s.FullName, s.Contact FROM courseregistration cr, coursedetails cd, student s WHERE cr.CourseId = cd.Id AND cr.StudentId = s.Id AND cr.Status <> 9  ";
		if($fromDate!=""){
			$sql .= " AND cr.PaymentDate>='".$fromDate."' ";
		}
		if($toDate!=""){
			$sql .= " AND cr.PaymentDate<='".$toDate."' ";	
		}
		$sql .= " ORDER BY cr.Id DESC";
		$query = $this->db->query($sql);
		$result = $query->result();
		return $result;
	}


	public function course_registration_income_specific_date($specificDate){
		$sql = "SELECT  cr.PaidAmount, cr.PaybleAmount, cr.PaymentDate,  cr.CreationDate, cr.ModifiedBy, cr.ModifyDate, cr.Status, (SELECT UserName FROM user WHERE Id = cr.CreatedBy) AS CreatedByUserName, (SELECT UserName FROM user WHERE Id = cr.ModifiedBy) AS ModifiedByUserName, cd.CourseName, s.FullName, s.Contact FROM courseregistration cr, coursedetails cd, student s WHERE cr.CourseId = cd.Id AND cr.StudentId = s.Id AND cr.Status <> 9  ";
		if($specificDate!=""){
			$sql .= " AND cr.PaymentDate='".$specificDate."' ";
		}
		$sql .= " ORDER BY cr.Id DESC";
		$query = $this->db->query($sql);
		$result = $query->result();
		return $result;
	}

}