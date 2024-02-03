<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Sc extends CI_Controller
{

    public function index()
    {
        $this->load->view('signup');
    }

    public function emp()
    {
        $this->load->model('Sign');

        // Set validation rules
        $this->form_validation->set_rules('bid', 'Branch Identity', 'required');
        $this->form_validation->set_rules('id', 'Identity', 'required');
        $this->form_validation->set_rules('name', 'Name', 'required');
        $this->form_validation->set_rules('phone', 'Phone', 'required');
        $this->form_validation->set_rules('mail', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('pass', 'Password', 'required');

        if ($this->form_validation->run() == FALSE) {
            echo "<script>
                    alert('Please fill out the all fields proprly');
                    window.location.href = '" . base_url('sc') . "';
                </script>";
        } 
        else {
            $bid = $this->input->post('bid');
            $id = $this->input->post('id');
            $name = $this->input->post('name');
            $phone = $this->input->post('phone');
            $email = $this->input->post('mail');
            $password = $this->input->post('pass');

            // Validate if the email is already registered
            $isEmailExists = $this->Sign->isEmailExists($email);
            if ($isEmailExists) {
                echo "<script>
                    alert('Email already registered. Please choose a different email.');
                    window.location.href = '" . base_url('sc') . "';
                </script>";
                return;
            }

            $data = array(
                'b_id' => $bid,
                'a_id' => $id,
                'name' => $name,
                'phone' => $phone,
                'email' => $email,
                'password' => md5($password)
            );

            $result = $this->Sign->insertData($data);

            if ($result) {
                echo "<script>alert('Registered successfully!');
                            window.location.href = '" . base_url('lg') . "';
                    </script>";
            } else {
                echo "<script>alert('Registration failed!');
                            window.location.href = '" . base_url('sc') . "';
                    </script>";
            }
        }
    }
}
?>
