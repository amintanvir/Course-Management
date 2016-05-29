<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model("user_model");
		$this->load->model("course_registration_model");
		$user_id = $this->session->userdata("UserId");
		if($user_id == NULL){
			redirect("aldl_lg","refresh");
		}
	}

	public function user_profile()
	{
		$data=array();
		$data["main_content"]=$this->load->view("admin_view/user_profile",'',true);
		$data["title"]="Dashboard";
		$this->load->view("admin_view/admin_master",$data);
	}

	public function logout()
	{
		$this->session->unset_userdata("UserId");
		$this->session->unset_userdata("UserName");
		$this->session->unset_userdata("UserType");
		redirect("aldl_lg");
	}


	public function change_password()
	{
		$currentPassword = $this->input->post("postCurrentPassword",true);
		$newPassword = $this->input->post("postNewPassword",true);
		$data=array();
		$data["in_Id"]=$this->session->userdata("UserId");
		$user_info=$this->user_model->select_by_id($data);
		$data["in_Password"]=$newPassword;
		if($user_info->Password!=$currentPassword){
			echo "2";
		}else if($this->user_model->change_password($data)){
			echo "1";
		}else{
			echo "0";
		}
	}


	public function see_all_due()
	{
		$data=array();
		$data["in_date"]=0;
		$data["due_courses"]=$this->course_registration_model->select_due_today($data);
		$data["main_content"]=$this->load->view("admin_view/see_all_due",$data,true);
		$this->load->view("admin_view/admin_master",$data);
	}



}