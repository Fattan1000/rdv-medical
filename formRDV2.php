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
        <form id="appointmentForm" method="post">
            <h2>Veuillez saisir les informations de cette personne</h2>
            <label for="nom">Nom:</label>
            <input type="text" id="nom" name="nom" required>
            <label for="prenom">Prénom:</label>
            <input type="text" id="prenom" name="prenom" required>
            <label for="sexe">Sexe:</label>
            <select id="sexe" name="sexe">
                <option value="male">Male</option>
                <option value="female">Female</option>
            </select>
            <label for="date_naissance">Date de naissance:</label>
            <input type="date" id="date_naissance" name="date_naissance" required>
            <button type="button" class="prev-btn">Précédent</button>
            <button type="button" class="next-btn"><a href="formRDV3.php">Suivant</a></button>
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
