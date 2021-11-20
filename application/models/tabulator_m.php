<?php

class Tabulator_m extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }

    function getPLayer($postData = null)
    {

        $response = array();

        ## Read value
        $draw = $postData['draw'];
        $start = $postData['start'];
        $rowperpage = $postData['length']; // Rows display per page
        $columnIndex = $postData['order'][0]['column']; // Column index
        $columnName = $postData['columns'][$columnIndex]['data']; // Column name
        $columnSortOrder = $postData['order'][0]['dir']; // asc or desc
        $searchValue = $postData['search']['value']; // Search value

        ## Search 
        $searchQuery = "";
        if ($searchValue != '') {
            $searchQuery = " (player_name like '%" . $searchValue . "%' or type_code like '%" . $searchValue . "%') ";
        }

        ## Total number of records without filtering
        $this->db->select('count(*) as allcount');
        $this->db->from('player');
        $this->db->join('typex','typex.type_id = player.type_id');
        $records = $this->db->get()->result();
        $totalRecords = $records[0]->allcount;

        ## Total number of record with filtering
        $this->db->select('count(*) as allcount');
        $this->db->from('player');
        $this->db->join('typex','typex.type_id = player.type_id');
        if ($searchQuery != '')
            $this->db->where($searchQuery);
        $records = $this->db->get()->result();
        $totalRecordwithFilter = $records[0]->allcount;

        ## Fetch records

        $this->db->select('player.player_id,player.player_name,typex.type_code');
        $this->db->from('player');
        $this->db->join('typex','typex.type_id = player.type_id');
        if ($searchQuery != '')
            $this->db->where($searchQuery);
        $this->db->order_by($columnName, $columnSortOrder);
        $this->db->limit($rowperpage, $start);
        $records = $this->db->get()->result();

        $data = array();

        foreach ($records as $record) {

            $data[] = array(
                "player_id" => $record->player_id,
                "player" => $record->player_name,
                "department" => $record->type_code,
            );
        }

        ## Response
        $response = array(
            "draw" => intval($draw),
            "iTotalRecords" => $totalRecords,
            "iTotalDisplayRecords" => $totalRecordwithFilter,
            "aaData" => $data
        );

        return $response;
    }

    function getWinner($postData = null)
    {

        $response = array();

        ## Read value
        $draw = $postData['draw'];
        $start = $postData['start'];
        $rowperpage = $postData['length']; // Rows display per page
        $columnIndex = $postData['order'][0]['column']; // Column index
        $columnName = $postData['columns'][$columnIndex]['data']; // Column name
        $columnSortOrder = $postData['order'][0]['dir']; // asc or desc
        $searchValue = $postData['search']['value']; // Search value

        ## Search 
        $searchQuery = "";
        if ($searchValue != '') {
            $searchQuery = " (player_name like '%" . $searchValue . "%' or type_code like '%" . $searchValue . "%' or statusx like '%" . $searchValue . "%') ";
        }

        ## Total number of records without filtering
        $this->db->select('count(*) as allcount');
        $this->db->from('winner');
        $this->db->join('player','winner.player_id = player.player_id');
        $this->db->join('typex','typex.type_id = player.type_id');
        $records = $this->db->get()->result();
        $totalRecords = $records[0]->allcount;

        ## Total number of record with filtering
        $this->db->select('count(*) as allcount');
        $this->db->from('winner');
        $this->db->join('player','winner.player_id = player.player_id');
        $this->db->join('typex','typex.type_id = player.type_id');
        if ($searchQuery != '')
            $this->db->where($searchQuery);
        $records = $this->db->get()->result();
        $totalRecordwithFilter = $records[0]->allcount;

        ## Fetch records

        $this->db->select('winner.winner_id,player.player_name,typex.type_code');
        $this->db->from('winner');
        $this->db->join('player','winner.player_id = player.player_id');
        $this->db->join('typex','typex.type_id = player.type_id');
        if ($searchQuery != '')
            $this->db->where($searchQuery);
        $this->db->order_by($columnName, $columnSortOrder);
        $this->db->limit($rowperpage, $start);
        $records = $this->db->get()->result();

        $data = array();

        foreach ($records as $record) {

            $data[] = array(
                "winner_id" => $record->winner_id,
                "winner" => $record->player_name,
                "department" => $record->type_code,
            );
        }

        ## Response
        $response = array(
            "draw" => intval($draw),
            "iTotalRecords" => $totalRecords,
            "iTotalDisplayRecords" => $totalRecordwithFilter,
            "aaData" => $data
        );

        return $response;
    }

    function show_role()
    {
        $query = $this->db->query("SELECT * FROM typex");
        return $query->result();
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

    function segment_name(){
        $query = $this->db->query("SELECT * FROM typex");
        return $query->result();
    }

    function total_segment(){
        $query = $this->db->query("SELECT count(*) AS counter FROM typex");
        return $query->result();
    }

}
