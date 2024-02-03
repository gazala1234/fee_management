<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Log extends CI_Model
{

    public function getUserByEmail($email)
    {
        $this->load->database();
        // Assuming you have a 'signup' table in your database
        $query = $this->db->get_where('admin', array('email' => $email));

        // Return the user data or null if not found
        return $query->row_array();
    }
}
?>
