<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Raffle2 extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('database');
    }

    public function index()
    {
        $typex['typex'] = $this->database->show_role();
        $this->load->view('header2');
        $this->load->view('index2', $typex);
        $this->load->view('footer2');
    }

    function display_player_list()
    {
        $data = $this->database->display_player_list();
        echo json_encode($data);
    }

    function display_winner_list()
    {
        $data = $this->database->display_winner_list();
        echo json_encode($data);
    }

    function reset_winner_list()
    {
        $data = $this->database->reset_winner_list();
        echo json_encode($data);
    }

    function delete_player()
    {
        $data = $this->database->delete_player();
        echo json_encode($data);
    }

    function delete_winner()
    {
        $data = $this->database->delete_winner();
        echo json_encode($data);
    }

    function update_player()
    {
        $data = $this->database->update_player();
        echo json_encode($data);
    }

    function save_player()
    {
        $data = $this->database->save_player();
        echo json_encode($data);
    }

    function select_random_segment1()
    {
        $data = $this->database->select_random_segment1();
        echo json_encode($data);
    }

    function select_random_segment2()
    {
        $data = $this->database->select_random_segment2();
        echo json_encode($data);
    }

    function select_random_segment3()
    {
        $data = $this->database->select_random_segment3();
        echo json_encode($data);
    }

    function select_random_segment4()
    {
        $data = $this->database->select_random_segment4();
        echo json_encode($data);
    }

    function select_random_segment5()
    {
        $data = $this->database->select_random_segment5();
        echo json_encode($data);
    }

    function select_random_segment6()
    {
        $data = $this->database->select_random_segment6();
        echo json_encode($data);
    }

    function select_random_segment7()
    {
        $data = $this->database->select_random_segment7();
        echo json_encode($data);
    }

    function select_random_segment8()
    {
        $data = $this->database->select_random_segment8();
        echo json_encode($data);
    }

    function select_random_segment9()
    {
        $data = $this->database->select_random_segment9();
        echo json_encode($data);
    }

    function select_random_segment10()
    {
        $data = $this->database->select_random_segment10();
        echo json_encode($data);
    }

    function save_winner()
    {
        $data = $this->database->save_winner();
        echo json_encode($data);
    }

}