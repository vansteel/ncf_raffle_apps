<?php

class Database extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }

    function display_player_list()
    {
        $query = $this->db->query("SELECT p.player_id, p.player_name, t.type_id, t.type_code FROM player p JOIN typex t USING(type_id)");
        return $query->result();
    }

    function display_winner_list()
    {
        $query = $this->db->query("SELECT w.winner_id, p.player_name, t.type_code FROM winner w JOIN player p USING (player_id) JOIN typex t USING (type_id) ORDER BY winner_id");
        return $query->result();
    }

    function reset_winner_list()
    {
        $query = $this->db->query("TRUNCATE winner");
    }

    function delete_player()
    {
        $player_id = $this->input->post('player_id');
        $result = $this->db->query("DELETE FROM player WHERE player_id ='$player_id'");
        return $result;
    }

    function delete_winner()
    {
        $winner_id = $this->input->post('winner_id');
        $result = $this->db->query("DELETE FROM winner WHERE winner_id ='$winner_id'");
        return $result;
    }

    function show_role()
    {
        $query = $this->db->query("SELECT * FROM typex");
        return $query->result();
    }

    function update_player()
    {
        $player_id = $this->input->post('player_id');
        $player_name = $this->input->post('player_name');
        $type_id = $this->input->post('type_id');

        $result = $this->db->query("UPDATE player SET player_name ='$player_name', type_id ='$type_id' WHERE player_id ='$player_id'");
        return $result;
    }

    function save_player()
    {
        $player_name = $this->input->post('player_name');
        $type_id = $this->input->post('type_id');
        $userx_id = $this->session->userdata('userx_id');

        $result = $this->db->query("INSERT INTO player(player_name,type_id,userx_id)
            VALUES ('$player_name','$type_id','$userx_id')");
        return $result;
    }

    function select_random_segment1()
    {
        $query = $this->db->query("SELECT p.player_id, p.player_name, t.type_code FROM player p, typex t WHERE p.player_id NOT IN(SELECT player_id FROM winner) AND p.type_id = '1' AND p.type_id = t.type_id ORDER BY rand() LIMIT 1");
        return $query->result();
    }

    function select_random_segment2()
    {
        $query = $this->db->query("SELECT p.player_id, p.player_name, t.type_code FROM player p, typex t WHERE p.player_id NOT IN(SELECT player_id FROM winner) AND p.type_id = '2' AND p.type_id = t.type_id ORDER BY rand() LIMIT 1");
        return $query->result();
    }

    function select_random_segment3()
    {
        $query = $this->db->query("SELECT p.player_id, p.player_name, t.type_code FROM player p, typex t WHERE p.player_id NOT IN(SELECT player_id FROM winner) AND p.type_id = '3' AND p.type_id = t.type_id ORDER BY rand() LIMIT 1");
        return $query->result();
    }

    function select_random_segment4()
    {
        $query = $this->db->query("SELECT p.player_id, p.player_name, t.type_code FROM player p, typex t WHERE p.player_id NOT IN(SELECT player_id FROM winner) AND p.type_id = '4' AND p.type_id = t.type_id ORDER BY rand() LIMIT 1");
        return $query->result();
    }

    function select_random_segment5()
    {
        $query = $this->db->query("SELECT p.player_id, p.player_name, t.type_code FROM player p, typex t WHERE p.player_id NOT IN(SELECT player_id FROM winner) AND p.type_id = '5' AND p.type_id = t.type_id ORDER BY rand() LIMIT 1");
        return $query->result();
    }

    function select_random_segment6()
    {
        $query = $this->db->query("SELECT p.player_id, p.player_name, t.type_code FROM player p, typex t WHERE p.player_id NOT IN(SELECT player_id FROM winner) AND p.type_id = '6' AND p.type_id = t.type_id ORDER BY rand() LIMIT 1");
        return $query->result();
    }

    function select_random_segment7()
    {
        $query = $this->db->query("SELECT p.player_id, p.player_name, t.type_code FROM player p, typex t WHERE p.player_id NOT IN(SELECT player_id FROM winner) AND p.type_id = '7' AND p.type_id = t.type_id ORDER BY rand() LIMIT 1");
        return $query->result();
    }

    function select_random_segment8()
    {
        $query = $this->db->query("SELECT p.player_id, p.player_name, t.type_code FROM player p, typex t WHERE p.player_id NOT IN(SELECT player_id FROM winner) AND p.type_id = '8' AND p.type_id = t.type_id ORDER BY rand() LIMIT 1");
        return $query->result();
    }

    function select_random_segment9()
    {
        $query = $this->db->query("SELECT p.player_id, p.player_name, t.type_code FROM player p, typex t WHERE p.player_id NOT IN(SELECT player_id FROM winner) AND p.type_id = '9' AND p.type_id = t.type_id ORDER BY rand() LIMIT 1");
        return $query->result();
    }

    function select_random_segment10()
    {
        $query = $this->db->query("SELECT p.player_id, p.player_name, t.type_code FROM player p, typex t WHERE p.player_id NOT IN(SELECT player_id FROM winner) AND p.type_id = '10' AND p.type_id = t.type_id ORDER BY rand() LIMIT 1");
        return $query->result();
    }

    function save_winner()
    {
        $player_id = $this->input->post('player_id');
        $userx_id = $this->session->userdata('userx_id');

        $query = $this->db->query("INSERT INTO winner(player_id,userx_id) VALUES ('$player_id','$userx_id');");
    }
}
