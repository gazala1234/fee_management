<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Std extends CI_Model
{
    // method to fetch all the student records
    public function getStudents()
    {
        $query = $this->db->get('student');
        if($query){
            return $query->result();
        }
        else{
            return false;
        }
    }

    // method to fetch all the categories
    public function getCategories()
    {
        $query = $this->db->get('category');
        if($query){
            return $query->result();
        }
        else{
            return false;
        }
    }

    // method to fetch all the heads
    public function getHeads()
    {
        $query = $this->db->get('head');
        if($query){
            return $query->result();
        }
        else{
            return false;
        }
    }

    // method to fetch all the fee details
    public function getFees()
    {
        $query = $this->db->get('fees');
        if($query){
            return $query->result();
        }
        else{
            return false;
        }
    }

    // method to fetch PDF data based on fee ID
    // public function getPdf($id)
    // {
    //     $this->db->select('attachment');
    //     $this->db->where('id', $id);
    //     $query = $this->db->get('fees');

    //     if ($query->num_rows() > 0) {
    //         return $query->row()->attachment;
    //     } else {
    //         return false;
    //     }
    // }
}
?>
