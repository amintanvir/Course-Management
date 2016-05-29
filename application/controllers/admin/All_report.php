<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class All_report extends CI_Controller {
     
     public function __construct(){
		parent::__construct();
		$this->load->model("income_report_model");
		$this->load->model("expense_report_model");
		$user_id = $this->session->userdata("UserId");
		if($user_id == NULL){
			redirect("aldl_lg","refresh");
		}
	}


	
	public function index()
	{
		$data=array();
        $data["title"]="Total Income Expense Report";
		$data["main_content"]=$this->load->view("admin_view/all_report_view",$data,true);
		$this->load->view("admin_view/admin_master",$data);
	}


	public function find_report()
	{
		$dateFrom = $this->input->post("txtFromDate",true);
		$toDate = $this->input->post("txtToDate",true);
		if($dateFrom!=""&&$toDate!=""){

				$total_income=0;
				$total_expense=0;


				$result_income=$this->income_report_model->income_date_range($dateFrom,$toDate);
				$result_income_course=$this->income_report_model->course_registration_income_date_range($dateFrom,$toDate);
				$other_income = 0;
				$course_income = 0;
				echo "<hr/>";
				echo "<h3>Total Income Report</h3>";
				echo "<table class='table table-bordered table-hover'>";
					echo "<tr>";
						echo "<th>Income Title</th>";
						echo "<th>Income Category</th>";
						echo "<th>Income Date</th>";
						echo "<th>Income Money</th>";
					echo "</tr>";
					foreach ($result_income as $key => $value) {
						$other_income+=$value->IncomeMoney;
						echo "<tr>";
							echo "<td>".$value->IncomeTitle."</td>";
							echo "<td>".$value->IncomeCategoryName."</td>";
							echo "<td>".$value->IncomeDate."</td>";
							echo "<td>".$value->IncomeMoney."</td>";
						echo "</tr>";
					}
					echo "<tr><td colspan='5'>Total income : ".$other_income."</td></tr>";
				echo "</table>";

				echo "<table class='table table-bordered table-hover'>";
					echo "<tr>";
						echo "<th>On Course</th>";
						echo "<th>Paid By</th>";
						echo "<th>User Contact</th>";
						echo "<th>Payment Date</th>";
						echo "<th>Paid Amount</th>";
					echo "</tr>";

					foreach ($result_income_course as $key => $value) {
						$course_income+=$value->PaidAmount;
						echo "<tr>";
							echo "<td>".$value->CourseName."</td>";
							echo "<td>".$value->FullName."</td>";
							echo "<td>".$value->Contact."</td>";
							echo "<td>".$value->PaymentDate."</td>";
							echo "<td>".$value->PaidAmount."</td>";
						echo "</tr>";
					}
					echo "<tr><td colspan='5'>Total income : ".$course_income."</td></tr>";
				echo "</table>";
				$total_income=$other_income+$course_income;
				echo "<h4>Overall Income: ".$total_income."</h4>";	




				/////Expense Report
				$result_expense=$this->expense_report_model->expense_date_range($dateFrom,$toDate);
				$result_employee_salary=$this->expense_report_model->teacher_salary_expense_date_range($dateFrom,$toDate);
				$other_expense = 0;
				$employee_salary = 0;
				echo "<hr/>";
				echo "<h2>Total Expense Report</h2>";
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
				$total_expense=$other_expense+$employee_salary;
				echo "<h4>Overall Expense: ".$total_expense."</h4>";

				echo "<br/>";
				echo "<hr/>";
				echo "<h1>Net Income: ".($total_income-$total_expense)."</h1>";		
		}
	}


}