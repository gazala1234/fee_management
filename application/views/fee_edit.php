<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php include 'boot.php'; ?>
</head>

<body>
    <form action="<?php echo base_url('edit_ctrl/updateFee/'); ?><?php echo $fees->id; ?>" method="post">
        <div class="container">
            <h3>Edit fee details</h3>
            <div class="form-group col-md-6">
                <label for="sid">Student ID</label>
                <input type="text" class="form-control" value="<?php echo $fees-> s_id; ?>" name="sid" id="sid"
                    placeholder="Enter student ID" required>
            </div>
            <div class="form-group col-md-6">
                <label for="name">Student Name</label>
                <input type="text" class="form-control" value="<?php echo $fees-> s_name; ?>" name="name" id="name"
                    placeholder="student name" required>
            </div>
            <div class="form-group col-md-6">
                <label for="std">Standard</label>
                <select class="form-control" name="std" id="std" required>
                    <option value="<?php echo $fees-> std; ?>"><?php echo $fees-> std; ?></option>
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
                    <option value="<?php echo $fees-> dv; ?>"><?php echo $fees-> dv; ?></option>
                    <option>A</option>
                    <option>B</option>
                    <option>C</option>
                    <option>D</option>
                </select>
            </div>
            <div class="form-group col-md-6">
                <label for="cname">Category name</label>
                <select class="form-control" id="cname" name="cname">
                    <option value="<?php echo $fees->c_name; ?>"><?php echo $fees->c_name; ?></option>
                    <?php foreach ($categories as $category) : ?>
                    <option value="<?php echo $category->c_name; ?>">
                        <?php echo $category->c_name; ?>
                    </option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="form-group col-md-6">
                <label for="hname">Head name</label>
                <select class="form-control" id="hname" name="hname">
                    <option value="<?php echo $fees->h_name; ?>"><?php echo $fees->h_name; ?></option>
                    <?php foreach ($heads as $head) : ?>
                    <option value="<?php echo $head->h_name; ?>">
                        <?php echo $head->h_name; ?>
                    </option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="form-group col-md-6">
                <label for="fixamnt">Fixed Amount</label>
                <input type="number" class="form-control" value="<?php echo $fees-> fix_amount; ?>" name="fixamnt"
                    id="fixamnt" disabled>
            </div>
            <div class="form-group col-md-6">
                <label for="payamnt">Pay Amount</label>
                <input type="number" class="form-control" value="<?php echo $fees-> pay_amount; ?>" name="payamnt"
                    id="payamnt">
                <!-- <p>Make sure that pay amount cannot exceed the fixed amount.</p> -->
            </div>
            <button type="submit" class="btn btn-primary mb-3">Edit</button>
        </div>

        </div>
    </form>

    <script>
    // Pay Amount Validation
    $(document).ready(function() {
        $('#payamnt').on('input', function() {
            var pAmount = parseFloat($("#payamnt").val());
            var fAmount = parseFloat($("#fixamnt").text());

            console.log('pAmount:', pAmount);
            console.log('fAmount:', fAmount);

            if (isNaN(pAmount)) {
                $("#payamnt").val("");
            } else {
                if (isNaN(fAmount)) {
                    console.log('Fix amount is not a number:', $("#fixamnt").text());
                } else if (pAmount > fAmount) {
                    alert("Pay amount cannot exceed the fixed amount.");
                    $("#payamnt").val(fAmount);
                }
            }
        });
    });
    </script>

</body>

</html>