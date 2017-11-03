<?php
Class centers_model extends CI_Model
{
	// get all available centers for creating users - done
	function get_allcenters(){
	$query = $this->db->get("institute_data");
	$result = $query->result_array();
	return $result;
	}
	//end of edit
	
	// get all available centers to show a center list in admin side - done
	function centers_list($limit)
 {
 	$institute_id = $this->session->userdata('institute_id');
 	$this -> db -> select('su_institute_id, organization_name');
   $this -> db -> from('institute_data');
   $this -> db -> limit($this->config->item('number_of_rows'),$limit);
	$this->db->order_by("su_institute_id", "asc"); 
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
//end of edit 

 //done
 // get particular center detail		
function get_center($gid){
	//$institute_id = $this->session->userdata('institute_id');
 	//$this->db->where('institute_id',$institute_id);
 	$this->db->where('su_institute_id',$gid);
		$query = $this->db->get('institute_data');
		return $query->row_array();
		}
	//end of edit	
 
 
	//done
	// update center detail
 	function update_center($gid){
 		$centername = $_POST['centername'];
 		$group_detail = array(
	 		'organization_name' => $centername,
	 		);
	 	//$institute_id = $this->session->userdata('institute_id');
 		$this->db->where('su_institute_id',$gid);
	 	//$this->db->where('gid', $gid);
 		$this->db->update('institute_data',$group_detail);
 		return "Center updated";
 		}
 	//end of edit	
		
		//done
 	// delete center	
 	function remove_center($gid)
	 {
	 	//$institute_id = $this->session->userdata('institute_id');
 		$this->db->where('su_institute_id',$gid);
		if($this->db->delete('institute_data', array('su_institute_id' => $gid)))
		{
		  return true;
		}
		else
		{
		  return false;
		}
	 }	
	 //end of edit
	 
	 
	 //done
	 // insert center
	 function insert_center(){
	 		$institute_id = $this->session->userdata('institute_id');
			$insert_center = array(
			'organization_name' => $this->input->post('centername')
			);
			if($this->db->insert('institute_data',$insert_center)){
			return "Center added successfully";
			}else{
			return "Unable to add center";
			}
			
			}
			//end of edit
}

?>

