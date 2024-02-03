<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php include 'boot.php';?>
</head>

<body>
    <form action="<?php echo base_url('sd/fee'); ?>" method="post">
        <div class="container">
            <h3>Fee Details</h3>
            <div class="form-group col-md-6">
                <label>Standard</label>
                <select class="form-control" name="std" id="std" required>
                    <option value="">Select standard</option>
                    <?php
                        foreach ($standards as $stand) {
                            echo '<option value="' . $stand->std . '" stdid="' . $stand->std . '">' . $stand->std . '</option>';
                        }
                    ?>
                </select>
            </div>
            <div class="form-group col-md-6">
                <labe>Division</label>
                    <select class="form-control" name="dv" id="dv" required>
                        <option value="">Select division</option>
                    </select>
            </div>
            <div class="form-group col-md-6">
                <label>Student ID</label>
                <input type="text" class="form-control" name="sid" id="sid" placeholder="Enter student ID" disabled />
            </div>
            <div class="form-group col-md-6">
                <label id="sname">Student Name:</label>
                <input type="hidden" name="stname" id="stname">
                <div id="student"></div>
            </div>
            <div class="form-group col-md-6">
                <label id="cat">Student category:</label>
                <input type="hidden" name="cname" id="cname">
                <div id="category"></div>
            </div>
            <div class="form-group col-md-6">
                <label>Head name</label>
                <select class="form-control" name="hname" id="hname">
                    <option value="">Select Head</option>
                </select>
            </div>
            <div class="form-group col-md-6">
                <input type="hidden" name="fixamt" id="fixamt">
                <label id="famount">Fixed-Amount</label>
                <div id="fixamount"></div>
            </div>
            <div class="form-group col-md-6">
                <label>Pay-Amount</label>
                <input type="number" class="form-control" name="pamount" id="pamount" placeholder="Enter amount">
            </div>
            <div class="form-group col-md-6">
                <label>Attachment if any</label>
                <input type="file" class="form-control" name="file" id="file">
            </div>
            <button type="submit" class="btn btn-primary mb-3">Pay fees</button>
        </div>
    </form>

    <script>
    //display the division after selecting the standard
    $(document).ready(function() {
        $('#std').change(function() {
            var id = $("#std option:selected").attr("stdid");
            var std = $("#std").val();
            var url = "<?php echo base_url('payfee/getD') ?>";
            $.ajax({
                url: url,
                method: 'post',
                data: {
                    "std": std
                },
                success: function(data) {
                    $('#sid').prop('disabled', false);
                    $("#dv").html(data);
                }
            });
        });

        //get the student name after entering student id
        $('#sname').hide();
        $('#sid').on('input', function() {
            var sid = $(this).val();
            var url = "<?php echo base_url('payfee/getStudentName') ?>";
            $.ajax({
                url: url,
                method: 'post',
                data: {
                    "sid": sid
                },
                success: function(data) {
                    if (data) {
                        $('#sname').show();
                        $("#student").html(data);
                        $("#stname").val(data);
                    } else {
                        $('#sname').show();
                        $("#student").html(data);
                        $("#stname").val('');
                    }
                }
            });
        });

        //get the category name after entering student id
        $('#cat').hide();
        $('#sid').on('input', function() {
            var sid = $(this).val();
            var url = "<?php echo base_url('payfee/getCategory') ?>";
            $.ajax({
                url: url,
                method: 'post',
                data: {
                    "sid": sid
                },
                success: function(data) {
                    if (data) {
                        $('#cat').show();
                        $("#category").html(data);
                        $("#cname").val(data);
                    } else {
                        $('#cat').show();
                        $("#category").html(data);
                        $("#cname").val('');
                    }
                }
            });
        });

        // Display heads based on the selected category
        $('#cname').on('input', function() {
            var catname = $("#cname").val();
            var url = "<?php echo base_url('payfee/getH') ?>";
            $.ajax({
                url: url,
                method: 'post',
                data: {
                    "catname": catname
                },
                success: function(data) {
                    console.log("Heads Data:", data);
                    $("#hname").html(data);
                }
            });
        });


        //get the fixed amount after selecting the head
        $('#famount').hide();
        $('#hname').on('input', function() {
            var cat = $("#hname option:selected").attr("catname");
            var head = $(this).val();
            var url = "<?php echo base_url('payfee/getFixedAmount') ?>";
            $.ajax({
                url: url,
                method: 'post',
                data: {
                    "hname": head,
                    "category": cat
                },
                success: function(data) {
                    if (data) {
                        $('#famount').show();
                        $("#fixamount").html(data);
                        $("#fixamt").val(data);
                    } else {
                        $('#famount').show();
                        $("#fixamount").html(data);
                        $("#fixamt").val('');
                    }
                }
            });
        });

        // Pay Amount Validation
        $('#pamount').on('input', function() {
            var pAmount = parseFloat($("#pamount").val());
            var fAmount = parseFloat($("#fixamount").text());
            if (isNaN(pAmount)) {
                $("#pamount").val("");
            } else {
                if (pAmount > fAmount) {
                    alert("Pay amount cannot exceed the fixed amount.");
                    $("#pamount").val(fAmount);
                }
            }
        });
    });
    </script>
</body>

</html>