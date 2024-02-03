<?php
class Payfee extends CI_Controller
{
    // function to fetch the standards
    public function index()
    {
        $this->load->model('feepay');
        $data['standards'] = $this->feepay->getStd();
        $data['categories'] = $this->feepay->getCat();
        $this->load->view("fee", $data);
    }

    // function to fetch the divisions
    public function getD()
    {
        $std = $this->input->post("std");
        $this->load->model("feepay");
        $this->feepay->getDiv($std);
    }

    // function to fetch the student name
    public function getStudentName() {
        $sid = $this->input->post("sid");
        $this->load->model("feepay");
        $student = $this->feepay->getStudent($sid);
        echo $student;
    }

    // function to fetch the student name
    public function getCategory() {
        $sid = $this->input->post("sid");
        $this->load->model("feepay");
        $cname = $this->feepay->getC($sid);
        echo $cname;
    }

    // function to fetch the head
    public function getH()
    {
        $cname = $this->input->post("catname");
        $this->load->model("feepay");
        $this->feepay->getHead($cname);
    }

    // function to fetch the fix amount
    public function getFixedAmount()
    {
        $hname = $this->input->post("hname");
        $cname = $this->input->post("category");
        $this->load->model("feepay");
        $student = $this->feepay->getAmount($hname, $cname);
        echo $student;
    }
}
?>
