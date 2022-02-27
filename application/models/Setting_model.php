<?php

/**
 * 
 */
class Setting_model extends CI_Model
{
	public function create($options)
	{
		$this->db->insert('fashmart099_setting',$options);
		return $this->db->insert_id();
	}

	public function row_count()
	{
		return $this->db->get('fashmart099_setting')->num_rows();
	}

	public function get_by($id)
	{
		return $this->db->get_where('fashmart099_setting',['id'=>$id])->row_array();
	}

	public function get_all()
	{
		return $this->db->get('fashmart099_setting')->result_array();
	}

	public function update($where,$options)
	{
		$this->db->where($where);
		$this->db->update('fashmart099_setting',$options);
		return $this->db->affected_rows();
	}

	public function show_all_mini_banners($type = 2)
	{
		return $this->db->get_where('fashmart099_setting',['home_type'=>$type])->result_array();
	}

	public function show_all_big_banners($type = 3)
	{
		return $this->db->get_where('fashmart099_setting',['home_type'=>$type])->result_array();
	}

	public function logo($type = 1)
	{
		return $this->db->get_where('fashmart099_setting',['home_type'=>$type])->row_array();
	}
}

?>