<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Raffle extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('database');
    }

    public function index()
    {
        $typex['typex'] = $this->database->show_role();
        $this->load->view('header');
        $this->load->view('index', $typex);
        $this->load->view('footer');
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

}