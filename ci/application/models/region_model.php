<?php
/**
 * 
 */
class Region_Model extends CI_Model
{
    /**
     * 
     *
     * @return Region_Model
     */
    function __construct()
    {
        parent::__construct();
		$this->load->database();
    }
    
    /**
     * 
     *
     * @param integer $parent_id
     */
    function childrenOf($parent_id, $select="*")
    {
        $parent_id = (int)$parent_id;
        
        $regions = array();
        $this->db->select($select);
        $this->db->where('parent_id', $parent_id);
        $query = $this->db->get('ps_region');
        
        return $query->result_array(); 
    }

	/**
     * 
     *
     * @return array
     */
    function provinces()
    {
        return $this->childrenOf(1);
    }
    
    function select_region_name_by_id($id)
    {
    	$this->db->where('region_id', $id);
    	$this->db->select('region_name');
		$query=$this->db->get('ps_region');
		return $query->result();
    }
}