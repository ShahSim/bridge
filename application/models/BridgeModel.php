<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class BridgeModel extends CI_Model {


    function getInfo($table_name) {
        $query = $this->db->get($table_name);
        return $query->result();
    }
////Joining All Table
    function joinAllTable()
    {
        //$this->db->select('m.*, g.id as gid, s.id as sid, dp.id as dpid');
        $this->db->select('*');
        $this->db->from('master m');
        $this->db->join('google_map_link g', 'm.id = g.id');
        $this->db->join('submitted s', 'm.id = s.id');
        $this->db->join('design_phase dp', 'm.id = dp.id');

        $query = $this->db->get();
        return $query->result();
    }
/////Submitting information
    function insertMasterInfo($table_name, $data) {
        return $this->db->insert($table_name,$data);
    }
//////For edit and update
    function getEditInfo($table_name, $id)
    {
        $query = $this->db->get_where($table_name, ['id'=>$id]);
        return $query->row();
    }

    function updateInfo($table_name, $data, $id)
    {
        return $this->db->update($table_name, $data, ['id'=>$id]);
    }
///////

    function deleteInfo($id)
    {
        return $this->db->delete('master',['id'=>$id]);
    }
}

// $this->db->select('*');
// $this->db->from('blogs');
// $this->db->join('comments', 'comments.id = blogs.id',);
// $this->db->join('othertable', 'othertable.commentsId = comments.id');

// SELECT column_name(s)
// FROM table1
// INNER JOIN table2
// ON table1.column_name = table2.column_name
// INNER JOIN table3
// ON table1.column_name = table3.column_name;