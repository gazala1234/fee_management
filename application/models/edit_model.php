<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Edit_model extends CI_Model
{
    // student update
    public function getStudents($id)
    {
        $this->db->where('id', $id);
        $query = $this->db->get('student');
        if ($query) {
            return $query->row();
        }
    }
    public function updateS($data, $id)
    {
        $this->db->where('id', $id);
        $query = $this->db->update('student', $data);
        if ($query) {
            return true;
        } else {
            return false;
        }
    }

    // category update
    public function getC($id)
    {
        $this->db->where('id', $id);
        $query = $this->db->get('category');
        if ($query) {
            return $query->row();
        }
    }
    public function updateC($data, $id)
    {
        $this->db->where('id', $id);
        $query = $this->db->update('category', $data);
        if ($query) {
            return true;
        } else {
            return false;
        }
    }

    // head update
    public function getH($id)
    {
        $this->db->where('id', $id);
        $query = $this->db->get('head');
        if ($query) {
            return $query->row();
        }
    }
    public function getCategories()
    {
        $this->db->distinct();
        $this->db->select('c_name');
        $query = $this->db->get('category');
        return $query->result();
    }
    public function updateH($data, $id)
    {
        $this->db->where('id', $id);
        $query = $this->db->update('head', $data);
        if ($query) {
            return true;
        } else {
            return false;
        }
    }

    // fee update
    public function getF($id)
    {
        $this->db->where('id', $id);
        $query = $this->db->get('fees');
        if ($query) {
            return $query->row();
        }
    }
    public function getCategory()
    {
        $query = $this->db->get('category');
        return $query->result();
    }
    public function getHead()
    {
        $this->db->distinct();
        $this->db->select('h_name');
        $query = $this->db->get('head');
        return $query->result();
    }
    public function updateF($data, $id)
    {
        $this->db->where('id', $id);
        $query = $this->db->update('fees', $data);
        if ($query) {
            return true;
        } else {
            return false;
        }
    }

}
?>