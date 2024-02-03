<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Lg extends CI_Controller
{

    public function index()
    {
        // $this->load->helper('url');
        $this->load->view('login');
    }

    public function Login()
    {
        $this->load->model('Log');

        // Set validation rules
        $this->form_validation->set_rules('mail', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('pass', 'Password', 'required');

        if ($this->form_validation->run() == FALSE) {
            echo "<script>
                    alert('Please fill out the all fields proprly');
                    window.location.href = '" . base_url('lg') . "';
                </script>";
            $this->load->view('login');
        } 
        
        else {
            $email = $this->input->post('mail');
            $password = $this->input->post('pass');

            // Validate the user credentials
            $user = $this->Log->getUserByEmail($email);

            if ($user) {
                // Verify the entered password against the stored MD5 hash
                if (md5($password) === $user['password']) {
                    
                    $this->session->set_userdata('loggedin', true);
                    $this->session->set_userdata('email', $email);
                    $this->session->set_userdata('password', $password);

                    redirect('sd');
                } 
                else {
                    echo "<script>alert('Login failed. Invalid password.');
                                window.location.href = '" . base_url('lg') . "';
                    </script>";
                }
            } 
            else {
                echo "<script>alert('Login failed. User not found.');
                            window.location.href = '" . base_url('lg') . "';
                </script>";
            }
        }
    }
}
?>
