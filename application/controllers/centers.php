<!--              CENTERS.PHP       -->

<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Centers extends CI_Controller {

//done
 function __construct()
 {
   parent::__construct();
   $this->load->helper(array('form', 'url'));
   $this->load->library('form_validation');
   $this->load->model('centers_model','',TRUE);
   if(!$this->session->userdata('logged_in'))
   {
   redirect('login');
   }
 }
 //end of edit
 
 
//done
 function index($limit='0')
 {
	 
$logged_in=$this->session->userdata('logged_in');
if($logged_in['su']!="1"){
exit('Permission denied');
return;
}		
   $data['result'] = $this->centers_model->centers_list($limit);
	$data['title']="Centers list";
   $data['limit']=$limit;
   $this->load->view($this->session->userdata('web_view').'/header',$data);
   $this->load->view($this->session->userdata('web_view').'/centers_list',$data);
  	$this->load->view($this->session->userdata('web_view').'/footer',$data);
 }
//end of edit
 

 //DONE
function remove_center($gid){
$logged_in=$this->session->userdata('logged_in');
if($logged_in['su']!="1"){
exit('Permission denied');
return;
}		
	$this->centers_model->remove_center($gid);
	redirect('centers', 'refresh');
}
//END OF EDIT



//done
// add new batch form
function add_new(){
$logged_in=$this->session->userdata('logged_in');
if($logged_in['su']!="1"){
exit('Permission denied');
return;
}		  
	$data['title']="Add Center";
	$this->load->view($this->session->userdata('web_view').'/header',$data);
	$this->load->view($this->session->userdata('web_view').'/add_center',$data);
	$this->load->view($this->session->userdata('web_view').'/footer',$data);
	}
//end of edit
	
	
	//done
// insert center into database
function insert_centers(){
$logged_in=$this->session->userdata('logged_in');
if($logged_in['su']!="1"){
exit('Permission denied');
return;
}		
	//echo "<pre>"; print_r($_POST);
	// form validation rules
	$this->form_validation->set_rules('centername', 'Center Name', 'required');
	if ($this->form_validation->run() == FALSE)
		{
			$this->add_new();
		}
		else
		{
		$data['title']="Add Center";
		$data['resultstatus'] = $this->centers_model->insert_center();
		$this->load->view($this->session->userdata('web_view').'/header',$data);
		$this->load->view($this->session->userdata('web_view').'/add_center',$data);
		$this->load->view($this->session->userdata('web_view').'/footer',$data);
		}
	}
	//end of edit
	
	//done
	// edit the center
	public function edit_center($gid,$resultstatus=''){
$logged_in=$this->session->userdata('logged_in');
if($logged_in['su']!="1"){
exit('Permission denied');
return;
}		

		$data['title']="Edit Center";
		$data['center'] = $this->centers_model->get_center($gid); //to edit model
		$data['gid'] = $gid;
		$data['resultstatus'] = $resultstatus;
		$this->load->view($this->session->userdata('web_view').'/header',$data);
		$this->load->view($this->session->userdata('web_view').'/edit_center',$data);
		$this->load->view($this->session->userdata('web_view').'/footer',$data);
		}
		//end of edit
		
//done
		// update centers in database
	function update_center($gid){
$logged_in=$this->session->userdata('logged_in');
if($logged_in['su']!="1"){
exit('Permission denied');
return;
}		
		// form validations
		$this->form_validation->set_rules('centername', 'Center Name', 'required');
		if ($this->form_validation->run() == FALSE){
			$this->edit_center($gid);
			}
		else{
			$resultstatus = $this->centers_model->update_center($gid);
			$this->edit_center($gid,$resultstatus);
			}
		}	
//end of edit
}

?>


















