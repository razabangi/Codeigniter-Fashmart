<?php

/**
 * 
 */
class Category_model extends CI_Model
{
	public function get_by($category_id)
	{
		return $this->db->get_where('fashmart099_category',['id'=>$category_id])->row_array();
	}

	public function get_all($offset=null,$limit=null)
	{
		return $this->db->get('fashmart099_category',$offset,$limit)->result_array();
	}

	public function category_arrays($category_id)
	{
		$category = [];
		 $categories = explode(',', $category_id);
		 foreach ($this->get_all() as $values) {
		 	for ($i=0; $i < count($categories); $i++) { 
		 		if ($categories[$i] == $values['id']) {
		 			$category[$values['id']] = $values['title'];
		 		}
		 	}
		 }	
		 return $category;		


	}

	public function total_rows()
	{
		return $this->db->get('fashmart099_category')->num_rows();
	}

	public function create($values)
	{
		$this->db->insert('fashmart099_category',$values);
		return $this->db->insert_id();
	}

	public function update($category_id,$where)
	{
		$this->db->where('id',$category_id);
		$this->db->update('fashmart099_category',$where);
		return $this->db->affected_rows();
	}

	public function delete($category_id)
	{
		$this->db->delete('fashmart099_category',['id'=>$category_id]);
		return $this->db->affected_rows();
	}

	public function category_array()
	{
		$category = [];
		foreach ($this->show_all_categories() as $row) {
			$category[$row['id']] = $row['title'];
		}
		return $category;
	}

	public function show_all_categories()
	{
		return $this->db->get('fashmart099_category')->result_array();
	}

	public function show_all_parent_categories($parent_id = 0)
	{
		return $this->db->get_where('fashmart099_category',['parent_id'=>$parent_id])->result_array();
	}

	public function show_sub_child($parent_id)
	{
		return $this->db->get_where('fashmart099_category',['parent_id'=>$parent_id])->result_array();			
	}

	public function show_category_by($parent_id)
	{
		return $this->db->get_where('fashmart099_category',['parent_id'=>$parent_id])->result_array();
	}

	public function show_category_by_id($category_id)
	{
		return $this->db->get_where('fashmart099_category',['id'=>$category_id])->row_array();	
	}



	// front end
	public function get_slug($slug)
	{
		return $this->db->get_where('fashmart099_category',['slug'=>$slug])->row_array();
	}
}

?>