<?php
include("../util/connection.php");
  session_start();
$doctor_data=$_SESSION["medecin_data"];

   $docid= $doctor_data["id"];
   $docnom=$doctor_data["nom"];
   $docprenom=$doctor_data["prenom"];
   $docspecialite=$doctor_data["specialite"];
   $docemail=$doctor_data["email"];
   $image =$doctor_data["image"];
   $exemple="Rapport Médical

   Patient : [Nom du patient]
   Date de Naissance : [Date de naissance du patient]
   Sexe : [Sexe du patient]
   Adresse : [Adresse du patient]
   Numéro de téléphone : [Numéro de téléphone du patient]
   
   Antécédents Médicaux :
   
   Médicaux : [Liste des antécédents médicaux du patient, tels que les maladies chroniques, les interventions chirurgicales antérieures, etc.]
   Familiaux : [Antécédents médicaux dans la famille du patient, tels que les maladies héréditaires]
   Motif de la Consultation : [Raison spécifique pour laquelle le patient a consulté]
   
   Examen Clinique :
   
   Général : [Description de l'état général du patient, y compris l'apparence physique, l'état de conscience, etc.]
   Systèmes Spécifiques : [Examen de chaque système corporel pertinent, tel que le cardiovasculaire, le respiratoire, le gastro-intestinal, etc.]
   Résultats des Tests :
   
   [Liste des tests de laboratoire effectués, tels que des analyses sanguines, des radiographies, des échographies, etc.]
   [Interprétation des résultats de chaque test]
   Diagnostic : [Diagnostic principal du médecin basé sur les antécédents médicaux, l'examen clinique et les résultats des tests]
   
   Plan de Traitement :
   
   Médicaments Prescrits : [Liste des médicaments prescrits, avec posologie et instructions d'utilisation]
   Procédures Médicales : [Description des procédures médicales recommandées, telles que des interventions chirurgicales, des thérapies, etc.]
   Conseils au Patient : [Conseils de santé généraux donnés au patient, tels que des changements de mode de vie, des précautions à prendre, etc.]
   Suivi :
   
   Date du Prochain Rendez-vous : [Date à laquelle le patient doit revenir pour un suivi médical]
   Références : [Le cas échéant, références à d'autres spécialistes médicaux ou professionnels de la santé]
   Remarques : [Remarques supplémentaires du médecin, le cas échéant]
   
  ";
   if (isset($_GET["id"]) && isset($_GET["nom"]) && isset($_GET["prenom"])){
    $rdvtid=$_GET["id"];
    $patientnom=$_GET["nom"];
    $patientprenom=$_GET["prenom"]; 
    $rapportMedicale = "";
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $rapportMedicale = $_POST['rapport'];}
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/c2d3a7aff6.js" crossorigin="anonymous"></script>
    <script src="../js/jquery.min.js"></script>
    <script src="../js/dashboard-medecin.js"></script>
    <link rel="stylesheet" type="text/css" href="../css/dashboard-medecin.css">
    <link rel="stylesheet" href="../css/animations.css">  
    <link rel="stylesheet" href="../css/main.css">  
    <link rel="stylesheet" href="../css/admin.css">
        
    <title>Appointments</title>
    <style>
        .rapport.scrollable {
    max-height: 500px; /* Ajustez la hauteur maximale selon vos besoins */
    overflow-y: auto;
}  
        .popup{
            animation: transitionIn-Y-bottom 0.5s;
        }
        .sub-table{
            animation: transitionIn-Y-bottom 0.5s;
        }
</style>
</head>
<body>
 
    
<div class="icon-rectangle">
    <a href="../home.php" class="tooltip">
        <i class="fa-solid fa-house"style="margin-left:6px"></i>
        <span class="tooltiptext">Home</span>
    </a>
    <a href="dashboard-medecin.php" class="tooltip">
        <i class="fa-solid fa-stethoscope" style="margin-left:5px"></i>
        <span class="tooltiptext">Dashboard</span>
    </a>
    <a href="mes-rdv.php" class="tooltip">
        <i class="fa-regular fa-calendar-check"style="margin-left:6px"></i>
        <span class="tooltiptext">My Appointments</span>
    </a>
    <a href="mespatient.php" class="tooltip">
        <i class="fa-solid fa-bed"style="margin-left:6px"></i>
        <span class="tooltiptext">My Patients</span>
    </a>
    <a href="agenda.php" class="tooltip">
        <i class="fa-solid fa-calendar-days"style="margin-left:6px"></i>
        <span class="tooltiptext">Agenda</span>
    </a>
    <a href="parametres.php" class="tooltip">
        <i class="fa-solid fa-gear"style="margin-left:6px"></i>
        <span class="tooltiptext">Settings</span>
    </a>
</div>
    <div class="fixed-div" style="width:250px;,height:270px;">
        <img src="<?php  echo $image?>" id="profileimg">
        <div class="profile-info">
            <h1>Dr. <?php echo "$docnom"?></h1>
            <p>Spécialité: <?php echo "$docspecialite"?></p>
        </div>
        <!--<button class="edit-button">Modifier</button>-->
    </div>
    <aside style="margin-top:230px;">
        <a href="../home.php">
            <i class="fa-solid fa-house"></i>
            Home
        </a>
        <a href="dashboard-medecin.php">
            <i class="fa-solid fa-stethoscope"></i>
            Tableau de bord
        </a>
        <a href="mes-rdv.php">
            <i class="fa-regular fa-calendar-check"></i>
            Mes rendez-vous
        </a>
        <a href="mespatient.php">
            <i class="fa-solid fa-bed"></i>
            Mes patients
        </a>
        <a href="agenda.php">
            <i class="fa-solid fa-calendar-days"></i>
            Agenda
        </a>
        <a href="parametres.php">
            <i class="fa-solid fa-gear"></i>
            Paramètres
        </a>
    </aside>

    <a href="../util/logout.php"><button class="logout-button">Déconnexion</button></a>
<span class="logo">logo</span>
<span class="time" id="clock"></span>
<div class="calendar-container" id="calendarContainer">
    <div class="calendar-header">
        <button class="calendar-prev" id="prevMonth">&lt;</button>
        <span class="month-year" id="currentMonth">May 2024</span>
        <button class="calendar-next" id="nextMonth">&gt;</button>
    </div>
    <div class="calendar-days" id="calendar">
        <!-- Calendar days will be dynamically generated here -->
    </div>
</div>
<button id="transformButton" class="edit-button"><img style="position:center;"src="../photo/icons8-calendar-30.png"></button>

<div class="dash-body">
    <table border="0" width="100%" style="border-spacing: 0; margin: 0; padding: 0; margin-top: 25px;">
        <tr style="display:flex;">
            <td width="13%">
                <a >
                    <button class="login-btn btn-primary-soft btn btn-icon-back" style="padding-top:11px;padding-bottom:11px;margin-left:20px;width:125px">
                        <font class="tn-in-text">Back</font>
                    </button>
                </a>
            </td>
            <td>
                <p style="font-size: 23px;padding-left:12px;font-weight: 600;">Fiche Medicale</p>
            </td>
        </tr>
        <form method="post">
        <tr>
            <td colspan="4">
                <div style="display: flex; margin-top: 40px; margin-left:500px;">
                    <div class="heading-main12" style="margin-left: 45px; font-size:20px; color:rgb(49, 49, 49); margin-top: 5px;"></div>
                    <button id="nouveau" type="button"class="login-btn btn-primary btn button-icon" style="margin-left:300px; background-image: url('../photo/add.svg');">Ajouter un Nouveau Rapport</button>
                    <button id="submit"type="submit" name="submit" class="login-btn btn-primary btn button-icon" style="display: none; margin-left:300px; background-color: green;align-items: center;justify-content: center;"><i style="" class="fa-regular fa-paper-plane"></i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  Soumettre le Rapport</button>
                </div>
            </td>
        </tr>
        <tr id="rapport_existant">
            <td colspan="4">
                <p style="font-size: 19px; padding-left: 12px; font-weight: 600;">Rapport Medicale :</p>
                <div class="rapport scrollable" style="font-size: 18px; font-weight: bold; color: #333; background-color: #f2f2f2; padding: 20px; border-radius: 10px; margin-top: 20px; margin-left: 250px; width: 700px; height: 800px;">
                    <?php
                        $sqlmain = "SELECT id,rapport, medicament FROM ficheconsultation  WHERE id_rdv =  $rdvtid";
                        $result = mysqli_query($conn, $sqlmain);
                        if($result->num_rows>0) {
                        $row = $result->fetch_assoc();
                        $rapport = $row["rapport"];
                        $medicament = $row["medicament"]; }
                        else{
                            $rapport = '';
                            $medicament = ''; 
                        }
                    ?>
                    <p placeholder="mama"> <?php
                    if($rapport!='') echo  $rapport;
                    else echo"  aucun rapport n'est ajouter " ?></p>
                   
                </div>
                <p style="font-size: 19px; padding-left: 12px; font-weight: 600;">Medicament :</p>
                <div class="rapport" style="font-size: 18px; font-weight: bold; color: #333; background-color: #f2f2f2; padding: 20px; border-radius: 10px; margin-top: 20px; margin-left: 250px; width: 500px; height: 250px;">
                    <p> <?php   if($medicament!='') echo $medicament;
                    else echo"  aucun medicament n'est ajouter " ?></p>
                </div>
            </td>
        </tr>
        <tr id="ajouter_rapport" style="display: none;">
            <td colspan="4" style="padding-top: 20px;">
                <p style="font-size: 19px; padding-left: 12px; font-weight: 600;">Rapport Medicale :</p>
                <textarea rows="15" name="rapport"cols="30"value="" style="margin-top:5px;" class="input-text header-searchbar" placeholder="Ecrivez Votre Rapport Medicale ici"><?php echo nl2br(htmlspecialchars($exemple));?></textarea>
            </td>
        </tr>
        <tr id="ajouter_medicament" style="display: none;">
            <td colspan="4">
                <p style="font-size: 19px; padding-left: 12px; font-weight: 600;">Ajoutez ici les Medicament Donner :</p>
                <div style="display: flex;">
                    <input type="text" id="medicament_input" name="medicament"class="input-text header-searchbar" style="margin-top:5px; margin-bottom:50px;" placeholder="Ajoutez ici les Medicament Donner">
                    <button type="button" id="add_medicament_btn" class="login-btn btn-primary btn button-icon" style="margin-left:25px; background-image: url('../photo/add.svg'); width:300px; height:50px; justify-content: center; align-items: center;">ajouter un medicament a la fois</button>
                </div>
                <ul id="medicament_list" class="medicament-list" style="margin-top:5px;"></ul>
                <input type="hidden" name="medicament_list" id="medicament_list_input">
          
            </td>
        </tr>
    </form>
    </table>
</div>

<script>
    $(document).ready(function() {
        var rapportContent = $('.rapport');
    var maxHeight = 300; // Hauteur maximale à partir de laquelle la barre de défilement sera activée

    if (rapportContent.height() > maxHeight) {
        rapportContent.addClass('scrollable');
    }
        $('#ajouter_rapport').hide();
        $('#ajouter_medicament').hide();

        $('#nouveau').click(function(){
            $('#rapport_existant').hide();
            $('#ajouter_rapport').show();
            $('#ajouter_medicament').show();
            $('#nouveau').hide();
            $('#submit').show();
        });
        $('#add_medicament_btn').click(function() {
            var medicament = $('#medicament_input').val().trim();
            if (medicament !== "") {
                $('#medicament_list').append('<li class="medicament-item">' + medicament + '</li>');
                $('#medicament_input').val('');
                updateMedicamentList();
            }
        });

        function updateMedicamentList() {
                var medicamentHTML = "<ul>";
                $('#medicament_list .medicament-item').each(function() {
                    medicamentHTML += '<li>' + $(this).text() + '</li>';
                });
                medicamentHTML += "</ul>";
                $('#medicament_list_input').val(medicamentHTML);
            }
        $('#submit').click(function(){
            updateMedicamentList();
            $('#rapport_existant').show();
            $('#ajouter_rapport').hide();
            $('#ajouter_medicament').hide();
            $('#nouveau').show();
            $('#submit').hide();location.reload();
        });
    });
</script>
<?php
 $soumissionReussie = false;
           if(isset($_POST['submit'])){
            $rapo = mysqli_real_escape_string($conn, $_POST['rapport']);
            $medi = mysqli_real_escape_string($conn,  $_POST['medicament_list']); 
          $sqlmain = "SELECT id,rapport, medicament FROM ficheconsultation  WHERE id_rdv =  $rdvtid";
          $result = mysqli_query($conn, $sqlmain);
          if($result->num_rows>0) {
          mysqli_query($conn,"UPDATE ficheconsultation
                SET rapport = '$rapo',medicament='$medi'
                WHERE id_rdv =  $rdvtid;");$soumissionReussie = true; 
                                   }
           else{
            mysqli_query($conn,"INSERT INTO ficheconsultation (id_rdv,rapport,medicament) VALUES ('$rdvtid','$rapo', '$medi')");
            $soumissionReussie = true;
           }                        
           }
            ?> <?php if (isset($_SESSION['form_success']) && $_SESSION['form_success']): ?>
                echo"<script>alert('Rapport soumis avec succès!')</script>";
                <?php endif; ?>
            <?php if ($soumissionReussie): ?>
               
                <?php endif; ?>
                                                    
</body>
</html>