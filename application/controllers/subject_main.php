<!--              CATEGORY_CONTROLLER.PHP       -->


<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Subject_main extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
        $this->load->model('subject', '', TRUE);
        if (!$this->session->userdata('logged_in')) {
            redirect('login');
        }
        $logged_in = $this->session->userdata('logged_in');
        if ($logged_in['su'] != "1") {
            exit('Permission denied');
            return;
        }
    }

    function index($limit = '0')
    {
        $data['result'] = $this->subject->subject_list($limit);
        $data['title'] = "subject list";
        $data['limit'] = $limit;
        $this->load->view($this->session->userdata('web_view') . '/header', $data);
        $this->load->view($this->session->userdata('web_view') . '/subject_list', $data);
        $this->load->view($this->session->userdata('web_view') . '/footer', $data);
    }


    function remove_subject($cid)
    {
        $this->subject->remove_subject($cid);
        redirect('subject_main', 'refresh');
    }

// add new subject form
    function add_new()
    {
        $data['title'] = "Add Subject";
        $this->load->view($this->session->userdata('web_view') . '/header', $data);
        $this->load->view($this->session->userdata('web_view') . '/add_subject', $data);
        $this->load->view($this->session->userdata('web_view') . '/footer', $data);
    }

// insert batch into database
    function insert_subject()
    {
        //echo "<pre>"; print_r($_POST);
        // form validation rules
        $this->form_validation->set_rules('subjectname', 'Subject Name', 'required');
        if ($this->form_validation->run() == FALSE) {
            $this->add_new();
        } else {
            $data['title'] = "Add Subject";
            $data['resultstatus'] = $this->subject->insert_subject();
            $this->load->view($this->session->userdata('web_view') . '/header', $data);
            $this->load->view($this->session->userdata('web_view') . '/add_subject', $data);
            $this->load->view($this->session->userdata('web_view') . '/footer', $data);
        }
    }

    // edit the subject form
    public function edit_subject($cid, $resultstatus = '')
    {
        $data['title'] = "Edit subject";
        $data['subject'] = $this->subject->get_subject($cid);
        $data['cid'] = $cid;
        $data['resultstatus'] = $resultstatus;
        $this->load->view($this->session->userdata('web_view') . '/header', $data);
        $this->load->view($this->session->userdata('web_view') . '/edit_subject', $data);
        $this->load->view($this->session->userdata('web_view') . '/footer', $data);
    }


    // update subject in database
    function update_subject($cid)
    {
        // form validations
        $this->form_validation->set_rules('subjectname', 'Subject Name', 'required');
        if ($this->form_validation->run() == FALSE) {
            $this->edit_subject($cid);
        } else {
            $resultstatus = $this->subject->update_subject($cid);
            $this->edit_subject($cid, $resultstatus);
        }
    }
}

?>


















