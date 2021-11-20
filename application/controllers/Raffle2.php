<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Raffle2 extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('tabulator_m');
    }

    public function index()
    {
        $typex['typex'] = $this->tabulator_m->show_role();
        $this->load->view('header2');
        $this->load->view('index2', $typex);
        $this->load->view('footer2');
    }

    public function playerList()
    {

        // POST data
        $postData = $this->input->post();

        // Get data
        $data = $this->tabulator_m->getPlayer($postData);

        echo json_encode($data);
    }

    public function winnerList()
    {

        // POST data
        $postData = $this->input->post();

        // Get data
        $data = $this->tabulator_m->getWinner($postData);

        echo json_encode($data);
    }

    function select_random_segment1()
    {
        $data = $this->tabulator_m->select_random_segment1();
        echo json_encode($data);
    }

    function select_random_segment2()
    {
        $data = $this->tabulator_m->select_random_segment2();
        echo json_encode($data);
    }

    function select_random_segment3()
    {
        $data = $this->tabulator_m->select_random_segment3();
        echo json_encode($data);
    }

    function select_random_segment4()
    {
        $data = $this->tabulator_m->select_random_segment4();
        echo json_encode($data);
    }

    function select_random_segment5()
    {
        $data = $this->tabulator_m->select_random_segment5();
        echo json_encode($data);
    }

    function select_random_segment6()
    {
        $data = $this->tabulator_m->select_random_segment6();
        echo json_encode($data);
    }

    function select_random_segment7()
    {
        $data = $this->tabulator_m->select_random_segment7();
        echo json_encode($data);
    }

    function select_random_segment8()
    {
        $data = $this->tabulator_m->select_random_segment8();
        echo json_encode($data);
    }

    function select_random_segment9()
    {
        $data = $this->tabulator_m->select_random_segment9();
        echo json_encode($data);
    }

    function select_random_segment10()
    {
        $data = $this->tabulator_m->select_random_segment10();
        echo json_encode($data);
    }

    function save_winner()
    {
        $data = $this->tabulator_m->save_winner();
        echo json_encode($data);
    }

    function segment_name(){
        $data = $this->tabulator_m->segment_name();
        echo json_encode($data);
    }

    function total_segment(){
        $data = $this->tabulator_m->total_segment();
        echo json_encode($data);
    }


}