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
        <form id="appointmentForm" action="process.php" method="post">
            <h2>Vous prenez ce rendez-vous pour vous-même ?</h2>
            <div class="choices">
                <button type="button" class="choice-btn"><a href="formRDV3.php">Oui</a></button>
                <button type="button" class="choice-btn"><a href="formRDV2.php">Non</a></button>
            </div>
        </form>
    </div>

    <script src="js/jquery.min.js"></script>
    <script>
        $(document).ready(function(){
            $(".next-btn").click(function(){
                $(this).closest("form").submit();
            });
        });
    </script>
</body>
</html>
