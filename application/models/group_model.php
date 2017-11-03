<?php
Class group_model extends CI_Model
{
	// get all available groups for creating users
	function get_allgroups(){
	$query = $this->db->get("user_group");
	$result = $query->result_array();
	return $result;
	}
	
	function get_selectedGroup($subjectValue,$centerValue){
		$this->db->select("user_group.*");    
		$this->db->where("user_group.institute_id",$centerValue);
		$this->db->where("user_group.cid",$subjectValue);
		$query = $this->db->get("user_group");
		if($query -> num_rows() >= 1) 
		{
			return $query->result();
   		}
		else
		{
			return false;
		}
	}	
	function get_selectedGroupWise($subjectValue,$centerValue){
		$this->db->select("user_group.*");    
		$this->db->where("user_group.institute_id",$centerValue);
		$this->db->where("user_group.cid",$subjectValue);
		$query = $this->db->get("user_group");
		if($query -> num_rows() >= 1) 
		{
			return $query->result_array();
   		}
		else
		{
			return false;
		}
	}	
	
	function group_dropdown()
 {
   //$nor=$this->config->item('number_of_rows');
   $query = $this -> db -> query("select * from user_group");

   if($query -> num_rows() >= 1)
   {
     return $query->result();
   }
   else
   {
     return false; 
   }
 }
	// get all available groups to show a group list in admin side
	function group_list($limit)
 {
 	$this -> db -> select('user_group.gid, user_group.group_name, institute_data.organization_name, question_subject.subject_name');
	
	$this -> db -> from('user_group');
	
	$this -> db -> join('institute_data','user_group.institute_id = institute_data.su_institute_id');
	$this -> db -> join('question_subject','user_group.cid = question_subject.cid');
	$this -> db -> limit($this->config->item('number_of_rows'),$limit);
	$this->db->order_by("gid", "desc"); 
	$query = $this -> db -> get();
	
	/* $institute_id = $this->session->userdata('institute_id');
 	$this -> db -> select('gid, group_name');
   $this -> db -> from('user_group');
   $this -> db -> limit($this->config->item('number_of_rows'),$limit);
	$this->db->order_by("gid", "desc"); 
	$this->db->where('institute_id',$institute_id);
   $query = $this -> db -> get(); */

   if($query -> num_rows() >= 1)
   {
     return $query->result();
   }
   else
   {
     return false;
   }
 }
 
 // get particular group detail		
	function get_group($gid){
	//$institute_id = $this->session->userdata('institute_id');
 	//$this->db->where('institute_id',$institute_id);
 	$this->db->where('gid',$gid);
		$query = $this->db->get('user_group');
		return $query->row_array();
		} 
 
	// update group detail
 	function update_group($gid){
 		$groupname = $_POST['groupname'];
 		$group_detail = array(
	 		'group_name' => $groupname,
	 		);
	 	/* $institute_id = $this->session->userdata('institute_id');
 		$this->db->where('institute_id',$institute_id); */
	 	$this->db->where('gid', $gid);
 		$this->db->update('user_group',$group_detail);
 		return "Group updated";
 		}
 		
 	// delete group	
 	function remove_group($gid)
	 {
	 	/* $institute_id = $this->session->userdata('institute_id');
 		$this->db->where('institute_id',$institute_id); */
		if($this->db->delete('user_group', array('gid' => $gid)))
		{
		  return true;
		}
		else
		{
		  return false;
		}
	 }	
	 
	 // insert group
	 function insert_group(){
	 		$institute_id = $this->session->userdata('institute_id');
			$insert_group = array(
			'group_name' => $this->input->post('groupname'),
			'institute_id' => $this->input->post('centers'),
			'cid' => $this->input->post('subject')
			);
			if($this->db->insert('user_group',$insert_group)){
			return "Group added successfully";
			}else{
			return "Unable to add group";
			}
			
			}
}
?>

