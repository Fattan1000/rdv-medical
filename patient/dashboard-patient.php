<?php
include("../util/connection.php");
include('middleware.php');

$patient_data=$_SESSION["patient_data"];

   $patid= $patient_data["id"];
   $patnom=$patient_data["nom"];
   $patprenom=$patient_data["prenom"];
   $patemail=$patient_data["email"];
  
   
   

   ;?>
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
    
    <a href="dashboard-patient.php" class="tooltip">
        <i class="fa-regular fa-calendar-check"style="margin-left:6px"></i>
        <span class="tooltiptext">Mes Rendez-Vous</span>
    </a>
    <a href="historiquerdv.php" class="tooltip">
        <i class="fa-solid fa-bed"style="margin-left:6px"></i>
        <span class="tooltiptext">Hisrorique des   Rendez-Vous</span>
    </a>
    
    <a href="parametres.php" class="tooltip">
        <i class="fa-solid fa-gear"style="margin-left:6px"></i>
        <span class="tooltiptext">Paramétres</span>
    </a>
</div>
    <div class="fixed-div" style="width:250px;,height:270px;">
        
        <div class="profile-info">
            <h1  style="margin-top:120px;"><?php echo "$patnom $patprenom"?></h1>
            
        </div>
       <!-- <button class="edit-button">Modifier</button>-->
    </div>
    <aside style="margin-top:160px;">
        <a href="../home.php">
            <i class="fa-solid fa-house"></i>
            Home
        </a>
       
        <a href="dashboard-patient.php">
            <i class="fa-regular fa-calendar-check"></i>
            Mes rendez-vous
        </a>
        <a href="historiquerdv.php.php">
            <i class="fa-solid fa-bed"></i>
            Hisrorique des Rendez-Vous
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

<div class="bonjour">
  
    <span id="bonjou">Bonjour&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
    <span id="docname"><?php echo "$patprenom";?></span>
</div>
<div class="RDVrecus">
    <h3>Les rendez-vous a venir:</h3>
    
        <!--for demo wrap-->
       
            <table class="recus"cellpadding="0" cellspacing="0" border="0">
                <thead >
                <tr >
                    <th style="font-size: 19px;">nom</th>
                    <th style="font-size: 19px;">prenom</th>
                    <th style="font-size: 19px;">date</th>
                    <th  style="font-size: 19px;">status</th>
                    <th   style="width: 250px;font-size: 19px;">   </th>
                </tr>
                </thead>
            
                <tbody >
                <tr >
                   
                    
                    
                   <!-- <td class="recus"><a href="?action=view&id='.$idRDV.'" class="non-style-link"><button class="view-button"><i class="fa-solid fa-eye"></i>voir</button></a>
                      </td></tr>-->
                   <?php   $sqlmain = "SELECT rendez_vouz.id,rendez_vouz.description,date_rdv,rendez_vouz.status,medecin.nom,heure_debut_rdv, medecin.prenom, medecin.email FROM medecin INNER JOIN rendez_vouz ON rendez_vouz.medecin_id = medecin.id WHERE (rendez_vouz.status='enattent'or rendez_vouz.status='confirmer')and rendez_vouz.patient_id = $patid  ORDER BY date_rdv ASC";
   $result=mysqli_query($conn,$sqlmain); 

                                if($result->num_rows==0){
                                    echo '<tr>
                                    <td colspan="7">
                                    <br><br><br><br>
                                    <center>
                                    <img src="../photo/notfound.jpg" width="35%">
                                    
                                    <br>
                                    <p class="heading-main12" style="margin-left: 45px;font-size:20px;color:rgb(49, 49, 49)">Vous n\'avez pris  aucun  Rendez-Vous pour le moment  !</p>
                                    <a class="non-style-link" href="historiquerdv.php"><button  class="login-btn btn-primary-soft btn"  style="display: flex;justify-content: center;align-items: center;margin-left:20px;">&nbsp; Afficher tous les Rendez-Vous &nbsp;</font></button>
                                    </a>
                                    </center>
                                    <br><br><br><br>
                                    </td>
                                    </tr>';
                                    
                                }
                                else{
                                for ( $x=0; $x<$result->num_rows;$x++){
                                    $row=$result->fetch_assoc();
                                    $medecinnom=$row["nom"];
                                    $medecinprenom=$row["prenom"];
                                   
                                    $dateRDV=$row["date_rdv"];
                                    $tempRDV=$row["heure_debut_rdv"];
                                    $idRDV=$row["id"];
                                    $RDVstatus=$row["status"];
                                    $RDVdescription=$row["description"];
                                      $medecinemail=$row["email"];
                                    
                                   
                                    echo '<tr class="active-row">
                                    <td style="font-weight:300;font-size:17px;">'. substr($medecinnom,0,25)
                                       
                                        .'</td style="text-align:center;font-size:17px;font-weight:300;  var(--btnnicetext);">
                                        <td style="font-size: 17px;font-weight:300;">'. substr($medecinprenom,0,25)
                                       
                                        .'</td >
                                        <td style="font-size: 17px;font-weight:300;">
                                            '.substr($dateRDV,0,10).'
                                        </td>
                                     
                                        <td  style="width=100px;font-size: 17px;font-weight:300;">
                                        '.substr($RDVstatus,0,10).'
                                    </td>
                                
                                        <td style="display:flex;width: 250px;font-size: 17px;font-weight:300;">
                                        
                                        <a href="?action=view&id='.$idRDV.'" ><button class="edit-button"><i class="fa-solid fa-eye"></i>Voir</button></a>
                                       &nbsp;&nbsp;&nbsp;
                                       <a href="?action=drop&id='.$idRDV.'&name='.$medecinnom.'" ><button class="edit-button">Annuler</button></a>
                                       &nbsp;&nbsp;&nbsp;</div>
                                        </td>
                                    </tr>';
                                    
                                }}?>
                                
                </tbody>
            </table>
        
</div><?php
if($_GET){
    $id=$_GET["id"];

        $action=$_GET["action"];
      if($action=='drop'){
                                        $nameget=$_GET["name"];
                                        
                                        echo '
                                        <div id="popup1" class="overlay">
                                                <div class="popup">
                                                <center>
                                                    <h2>ATTENTION!etes vous sur?</h2>
                                                    <a class="close" href="dashboard-patient.php">&times;</a>
                                                    <div class="content">
                                                       etes vous sure de supprimer ce rendez-vous<br><br>
                                                       medecin nom: &nbsp;<b>'.substr($nameget,0,40).'</b><br>
                                                        
                                                    </div>
                                                    
                                                    <div style="display: flex;justify-content: center;">
                                                    <form method="post" > 
                                                    <a  class="non-style-link" href="dashboard-patient.php"><button name="annuler" type="submit" class="btn-primary btn"  style="display: flex;justify-content: center;align-items: center;margin:10px;padding:10px;"<font class="tn-in-text">&nbsp;OUI&nbsp;</font></button></a>&nbsp;&nbsp;&nbsp;
                                                    </form>
                                                     <a href="dashboard-patient.php" class="non-style-link"><button  class="btn-primary btn"  style="display: flex;justify-content: center;align-items: center;margin:10px;padding:10px;"><font class="tn-in-text">&nbsp;&nbsp;NON&nbsp;&nbsp;</font></button></a>
                                                   
                                                    </div>
                                                </center>
                                        </div>
                                        </div>
                                        '; if(isset($_POST["annuler"])){
                                            mysqli_query($conn,"UPDATE rendez_vouz
                                            SET status = 'annuler'
                                            WHERE id=$id;");  echo"<script>alert('ce rendez vous a été annuler')</script>"; }
                                
                                    }elseif($action=='view'){
                                      //$sqlmain= "select * from medecin where id='$id'";
            $sqlmain = "SELECT rendez_vouz.id,date_rdv, medecin.nom, medecin.email, rendez_vouz.description,rendez_vouz.status,rendez_vouz.heure_debut_rdv, medecin.prenom, medecin.specialite FROM medecin INNER JOIN rendez_vouz ON rendez_vouz.medecin_id = medecin.id WHERE rendez_vouz.patient_id = $patid";
           
            $result=mysqli_query($conn,$sqlmain); 
            $row=$result->fetch_assoc();
          
            $medecinnom=$row["nom"];
          $medecinprenom=$row["prenom"];
                $medecinspecialiter=$row["specialite"];
                $dateRDV=$row["date_rdv"];
                $tempRDV=$row["heure_debut_rdv"];
               
                $RDVstatus=$row["status"];
                $RDVdescription=$row["description"];
                  $medecinemail=$row["email"];
            echo '
            <div id="popup1" class="overlay">
                    <div class="popup">
                    <center>
                        <h2></h2>
                        <a class="close" href="dashboard-patient.php">&times;</a>
                        <div class="content">
                          
                            
                        </div>
                        <div style="display: flex;justify-content: center;">
                        <div class="abc">
                        <table width="80%" class="sub-table scrolldown add-doc-form-container" border="0">
                        
                            <tr>
                                <td>
                                    <p style="padding: 0;margin: 0;text-align: left;font-size: 25px;font-weight: 500;">rendez-vous detail</p><br><br>
                                </td>
                            </tr>
                            
                            <tr>
                                
                                <td class="label-td" colspan="2">
                                    <label for="name" class="form-label">Nom et Prenom: </label>
                                </td>
                            </tr>
                            <tr>
                                <td class="label-td" colspan="2">
                                    '.$medecinnom.'&nbsp;'.$medecinprenom.'<br><br>
                                </td>
                                
                            </tr>
                            
                            <tr>
                                <td class="label-td" colspan="2">
                                    <label for="spec" class="form-label"> date et heure Rendez-Vous: </label>
                                    
                                </td>
                            </tr>
                            <tr>
                            <td class="label-td" colspan="2">
                            à&nbsp;'.$tempRDV.'&nbsp;le '.$dateRDV.'<br><br>
                            </td>
                            </tr>
                            <tr>
                                <td class="label-td" colspan="2">
                                    <label for="nic" class="form-label">Description: </label>
                                </td>
                            </tr>
                            <tr>
                                <td class="label-td" colspan="2">
                                '.$RDVdescription.'<br><br>
                                </td>
                            </tr>
                            <tr>
                                <td class="label-td" colspan="2">
                                    <label for="Tele" class="form-label">specialiter: </label>
                                </td>
                            </tr>
                            <tr>
                                <td class="label-td" colspan="2">
                                '.$medecinspecialiter.'<br><br>
                                </td>
                            </tr>
                            <tr>
                                <td class="label-td" colspan="2">
                                    <label for="spec" class="form-label">Email: </label>
                                    
                                </td>
                            </tr>
                            <tr>
                            <td class="label-td" colspan="2">
                            '.$medecinemail.'<br><br>
                            </td>
                            </tr>
                            <tr>
                                <td class="label-td" colspan="2">
                                    <label for="spec" class="form-label">Status: </label>
                                    
                                </td>
                            </tr>
                            <tr>
                            <td class="label-td" colspan="2">
                            '.$RDVstatus.'<br><br>
                            </td>
                            </tr>
                            <tr>
                                <td colspan="2">
                                <form method="post">
                                    <a href="dashboard-patient.php"><button  name="annuler" type="submit"  class="login-btn btn-primary-soft btn" >anunler</button></a>
                                </form>
                                    
                                </td>
                
                            </tr>
                           

                        </table>
                        </div>
                        </div>
                    </center>
                    <br><br>
            </div>
            </div>
            ';  if(isset($_POST["annuler"])){
                mysqli_query($conn,"UPDATE rendez_vouz
                SET status = 'annuler'
                WHERE id=$id;");  echo"<script>alert('ce rendez vous a été annuler')</script>"; }
    
                                }
                            }
                            ?>

</body>
</html>

