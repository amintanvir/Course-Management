<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Course_registration extends CI_Controller {
     
     public function __construct(){
		parent::__construct();
		$this->load->model("course_category_model");
		$this->load->model("course_details_model");
		$this->load->model("student_info_model");
		$this->load->model("course_registration_model");
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
        $data["title"]="Register on Course";
        $data_student =array();
        $data_student["in_Id"]=0;
        $data["all_students"]=$this->student_info_model->select($data_student);
        $data_course_registration=array();
        $data_course_registration["in_Id"]=0;
        $data["all_course_registration"] = $this->course_registration_model->select($data_course_registration);

		//$data["all_course_details"]=$this->data_retrieve(0);
		
		$data["main_content"]=$this->load->view("admin_view/course_registration_view",$data,true);
		
		$this->load->view("admin_view/admin_master",$data);
	}


	public function save()
	{
		$course_data = array();
		$course_data["in_Id"]=$this->input->post("postCourseId",true);
		$course_detail_by_id = $this->course_details_model->select_by_id($course_data);
		$coursePriceWithDiscount = $this->input->post("postDiscount",true)==""?$course_detail_by_id->CoursePrice:$course_detail_by_id->CoursePrice-(($this->input->post("postDiscount")/100)*$course_detail_by_id->CoursePrice);
		//echo $coursePriceWithDiscount;exit();
		$data=array();
		$data["in_Id"]=0;
		$data["in_StudentId"]=$this->input->post("postStudentId",true);
		$data["in_CourseId"]=$this->input->post("postCourseId",true);
		$data["in_RegistrationDate"]=$this->input->post("postRegistrationDate",true);
		$data["in_PaidAmount"]=$this->input->post("postPaidAmount",true);
		$data["in_PayableAmount"]=$coursePriceWithDiscount-$this->input->post("postPaidAmount",true);
		$data["in_PaymentDate"]=$this->input->post("postPaymentDate",true);
		$data["in_DuePaymentDate"]=$this->input->post("postDuePaymentDate",true);
		$data["in_Discount"]=$this->input->post("postDiscount",true);
		$data["in_CreatedBy"]=$this->session->userdata("UserId");
		$data["in_ModifiedBy"]=$this->session->userdata("UserId");
		//print_r($data);exit();
		if($this->course_registration_model->save($data)){
			echo "1";
		}else{
			echo "0";
		}
	}


	public function update()
	{
		$course_data = array();
		$course_data["in_Id"]=$this->input->post("postCourseId",true);
		$course_detail_by_id = $this->course_details_model->select_by_id($course_data);
		$coursePriceWithDiscount = $this->input->post("postDiscount",true)==""?$course_detail_by_id->CoursePrice:$course_detail_by_id->CoursePrice-(($this->input->post("postDiscount")/100)*$course_detail_by_id->CoursePrice);
		//echo $coursePriceWithDiscount;exit();
		$data=array();
		$data["in_Id"]=$this->input->post("postUpdId",true);
		$data["in_StudentId"]=$this->input->post("postStudentId",true);
		$data["in_CourseId"]=$this->input->post("postCourseId",true);
		$data["in_RegistrationDate"]=$this->input->post("postRegistrationDate",true);
		$data["in_PaidAmount"]=$this->input->post("postPaidAmount",true);
		$data["in_PayableAmount"]=$coursePriceWithDiscount-$this->input->post("postPaidAmount",true);
		$data["in_PaymentDate"]=$this->input->post("postPaymentDate",true);
		$data["in_DuePaymentDate"]=$this->input->post("postDuePaymentDate",true);
		$data["in_Discount"]=$this->input->post("postDiscount",true);
		$data["in_CreatedBy"]=$this->session->userdata("UserId");
		$data["in_ModifiedBy"]=$this->session->userdata("UserId");
		if($this->course_registration_model->save($data)){
			echo "1";
		}else{
			echo "0";
		}	
	}

	public function delete()
	{
		$data=array();
		$data["in_Id"]=$this->input->post("postDeleteId",true);
		$data["in_ModifiedBy"]=$this->session->userdata("UserId");
		if($this->course_registration_model->delete($data)){
			echo "1";
		}else{
			echo "0";
		}
	}




}