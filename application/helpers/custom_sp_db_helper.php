<?php 

	$mysqli = new mysqli();

	function execute_sp($sp_name, $data)
	{
		$ci=& get_instance();
    	$ci->load->database();

		
		$sql = "CALL $sp_name";
		$count = count($data);
		if($count>0){
			$i=0;
			$sql .="(";
			foreach ($data as $key => $value) {
				$i++;
				if($i==$count){
					$sql .= "'".MS($value)."'";
				}else{
					$sql .= "'".MS($value)."', ";
				}
			}
			$sql .= ")";
		}else{

		}
		//return $sql;
		if(!$ci->db->query($sql)){
			show_error("Err");
			return false;
		}else{
			return true;
		}
	}




	function execute_sel_sp($sp_name, $data)
	{
		$ci=& get_instance();
    	$ci->load->database();

		
		$sql = "CALL $sp_name";
		$count = count($data);
		if($count>0){
			$i=0;
			$sql .="(";
			foreach ($data as $key => $value) {
				$i++;
				if($i==$count){
					$sql .= "'".MS($value)."'";
				}else{
					$sql .= "'".MS($value)."', ";
				}
			}
			$sql .= ")";
		}else{

		}
		
		$result = $ci->db->query($sql);
		mysqli_next_result($ci->db->conn_id);
		return $result;
	}



	function fetch_option($value,$text,$data)
	{
		foreach ($data as $v) {
			echo "<option value='".$v->$value."'>".$v->$text."</option>";
		}
	}


	function my_decode($value)
	{
		return base64_decode(base64_decode(base64_decode($value)));
	}


	function my_encode($value)
	{
		return base64_encode(base64_encode(base64_encode($value)));
	}

	function MS($value)
	{
		$ci =& get_instance();
    	$ci->load->database();
    	return mysqli_real_escape_string($ci->db->conn_id,$value);
	}

?>