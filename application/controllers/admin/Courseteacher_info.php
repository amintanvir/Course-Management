<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Courseteacher_info extends CI_Controller {

   
    public function __construct(){
		parent::__construct();
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
        $data["in_UserType"]=1;
		$data["all_teacher"]=$this->courseteacher_info_model->select($data);
		$data["title"]="Course Teacher Registration";
		$data["main_content"] = $this->load->view("admin_view/courseteacher_info_view",$data,true);
		$data["title"]="Add Teacher Info";
		$this->load->view('admin_view/admin_master',$data);
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
		$data["in_UserType"]=1;
        $data["in_Salary"]=$this->input->post("txtSalary",true);
        $data["in_Gender"]=$this->input->post("ddlGender",true);
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
		$data_select_by_id["in_Id"]=$this->input->post("txtUpdId",true);
		$data_select_by_id["in_UserType"]=0;
		$teacher = $this->courseteacher_info_model->select_by_id($data_select_by_id);
		$data["in_Id"]=$this->input->post("txtUpdId",true);
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
		$data["in_UserType"]=1;
        $data["in_Salary"]=$this->input->post("txtSalary",true);
		$data["in_Gender"]=$this->input->post("ddlGender",true);
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