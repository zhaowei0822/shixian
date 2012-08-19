<?php

class Test extends CI_Controller
{
	function index()
	{
		$this->load->view('test_view');
	}
	
	function design()
	{
		//$qs = query_string_to_array();
	    //$email = $qs['tbxRegisterEmail'];
		$this->load->model('user_model');
		//$msg = array('Result' => true);
		//if($email){
		    if($this->user_model->check_email('okluoquan@163.com'))
		    {
		    	echo 1111111;
				//$msg = array('Result' => false);
			}
			else
			{
				echo 222222;
			}		
		//}
		//echo json_encode($msg);
	}
	
	function check_name()
	{
	  $qs = query_string_to_array();
	     $name = $qs['tbxRegisterNickname'];
	  $this->load->model('user_model');
	  $msg = array('Result' => true);
	  if ($name){
	      if ($this->user_model->check_name($name)){
	    $msg = array('Result' => false);
	   }    
	  }
	        
	  echo json_encode($msg);
	}

	
}
?>