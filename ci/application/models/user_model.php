<?php
class User_Model extends CI_Model
{
	function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	function user_insert($arr)
	{
		$this->db->insert('sx_user',$arr);
	}

	function user_update($id,$arr)
	{
		$this->db->where('uid',$id);
		$this->db->update('sx_user',$arr);
	}

	function user_del($id)
	{
		$this->db->where('uid',$id);
		$this->db->delete('sx_user');
	}

	function user_select($uname)
	{
		$this->db->where('uname',$uname);
		$this->db->select('*');
		$query=$this->db->get('sx_user');
		return $query->result();
	}
	
	function user_select_all()
	{
		$this->db->select('*');
		$query=$this->db->get('sx_user');
		return $query->result();
	}
	
	
	function user_select_limit($start, $end)
	{
		$this->db->select('*');
		$this->db->limit($end, $start);
		$query=$this->db->get('sx_user');
		return $query->result();
	}
	
	function check_email($email)
	{
		/*$this->db->where('email',$email);
		$this->db->select('*');
		$query=$this->db->get('sx_user');
		return $query->result();*/
		
		$query = $this->db->get_where('sx_user',array('email' => $email));
        if ($row = $query->row_array()){
            return true;
        }
        return false;
	}
	
	 /**
	 * 查询该用户名是否存在
	 *
	 */	
	function check_name($name)
	{
		$query = $this->db->get_where('sx_user',array('nickname' => $name));
        if ($row = $query->row_array()){
            return true;
        }
        return false;
	}
	
	
 	/**
	 * 查询登陆
	 *
	 */	
	function check_login($name, $password)
	{
		$query = $this->db->get_where('sx_user',array('nickname' => $name, 'password'=>md5($password)));
        if ($row = $query->row_array()){
            return $row;
        }
        return array();
	}
}
?>
