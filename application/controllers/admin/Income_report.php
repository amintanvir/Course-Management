<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Income_report extends CI_Controller {
     
     public function __construct(){
		parent::__construct();
		$this->load->model("income_report_model");
		$user_id = $this->session->userdata("UserId");
		if($user_id == NULL){
			redirect("aldl_lg","refresh");
		}
	}


	
	public function index()
	{
		$data=array();
        $data["title"]="Income Report";
		$data["main_content"]=$this->load->view("admin_view/income_report_view",$data,true);
		$this->load->view("admin_view/admin_master",$data);
	}

	public function find_report()
	{
		$dateFrom = $this->input->post("txtFromDate",true);	
		$toDate = $this->input->post("txtToDate",true);
		$incomeType = $this->input->post("ddlIncomeType",true);

		if($incomeType=="student"){
			$course_income=0;
			if($dateFrom!="" || $toDate!=""){
				$result_course_income = $this->income_report_model->course_registration_income_date_range($dateFrom,$toDate);
				echo "<table class='table table-bordered table-hover'>";
				echo "<tr>";
					echo "<th>On Course</th>";
					echo "<th>Paid By</th>";
					echo "<th>User Contact</th>";
					echo "<th>Payment Date</th>";
					echo "<th>Paid Amount</th>";
				echo "</tr>";

				foreach ($result_course_income as $key => $value) {
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
			}

		}else if($incomeType=="others"){
			$other_income=0;
			if($dateFrom!="" || $toDate!=""){
				$result_income = $this->income_report_model->income_date_range($dateFrom,$toDate);
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
			}			
		}else{
			if($dateFrom!="" || $toDate!=""){
				$result_income=$this->income_report_model->income_date_range($dateFrom,$toDate);
				$result_income_course=$this->income_report_model->course_registration_income_date_range($dateFrom,$toDate);
				$other_income = 0;
				$course_income = 0;
				
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
				echo "<h2>Overall Income: ".($other_income+$course_income)."</h2>";			
			}
		}


	}



	public function find_report_specific_date()
	{
		$specificDate = $this->input->post("txtSpecificDate",true);
		if($specificDate!=""){
			$result_income_specific_date = $this->income_report_model->income_specific_date($specificDate);
			$result_course_income_specific_date=$this->income_report_model->course_registration_income_specific_date($specificDate);
			$other_income = 0;
			$course_income = 0;

			echo "<table class='table table-bordered table-hover'>";
				echo "<tr>";
					echo "<th>On Course</th>";
					echo "<th>Paid By</th>";
					echo "<th>User Contact</th>";
					echo "<th>Payment Date</th>";
					echo "<th>Paid Amount</th>";
				echo "</tr>";

				foreach ($result_course_income_specific_date as $key => $value) {
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


			echo "<table class='table table-bordered table-hover'>";
				echo "<tr>";
					echo "<th>Income Title</th>";
					echo "<th>Income Category</th>";
					echo "<th>Income Date</th>";
					echo "<th>Income Money</th>";
				echo "</tr>";
				foreach ($result_income_specific_date as $key => $value) {
					$other_income+=$value->IncomeMoney;
					echo "<tr>";
						echo "<td>".$value->IncomeTitle."</td>";
						echo "<td>".$value->IncomeCategoryName."</td>";
						echo "<td>".$value->IncomeDate."</td>";
						echo "<td>".$value->IncomeMoney."</td>";
					echo "</tr>";	
					/*echo "<tr>";
						echo "<td>".$value->IncomeTitle."</td>";
						echo "<td>".$value->IncomeDescription."</td>";
						echo "<td>".$value->IncomeCategoryName."</td>";
						echo "<td>".$value->IncomeDate."</td>";
						echo "<td>".$value->IncomeMoney."</td>";
					echo "</tr>";*/
				}
				echo "<tr><td colspan='5'>Total income : ".$other_income."</td></tr>";
			echo "</table>";



			echo "<h2>Overall Income: ".($other_income+$course_income)."</h2>";
		}
	}

}