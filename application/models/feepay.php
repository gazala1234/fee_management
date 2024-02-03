<?php

class Feepay extends CI_Model
{
    // to fetch the distinct standards
    public function getStd()
    {
        return $this->db->query("select distinct std from student")->result();
    }

    // to fetch the distinct divisions
    public function getDiv($std)
    {
        $query = $this->db->query("select distinct dv from student where std = '$std'")->result();
        $t = '<option value="">Select division</option>';
        foreach ($query as $d) {
            $div = $d->dv;
            $t .= "<option value='$div' > $div</option>";
        }
        echo $t;
    }

    // to fetch the student name
    public function getStudent($sid) 
    {
        $query = $this->db->query("SELECT s_name FROM student WHERE s_id = '$sid'");
        $result = $query->row();
        return ($result) ? $result->s_name : "Student not found";
    }

    // to fetch the category name
    public function getC($sid) 
    {
        $query = $this->db->query("SELECT c_name FROM student WHERE s_id = '$sid'");
        $result = $query->row();
        return ($result) ? $result->c_name : "Category not found";
    }

    // to fetch the category
    public function getCat()
    {
        return $this->db->query("select distinct c_name from category")->result();
    }

    // to fetch the distinct head
    public function getHead($cname)
    {
        $query = $this->db->query("select h_name,c_name from head where c_name = '$cname'");
        $result = $query->result();

        $t = '<option value="">Select head</option>';
        foreach ($result as $r) {
            $head = $r->h_name;
            $cat = $r->c_name;
            $t .= '<option value="' . $head . '" catname="' . $cat . '">' . $head . '</option>';
        }
        echo $t;
    }

    // to fetch the fixed head amount
    public function getAmount($hname, $cname)
    {
        $query = $this->db->query("SELECT amount FROM head WHERE h_name = '$hname' and c_name = '$cname'");
        $result = $query->row();
        return ($result) ? $result->amount : "Head not found";
    }

}
