<?php


class Project_Model extends CI_Model
{
	function __construct()
	{
		parent::__construct();
		$this->load->database();
	}
	
	function delete() 
	{
		
	}
	
	function insert_brief($arr)
	{
		$this->db->insert('sx_project',$arr);
		return $this->db->insert_id();
	}
	
	function update_detail($id, $arr)
	{
		$this->db->where('id',$id);
		$this->db->update('sx_project',$arr);
	}
	
	function select_by_id($id)
	{
		$this->db->where('id',$id);
		$this->db->select('*');
		$query=$this->db->get('sx_project');
		return $query->result();
	}
	
	function select_by_type($type)
	{
		$this->db->where('type',$type);
		$this->db->select('*');
		$query=$this->db->get('sx_project');
		return $query->result();
	}
}

?>