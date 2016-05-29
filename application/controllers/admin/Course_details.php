<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Course_details extends CI_Controller {
     
     public function __construct(){
		parent::__construct();
		$this->load->model("course_category_model");
		$this->load->model("course_details_model");
		$user_id = $this->session->userdata("UserId");
		if($user_id == NULL){
			redirect("aldl_lg","refresh");
		}
	}


	
	public function index()
	{
		$data=array();
        $data["in_Id"]=0;
        $data["all_course_category"]=$this->course_category_model->select($data);
        $data["title"]="Add Course Details";
		$data["all_course_details"]=$this->data_retrieve(0);
		$data["main_content"]=$this->load->view("admin_view/course_details_view",$data,true);
		$this->load->view("admin_view/admin_master",$data);
	}



	public function save()
	{
		$descriptionFileName = './files/course/'.rand(1,1000).time().".txt";

		$data = array();
		$data["in_Id"]=0;
		$data["in_CourseCategoryId"]=$this->input->post("postCourseCategoryId",true);
		$data["in_CourseName"]=$this->input->post("postCourseName",true);
		$data["in_CourseDetails"]= $descriptionFileName;
		$data["in_CoursePrice"]=$this->input->post("postCoursePrice",true);
        $data["in_CourseDuration"]=$this->input->post("postCourseDuration",true); 
        $data["in_StartDate"]=$this->input->post("postStartDate",true); 
        $data["in_CourseTime"]=$this->input->post("postCourseTime",true); 
        $data["in_CourseSchedule"]=$this->input->post("postCourseSchedule",true);
        $data["in_CreatedBy"]=$this->session->userdata("UserId");
		$data["in_ModifiedBy"]=$this->session->userdata("UserId");
		$data["in_BatchNo"]=$this->input->post("postBatchNo",true);

		//print_r($data);exit();
		
		$data_exist=array();
		$data_exist["in_CourseName"]=$this->input->post("postCourseName",true);
		$data_exist["in_CourseCategoryId"]=$this->input->post("postCourseCategoryId",true);
		$data_exist["in_BatchNo"]=$this->input->post("postBatchNo",true);
		$course_name_exist_check = $this->course_details_model->check_exist($data_exist);
		if($course_name_exist_check!=""){
			echo "2";
		}else if($this->course_details_model->save($data)){
			echo "1";
			write_file($descriptionFileName,$this->input->post("postCourseDetails",true));
		}else{
			echo "0";
		}
	}//end of public function 


	public function update()
	{
		$descriptionFileName = './files/course/'.rand(1,1000).time().".txt";

		$data = array();
		$data["in_Id"]=$this->input->post("postId",true);
		$select_by_id = $this->course_details_model->select_by_id($data);

		$old = $this->course_details_model->select_by_id($data);
		$old_file = $old->CourseDetails;
		
		$data["in_CourseCategoryId"]=$this->input->post("postCourseCategoryId",true);
		$data["in_CourseName"]=$this->input->post("postCourseName",true);
		$data["in_CourseDetails"]= write_file($descriptionFileName,$this->input->post("postCourseDetails",true))?$descriptionFileName:"";
		$data["in_CoursePrice"]=$this->input->post("postCoursePrice",true);
        $data["in_CourseDuration"]=$this->input->post("postCourseDuration",true); 
        $data["in_StartDate"]=$this->input->post("postStartDate",true); 
        $data["in_CourseTime"]=$this->input->post("postCourseTime",true); 
        $data["in_CourseSchedule"]=$this->input->post("postCourseSchedule",true);
        $data["in_CreatedBy"]=$this->session->userdata("UserId");
		$data["in_ModifiedBy"]=$this->session->userdata("UserId");
		$data["in_BatchNo"]=$this->input->post("postBatchNo",true);

		//print_r($data);exit();
		
		if($this->course_details_model->save($data)){
			file_exists($old_file)?unlink($old_file):"";
			echo "1";//$this->data_retrieve(0,$type="json");
		}else{
			echo "0";
		}
	}


	public function delete()
	{
		$data=array();
		$data["in_Id"]=$this->input->post("postDeleteId",true);
		$data["in_ModifiedBy"]=$this->session->userdata("UserId");
		//print_r($data);exit();
		if($this->course_details_model->delete($data)){
			echo "1";
		}else{
			echo "0";
		}
	}



	public function data_retrieve($value,$type="none")
	{
		$select_data = array();
		$search_data["in_Id"]=$value;
		$search_data = $this->course_details_model->select($search_data);

		if($type=="json"){
			$search_data = json_encode($search_data);
			return $search_data;
		}else{
			return $search_data;
		}
	}


	public function search_related_course()
	{
		$courseName = $this->input->post("postTypedCourseName",true);
		//echo $courseName;
		$search_data = $this->course_details_model->search_related_course($courseName);
		foreach ($search_data as $key => $value) {
			echo '<li class="select2-results-dept-0 select2-result select2-result-selectable suggession-result">
					<div class="select2-result-label"><span class="select2-match"></span>'.$value->CourseName.'</div>
				 </li>';
																			
			//echo "<span class='searchedCourseName'>".$value->CourseName."</span>";
		}
		//print_r($rr);
	}

}//end of main brace
