<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Stud extends CI_Controller
{
    // student records
    public function index()
    {
        $this->load->model('std');
        $data['students'] = $this->std->getStudents();
        $this->load->view('student', $data);
    }

    // categories
    public function category()
    {
        $this->load->model('std');
        $data['categories'] = $this->std->getCategories();
        $this->load->view('category', $data);
    }

    // heads
    public function head()
    {
        $this->load->model('std');
        $data['heads'] = $this->std->getHeads();
        $this->load->view('head', $data);
    }

    // fees
    public function fee()
    {
        $this->load->model('std');
        $data['fees'] = $this->std->getFees();
        $this->load->view('payfee', $data);
    }

    // method to view PDF
    // public function view_pdf($id)
    // {
    //     $this->load->model('std');
    //     $pdfData = $this->std->getPdf($id);

    //     if ($pdfData) {
    //         header('Content-Type: application/pdf');
    //         header('Content-Disposition: inline; filename="document.pdf"');
    //         echo $pdfData;
    //     } else {
    //         // Handle the case where the PDF data is not available
    //         echo 'Error: Failed to load PDF document.';
    //     }        
    // }
}

?>
