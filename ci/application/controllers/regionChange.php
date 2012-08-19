<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class RegionChange extends CI_Controller
{

	function selectChildren()
	{
        $segments = $this->uri->uri_to_assoc();  
		$this->load->model('region_model');
        $data['children']   = $this->region_model->childrenOf($segments['parent_id']);
		echo json_encode($data['children']);		
	}
	
	
}