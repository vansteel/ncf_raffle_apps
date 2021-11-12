<?php

class Login_m extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    public function validate()
    {
        //VALIDATE THE USERNAME AND PASSWORD
        $username = $this->security->xss_clean($this->input->post('username'));
        $password = $this->security->xss_clean($this->input->post('password'));
        //LOOK IN THE DATABASE
        $query = $this->db->query(
            "
            SELECT * FROM userx
            WHERE username = '$username'
            AND passwordx = '$password'"
        );
        //IF FOUND IN THE DATABASE GET THE $DATA AND VALIDATED
        if ($query->num_rows() == 1) 
        {
            $row = $query->row();
            $data = array(
                'userx_id'    => $row->userx_id,
                'username'  => $row->username,
                'role_id'    => $row->role_id,
                'validated' => true
            );
            $this->session->set_userdata($data);
            return true;
        }
        return false;
    }
}
