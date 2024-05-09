<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Appointment Form</title>
    <link rel="stylesheet" href="css/formRDV.css">
</head>
<body>
<nav class="navbar">
        <div class="navbar-left">
            <button class="profile-btn">Mon Profile</button>
        </div>
        <div class="navbar-right">
            <button class="login-signup-btn">Login/Signup</button>
        </div>
    </nav>
    <div class="container">
        <form id="appointmentForm" action="process-verification.php" method="post">
            <h2>Step 3: Verification Method Selection</h2>
            <p>Please select your preferred verification method:</p>
            <label for="sms">SMS</label>
            <input type="radio" id="sms" name="verification_method" value="sms">
            <label for="email">Email</label>
            <input type="radio" id="email" name="verification_method" value="email">
            <button type="button" class="prev-btn">Previous</button>
            <button type="button" class="next-btn">Next</button>
        </form>
    </div>

    <script src="js/jquery.min.js"></script>
    <script>
        $(document).ready(function(){
            $(".prev-btn").click(function(){
                window.history.back();
            });
            $(".next-btn").click(function(){
                $(this).closest("form").submit();
            });
        });
    </script>
</body>
</html>
