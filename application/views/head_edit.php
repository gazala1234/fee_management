<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php include 'boot.php'; ?>
</head>

<body>
    <form action="<?php echo base_url('edit_ctrl/updateHead/'); ?><?php echo $head->id; ?>" method="post">
        <div class="container">
            <h3>Edit student details</h3>
            <div class="form-group col-md-6">
                <label for="bid">Branch ID</label>
                <input type="text" class="form-control" value="<?php echo $head->b_id; ?>" name="bid" id="bid" placeholder="Enter branch ID" required>
            </div>
            <div class="form-group col-md-6">
                <label for="cname">Category name</label>
                <select class="form-control" id="cname" name="cname">
                <option value="<?php echo $head->c_name; ?>"><?php echo $head->c_name; ?></option>
                    <?php foreach ($categories as $category) : ?>
                        <option value="<?php echo $category->c_name; ?>">
                            <?php echo $category->c_name; ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="form-group col-md-6">
                <label for="hid">Head ID</label>
                <input type="text" class="form-control" value="<?php echo $head->h_id; ?>" name="hid" id="hid" placeholder="Enter head id">
            </div>
            <div class="form-group col-md-6">
                <label for="hname">Head name</label>
                <input type="text" class="form-control" value="<?php echo $head->h_name; ?>" name="hname" id="hname" placeholder="Enter head name">
            </div>
            <div class="form-group col-md-6">
                <label for="amount">Amount</label>
                <input type="number" class="form-control" value="<?php echo $head->amount; ?>" name="amount" id="amount" placeholder="Enter amount">
            </div>
            <button type="submit" class="btn btn-primary mb-3">Edit</button>
        </div>

        </div>
    </form>
</body>

</html>
