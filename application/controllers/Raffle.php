<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Raffle extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('admin_m');
    }

    public function index()
    {
        $typex['typex'] = $this->admin_m->show_role();
        $this->load->view('header');
        $this->load->view('index', $typex);
        $this->load->view('footer');
    }

    function display_player_list()
    {
        $data = $this->admin_m->display_player_list();
        echo json_encode($data);
    }

    function display_winner_list()
    {
        $data = $this->admin_m->display_winner_list();
        echo json_encode($data);
    }

    function reset_winner_list()
    {
        $data = $this->admin_m->reset_winner_list();
        echo json_encode($data);
    }

    function delete_player()
    {
        $data = $this->admin_m->delete_player();
        echo json_encode($data);
    }

    function delete_winner()
    {
        $data = $this->admin_m->delete_winner();
        echo json_encode($data);
    }

    function update_player()
    {
        $data = $this->admin_m->update_player();
        echo json_encode($data);
    }

    function save_player()
    {
        $data = $this->admin_m->save_player();
        echo json_encode($data);
    }

    function select_random_segment1()
    {
        $data = $this->admin_m->select_random_segment1();
        echo json_encode($data);
    }

    function select_random_segment2()
    {
        $data = $this->admin_m->select_random_segment2();
        echo json_encode($data);
    }

    function select_random_segment3()
    {
        $data = $this->admin_m->select_random_segment3();
        echo json_encode($data);
    }

    function select_random_segment4()
    {
        $data = $this->admin_m->select_random_segment4();
        echo json_encode($data);
    }

    function select_random_segment5()
    {
        $data = $this->admin_m->select_random_segment5();
        echo json_encode($data);
    }

    function select_random_segment6()
    {
        $data = $this->admin_m->select_random_segment6();
        echo json_encode($data);
    }

    function select_random_segment7()
    {
        $data = $this->admin_m->select_random_segment7();
        echo json_encode($data);
    }

    function select_random_segment8()
    {
        $data = $this->admin_m->select_random_segment8();
        echo json_encode($data);
    }

    function select_random_segment9()
    {
        $data = $this->admin_m->select_random_segment9();
        echo json_encode($data);
    }

    function select_random_segment10()
    {
        $data = $this->admin_m->select_random_segment10();
        echo json_encode($data);
    }

    function save_winner()
    {
        $data = $this->admin_m->save_winner();
        echo json_encode($data);
    }

}