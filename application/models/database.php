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
        $query = $this->db->query("SELECT w.winner_id, p.player_name, t.type_code FROM winner w JOIN player p USING (player_id) JOIN typex t USING (type_id)");
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

        $result = $this->db->query("INSERT INTO player(player_name,type_id,userx_id)
            VALUES ('$player_name','$type_id','1')");
        return $result;
    }
}
