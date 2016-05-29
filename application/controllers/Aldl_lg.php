<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Aldl_Lg extends CI_Controller {

	public function __construct(){
		parent::__construct();
		
	}
	
	public function index()
	{
		$this->load->view('dashboard_login');
	}

	public function check_login()
	{
		$data=array();
		$data["in_UserName"]=$this->input->post("txtUserName",true);
		$data["in_Password"]=$this->input->post("txtUserPassword",true);
		$sdata = array();

		$result = $this->user_model->user_login($data);
		if($result){
			if($result->UserType=="a"){
				$sdata['UserName']=$result->UserName;
				$sdata['UserId']=$result->Id;
				$sdata['UserType']=$result->UserType;
				$this->session->set_userdata($sdata);
				redirect("admin/user/user_profile");
			}else{
				$sdata["exception"]="Login Error";
				$this->session->set_userdata($sdata);
			}
		}else{
			$sdata["exception"]="Username or password error";
			$this->session->set_userdata($sdata);
		}
		redirect("aldl_lg");
	}

	
}
