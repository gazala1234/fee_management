<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php include 'boot.php'; ?>
</head>

<body>
    <form action="<?php echo base_url('edit_ctrl/updateStud/'); ?><?php echo $student->id; ?>" method="post">
        <div class="container">
            <h3>Edit student details</h3>
            <div class="form-group col-md-6">
                <label for="sid">Student ID</label>
                <input type="text" class="form-control" value="<?php echo $student-> s_id; ?>" name="sid" id="sid" placeholder="Enter student ID" required>
            </div>
            <div class="form-group col-md-6">
                <label for="name">Student Name</label>
                <input type="text" class="form-control" value="<?php echo $student-> s_name; ?>" name="name" id="name" placeholder="student name" required>
            </div>
            <div class="form-group col-md-6">
                <label for="std">Standard</label>
                <select class="form-control" name="std" id="std" required>
                    <option value="<?php echo $student-> std; ?>" ><?php echo $student-> std; ?></option>
                    <option>1st</option>
                    <option>2nd</option>
                    <option>3rd</option>
                    <option>4th</option>
                    <option>5th</option>
                    <option>6th</option>
                    <option>7th</option>
                    <option>8th</option>
                    <option>9th</option>
                    <option>10th</option>
                </select>
            </div>
            <div class="form-group col-md-6">
                <label for="dv">Division</label>
                <select class="form-control" name="dv" id="dv" required>
                    <option value="<?php echo $student-> dv; ?>"><?php echo $student-> dv; ?></option>
                    <option>A</option>
                    <option>B</option>
                    <option>C</option>
                    <option>D</option>
                </select>
            </div>
            <div class="form-group col-md-6">
                <label for="bid">Branch ID</label>
                <input type="text" class="form-control" value="<?php echo $student-> b_id; ?>" name="bid" id="bid" placeholder="Enter division" required>
            </div>
            <button type="submit" class="btn btn-primary mb-3">Edit</button>
        </div>
        
        </div>
    </form>
</body>

</html>
