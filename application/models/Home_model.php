<?php
defined('BASEPATH') or exit('No direct script access allowed');
final class Home_model extends CI_Model
{
    // -----insert category-----
    public function insert_task($data)
    {
        $res = $this->db->insert('app_list', $data);
        if ($res) {
            return true;
        } else {
            return false;
        }
    }
    public function view_task()
    {
        $this->db->select('*');
        $this->db->from('app_list');
        $res = $this->db->get()->result();
        if ($res) {
            return $res;
        } else {
            return false;
        }
    }
    //public function view_single($id)
    //{
    //    $this->db->select("*");
    //    $this->db->from("app_list");
    //    $this->db->where('id', $id);
    //    $res = $this->db->get()->row();
    //    return ($res);
    //}
    public function update_list($id, $data)
    {
        $this->db->where('id', $id);
        $res = $this->db->update('app_list', $data);
        if ($res) {
            return "Task Update successfully";
        } else {
            return "failed to update";
        }
    }
    public function delete_task($id)
    {
        $this->db->where('id', $id);
        $res = $this->db->delete('app_list');
        if ($res) {
            return true;
        } else {
            return false;
        }
    }
}