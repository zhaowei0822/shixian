

<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Publish extends CI_Controller
{
	function brief()
	{
		//发布项目第一步
		if(!$this->session->userdata('user_in'))
		{
			redirect('login/loginer');
		}
		else
		{	
			$this->load->model("type_model");
			$type = $this->type_model->selectTypeAndTypeName();
			
			//$CI = get_instance();
			//$CI->load->model('regionModel', 'region');
			//$provinces = $CI->region->provinces();
			//$citys = $CI->region->childrenOf($province_selected);
			
			$this->load->model('region_model');
			$provinces = $this->region_model->provinces();
			$citys = $this->region_model->childrenOf(6);
			
			
			$data = array('typeArr'=>$type, 
			              'province_selected'=>6,
			              'city_selected'=>76,
			              'district_selected'=>693,
			              'provinces'=>$provinces,
						  'citys'=>$citys);
						  
			/*
			$data = array('typeArr'=>$type, 
			              'province_selected'=>6,
			              'city_selected'=>76,
			              'district_selected'=>693);
			              */
			$this->load->view(brief_view, $data);
		}
	}
	
	function detail()
	{
		$config['upload_path']= "./upload";
		$config['allowed_types']="gif|jpg|png";
		$config['max_size']="200";
		$this->load->library("upload",$config);
		if($this->upload->do_upload('upfile'))
		{
			$data=$this->upload->data();
			//var_dump($data);
			
			$this->load->model(type_model);
			$arr = $this->type_model->selectTypeNameByType($_POST['pro_type']);
			
			
			$this->load->model(region_model);
			$province = $this->region_model->select_region_name_by_id($_POST['province_id']);
			$city = $this->region_model->select_region_name_by_id($_POST['city_id']);
			$area = $province[0]->region_name.$city[0]->region_name;
			//echo $area;
			
			
			$arr = array('name'=>$_POST['pro_name'],
			             'state'=>0,
						 'type'=>$_POST['pro_type'],
						 'typeName'=>$arr[0]->typeName,
						 'thumbImg'=>$data['file_name'],
						 'simpleDesc'=>$_POST['pro_simple_desc'],
						 'collectMoney'=>$_POST['pro_collect_money'],
						 'submitDay'=>$_POST['pro_submit_day'],
						 'cityName'=>$area
			            );
			      
			$this->load->model("project_model");
			$id = $this->project_model->insert_brief($arr);
		 	$this->session->set_userdata(array('pro_id'=>$id));
			$this->load->view("detail_view");
		}
		else
		{
			$error=array('error'=>$this->upload->display_errors());
			//var_dump($error);
		}
	}
	
	function reward()
	{
		$arr = array('videoUrl'=>$_POST['pro_video_url'],
		             'detailContent'=>$_POST['pro_detail']);
		$this->load->model("project_model");
		
		//echo $this->session->userdata('pro_id')."<br>";
		//var_dump($arr);
		$this->project_model->update_detail($this->session->userdata('pro_id'), $arr);
		$this->load->view("reward_view");
	}
	
	
	function question()
	{
		$this->load->view("question_view");
	}
	
	
	function verify()
	{
		$this->load->view("verify_view");
	}
	
	function wait()
	{
		$this->load->view("wait_view");
	}
	
	function browse()
	{
		$this->load->view("browse_view");
	}
}

?>