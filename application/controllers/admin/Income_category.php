<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Income_category extends CI_Controller {


	public function __construct(){
		parent::__construct();
		$this->load->model("income_category_model");
		$user_id = $this->session->userdata("UserId");
		if($user_id == NULL){
			redirect("aldl_lg","refresh");
		}
	}
     

	
	public function index()
	{    

		$data=array();
		$data["in_Id"]=0;
		$data["all_income_category"]=$this->income_category_model->select($data);
		$data["title"]="Add Income Category";
		$data["main_content"] = $this->load->view("admin_view/income_category_view",$data,true);

		$this->load->view('admin_view/admin_master',$data);
	}

   

   public function save()
	{
		$data = array();
		$data["in_Id"]=0;
		$data["in_IncomeCategoryName"]=$this->input->post("postIncomeCategoryName",true);
		$data["in_CreatedBy"]=$this->session->userdata("UserId");
		$data["in_ModifiedBy"]=$this->session->userdata("UserId");
		//print_r($data);exit();
		
		if($this->income_category_model->save($data)){

			echo "1";
		}else{
			echo "0";
		}
	}

	public function update()
	{
		$data = array();
		$data["in_Id"]=$this->input->post("postUpdId",true);
		//print_r($data);exit();
		$data["in_IncomeCategoryName"]=$this->input->post("postIncomeCategoryName",true);
        $data["in_CreatedBy"]=$this->session->userdata("UserId");
		$data["in_ModifiedBy"]=$this->session->userdata("UserId");
		if($this->income_category_model->save($data)){
			echo "1";
		}else{
			echo "0";
		}//
	}//end of public function


	public function delete()
	{
		$data = array();
		$data["in_Id"]=$this->input->post("postDeleteId",true);
		$data["in_ModifiedBy"]=$this->session->userdata("UserId");
		if($this->income_category_model->delete($data)){
			echo "1";
		}else{
			echo "0";
		}
	}  



	






	


}//main brace
