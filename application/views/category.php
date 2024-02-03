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
        <h2>Categories</h2>
        <table class="table">
            <thead>
                <tr>
                    <th>Sno</th>
                    <th>Category ID</th>
                    <th>Category Name</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php if (isset($categories) && !empty($categories)): ?>
                <?php $sno = 1;?>
                <?php foreach ($categories as $category): ?>
                <tr>
                    <td><?php echo $sno; ?></td>
                    <td><?php echo $category->c_id; ?></td>
                    <td><?php echo $category->c_name; ?></td>
                    <td>
                        <a class="btn btn-outline-success mt-1"
                            href="<?php echo base_url('edit_ctrl/update/') ?><?php echo $category->id; ?>">
                            Edit</a>
                        <a class="btn btn-outline-danger mt-1"
                            href="<?php echo base_url('delete/deleteCat/'); ?><?php echo $category->id; ?>"
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