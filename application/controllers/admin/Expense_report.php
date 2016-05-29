<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Expense_report extends CI_Controller {
     
     public function __construct(){
		parent::__construct();
		$this->load->model("expense_report_model");
		$user_id = $this->session->userdata("UserId");
		if($user_id == NULL){
			redirect("aldl_lg","refresh");
		}
	}


	
	public function index()
	{
		$data=array();
        $data["title"]="Expense Report";
		$data["main_content"]=$this->load->view("admin_view/expense_report_view",$data,true);
		$this->load->view("admin_view/admin_master",$data);
	}

	public function find_report()
	{
		$dateFrom = $this->input->post("txtFromDate",true);	
		$toDate = $this->input->post("txtToDate",true);
		$expenseType = $this->input->post("ddlExpenseType",true);

		if($expenseType=="teacher"){
			$employee_salary=0;
			if($dateFrom!="" || $toDate!=""){
				$result_employee_salary = $this->expense_report_model->teacher_salary_expense_date_range($dateFrom,$toDate);
				echo "<table class='table table-bordered table-hover'>";
				echo "<tr>";
					echo "<th>Employee Name</th>";
					echo "<th>Email</th>";
					echo "<th>Payment Date</th>";
					echo "<th>Salary Paid</th>";
				echo "</tr>";

				foreach ($result_employee_salary as $key => $value) {
					$employee_salary+=$value->PaidSalary;
					echo "<tr>";
						echo "<td>".$value->FullName."</td>";
						echo "<td>".$value->Email."</td>";
						echo "<td>".$value->SalaryDate."</td>";
						echo "<td>".$value->PaidSalary."</td>";
					echo "</tr>";
				}
				echo "<tr><td colspan='5'>Total expense : ".$employee_salary."</td></tr>";
				echo "</table>";
			}

		}else if($expenseType=="others"){
			$other_expense=0;
			if($dateFrom!="" || $toDate!=""){
				$result_expense = $this->expense_report_model->expense_date_range($dateFrom,$toDate);
				echo "<table class='table table-bordered table-hover'>";
				echo "<tr>";
					echo "<th>Expense Title</th>";
					echo "<th>Expense Category</th>";
					echo "<th>Espense Date</th>";
					echo "<th>Expense Money</th>";
				echo "</tr>";
				foreach ($result_expense as $key => $value) {
					$other_expense+=$value->ExpenseMoney;
					echo "<tr>";
						echo "<td>".$value->ExpenseTitle."</td>";
						echo "<td>".$value->ExpenseCategoryName."</td>";
						echo "<td>".$value->ExpenseDate."</td>";
						echo "<td>".$value->ExpenseMoney."</td>";
					echo "</tr>";
				}
				echo "<tr><td colspan='5'>Total expense : ".$other_expense."</td></tr>";
			echo "</table>";
			}			
		}else{
			if($dateFrom!="" || $toDate!=""){
				$result_expense=$this->expense_report_model->expense_date_range($dateFrom,$toDate);
				$result_employee_salary=$this->expense_report_model->teacher_salary_expense_date_range($dateFrom,$toDate);
				$other_expense = 0;
				$employee_salary = 0;
				
				echo "<table class='table table-bordered table-hover'>";
					echo "<tr>";
						echo "<th>Expense Title</th>";
						echo "<th>Expense Category</th>";
						echo "<th>Expense Date</th>";
						echo "<th>Expense Money</th>";
					echo "</tr>";
					foreach ($result_expense as $key => $value) {
						$other_expense+=$value->ExpenseMoney;
						echo "<tr>";
							echo "<td>".$value->ExpenseTitle."</td>";
							echo "<td>".$value->ExpenseCategoryName."</td>";
							echo "<td>".$value->ExpenseDate."</td>";
							echo "<td>".$value->ExpenseMoney."</td>";
						echo "</tr>";
					}
					echo "<tr><td colspan='5'>Total expense : ".$other_expense."</td></tr>";
				echo "</table>";

				echo "<table class='table table-bordered table-hover'>";
					echo "<tr>";
						echo "<th>Employee Name</th>";
						echo "<th>Email</th>";
						echo "<th>Payment Date</th>";
						echo "<th>Salary Paid</th>";
					echo "</tr>";

					foreach ($result_employee_salary as $key => $value) {
						$employee_salary+=$value->PaidSalary;
						echo "<tr>";
							echo "<td>".$value->FullName."</td>";
							echo "<td>".$value->Email."</td>";
							echo "<td>".$value->SalaryDate."</td>";
							echo "<td>".$value->PaidSalary."</td>";
						echo "</tr>";
					}
					echo "<tr><td colspan='5'>Total expense : ".$employee_salary."</td></tr>";
				echo "</table>";
				echo "<h2>Overall Expense: ".($other_expense+$employee_salary)."</h2>";			
			}
		}

	}



	public function find_report_specific_date()
	{
		$specificDate = $this->input->post("txtSpecificDate",true);
		if($specificDate!=""){
			$result_expense_specific_date = $this->expense_report_model->expense_specific_date($specificDate);
			$result_employee_salary_specific_date=$this->expense_report_model->teacher_salary_specific_date($specificDate);
			
			$other_expense = 0;
			$employee_salary = 0;
				
				echo "<table class='table table-bordered table-hover'>";
					echo "<tr>";
						echo "<th>Expense Title</th>";
						echo "<th>Expense Category</th>";
						echo "<th>Expense Date</th>";
						echo "<th>Expense Money</th>";
					echo "</tr>";
					foreach ($result_expense_specific_date as $key => $value) {
						$other_expense+=$value->ExpenseMoney;
						echo "<tr>";
							echo "<td>".$value->ExpenseTitle."</td>";
							echo "<td>".$value->ExpenseCategoryName."</td>";
							echo "<td>".$value->ExpenseDate."</td>";
							echo "<td>".$value->ExpenseMoney."</td>";
						echo "</tr>";
					}
					echo "<tr><td colspan='5'>Total income : ".$other_expense."</td></tr>";
				echo "</table>";

				echo "<table class='table table-bordered table-hover'>";
					echo "<tr>";
						echo "<th>Employee Name</th>";
						echo "<th>Email</th>";
						echo "<th>Payment Date</th>";
						echo "<th>Salary Paid</th>";
					echo "</tr>";

					foreach ($result_employee_salary_specific_date as $key => $value) {
						$employee_salary+=$value->PaidSalary;
						echo "<tr>";
							echo "<td>".$value->FullName."</td>";
							echo "<td>".$value->Email."</td>";
							echo "<td>".$value->SalaryDate."</td>";
							echo "<td>".$value->PaidSalary."</td>";
						echo "</tr>";
					}
					echo "<tr><td colspan='5'>Total expense : ".$employee_salary."</td></tr>";
				echo "</table>";
				echo "<h2>Overall Expense: ".($other_expense+$employee_salary)."</h2>";	
		}
	}

}