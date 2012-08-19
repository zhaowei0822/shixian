

<?php
class Home extends CI_Controller
{
	function index()
	{
		$this->load->model("type_model");
		//$typname="实现";
		//$arr = array('type'=>11,'typeName'=>$typname);
		//$this->typeModel->insert($arr);
		
		
		$type = $this->type_model->select_type_typeName_link();
		//foreach ($type as $t)
		//{
			//echo $t->typeName;
		//}
		//var_dump($type);
		
		
		$typeArr = array('typeArr'=>$type);
		$this->load->view('home_view', $typeArr);
	}
	
	function get_projects_by_type($type)
	{
		$this->load->model("project_model");
		$arr = $this->project_model->select_by_type($type);
		echo json_encode($arr);
	}
	
	function test()
	{
		$this->load->model("project_model");
		$arr = $this->project_model->select_by_id(20);
		echo json_encode($arr);
	}
}
?>