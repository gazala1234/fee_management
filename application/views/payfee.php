<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php include 'boot.php'; ?>
</head>

<body>
    <div>
        <h2>Student Details</h2>
        <table class="table">
            <thead>
                <tr>
                    <th>Sno</th>
                    <th>Standard</th>
                    <th>Division</th>
                    <th>Student_ID</th>
                    <th>Student_name</th>
                    <th>Category</th>
                    <th>Head</th>
                    <th>Fix_Amount</th>
                    <th>Pay_Amount</th>
                    <!-- <th>Attachment</th> -->
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php if (isset($fees) && !empty($fees)): ?>
                <?php $sno = 1;?>
                <?php foreach ($fees as $fee): ?>
                <tr>
                    <td><?php echo $sno; ?></td>
                    <td><?php echo $fee->std; ?></td>
                    <td><?php echo $fee->dv; ?></td>
                    <td><?php echo $fee->s_id; ?></td>
                    <td><?php echo $fee->s_name; ?></td>
                    <td><?php echo $fee->c_name; ?></td>
                    <td><?php echo $fee->h_name; ?></td>
                    <td><?php echo $fee->fix_amount; ?></td>
                    <td><?php echo $fee->pay_amount; ?></td>
                    <!-- <td>
                        <?php if ($fee->attachment): ?>
                        <a href="<?php echo base_url('stud/view_pdf/') . $fee->id; ?>" target="_blank" style="text-decoration: none;">
                            View PDF
                        </a>
                        <?php else: ?>
                            No attachment
                        <?php endif; ?>
                    </td> -->
                    <td>
                        <a class="btn btn-outline-success mt-1"
                            href="<?php echo base_url('edit_ctrl/change/'); ?><?php echo $fee->id; ?>">
                            Edit</a>
                        <a class="btn btn-outline-danger mt-1"
                            href="<?php echo base_url('delete/deleteFees/'); ?><?php echo $fee->id; ?>"
                            onclick="return confirmDelete();">Delete
                        </a>
                    </td>
                </tr>
                <?php $sno++;?>
                <?php endforeach?>
                <?php else: ?>
                <tr>
                    <td colspan="6" class="text-center">No records found.</td>
                </tr>
                <?php endif;?>
            </tbody>
        </table>
    </div>

    <script>
    function confirmDelete() {
        return confirm("Are you sure you want to delete this record?");
    }
    </script>
</body>

</html>