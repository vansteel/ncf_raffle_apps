<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Router extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->check_isvalidated();
    }
    //DETERMINE THE ROLE OF THE INPUTTED ACCOUNT
    public function index()
    {
        $userx_id = $this->session->userdata('userx_id');
        $username = $this->session->userdata('username');
        $role_id = $this->session->userdata('role_id');
        //IF 1 THEN PROCEED TO ADMIN CONTROLLER
        if ($role_id == '1') 
        {
            redirect('Raffle/index');
        }
        //IF 2 THEN PROCEED TO MANAGER CONTROLLER
        else if ($role_id == '2') 
        {
            redirect('Raffle2/index');
        }
    }
    //IF NOT VALIDATED THEN RETURN TO LOG IN FORM
    private function check_isvalidated()
    {
        if (!$this->session->userdata('validated')) {
            redirect('Login');
        }
    }
    //LOG OUT AND GO BACK TO LOG IN FORM
    public function logout()
    {
        $this->session->sess_destroy();
        redirect('Login');
    }
}
