<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <style>
        .barre_de_recherche {
            height: 220px;
            width: 1050px;
            padding: 100px;
            margin: 250px;
            margin-top: 130px;
            padding-top: 50px;
            background-color: #083344;
            border-radius: 12px;
            position: relative;
        }
        .input {
            height: 60px;
            width: 200px;
            margin-top: 24px;
            text-align: center;
            margin-right: 6px;
            border-radius: 8px;
            font-size: 130%;
        }
        .button {
            background-color: #2F4F4F;
            color: white;
            border-width: 1px;
            border-color: white ;
        }
        .button:hover {
            background-color: black;
            color: white;
            border-width: 1px;
            border-color: white ;
        }
        
    </style>
</head>
<body>

<div class="barre_de_recherche">
<form method="post" action="result.php">
		<div class="container">
			<div class="search"><input id="search"type="text" placeholder="Nom,Specialite,Ville..." name="search_button">
			<select name="search-specialite" >           
            <option value="search-specialite"disabled selected hidden>choisir une spécialité</option>
            <option value=""></option>
            <option value="Chiropracteur">Chiropracteur</option>
            <option value="Diabétologue">Diabétologue</option>
            <option value="Stomatologue">Stomatologue</option>
            <option value="Radiologue">Radiologue</option>
            <option value="Cardiologue">Cardiologue</option>
            <option value="Pédiatre">Pédiatre</option>
            <option value="Chirurgien-général">Chirurgien général</option>
            <option value="généraliste">généraliste</option> 
            <option value="dentist">Dentiste</option>  
            <option value="Dermatologue">Dermatologue</option>
        </select>
        <select name="search-ville" >
            <option value=""disabled selected hidden>Choisir une ville</option>
            <option value=""></option>
            <option value="casablanca">Casablanca</option>
            <option value="agadir">Agadir</option>
            <option value="fez">Fez</option>
            <option value="tanger">Tanger</option>
        </select>
</div>
</body>
</html>