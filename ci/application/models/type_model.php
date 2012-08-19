<?php

class Type_Model extends CI_Model
{
	function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	function insert($arr)
	{
		$this->db->insert('sx_project_type',$arr);
	}

	function update($id,$arr)
	{
		$this->db->where('uid',$id);
		$this->db->update('sx_project_type',$arr);
	}

	function delete($id)
	{
		$this->db->where('uid',$id);
		$this->db->delete('sx_project_type');
	}

	function select($uname)
	{
		$this->db->where('uname',$uname);
		$this->db->select('*');
		$query=$this->db->get('sx_project_type');
		return $query->result();
	}
	
	function selectAll()
	{
		$this->db->select('*');
		$query=$this->db->get('sx_project_type');
		return $query->result();
	}
	
	
	function selectLimit($start, $end)
	{
		$this->db->select('*');
		$this->db->limit($end, $start);
		$query=$this->db->get('sx_project_type');
		return $query->result();
	}
	
	function selectTypeNameByType($type)
	{
		$this->db->where('type',$type);
		$this->db->select('typeName');
		$query=$this->db->get('sx_project_type');
		//return $query->result_array();
		return $query->result();
	}
	
    function select_type_typeName_link()
	{
		$this->db->select('type, typeName, link');
		$query=$this->db->get('sx_project_type');
		return $query->result();
	}
	
	function selectTypeAndTypeName()
	{
		$this->db->select('type, typeName');
		$query=$this->db->get('sx_project_type');
		return $query->result();
	}
	
}
?>