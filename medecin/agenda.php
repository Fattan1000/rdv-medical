
<?php
include("../util/connection.php");
  session_start();
$doctor_data=$_SESSION["medecin_data"];

   $docid= $doctor_data["id"];
   $docnom=$doctor_data["nom"];
   $docprenom=$doctor_data["prenom"];
   $docspecialite=$doctor_data["specialite"];
   $docemail=$doctor_data["email"];

?><!DOCTYPE html>
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
        
        
    <title>Schedule</title>
    <style>
        .popup{
            animation: transitionIn-Y-bottom 0.5s;
        }
        .sub-table{
            animation: transitionIn-Y-bottom 0.5s;
        }
        :root {
  --numDays: 5;
  --numHours: 10;
  --timeHeight: 60px;
  --calBgColor: #fff1f8;
  --eventBorderColor: #f2d3d8;
  --eventColor1: #ffd6d1;
  --eventColor2: #fafaa3;
  --eventColor3: #e2f8ff;
  --eventColor4: #d1ffe6;
}

.calendar {
  display: grid;
  gap: 10px;
  grid-template-columns: auto 1fr;
  margin: 2rem;
}

.timeline {
  display: grid;
  grid-template-rows: repeat(var(--numHours), var(--timeHeight));
}

.days {
  display: grid;
  grid-column: 2;
  gap: 5px;
  grid-template-columns: repeat(auto-fit, minmax(150px, 1fr));
}

.events {
  display: grid;
  grid-template-rows: repeat(var(--numHours), var(--timeHeight));
  border-radius: 5px;
  background: var(--calBgColor);
}

// Place on Timeline
.start-10 {
  grid-row-start: 2;
}

.start-12 {
  grid-row-start: 4;
}

.start-1 {
  grid-row-start: 5;
}

.start-2 {
  grid-row-start: 6;
}

.end-12 {
  grid-row-end: 4;
}

.end-1 {
  grid-row-end: 5;
}

.end-3 {
  grid-row-end: 7;
}

.end-4 {
  grid-row-end: 8;
}

.end-5 {
  grid-row-end: 9;
}

// Event

.title {
  font-weight: 600;
  margin-bottom: 0.25rem;
}

.event {
  border: 1px solid var(--eventBorderColor);
  border-radius: 5px;
  padding: 0.5rem;
  margin: 0 0.5rem;
  background: white;
}

.space,
.date {
  height: 60px
}

// Global / Etc

body {
  font-family: system-ui, sans-serif;
}

.corp-fi {
  background: var(--eventColor1);
}

.ent-law {
  background: var(--eventColor2);
}

.writing {
  background: var(--eventColor3);
}

.securities {
  background: var(--eventColor4);
}

.date {
  display: flex;
  gap: 1em;
}

.date-num {
  font-size: 3rem;
  font-weight: 600;
  display: inline;
}

.date-day {
  display: inline;
  font-size: 3rem;
  font-weight: 100;
}
</style>
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
        <img src="samir medcin.jpg" id="profileimg">
        <div class="profile-info">
            <h1>Dr. Samir</h1>
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
      
<div class="dash-body">
            <table border="0" width="100%" style=" border-spacing: 0;margin:0;padding:0;margin-top:25px; ">
                <tr >
                    <td width="13%" >
                    <a href="dashboard-medecin.php" ><button  class="login-btn btn-primary-soft btn btn-icon-back"  style="padding-top:11px;padding-bottom:11px;margin-left:20px;width:125px"><i class="fa-solid fa-arrow-left"></i><font class="tn-in-text">Back</font></button></a>
                    </td>
                    <td>
                        <p style="font-size: 23px;padding-left:12px;font-weight: 600;">AGENDA</p>
                                           
                    </td>

                </tr>
                
    </div>   
    <div class="calendar">
  <div class="timeline">
    <div class="spacer"></div>
    <div class="time-marker">9 AM</div>
    <div class="time-marker">10 AM</div>
    <div class="time-marker">11 AM</div>
    <div class="time-marker">12 PM</div>
    <div class="time-marker">1 PM</div>
    <div class="time-marker">2 PM</div>
    <div class="time-marker">3 PM</div>
    <div class="time-marker">4 PM</div>
    <div class="time-marker">5 PM</div>
    <div class="time-marker">6 PM</div>
  </div>
  <div class="days">
    <div class="day mon">
      <div class="date">
        <p class="date-num">9</p>
        <p class="date-day">Mon</p>
      </div>
      <div class="events">
        <div class="event start-2 end-5 securities">
          <p class="title">Securities Regulation</p>
         
        </div>
      </div>
    </div>
    <div class="day tues">
      <div class="date">
        <p class="date-num">12</p>
        <p class="date-day">Tues</p>
      </div>
      <div class="events">
        <div class="event start-10 end-12 corp-fi">
          <p class="title">Corporate Finance</p>
          
        </div>
        <div class="event start-1 end-4 ent-law">
          <p class="title">Entertainment Law</p>
         
        </div>
      </div>
    </div>
    <div class="day wed">
      <div class="date">
        <p class="date-num">11</p>
        <p class="date-day">Wed</p>
      </div>
      <div class="events">
        <div class="event start-12 end-1 writing">
          <p class="title">Writing Seminar</p>
          
        </div>
        <div class="event start-2 end-5 securities">
          <p class="title">Securities Regulation</p>
         
        </div>
      </div>
    </div>
    <div class="day thurs">
      <div class="date">
        <p class="date-num">12</p>
        <p class="date-day">Thurs</p>
      </div>
      <div class="events">
        <div class="event start-10 end-12 corp-fi">
          <p class="title">Corporate Finance</p>
          
        </div>
        <div class="event start-1 end-4 ent-law">
          <p class="title">Entertainment Law</p>
          
        </div>
      </div>
    </div>
    <div class="day fri">
      <div class="date">
        <p class="date-num">13</p>
        <p class="date-day">Fri</p>
      </div>
      <div class="events">
      </div>
    </div>
  </div>
</div>