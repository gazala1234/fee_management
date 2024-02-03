<?php
defined('BASEPATH') or exit('No direct script access allowed');
include 'nav.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registeration</title>
    <?php
include 'boot.php';
?>
</head>

<body>
    <div class="container">
        <div class="form-group col-md-6 mt-2">
            <h2>Admin Signup</h2>
        </div>
        <form id="registration" action="<?php echo base_url('Sc/emp'); ?>" method="post">
            <div class="form-group col-md-6">
                <label for="id">Branch ID</label>
                <input type="text" class="form-control" id="bid" name="bid" autofocus="on">
            </div>
            <div class="form-group col-md-6">
                <label for="id">ID</label>
                <input type="text" class="form-control" id="id" name="id">
            </div>
            <div class="form-group col-md-6">
                <label for="name">Full name</label>
                <input type="text" class="form-control" id="name" name="name">
            </div>
            <div class="form-group col-md-6">
                <label for="phone">Phone</label>
                <input type="number" class="form-control" id="phone" name="phone">
            </div>
            <div class="form-group col-md-6">
                <label for="mail">Email</label>
                <input type="email" class="form-control" id="mail" name="mail">
            </div>
            <div class="form-group col-md-6">
                <label for="pass">Password</label>
                <input type="text" class="form-control" id="pass" name="pass">
                <p>Password must be 8 characters or longer and should contain 
                    uppercase and lowercase letters, numbers and special characters.</p>
            </div>
            <div class="form-group col-md-6">
                <button type="submit" class="btn btn-outline-success" name="sign" id="submit">Signup</button>
                <p>Already have an account ? <a href="<?php echo base_url(); ?>/lg"
                        class="link-dark text-decoration-none">Login</a></p>
            </div>
        </form>
    </div>
    <script>
    $(document).ready(function() {
        $("#submit").on("click", function() {

            var formData = $("#registration").serialize();

            // Make an AJAX request to signup.php
            $.ajax({
                type: "POST",
                url: "<?php echo base_url(); ?>/sc",
                data: formData,
                success: function(response) {

                    console.log(response);

                    // Reset the form
                    $("#registration")[0].reset();
                },
                error: function(error) {
                    console.error("Error:", error);
                }
            });
        });
    });
    </script>
</body>

</html>