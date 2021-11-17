<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Test extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('test_m');
    }

    public function index()
    {
        $this->load->view('header2');
        $this->load->view('test');
    }

    public function empList()
    {

        // POST data
        $postData = $this->input->post();

        // Get data
        $data = $this->test_m->getWinner($postData);

        echo json_encode($data);
    }
}
