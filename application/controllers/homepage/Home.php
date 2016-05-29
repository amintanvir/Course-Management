<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model("course_category_model");
		$this->load->model("course_details_model");
		$this->load->model("courseteacher_info_model");
		$common_data = array();
		$common_data["all_course_category"]=$this->data_retrieve(0);
		$this->session->set_userdata($common_data);
		
		
		/*$user_id = $this->session->userdata("UserId");
		if($user_id == NULL){
			redirect("aldl_lg","refresh");
		}*/
	}

	public function index()
	{
		$data=array();
		//$data["all_course_category"]=$this->data_retrieve(0);
		$data["title"]="Home - Computer Learning System";
		$course_data = array();
		$course_data["in_Id"]=0;
		$data["all_courses"]=$this->course_details_model->select($course_data);

		$teacher_data=array();
		$teacher_data["in_Limit"]=4;
		$teacher_data["in_UserType"]=1;

		$data["homepage_teachers"]=$this->courseteacher_info_model->select_by_limit($teacher_data);
		$data["main_content"] = $this->load->view("user_view/home",$data,true);

		$this->load->view('user_view/home_master',$data);
	}

	public function course_lists($id=NULL)
	{
		$course_data = array();
		$course_data["in_Id"]=0;
		$data["all_courses"]=$this->course_details_model->select($course_data);
		$data["main_content"] = $this->load->view("user_view/course_list",$data,true);
		$data["title"]="Computer Learning - All Course Lists";
		$this->load->view('user_view/home_master',$data);
	}


	public function category($id=NULL)
	{
		if($id==NULL){
			redirect("homepage/home");
		}
		$data = array();
		$data["in_Id"]= my_decode($id);
		$data["course"]=$this->course_category_model->select_by_id($data);
		$course_data = array();
		$course_data["in_CourseCategoryId"]=my_decode($id);
		$data["course_by_category"]=$this->course_details_model->select_by_coursecategoryid($course_data);
		$data["main_content"] = $this->load->view("user_view/category_view",$data,true);
		$data["title"]="Computer Learning - Courses by Category";
		$this->load->view('user_view/home_master',$data);
	}



	public function course_details($id=NULL)
	{
		if($id==NULL){
			redirect("homepage/home");
		}
		$data = array();
		$data["in_Id"]= my_decode($id);
		$data["course"]=$this->course_details_model->select_by_id($data);
		//echo count($data["course"]);exit();
		if(count($data["course"])==0){
			redirect("home");	
		}
		$related_data["in_CourseCategoryId"]=$data["course"]->CourseCategoryId;
		$data["related_course"]=$this->course_details_model->select_by_coursecategoryid($related_data);
		
		$data["main_content"]=$this->load->view("user_view/course_details",$data,true);
		$data["title"]="Computer Learning - View Details";
		$this->load->view('user_view/home_master',$data);
	}


	public function contact_us()
	{
		$data=array();
		$data["title"]="Computer Learning - Contact Information";
		$data["main_content"]=$this->load->view("user_view/contact_view",$data,true);
		$this->load->view('user_view/home_master',$data);	
	}

	
	public function about_us()
	{
		$data=array();
		$data["title"]="Computer Learning - About Us";
		$data["main_content"]=$this->load->view("user_view/about_view",$data,true);
		$this->load->view('user_view/home_master',$data);	
	}


	public function teacher_lists($id=NULL)
	{
		$teacher_data = array();
		$teacher_data["in_Id"]=0;
		$teacher_data["in_UserType"]=1;
		$data["all_teachers"]=$this->courseteacher_info_model->select($teacher_data);
		$data["main_content"] = $this->load->view("user_view/teacher_list",$data,true);
		$data["title"]="Computer Learning - All Course Lists";
		$this->load->view('user_view/home_master',$data);		
	}


	public function teacher_details($id=NULL)
	{
		if($id==NULL){
			redirect("homepage/home");
		}
		$data = array();
		$data["in_Id"]= my_decode($id);
		$data["in_UserType"]=1;
		$data["teacher"]=$this->courseteacher_info_model->select_by_id($data);
		//echo count($data["course"]);exit();
		if(count($data["teacher"])==0){
			redirect("home");	
		}
		$data["main_content"]=$this->load->view("user_view/teacher_details",$data,true);
		$data["title"]="Computer Learning - View Details";
		$this->load->view('user_view/home_master',$data);
	}


	



	public function update()
	{
		$data = array();
		$data["in_Id"]=$this->input->post("postId",true);
		$data["in_CategoryName"]=$this->input->post("postCategoryName",true);
		$data["in_CreatedBy"]=$this->session->userdata("UserId");
		$data["in_ModifiedBy"]=$this->session->userdata("UserId");
		if($this->course_category_model->save($data)){
			echo $this->data_retrieve(0,"json");
		}else{
			echo "0";
		}
	}


	public function delete()
	{
		$data = array();
		$data["in_Id"]=$this->input->post("postDeleteId",true);
		$data["in_ModifiedBy"]=$this->session->userdata("UserId");
		if($this->course_category_model->delete($data)){
			echo $this->data_retrieve(0,"json");
		}else{
			echo "0";
		}
	}

	public function demo_view()
	{
		$data=array();
		//$data["all_course_category"]=$this->data_retrieve(0);
		$data["title"]="Add Course Category";
		$data["main_content"] = $this->load->view("admin_view/demo_view",$data,true);

		$this->load->view('admin_view/admin_master',$data);
	}

	public function data_retrieve($value,$type="none")
	{
		$select_data = array();
		$search_data["in_Id"]=$value;
		$search_data = $this->course_category_model->select($search_data);
		if($type=="json"){
			$search_data = json_encode($search_data);
			return $search_data;
		}else{
			return $search_data;
		}
	}


}
