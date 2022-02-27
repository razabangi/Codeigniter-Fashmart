<?php

/**
 * 
 */
class Member_model extends CI_Model
{
	public function get_by($member_id)
	{
		return $this->db->get_where('fashmart099_member',['id'=>$member_id])->row_result();
	}
	
	public function credential_validate($where)
	{
		$result = $this->db->get_where('fashmart099_member',$where);
		if ($result->num_rows() > 0) {
			return $result->row_array();
		}
		return false;
	}

	public function verify_password($old_password)
	{
		$member_id = $this->session->userdata('user_id');
		$where = [
			'id' => $member_id,
			'password' => $old_password	
		];
		$this->db->where($where);
		$query = $this->db->get('fashmart099_member');

		if ($query->num_rows() > 0 ) 
		{
			$this->db->where($where);
			$this->db->update('fashmart099_member', ['password' => $this->input->post('retype_password')]);
			$affected = $this->db->affected_rows();
			if ($affected > 0 ) {
				return TRUE;
			}
			return FALSE;
		}
	}

	public function update($email,$where)
	{
		$this->db->where($email);
		$this->db->update('fashmart099_member',$where);
		return $this->db->affected_rows();
	}

}

?>