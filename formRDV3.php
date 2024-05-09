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
        <form id="appointmentForm"  method="post">
            <h2> decrivez  votre motif de consultation</h2>
            
            <textarea rows="19" cols="50" name="comment" form="usrform">
écrivez ici...</textarea>
            <button type="button" class="prev-btn">précedent</button>
            <button type="button" class="next-btn"><a href="formRDV4.php">suivant</a></button>
        </form>
    

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