<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Course_category extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model("course_category_model");
		$user_id = $this->session->userdata("UserId");
		if($user_id == NULL){
			redirect("aldl_lg","refresh");
		}
	}

	public function index()
	{
		$data=array();
		$data["all_course_category"]=$this->data_retrieve(0);
		$data["title"]="Add Course Category";
		$data["main_content"] = $this->load->view("admin_view/course_category",$data,true);

		$this->load->view('admin_view/admin_master',$data);
	}

	public function save()
	{
		$data = array();
		$data["in_Id"]=0;
		$data["in_CategoryName"]=$this->input->post("postCategoryName",true);
		$data["in_CreatedBy"]=$this->session->userdata("UserId");
		$data["in_ModifiedBy"]=$this->session->userdata("UserId");
		
		$data_exist=array();
		$data_exist["in_CategoryName"]=$this->input->post("postCategoryName",true);
		$category=$this->course_category_model->exist($data_exist);
		if($category!=""){
			echo "2";
		}else if($this->course_category_model->save($data)){
			echo $this->data_retrieve(0,"json");
		}else{
			echo "0";
		}
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


	public function exist()
	{
		$data=array();
		$data["in_CategoryName"]=$this->input->post("postCategoryName",true);
		$category=$this->course_category_model->exist($data);
		if($category!=""){
			echo "0";
		}else{
			echo "1";
		}
		//print_r($category);
	}


	public function search()
	{
		$data = array();
		$data["in_Id"]=0;
		$search_data = $this->course_category_model->select($data);
		$search_data = json_encode($search_data);
		echo $search_data;
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
