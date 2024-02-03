<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Insert extends CI_model {

    // Student insertion code
    public function isStudentExists($sid)
    {
        $this->db->where('s_id', $sid);
        $query = $this->db->get('student');
        return $query->num_rows() > 0;
    }
    
    public function insertStudent($data)
	{
        $this->db->insert('student', $data);
        if ($this->db->affected_rows() > 0) {
            return true;
        } else {
            return false;
        }
	}

    // Head insertion code
    public function insertHead($data)
	{
        $this->db->insert('head', $data);
        if ($this->db->affected_rows() > 0) {
            return true;
        } else {
            return false;
        }
	}

    public function getCategoryNames()
    {
        return $this->db->query("select distinct c_name, c_id from category")->result();
    }

    public function isHeadExists($bid, $cname, $hid, $hname)
    {
        $this->db->where(array(
            'b_id' => $bid,
            'c_name' => $cname,
            'h_id' => $hid,
            'h_name' => $hname
        ));
        $query = $this->db->get('head');
        return $query->num_rows() > 0;
    }

    // category insertion code
    public function insertCategory($data)
	{
        $this->db->insert('category', $data);
        if ($this->db->affected_rows() > 0) {
            return true;
        } else {
            return false;
        }
	}

    public function isIdExists($cid)
    {
        $this->db->where('c_id', $cid);
        $query = $this->db->get('category');
        return $query->num_rows() > 0;
    }

    public function isNameExists($cname)
    {
        $this->db->where('c_name', $cname);
        $query = $this->db->get('category');
        return $query->num_rows() > 0;
    }

    // fee pay code
    public function payFee($data)
	{

        $this->db->insert('fees', $data);
        if ($this->db->affected_rows() > 0) {
            return true;
        } else {
            return false;
        }
	}
}
?>
