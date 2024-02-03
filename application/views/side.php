<!DOCTYPE html>
<html>

<head>
    <?php include 'boot.php'; ?>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
    body {
        font-family: "Lato", sans-serif;
    }

    .sidenav {
        height: 100%;
        width: 160px;
        position: fixed;
        z-index: 1;
        top: 0;
        left: 0;
        background-color: #111;
        overflow-x: hidden;
        padding-top: 20px;
    }

    .sidenav a {
        padding: 6px 8px 6px 16px;
        text-decoration: none;
        font-size: 20px;
        color: #818181;
        display: block;
    }

    .sidenav a:hover {
        color: #f1f1f1;
    }

    .main {
        margin-left: 160px;
        /* Same as the width of the sidenav */
        font-size: 28px;
        /* Increased text to enable scrolling */
        padding: 0px 10px;
    }

    .row {
        margin-left: 150px;
    }

    @media screen and (max-height: 450px) {
        .sidenav {
            padding-top: 15px;
        }

        .sidenav a {
            font-size: 18px;
        }
    }

    .card-title {
        cursor: pointer;
    }

    .sidenav a.active {
        color: white;
    }

    .admin {
        margin-left: 150px;
    }

    </style>
</head>

<body>

    <div class="sidenav">
        <a href="" class="active">Home</a>
        <a href="#">Contact</a>
        <a href="<?php echo base_url('sd/logout'); ?>">Logout</a>
    </div>

    <div class="admin">
        <?php if($admin): ?>
            <p>Admin:<?php echo $admin; ?></p>
        <?php endif; ?>
    </div>

    <!-- dashbord cards -->
    <div class="container row mt-5">
        <div class="col">
            <div class="card text-white bg-secondary mb-3" style="max-width: 18rem;">
                <div class="card-header">Student</div>
                <div class="card-body">
                    <h5 class="card-title" data-toggle="modal" data-target="#studentModal">Add student</h5>
                    <a class="card-title" href="<?php echo base_url('stud'); ?>"
                        style="text-decoration: none; color: white; font-size: 20px;">View students</a>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card text-white bg-primary mb-3" style="max-width: 18rem;">
                <div class="card-header">Category</div>
                <div class="card-body">
                    <h5 class="card-title" data-toggle="modal" data-target="#catModal">Create Category</h5>
                    <a class="card-title" href="<?php echo base_url('delete/deleteC'); ?>"
                        style="text-decoration: none; color: white; font-size: 20px;">View categories</a>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card text-white bg-success mb-3" style="max-width: 18rem;">
                <div class="card-header">Head</div>
                <div class="card-body">
                    <h5 class="card-title" data-toggle="modal" data-target="#headModal">Create Head</h5>
                    <a class="card-title" href="<?php echo base_url('delete/deleteH'); ?>"
                        style="text-decoration: none; color: white; font-size: 20px;">View heads</a>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card text-white bg-danger mb-3" style="max-width: 18rem; height: 155px;">
                <div class="card-header">Fees</div>
                <div class="card-body">
                    <a class="card-title" href="<?php echo base_url('payfee'); ?>"
                        style="text-decoration: none; color: white; font-size: 20px;">Pay Fees</a><br>
                    <a class="card-title" href="<?php echo base_url('stud/fee'); ?>"
                        style="text-decoration: none; color: white; font-size: 20px; 
                        margin-top: 6px; display: inline-block;">View fee details</a>
                </div>
            </div>
        </div>
    </div>

    <!-- studentModal -->
    <div class="modal fade" id="studentModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form action="<?php echo base_url('sd/student'); ?>" method="post">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Student Details</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="sid">Student ID</label>
                            <input type="text" class="form-control" name="sid" id="sid" placeholder="Enter student ID"
                                required>
                        </div>
                        <div class="form-group">
                            <label for="name">Student Name</label>
                            <input type="text" class="form-control" name="name" id="name" placeholder="student name"
                                required>
                        </div>
                        <div class="form-group">
                            <label for="std">Standard</label>
                            <select class="form-control" name="std" id="std" required>
                                <option>Select std</option>
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
                        <div class="form-group">
                            <label for="dv">Division</label>
                            <select class="form-control" name="dv" id="dv" required>
                                <option>Select division</option>
                                <option>A</option>
                                <option>B</option>
                                <option>C</option>
                                <option>D</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="cname">Category name</label>
                            <select class="form-control" id="cname" name="cname">
                                <option>Select category</option>
                                <?php foreach ($categories as $category) : ?>
                                <option><?php echo $category->c_name; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="bid">Branch ID</label>
                            <input type="text" class="form-control" name="bid" id="bid"
                                placeholder="Enter division" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Add Student</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- headModal -->
    <div class="modal fade" id="headModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form action="<?php echo base_url('sd/head'); ?>" method="post">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Head Details</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="bid">Branch ID</label>
                            <input type="text" class="form-control" name="bid" id="bid"
                                placeholder="Enter branch ID" required>
                        </div>
                        <div class="form-group">
                            <label for="cname">Category name</label>
                            <select class="form-control" id="cname" name="cname">
                                <option>Select category</option>
                                <?php foreach ($categories as $category) : ?>
                                <option><?php echo $category->c_name; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="hid">Head ID</label>
                            <input type="text" class="form-control" name="hid" id="hid" placeholder="Enter head id">
                        </div>
                        <div class="form-group">
                            <label for="hname">Head name</label>
                            <input type="text" class="form-control" name="hname" id="hname"
                                placeholder="Enter head name">
                        </div>
                        <div class="form-group">
                            <label for="amount">Amount</label>
                            <input type="number" class="form-control" name="amount" id="amount"
                                placeholder="Enter amount">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Create head</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- categoryModal -->
    <div class="modal fade" id="catModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form action="<?php echo base_url('sd/category'); ?>" method="post">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Category Details</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="cid">Category ID</label>
                            <input type="text" class="form-control" name="cid" id="cid" placeholder="Enter category ID">
                        </div>
                        <div class="form-group">
                            <label for="cname">Category name</label>
                            <select class="form-control" id="cname" name="cname">
                                <option>Select category</option>
                                <option>Package</option>
                                <option>Regular</option>
                                <option>RTE</option>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Create category</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

</body>

</html>
