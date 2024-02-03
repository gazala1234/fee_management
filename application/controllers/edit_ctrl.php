<?php

class Edit_ctrl extends CI_Controller
{
    //student update
    public function edit($id)
    {
        $this->load->model('edit_model');
        $data['student'] = $this->edit_model->getStudents($id);
        $this->load->view('student_edit', $data);
    }

    public function updateStud($id)
    {
        $this->load->model('edit_model');
        $result = $this->edit_model->updateS(
            [
                's_id' => $this->input->post('sid'),
                's_name' => $this->input->post('name'),
                'std' => $this->input->post('std'),
                'dv' => $this->input->post('dv'),
                'b_id' => $this->input->post('bid'),
            ],
            $id
        );
        if ($result) {
            echo "<script>
                alert('Record updated successfully');
                window.location.href = '" . base_url('stud') . "';
            </script>";
        } else {
            echo "<script>
                alert('Record update failed');
                window.location.href = '" . base_url('edit_ctrl/edit/' . $id) . "';
            </script>";
        }
    }

    //category update
    public function update($id)
    {
        $this->load->model('edit_model');
        $data['category'] = $this->edit_model->getC($id);
        $this->load->view('cat_edit', $data);
    }

    public function updateCat($id)
    {
        $this->load->model('edit_model');
        $result = $this->edit_model->updateC(
            [
                'c_id' => $this->input->post('cid'),
                'c_name' => $this->input->post('cname')
            ],
            $id
        );
        if ($result) {
            echo "<script>
                alert('Record updated successfully');
                window.location.href = '" . base_url('delete/deleteC') . "';
            </script>";
        } else {
            echo "<script>
                alert('Record update failed');
                window.location.href = '" . base_url('edit_ctrl/update/' . $id) . "';
            </script>";
        }
    }

    // head update
    public function modify($id)
    {
        $this->load->model('edit_model');
        $data['head'] = $this->edit_model->getH($id);
        $data['categories'] = $this->edit_model->getCategories();
        $this->load->view('head_edit', $data);
    }

    public function updateHead($id)
    {
        $this->load->model('edit_model');
        $result = $this->edit_model->updateH(
            [
                'b_id' => $this->input->post('bid'),
                'c_name' => $this->input->post('cname'),
                'h_id' => $this->input->post('hid'),
                'h_name' => $this->input->post('hname'),
                'amount' => $this->input->post('amount')
            ],
            $id
        );
        if ($result) {
            echo "<script>
                alert('Record updated successfully');
                window.location.href = '" . base_url('delete/deleteH') . "';
            </script>";
        } else {
            echo "<script>
                alert('Record update failed');
                window.location.href = '" . base_url('edit_ctrl/modify/' . $id) . "';
            </script>";
        }
    }

    //fees update
    public function change($id)
    {
        $this->load->model('edit_model');
        $data['fees'] = $this->edit_model->getF($id);
        $data['categories'] = $this->edit_model->getCategory();
        $data['heads'] = $this->edit_model->getHead();
        $this->load->view('fee_edit', $data);
    }

    public function updateFee($id)
    {
        $this->load->model('edit_model');
        $result = $this->edit_model->updateF(
            [
                'std' => $this->input->post('std'),
                'dv' => $this->input->post('dv'),
                's_id' => $this->input->post('sid'),
                's_name' => $this->input->post('name'),
                'c_name' => $this->input->post('cname'),
                'h_name' => $this->input->post('hname'),
                // 'fix_amount' => $this->input->post('fixamnt'),
                'pay_amount' => $this->input->post('payamnt')
            ],
            $id
        );
        if ($result) {
            echo "<script>
                alert('Record updated successfully');
                window.location.href = '" . base_url('stud/fee') . "';
            </script>";
        } else {
            echo "<script>
                alert('Record update failed');
                window.location.href = '" . base_url('edit_ctrl/change/' . $id) . "';
            </script>";
        }
    }

}
?>
