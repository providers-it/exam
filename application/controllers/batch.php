<!--       Batch.PHP              -->

<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Batch extends CI_Controller
{
//echo "Balaji";
    function __construct()
    {
        parent::__construct();
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
        $this->load->model('batch_model', '', TRUE);
        $this->load->model('centers_model', '', TRUE);
        $this->load->model('subject', '', TRUE);
        if (!$this->session->userdata('logged_in')) {
            redirect('login');
        }
    }

    function index($limit = '0')
    {
        $logged_in = $this->session->userdata('logged_in');
        if ($logged_in['su'] != "1") {
            exit('Permission denied');
            return;
        }
        $data['result'] = $this->batch_model->batch_list($limit);
        $data['title'] = "Batch list";
        $data['limit'] = $limit;
        $this->load->view($this->session->userdata('web_view') . '/header', $data);
        $this->load->view($this->session->userdata('web_view') . '/batch_list', $data);
        $this->load->view($this->session->userdata('web_view') . '/footer', $data);
    }


    function remove_batch($gid)
    {
        $logged_in = $this->session->userdata('logged_in');
        if ($logged_in['su'] != "1") {
            exit('Permission denied');
            return;
        }
        $this->batch_model->remove_batch($gid);
        redirect('batch', 'refresh');
    }

// add new batch form
    function add_new()
    {
        $logged_in = $this->session->userdata('logged_in');
        if ($logged_in['su'] != "1") {
            exit('Permission denied');
            return;
        }
        $data['title'] = "Add Batch";
        $data['allcenters'] = $this->centers_model->get_allcenters();
        $data['allsubject'] = $this->subject->get_allsubject();
        $this->load->view($this->session->userdata('web_view') . '/header', $data);
        $this->load->view($this->session->userdata('web_view') . '/add_batch', $data);
        $this->load->view($this->session->userdata('web_view') . '/footer', $data);
    }

// insert batch into database
    function insert_batch()
    {
        $logged_in = $this->session->userdata('logged_in');
        if ($logged_in['su'] != "1") {
            exit('Permission denied');
            return;
        }
        //echo "<pre>"; print_r($_POST);
        // form validation rules
        $this->form_validation->set_rules('batchname', 'Batch Name', 'required');
        if ($this->form_validation->run() == FALSE) {
            $this->add_new();
        } else {
            $data['title'] = "Add Batch";
            $data['resultstatus'] = $this->batch_model->insert_batch();
            $this->load->view($this->session->userdata('web_view') . '/header', $data);
            $this->load->view($this->session->userdata('web_view') . '/add_batch', $data);
            $this->load->view($this->session->userdata('web_view') . '/footer', $data);
        }
    }

    // edit the batch form
    public function edit_batch($gid, $resultstatus = '')
    {
        $logged_in = $this->session->userdata('logged_in');
        if ($logged_in['su'] != "1") {
            exit('Permission denied');
            return;
        }
        $data['title'] = "Edit Batch";
        $data['batch'] = $this->batch_model->get_batch($gid);
        $data['gid'] = $gid;
        $data['resultstatus'] = $resultstatus;
        $this->load->view($this->session->userdata('web_view') . '/header', $data);
        $this->load->view($this->session->userdata('web_view') . '/edit_batch', $data);
        $this->load->view($this->session->userdata('web_view') . '/footer', $data);
    }


    // update batch in database
    function update_batch($gid)
    {
        $logged_in = $this->session->userdata('logged_in');
        if ($logged_in['su'] != "1") {
            exit('Permission denied');
            return;
        }
        // form validations
        $this->form_validation->set_rules('batchname', 'Batch Name', 'required');
        if ($this->form_validation->run() == FALSE) {
            $this->edit_batch($gid);
        } else {
            $resultstatus = $this->batch_model->update_batch($gid);
            $this->edit_batch($gid, $resultstatus);
        }
    }
}

?>


















