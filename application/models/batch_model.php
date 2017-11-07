<?php
Class batch_model extends CI_Model
{
	// get all available batches for creating users
	function get_allbatches(){
	$query = $this->db->get("user_batch");
	$result = $query->result_array();
	return $result;
	}
	
	function get_selectedBatch($subjectValue,$centerValue){
		$this->db->select("user_batch.*");    
		$this->db->where("user_batch.institute_id",$centerValue);
		$this->db->where("user_batch.cid",$subjectValue);
		$query = $this->db->get("user_batch");
		if($query -> num_rows() >= 1) 
		{
			return $query->result();
   		}
		else
		{
			return false;
		}
	}	
	function get_selectedBatchWise($subjectValue,$centerValue){
		$this->db->select("user_batch.*");    
		$this->db->where("user_batch.institute_id",$centerValue);
		$this->db->where("user_batch.cid",$subjectValue);
		$query = $this->db->get("user_batch");
		if($query -> num_rows() >= 1) 
		{
			return $query->result_array();
   		}
		else
		{
			return false;
		}
	}	
	
	function batch_dropdown()
 {
   //$nor=$this->config->item('number_of_rows');
   $query = $this -> db -> query("select * from user_batch");

   if($query -> num_rows() >= 1)
   {
     return $query->result();
   }
   else
   {
     return false; 
   }
 }
	// get all available batches to show a batch list in admin side
	function batch_list($limit)
 {
 	$this -> db -> select('user_batch.gid, user_batch.batch_name, institute_data.organization_name, question_subject.subject_name');
	
	$this -> db -> from('user_batch');
	
	$this -> db -> join('institute_data','user_batch.institute_id = institute_data.su_institute_id');
	$this -> db -> join('question_subject','user_batch.cid = question_subject.cid');
	$this -> db -> limit($this->config->item('number_of_rows'),$limit);
	$this->db->order_by("gid", "desc"); 
	$query = $this -> db -> get();
	
	/* $institute_id = $this->session->userdata('institute_id');
 	$this -> db -> select('gid, batch_name');
   $this -> db -> from('user_batch');
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
 
 // get particular batch detail		
	function get_batch($gid){
	//$institute_id = $this->session->userdata('institute_id');
 	//$this->db->where('institute_id',$institute_id);
 	$this->db->where('gid',$gid);
		$query = $this->db->get('user_batch');
		return $query->row_array();
		} 
 
	// update batch detail
 	function update_batch($gid){
 		$batchname = $_POST['batchname'];
 		$batch_detail = array(
	 		'batch_name' => $batchname,
	 		);
	 	/* $institute_id = $this->session->userdata('institute_id');
 		$this->db->where('institute_id',$institute_id); */
	 	$this->db->where('gid', $gid);
 		$this->db->update('user_batch',$batch_detail);
 		return "Batch updated";
 		}
 		
 	// delete batch	
 	function remove_batch($gid)
	 {
	 	/* $institute_id = $this->session->userdata('institute_id');
 		$this->db->where('institute_id',$institute_id); */
		if($this->db->delete('user_batch', array('gid' => $gid)))
		{
		  return true;
		}
		else
		{
		  return false;
		}
	 }	
	 
	 // insert batch
	 function insert_batch(){
	 		$institute_id = $this->session->userdata('institute_id');
			$insert_batch = array(
			'batch_name' => $this->input->post('batchname'),
			'institute_id' => $this->input->post('centers'),
			'cid' => $this->input->post('subject')
			);
			if($this->db->insert('user_batch',$insert_batch)){
			return "Batch added successfully";
			}else{
			return "Unable to add batch";
			}
			
			}
}
?>

