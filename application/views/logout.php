<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
    </head>

    <body>
        <?php
            session_unset();
            session_destroy();
        ?>

        <script>
            confirmLogout();

            function confirmLogout() {
                var confirmLogout = confirm("Are you sure you want to logout?");
                if (confirmLogout) {
                    window.location.href = "http://localhost/codeigniter_fee/lg";
                } else {
                    window.location.href = "http://localhost/codeigniter_fee/sd";
                }
            }
        </script>

    </body>

</html>