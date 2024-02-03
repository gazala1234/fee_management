<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php include 'boot.php';?>
</head>

<body>
    <form action="<?php echo base_url('edit_ctrl/updateCat/') ?><?php echo $category->id; ?>" method="post">
    <div class="container">
        <h3>Edit category</h3>
        <div class="form-group col-md-6">
            <label for="cid">Category ID</label>
            <input type="text" class="form-control" value="<?php echo $category->c_id; ?>" name="cid" id="cid" placeholder="Enter category ID">
        </div>
        <div class="form-group col-md-6">
            <label for="cname">Category name</label>
            <select class="form-control" id="cname" name="cname">
                <option><?php echo $category->c_name; ?></option>
                <option>Package</option>
                <option>Regular</option>
                <option>RTE</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Edit</button>
    </div>
    </form>
</body>

</html>