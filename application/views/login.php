<?php
defined('BASEPATH') OR exit('No direct script access allowed');
include 'nav.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <?php
      include 'boot.php';
    ?>
</head>

<body>
    <div class="container">
        <div class="form-group col-md-6 mt-2">
            <h2>Login</h2>
        </div>
        <form id="registration" action="<?php echo base_url('lg/login'); ?>" method="post">
            <div class="form-group col-md-5">
                <label for="mail">Email</label>
                <input type="email" class="form-control" id="mail" name="mail">
            </div>
            <div class="form-group col-md-5">
                <label for="pass">Password</label>
                <input type="text" class="form-control" id="pass" name="pass">
            </div>
            <div class="form-group col-md-5">
                <button type="submit" class="btn btn-outline-success" name="log" id="submit">Login</button>
                <p>New user ? <a href="<?php echo base_url('sc'); ?>" class="link-dark text-decoration-none">Signup</a></p>
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
                url: "<?php echo base_url('lg'); ?>",
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