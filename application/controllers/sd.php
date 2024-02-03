<?php

class Sd extends CI_Controller
{

    // to load the sidebar
    public function index()
    {
        if($this->session->userdata('loggedin')){
            $data['admin'] = $this->session->userdata('name');
        }
        else{
            $data['admin'] = null;
        }
        $this->load->model('Insert');
        $data['categories'] = $this->Insert->getCategoryNames();
        $this->load->view('side', $data);
    }

    // code for logout
    public function logout()
    {
        $this->load->view('logout');
    }

    // student insert code
    public function student()
    {
        $this->load->model('Insert');

        $sid = $this->input->post('sid');
        $name = $this->input->post('name');
        $std = $this->input->post('std');
        $div = $this->input->post('dv');
        $bid = $this->input->post('bid');
        $cname = $this->input->post('cname');

        // Validate if the student is already inserted
        $isStudentExists = $this->Insert->isStudentExists($sid);
        if ($isStudentExists) {
            echo "<script>
                    alert('Student already exist.');
                    window.location.href = '" . base_url('sd') . "';
                </script>";
            return;
        }

        $data = array(
            's_id' => $sid,
            's_name' => $name,
            'std' => $std,
            'dv' => $div,
            'b_id' => $bid,
            'c_name' => $cname
        );

        $result = $this->Insert->insertStudent($data);

        if ($result) {
            echo "<script>alert('Student record added successfully');
                            window.location.href = '" . base_url('sd') . "';
                    </script>";
        } else {
            echo "<script>alert('Failed to add the record');
                            window.location.href = '" . base_url('sd') . "';
                    </script>";
        }
    }

    // create head
    public function head()
    {
        $this->load->model('Insert');

        $bid = $this->input->post('bid');
        $cname = $this->input->post('cname');
        $hid = $this->input->post('hid');
        $hname = $this->input->post('hname');
        $amount = $this->input->post('amount');

        // Validate if head is already created
        $isHeadExists = $this->Insert->isHeadExists($bid, $cname, $hid, $hname);
        if ($isHeadExists) {
            echo "<script>
                    alert('Head already created for this branch and category');
                    window.location.href = '" . base_url('sd') . "';
                </script>";
            return;
        }

        $data = array(
            'b_id' => $bid,
            'c_name' => $cname,
            'h_id' => $hid,
            'h_name' => $hname,
            'amount' => $amount,
        );

        $result = $this->Insert->insertHead($data);

        if ($result) {
            echo "<script>alert('Head created successfully');
                            window.location.href = '" . base_url('sd') . "';
                    </script>";
        } else {
            echo "<script>alert('Failed to create head');
                            window.location.href = '" . base_url('sd') . "';
                    </script>";
        }
    }

    // create category
    public function category()
    {
        $this->load->model('Insert');

        $cid = $this->input->post('cid');
        $cname = $this->input->post('cname');

        // Validate if category is already created
        $isIdExists = $this->Insert->isIdExists($cid);
        if ($isIdExists) {
            echo "<script>
                    alert('Please enter unique category id.');
                    window.location.href = '" . base_url('sd') . "';
                </script>";
            return;
        }

        // Validate if category is already created
        $isNameExists = $this->Insert->isNameExists($cname);
        if ($isNameExists) {
            echo "<script>
                    alert('Category name exist.');
                    window.location.href = '" . base_url('sd') . "';
                </script>";
            return;
        }

        $data = array(
            'c_id' => $cid,
            'c_name' => $cname,
        );

        $result = $this->Insert->insertCategory($data);

        if ($result) {
            echo "<script>alert('Category created successfully');
                            window.location.href = '" . base_url('sd') . "';
                    </script>";
        } else {
            echo "<script>alert('Failed to create category');
                            window.location.href = '" . base_url('sd') . "';
                    </script>";
        }
    }

    // fees pay code
    public function fee()
    {
        $this->load->model('Insert');

        $std = $this->input->post('std');
        $div = $this->input->post('dv');
        $sid = $this->input->post('sid');
        $sname = $this->input->post('stname');
        $cname = $this->input->post('cname');
        $hname = $this->input->post('hname');
        $famount = $this->input->post('fixamt');
        $amount = $this->input->post('pamount');
        $attach = $this->input->post('file');

        $data = array(
            'std' => $std,
            'dv' => $div,
            's_id' => $sid,
            's_name' => $sname,
            'c_name' => $cname,
            'h_name' => $hname,
            'fix_amount' => $famount,
            'pay_amount' => $amount,
            'attachment' => $attach
        );

        $result = $this->Insert->payFee($data);

        if ($result) {
            echo "<script>alert('fee paid successfully');
                            window.location.href = '" . base_url('sd') . "';
                    </script>";
        } else {
            echo "<script>alert('Failed to pay the fee');
                            window.location.href = '" . base_url('sd') . "';
                    </script>";
        }
    }
}
?>
