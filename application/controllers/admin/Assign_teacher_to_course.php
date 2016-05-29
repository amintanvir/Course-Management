<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Assign_teacher_to_course extends CI_Controller {
     
     public function __construct(){
		parent::__construct();
		$this->load->model("courseteacher_info_model");
		$this->load->model("course_details_model");
		$this->load->model("assign_teacher_to_course_model");
		$user_id = $this->session->userdata("UserId");
		if($user_id == NULL){
			redirect("aldl_lg","refresh");
		}
	}


	
	public function index()
	{
		$data=array();
        $data["in_Id"]=0;
        $data["all_courses"]=$this->course_details_model->select($data);
        $data_teacher = array();
        $data_teacher["in_Id"]=0;
        $data_teacher["in_UserType"]=1;
        $data["all_teachers"]=$this->courseteacher_info_model->select($data_teacher);
        $data["title"]="Assign Teacher To Course";

        $data_assign = array();
        $data_assign["in_Id"]=0;
        $data["all_assign_info"]=$this->assign_teacher_to_course_model->select($data_assign);
		$data["main_content"]=$this->load->view("admin_view/assign_teacher_to_course_view",$data,true);
		$this->load->view("admin_view/admin_master",$data);
	}



	public function save()
	{
		$data = array();
		$data["in_Id"]=0;
		$data["in_TeacherId"]=$this->input->post("postTeacherId",true);
		$data["in_CourseDetailsId"]=$this->input->post("postCourseId",true);
		$data["in_AssignDate"]=$this->input->post("postAssignDate",true);
        $data["in_OtherInfo"]=$this->input->post("postOtherInfo",true); 
        $data["in_CreatedBy"]=$this->session->userdata("UserId");
		$data["in_ModifiedBy"]=$this->session->userdata("UserId");
		if($this->assign_teacher_to_course_model->save($data)){
			echo "1";//$this->data_retrieve(0,$type="json");
		}else{
			echo "0";
		}
	}//end of public function 


	public function update()
	{
		$data = array();
		$data["in_Id"]=$this->input->post("postUpdId",true);
		$data["in_TeacherId"]=$this->input->post("postTeacherId",true);
		$data["in_CourseDetailsId"]=$this->input->post("postCourseId",true);
		$data["in_AssignDate"]=$this->input->post("postAssignDate",true);
        $data["in_OtherInfo"]=$this->input->post("postOtherInfo",true); 
        $data["in_CreatedBy"]=$this->session->userdata("UserId");
		$data["in_ModifiedBy"]=$this->session->userdata("UserId");
		if($this->assign_teacher_to_course_model->save($data)){

			echo "1";//$this->data_retrieve(0,$type="json");
		}else{
			echo "0";
		}
	}//end of public function 
	



}//end of main brace
