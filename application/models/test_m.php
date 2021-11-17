<?php

class Test_m extends CI_Model
{
    function __construct()
    {
        parent::__construct();
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
            $searchQuery = " (player_name like '%" . $searchValue . "%' or type_code like '%" . $searchValue . "%') ";
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
                "winners" => $record->player_name,
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
}
