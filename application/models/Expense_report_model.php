<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Expense_report_model extends CI_Model {


	public function expense_date_range($fromDate, $toDate){
		$sql = "SELECT ex.Id, ex.ExpenseTitle, ex.ExpenseDescription, ex.ExpenseMoney, ex.ExpenseCategoryId, ex.ExpenseDate, (SELECT FullName FROM user WHERE Id = ex.CreatedBy) AS CreatedBy, (SELECT FullName FROM user WHERE Id = ex.ModifiedBy) AS ModifiedBy, exn.ExpenseCategoryName FROM expensedetails ex, expensecategory exn WHERE ex.ExpenseCategoryId = exn.Id AND ex.Status <> 9 ";
		if($fromDate!=""){
			$sql .= " AND ex.ExpenseDate>='".$fromDate."' ";
		}
		if($toDate!=""){
			$sql .= " AND ex.ExpenseDate<='".$toDate."'";
		}
		$query = $this->db->query($sql);
		$result = $query->result();
		return $result;
	}


	public function expense_specific_date($specificDate){
		$sql = "SELECT ex.Id, ex.ExpenseTitle, ex.ExpenseDescription, ex.ExpenseMoney, ex.ExpenseCategoryId, ex.ExpenseDate, (SELECT FullName FROM user WHERE Id = ex.CreatedBy) AS CreatedBy, (SELECT FullName FROM user WHERE Id = ex.ModifiedBy) AS ModifiedBy, exn.ExpenseCategoryName FROM expensedetails ex, expensecategory exn WHERE ex.ExpenseCategoryId = exn.Id AND ex.Status <> 9 ";
		if($specificDate!=""){
			$sql .= " AND ex.ExpenseDate='".$specificDate."' ";
		}
		$sql .=" ORDER BY ex.Id DESC";
		$query = $this->db->query($sql);
		$result = $query->result();
		return $result;
	}

	public function teacher_salary_expense_date_range($fromDate, $toDate){
		$sql = "SELECT es.Id, es.CurrentSalary, es.PaidSalary, es.SalaryDate, c.FullName, c.Email, c.ContactNumber, c.UserType, (SELECT UserName FROM user WHERE Id=es.CreatedBy) AS CreatedByUserName, (SELECT UserName FROM user WHERE Id=es.ModifiedBy) AS ModifiedByUserName FROM employeesalary es, courseteacher c WHERE es.EmployeeId = c.Id ";
		if($fromDate!=""){
			$sql .= " AND es.SalaryDate>='".$fromDate."' ";
		}
		if($toDate!=""){
			$sql .= " AND es.SalaryDate<='".$toDate."' ";	
		}
		$sql .= " ORDER BY es.Id DESC";
		$query = $this->db->query($sql);
		$result = $query->result();
		return $result;
	}


	public function teacher_salary_specific_date($specificDate){
		$sql = "SELECT es.Id, es.CurrentSalary, es.PaidSalary, es.SalaryDate, c.FullName, c.Email, c.ContactNumber, c.UserType, (SELECT UserName FROM user WHERE Id=es.CreatedBy) AS CreatedByUserName, (SELECT UserName FROM user WHERE Id=es.ModifiedBy) AS ModifiedByUserName FROM employeesalary es, courseteacher c WHERE es.EmployeeId = c.Id ";
		if($specificDate!=""){
			$sql .= " AND es.SalaryDate='".$specificDate."' ";
		}
		$sql .= " ORDER BY es.Id DESC";
		$query = $this->db->query($sql);
		$result = $query->result();
		return $result;
	}

}