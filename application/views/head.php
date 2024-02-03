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
        <h2>Heads</h2>
        <table class="table">
            <thead>
                <tr>
                    <th>Sno</th>
                    <th>Branch ID</th>
                    <th>Category Name</th>
                    <th>Head ID</th>
                    <th>Head Name</th>
                    <th>Amount</th>
                    <!-- <th>Status</th> -->
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php if (isset($heads) && !empty($heads)): ?>
                <?php $sno = 1;?>
                <?php foreach ($heads as $head): ?>
                <tr>
                    <td><?php echo $sno; ?></td>
                    <td><?php echo $head->b_id; ?></td>
                    <td><?php echo $head->c_name; ?></td>
                    <td><?php echo $head->h_id; ?></td>
                    <td><?php echo $head->h_name; ?></td>
                    <td><?php echo $head->amount; ?></td>
                    <!-- <td><?php echo $head->status; ?></td> -->
                    <td>
                        <a class="btn btn-outline-success mt-1"
                            href="<?php echo base_url('edit_ctrl/modify/'); ?><?php echo $head->id; ?>">
                            Edit</a>
                        <a class="btn btn-outline-danger mt-1"
                            href="<?php echo base_url('delete/deleteHead/'); ?><?php echo $head->id; ?>"
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