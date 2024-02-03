<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dlt extends CI_Model
{
    // delete code for student
    public function getDetails()
    {
        $query = $this->db->get('student');
        if($query){
            return $query->result();
        }
    }

    public function delete($id)
    {
        $this->db->where('id', $id);
        $query = $this->db->delete('student');
        if($query){
            return true;
        }
        else {
            return false;
        }
    }

    // delete code for category
    public function getCategory()
    {
        $query = $this->db->get('category');
        if($query){
            return $query->result();
        }
    }

    public function deleteCat($id)
    {
        $this->db->where('id', $id);
        $query = $this->db->delete('category');
        if($query){
            return true;
        }
        else {
            return false;
        }
    }

    // delete code for head
    public function getHead()
    {
        $query = $this->db->get('head');
        if($query){
            return $query->result();
        }
    }

    public function deleteHead($id)
    {
        $this->db->where('id', $id);
        $query = $this->db->delete('head');
        if($query){
            return true;
        }
        else {
            return false;
        }
    }

    // delete code for head
    public function getF()
    {
        $query = $this->db->get('fees');
        if($query){
            return $query->result();
        }
    }

    public function deleteFee($id)
    {
        $this->db->where('id', $id);
        $query = $this->db->delete('fees');
        if($query){
            return true;
        }
        else {
            return false;
        }
    }

}
?>