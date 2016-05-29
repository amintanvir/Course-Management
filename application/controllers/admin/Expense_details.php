<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Expense_details extends CI_Controller {

   public function __construct(){
		parent::__construct();
		$this->load->model("expense_category_model");
		$this->load->model("expense_details_model");
		$user_id = $this->session->userdata("UserId");
		if($user_id == NULL){
			redirect("aldl_lg","refresh");
		}
	}

	public function index()
	{    

		$data=array();
		$data["in_Id"]=0;
		$data["all_expense_category"]=$this->expense_category_model->select($data);

		$expense_details = array();
		$expense_details["in_Id"]=0;
		$data["all_expense"]=$this->expense_details_model->select($expense_details);
		$data["title"]="Add Expense Details";
		$data["main_content"] = $this->load->view("admin_view/expense_details_view",$data,true);

		$this->load->view('admin_view/admin_master',$data);
	}

   public function save()
	{
		$data = array();
		$data["in_Id"]=0;
		$data["in_ExpenseTitle"]=$this->input->post("postExpenseTitle",true);
		$data["in_ExpenseDescription"]=$this->input->post("postExpenseDescription",true);
		$data["in_ExpenseMoney"]=$this->input->post("postExpenseMoney",true);
		$data["in_ExpenseCategoryId"]=$this->input->post("postExpenseCategoryId",true);
		$data["in_ExpenseDate"]=$this->input->post("postExpenseDate",true);
		$data["in_CreatedBy"]=$this->session->userdata("UserId");
		$data["in_ModifiedBy"]=$this->session->userdata("UserId");
		//print_r($data); exit();
		
		if($this->expense_details_model->save($data)){
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
		$data["in_ExpenseTitle"]=$this->input->post("postExpenseTitle",true);
		$data["in_ExpenseDescription"]=$this->input->post("postExpenseDescription",true);
		$data["in_ExpenseMoney"]=$this->input->post("postExpenseMoney",true);
        $data["in_ExpenseCategoryId"]=$this->input->post("postExpenseCategoryId",true);
        $data["in_ExpenseDate"]=$this->input->post("postExpenseDate",true);
        $data["in_CreatedBy"]=$this->session->userdata("UserId");
		$data["in_ModifiedBy"]=$this->session->userdata("UserId");
		
		if($this->expense_details_model->save($data)){
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
		if($this->expense_details_model->delete($data)){
			echo "1";
		}else{
			echo "0";
		}
	}  







}//end of main brace
