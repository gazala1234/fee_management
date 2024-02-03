<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sign extends CI_model {

    public function isEmailExists($email)
    {
        $this->db->where('email', $email);
        $query = $this->db->get('admin');

        return $query->num_rows() > 0;
    }
    
    public function insertData($data)
	{
        $this->db->insert('admin', $data);
        if ($this->db->affected_rows() > 0) {
            return true;
        } else {
            return false;
        }
	}
}
?>