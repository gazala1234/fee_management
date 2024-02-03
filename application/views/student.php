<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php include 'boot.php'; ?>
</head>

<body>
    <div class="container">
        <h2>Student Details</h2>
        <table class="table">
            <thead>
                <tr>
                    <th>Sno</th>
                    <th>Student ID</th>
                    <th>Name</th>
                    <th>Standard</th>
                    <th>Division</th>
                    <th>Branch ID</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php if (isset($students) && !empty($students)): ?>
                <?php $sno = 1;?>
                <?php foreach ($students as $student): ?>
                <tr>
                    <td><?php echo $sno; ?></td>
                    <td><?php echo $student->s_id; ?></td>
                    <td><?php echo $student->s_name; ?></td>
                    <td><?php echo $student->std; ?></td>
                    <td><?php echo $student->dv; ?></td>
                    <td><?php echo $student->b_id; ?></td>
                    <td>
                        <a class="btn btn-outline-success mt-1"
                            href="<?php echo base_url('edit_ctrl/edit/'); ?><?php echo $student->id; ?>">
                            Edit</a>
                        <a class="btn btn-outline-danger mt-1"
                            href="<?php echo base_url('delete/deleteStudent/'); ?><?php echo $student->id; ?>"
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