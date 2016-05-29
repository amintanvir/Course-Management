<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Income_details extends CI_Controller {

   public function __construct(){
		parent::__construct();
		$this->load->model("income_category_model");
		$this->load->model("income_details_model");
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

		$income_details = array();
		$income_details["in_Id"]=0;
		$data["all_income"]=$this->income_details_model->select($income_details);
		$data["title"]="Add Income Details";
		$data["main_content"] = $this->load->view("admin_view/income_details_view",$data,true);

		$this->load->view('admin_view/admin_master',$data);
	}

  public function save()
	{
		$data = array();
		$data["in_Id"]=0;
		$data["in_IncomeTitle"]=$this->input->post("postIncomeTitle",true);
		$data["in_IncomeDescription"]=$this->input->post("postIncomeDescription",true);
		$data["in_IncomeMoney"]=$this->input->post("postIncomeMoney",true);
		$data["in_IncomeCategoryId"]=$this->input->post("postIncomeCategoryId",true);
		$data["in_IncomeDate"]=$this->input->post("postIncomeDate",true);
		$data["in_CreatedBy"]=$this->session->userdata("UserId");
		$data["in_ModifiedBy"]=$this->session->userdata("UserId");
		//print_r($data); exit();
		
		if($this->income_details_model->save($data)){
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
		$data["in_IncomeTitle"]=$this->input->post("postIncomeTitle",true);
		$data["in_IncomeDescription"]=$this->input->post("postIncomeDescription",true);
		$data["in_IncomeMoney"]=$this->input->post("postIncomeMoney",true);
        $data["in_IncomeCategoryId"]=$this->input->post("postIncomeCategoryId",true);
        $data["in_IncomeDate"]=$this->input->post("postIncomeDate",true);
        $data["in_CreatedBy"]=$this->session->userdata("UserId");
		$data["in_ModifiedBy"]=$this->session->userdata("UserId");
		
		if($this->income_details_model->save($data)){
			echo "1";
		}else{
			echo "0";
		}
	}


	public function delete()
	{
		$data = array();
		$data["in_Id"]=$this->input->post("postDeleteId",true);
		$data["in_ModifiedBy"]=$this->session->userdata("UserId");
		//print_r($data);exit();
		if($this->income_details_model->delete($data)){
			echo "1";
		}else{
			echo "0";
		}
	}  



  





}//end of main brace
