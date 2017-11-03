<?php
Class Subject extends CI_Model
{
 // get all available centers for creating users - done
	function get_allsubject(){
	$query = $this->db->get("question_subject");
	$result = $query->result_array();
	return $result;
	}
	function get_allsubjectarray(){
	$query = $this->db->get("question_subject");
	$result = $query->result();
	return $result;
	}
  
 function subject_dropdown()
 {
   //$nor=$this->config->item('number_of_rows');
   $query = $this -> db -> query("select * from question_subject");

   if($query -> num_rows() >= 1)
   {
     return $query->result();
   }
   else
   {
     return false;
   }
 }

// get alll subject
function subject_list($limit)
 {
 	//$institute_id  = $this->session->userdata('institute_id');
 	//$this->db->where('institute_id',$institute_id); 
   $this -> db -> select('cid, subject_name');
   $this -> db -> from('question_subject');
   $this -> db -> limit($this->config->item('number_of_rows'),$limit);
	$this->db->order_by("cid", "desc"); 
   $query = $this -> db -> get();

   if($query -> num_rows() >= 1)
   {
     return $query->result();
   }
   else
   {
     return false;
   }
 }

 function remove_subject($cid)
 {
   $institute_id = $this->session->userdata('institute_id');
 	$this->db->where('institute_id',$institute_id);

   if($this->db->delete('question_subject', array('cid' => $cid)) )
   {
     return true;
   }
   else
   {
     return false;
   }
 }

 // insert subject
	 function insert_subject(){
	 $institute_id = $this->session->userdata('institute_id');
			$insert_subject = array(
			'subject_name' => $this->input->post('subjectname'),
			'institute_id' => $institute_id
			);
			
			if($this->db->insert('question_subject',$insert_subject)){
			return "Subject added successfully";
			}else{
			return "Unable to add subject";
			}
			
			}
	
	 // get particular subject detail		
	function get_subject($cid){
		$institute_id = $this->session->userdata('institute_id');
	$query = $this->db->get_where('question_subject',array('cid' => $cid,'institute_id' => $institute_id));
		return $query->row_array();
		}
		
	function get_selectedInsitute_subject($institute_id){
		/*
		$this->db->select("question_subject.cid, subject_name");  
		//$this->db->distinct("subject_name");
		$this->db->distinct();
		$this->db->join("user_group","user_group.cid = question_subject.cid");
		$this->db->where("user_group.institute_id",$institute_id);
		$this->db->group_by("question_subject.subject_name");
		
		$query = $this->db->get("question_subject"); */
		
		$this->db->select("question_subject.*");    
		//$this->db->where("question_subject.institute_id",$institute_id);
		$query = $this->db->get("question_subject");
		 
		//$query = $this -> db -> query("SELECT DISTINCT question_subject.* FROM question_subject INNER JOIN user_group ON user_group.cid = question_subject.cid where user_group.institute_id ='$institute_id'");
		//$xxx=$query->result(); 
		
	
		if($query -> num_rows() >= 1)
		{
			return $query->result();
   		}
		else
		{
			return false;
		}
	}	 
		
	// update subject detail
 	function update_subject($cid){
 	
 		$subjectname = $_POST['subjectname'];
 		$subject_detail = array(
	 		'subject_name' => $subjectname,
	 		);
	 	$institute_id = $this->session->userdata('institute_id');
 	$this->db->where('institute_id',$institute_id);

	 	$this->db->where('cid', $cid);
 		$this->db->update('question_subject',$subject_detail);
 		return "Subject updated";
 		}
 		
}
?>

