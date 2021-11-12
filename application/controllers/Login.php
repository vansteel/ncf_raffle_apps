<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        //$this->load->model('database');
    }

    public function index()
    {
        $this->load->view('login');
    }

    //THE SUBMITTED FORM WILL BE PROCESSED
    public function process()
    {
        //CALL M_LOGIN TO VALIDATE THE USER INPUT
        $this->load->model('login_m');

        $result = $this->login_m->validate();
        //IF INCORRECT THEN RETURN TO LOG IN FORM
        if (!$result) 
        {
            $this->index();
        }
        //IF CORRECT THEN PROCEED TO ROUTER CONTROLLER
        else 
        {
            redirect('Router/index');
        }
    }
}