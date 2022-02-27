<?php

/**
 * 
 */
class Media_model extends CI_Model
{
	public function create($values)
	{
		$this->db->insert("fashmart099_media",$values);
		return $this->db->insert_id();
	}

	public function total_rows()
	{
		return $this->db->get('fashmart099_media')->num_rows();
	}

	public function get_all($offset = null,$limit = null)
	{
		return $this->db->get('fashmart099_media',$offset,$limit)->result_array();
	}

	public function get_by($media_id)
	{
		return $this->db->get_where('fashmart099_media',['id'=>$media_id])->row_array();
	}

	public function update($media_id,$option)
	{
		$this->db->where('id', $media_id);
		$this->db->update('fashmart099_media', $option);
		return $this->db->affected_rows();
	}

	public function delete($media_id)
	{
		$this->db->delete('fashmart099_media',['id'=>$media_id]);
		return $this->db->affected_rows();
	}

	public function show_all()
	{
		$this->db->where('status','activate');
		return $this->db->get('fashmart099_media')->result_array();
	}
}

?>