<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Delete extends CI_Controller
{
    // delete code for student
    public function index()
    {
        $this->load->model('dlt');
        $data['students'] = $this->dlt->getDetails();
        $this->load->view('student', $data);
    }

    public function deleteStudent($id)
    {
        $this->load->model('dlt');
        $result = $this->dlt->delete($id);
        if ($result) {
            redirect('stud');
        }
    }

    // delete code for category
    public function deleteC()
    {
        $this->load->model('dlt');
        $data['categories'] = $this->dlt->getCategory();
        $this->load->view('category', $data);
    }

    public function deleteCat($id)
    {
        $this->load->model('dlt');
        $result = $this->dlt->deleteCat($id);
        if ($result) {
            redirect('stud/category');
        }
    }

    // delete code for head
    public function deleteH()
    {
        $this->load->model('dlt');
        $data['heads'] = $this->dlt->getHead();
        $this->load->view('head', $data);
    }

    public function deleteHead($id)
    {
        $this->load->model('dlt');
        $result = $this->dlt->deleteHead($id);
        if ($result) {
            redirect('stud/head');
        }
    }

    // delete code for head
    public function deleteF()
    {
        $this->load->model('dlt');
        $data['fees'] = $this->dlt->getF();
        $this->load->view('payfee', $data);
    }

    public function deleteFees($id)
    {
        $this->load->model('dlt');
        $result = $this->dlt->deleteFee($id);
        if ($result) {
            redirect('stud/fee');
        }
    }
}
