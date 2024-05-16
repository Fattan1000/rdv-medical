<?php
include("../util/connection.php");
include('middleware.php');

$doctor_data=$_SESSION["medecin_data"];

   $docid= $doctor_data["id"];
   $docnom=$doctor_data["nom"];
   $docprenom=$doctor_data["prenom"];
   $docspecialite=$doctor_data["specialite"];
   $docemail=$doctor_data["email"];
   $image=$doctor_data["image"];


   ;?>
    <!DOCTYPE html>
<html lang="fr">
<head>
    <script src="https://kit.fontawesome.com/c2d3a7aff6.js" crossorigin="anonymous"></script>
    <meta charset="UTF-8">
    <script src="../js/jquery.min.js"></script>
    <script src="../js/dashboard-medecin.js"></script>
    <link rel="stylesheet" type="text/css" href="../css/dashboard-medecin.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fixed Colored Div</title>
    
</head>
<body>

<div class="icon-rectangle">
    <a href="../home.php" class="tooltip">
        <i class="fa-solid fa-house"></i>
        <span class="tooltiptext">Home</span>
    </a>
    <a href="dashboard-medecin.php" class="tooltip">
        <i class="fa-solid fa-stethoscope"></i>
        <span class="tooltiptext">Dashboard</span>
    </a>
    <a href="mes-rdv.php" class="tooltip">
        <i class="fa-regular fa-calendar-check"></i>
        <span class="tooltiptext">My Appointments</span>
    </a>
    <a href="mespatient.php" class="tooltip">
        <i class="fa-solid fa-bed"></i>
        <span class="tooltiptext">My Patients</span>
    </a>
    <a href="agenda.php" class="tooltip">
        <i class="fa-solid fa-calendar-days"></i>
        <span class="tooltiptext">Agenda</span>
    </a>
    <a href="parametres.php" class="tooltip">
        <i class="fa-solid fa-gear"></i>
        <span class="tooltiptext">Settings</span>
    </a>
</div>
    <div class="fixed-div">
        <img src="<?php echo $image?>" id="profileimg">
        <div class="profile-info">
            <h1>Dr. samir</h1>
            <p>Spécialité: Pédiatrie</p>
        </div>
        <button class="edit-button">Modifier</button>
    </div>
    <aside>
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

<div class="calendar-container">
    <div class="calendar-header">
        <button class="calendar-prev" id="prevMonth">&lt;</button>
        <span class="month-year" id="currentMonth"></span>
        <button class="calendar-next" id="nextMonth">&gt;</button>
    </div>
    <div class="calendar-days" id="calendar"></div>
</div>
<div class="bonjour">
    <img src="../photo/bonjour-doctor.jpg">
    <span id="bonjou">Bonjour</span>
    <span id="docname">Dr.samir</span>
</div>
<div class="RDVrecus">
    <h3>Les rendez-vous reçu</h3>
    <section class="recus">
        <!--for demo wrap-->
        <div class="tbl-header">
            <table class="recus"cellpadding="0" cellspacing="0" border="0">
                <thead class="recus">
                <tr class="recus">
                    <th class="recus">nom</th>
                    <th class="recus">prenom</th>
                    <th class="recus">date</th>
                    <th  class="recus">age</th>
                    <th  class="recus">   </th>
                </tr>
                </thead>
            </table>
        </div>
        <div class="tbl-content">
            <table class="recus" cellpadding="0" cellspacing="0" border="0">
                <tbody class="recus">
                <tr class="recus">
                    <td class="recus">mohamed</td>
                    <td class="recus">ayoubi </td>
                    <td class="recus">7/12/23</td>
                    <td class="recus">20</td>
                    <td class="recus"><a href="?action=view&id='.$idRDV.'" class="non-style-link"><button class="view-button"><i class="fa-solid fa-eye"></i>voir</button></a>
                      </td></tr>
                <tr class="recus">
                    <td class="recus">saad</td>
                    <td class="recus">azarou</td>
                    <td class="recus">20/1/12</td>
                    <td class="recus">30</td>                
                    <td class="recus"><a href="?action=view&id='.$idRDV.'" class="non-style-link"><button class="view-button"><i class="fa-solid fa-eye"></i>voir</button></a>
                      </td>
                </tr>
                 <tr class="recus">
                    <td class="recus">mohamed</td>
                    <td class="recus">ayoubi </td>
                    <td class="recus">7/12/23</td>
                    <td class="recus">20</td>
                    <td class="recus"><a href="?action=view&id='.$idRDV.'" class="non-style-link"><button class="view-button"><i class="fa-solid fa-eye"></i>voir</button></a>
                      </td></tr>
                </tbody>
            </table>
        </div>
    </section>
</div>
<?php
/*$action=$_GET["action"];
$id=$_GET["id"];
if($action=='view'){
}*/
?>
</body>
</html>

