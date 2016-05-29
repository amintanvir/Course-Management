<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Student_info extends CI_Controller {

	  public function __construct(){
		parent::__construct();
		$this->load->model("student_info_model");
		//$this->load->model("course_details_model");
		$user_id = $this->session->userdata("UserId");
		if($user_id == NULL){
			redirect("aldl_lg","refresh");
		}
	}
     
  

	
	public function index()
	{
        $data=array();
        $data["in_Id"]=0;
		$data["all_student"]=$this->student_info_model->select($data);
		$data["title"]="Add Student Info";
		$data["main_content"] = $this->load->view("admin_view/student_info_view",$data,true);

		$this->load->view('admin_view/admin_master',$data);
	}

	public function up()
	{
		# code...
		$this->load->view("demo_ss");
	}



   	public function save()
	{
		$data = array();
		$data["in_Id"]=0;
		$data["in_FullName"]=$this->input->post("txtFullName",true);
		$data["in_Address"]=$this->input->post("txtAddress",true);
		$data["in_AcademicDescription"]=$this->input->post("txtAcademicDescription",true);
        $data["in_StudentId"]=$this->input->post("txtStudentId",true); 
        $data["in_JoinDate"]=$this->input->post("txtJoinDate",true); 
        $data["in_OtherInfo"]=$this->input->post("txtOtherInfo",true); 
        $data["in_Contact"]=$this->input->post("txtContact",true); 
        $data["in_Email"]=$this->input->post("txtEmail",true);
        $file = $_FILES["flPicture"];
        $path = './uploads/images/student_images/';
        $fileName = $this->GenerateUniqueFileName($file);

        
        $data["in_Picture"]=$file["name"]!=""?"uploads/images/student_images/".$fileName:"";
        $data["in_CreatedBy"]=$this->session->userdata("UserId");
		$data["in_ModifiedBy"]=$this->session->userdata("UserId");

		$data_exist=array();
		$data_exist["in_Email"]=$this->input->post("txtEmail",true);
		$data_exist["in_Contact"]=$this->input->post("txtContact",true); 
		$data_exist["in_StudentId"]=$this->input->post("txtStudentId",true); 

		$student_exist_check=$this->student_info_model->check_exist($data_exist);

		//print_r($student_exist_check);exit();
		if($student_exist_check!=""){
			echo "2";
		}else if($this->student_info_model->save($data)){
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
		$student = $this->student_info_model->select_by_id($data);
		
		$data["in_FullName"]=$this->input->post("txtFullName",true);
		$data["in_Address"]=$this->input->post("txtAddress",true);
		$data["in_AcademicDescription"]=$this->input->post("txtAcademicDescription",true);
        $data["in_StudentId"]=$this->input->post("txtStudentId",true); 
        $data["in_JoinDate"]=$this->input->post("txtJoinDate",true); 
        $data["in_OtherInfo"]=$this->input->post("txtOtherInfo",true); 
        $data["in_Contact"]=$this->input->post("txtContact",true); 
        $data["in_Email"]=$this->input->post("txtEmail",true);
        //print_r($data);exit();
        $file = $_FILES["flPicture"];
        $path = './uploads/images/student_images/';
        $fileName = $this->GenerateUniqueFileName($file);
        $previousFile = "";
        if($student->Picture != "" && $file["name"]!=""){
        	$previousFile = "./".$student->Picture;
        }

        
        $data["in_Picture"]=$file["name"]!=""?"uploads/images/student_images/".$fileName:$student->Picture;
        $data["in_CreatedBy"]=$this->session->userdata("UserId");
		$data["in_ModifiedBy"]=$this->session->userdata("UserId");
		//print_r($data);exit();
        
		if($this->student_info_model->save($data)){
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
		$data = array();
		$data["in_Id"]=$this->input->post("txtDeleteId",true);
		$data["in_ModifiedBy"]=$this->session->userdata("UserId");
		if($this->student_info_model->delete($data)){
			echo "1";
		}else{
			echo "0";
		}
		//echo $this->student_info_model->delete($data);
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





}