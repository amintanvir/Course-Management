<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Employee_salary extends CI_Controller {

    public function __construct(){
		parent::__construct();
		$this->load->model("employee_salary_model");
		$this->load->model("courseteacher_info_model");
		$user_id = $this->session->userdata("UserId");
		if($user_id == NULL){
			redirect("aldl_lg","refresh");
		}
	}
     
	
	public function index()
	{
        $data=array();
        $data["in_Id"]=0;
        $data["in_UserType"]=0;
        $data["all_employees"]=$this->courseteacher_info_model->select($data);
        
        //print_r($data);exit();
		$data["all_teacher"]=$this->employee_salary_model->select_employee_on_salary(2,"2015-05");
		//$data["title"]="Course Teacher Registration";
		$data["main_content"] = $this->load->view("admin_view/employee_salary_view",$data,true);
		$data["title"]="Employee Salary";
		$this->load->view('admin_view/admin_master',$data);
	}

	public function check()
	{
		$employeeId=$this->input->post("employeeId",true);
		$chk = $this->input->post("chk",true);
		$salary=$this->input->post("txtSalary",true);
		//echo "H485i";exit();
		$i=0;
		if($chk){
			foreach ($chk as $key => $value) {
				$employee=array();
				$employee["in_Id"]=$employeeId[$value];
				$employee["in_UserType"]=0;
				$employee_by_id=$this->courseteacher_info_model->select_by_id($employee);
				$data = array();
				$data["in_Id"]=0;
				$data["in_CurrentSalary"]=$employee_by_id->Salary;
				$data["in_PaidSalary"]=$salary[$value]==""?$employee_by_id->Salary:$salary[$value];
				$data["in_EmployeeId"]=$employeeId[$value];
				$data["in_SalaryDate"]=date("Y-m-d");
				$data["in_CreatedBy"]=$this->session->userdata("UserId");
				$data["in_ModifiedBy"]=$this->session->userdata("UserId");
				if($this->employee_salary_model->save($data)){
					$i++;
				}else{

				}
				/*$i++;
				echo $i."<br/>";*/
			}
		}
		echo $i;
		/*foreach ($chk as $key => $value) {
			echo 'checked: '.$value.'';
		}*/
		//exit();
		//echo "<br/>";
		//print_r($this->input->post("txtSalary",true));
	}

	
   	public function save()
	{
		$data = array();
		$data["in_Id"]=0;
		$data["in_FullName"]=$this->input->post("txtFullName",true);
		$data["in_Address"]=$this->input->post("txtAddress",true);
		$data["in_ContactNumber"]=$this->input->post("txtContactNumber",true);
        $data["in_Email"]=$this->input->post("txtEmail",true); 
        $data["in_InterestedArea"]=$this->input->post("txtInterestedArea",true); 
        $data["in_Designation"]=$this->input->post("txtDesignation",true);
        $data["in_AcademicDescription"]=$this->input->post("txtAcademicDescription",true);
        $data["in_Message"]=$this->input->post("txtMessage",true);
        $data["in_JoinDate"]=$this->input->post("txtJoinDate",true); 
        $file = $_FILES["flPicture"];
        $path = './uploads/images/teacher_images/';
        $fileName = $this->GenerateUniqueFileName($file);
        $data["in_EmployementStatus"]=0;
        $data["in_CreatedBy"]=$this->session->userdata("UserId");
		$data["in_ModifiedBy"]=$this->session->userdata("UserId");
        $data["in_Picture"]=$file["name"]!=""?"uploads/images/teacher_images/".$fileName:"";
		//print_r($data);exit();
		$data_exist=array();
		$data_exist["in_Email"]=$this->input->post("txtEmail",true); 
		$check_teacher_exist=$this->courseteacher_info_model->check_exist($data_exist);
		if($check_teacher_exist!=""){
			echo "2";
		}else if($this->courseteacher_info_model->save($data)){
			if($file["name"]!=""){$this->UploadPic($file,$fileName,$path);}
			echo "1";
		}else{
			echo "0";
		}
	}//end of public function 



  
  	public function update()
	{
		$data = array();
		$data["in_Id"]=$this->input->post("txtUpdId",true);
		$teacher = $this->courseteacher_info_model->select_by_id($data);
		$data["in_FullName"]=$this->input->post("txtFullName",true);
		$data["in_Address"]=$this->input->post("txtAddress",true);
		$data["in_ContactNumber"]=$this->input->post("txtContactNumber",true);
        $data["in_Email"]=$this->input->post("txtEmail",true); 
        $data["in_InterestedArea"]=$this->input->post("txtInterestedArea",true); 
        $data["in_Designation"]=$this->input->post("txtDesignation",true);
        $data["in_AcademicDescription"]=$this->input->post("txtAcademicDescription",true);
        $data["in_Message"]=$this->input->post("txtMessage",true);
        $data["in_JoinDate"]=$this->input->post("txtJoinDate",true); 
        $file = $_FILES["flPicture"];
        $path = './uploads/images/teacher_images/';
        $fileName = $this->GenerateUniqueFileName($file);
        $data["in_EmployementStatus"]=0;
        $data["in_CreatedBy"]=$this->session->userdata("UserId");
		$data["in_ModifiedBy"]=$this->session->userdata("UserId");
        $previousFile = "";
        if($teacher->Picture != "" && $file["name"]!=""){
        	$previousFile = "./".$teacher->Picture;
        }
    
        $data["in_Picture"]=$file["name"]!=""?"uploads/images/teacher_images/".$fileName:$teacher->Picture;
    	if($this->courseteacher_info_model->save($data)){
			if($file["name"]!=""){$this->UploadPic($file,$fileName,$path);}
			if(file_exists($previousFile)){
				unlink($previousFile);
			}
			echo "1";
		}else{
			echo "0";
		}
	}//end of public function 


	public function delete()
	{
		$data=array();
		$data["in_Id"]=$this->input->post("txtDeleteId",true);
		$data["in_ModifiedBy"]=$this->session->userdata("UserId");
		//print_r($data);exit();
		if($this->courseteacher_info_model->delete($data)){
			echo "1";
		}else{
			echo "0";
		}
	}



	public function GenerateUniqueFileName($file){
		return time().$file["name"];
	}



   
   	public function UploadPic($original,$file,$path)
	{
		$output_dir = $path;
   	 	$fileName = $file;
   	 	move_uploaded_file($original["tmp_name"],$output_dir. $fileName);
   	 	 //echo "<br> Error: ".$_FILES["myfile"]["error"];
   	 	 
       	$ret[$fileName]= $output_dir.$fileName;
	}


}//main brace