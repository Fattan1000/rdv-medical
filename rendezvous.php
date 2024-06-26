<?php
include("util/connection.php"); 
include("util/navbar.php"); 
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"> 
<script src="https://cdn.tailwindcss.com"></script>
<title>redezvous</title>
<style>
    .doc-info{
    height: 140px;
    background-color: #2F4F4F;
    text-align: center;
    color: white;
}
.doc-info2{
    height: 2800px;
    background-color: #ccfbf1;
    padding: 1px;
    color: white;
}
.doc-info3{
    height: 550px;
     background-color: white;
    color: black;
    border-radius: 20px;
    margin: 12px;
    margin-top: 12px;
    margin-right: 650px;
}
.choix{
    text-align: center;
    
}

</style>
</head>
<body>
    <div class="doc-info">
        
<?php
// Check if the doctor's ID is passed as a query parameter
if(isset($_GET['id_medecin'])) {
  $c=$_GET['id_medecin'];
    echo "$c";
    $doctorId = mysqli_real_escape_string($conn, $_GET['id_medecin']);
    
    // Fetch doctor's data from the database
    $query = "SELECT * FROM medecin WHERE id = ?";
    $stmt = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($stmt, 'i', $doctorId);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    if($row = mysqli_fetch_assoc($result)) {
        echo "<br>";
        echo "<p>Dr  " . $row['nom'] . " " . $row['prenom'] . "</p>";
        echo "<p>Specialité: " . $row['specialite'] . "</p>";
        echo "<p>Ville: " . $row['ville'] . "</p>";
       
    } else {
        echo "<p>No doctor found.</p>";
    }
} else {
    echo "<p>No doctor ID provided.</p>";
}

?>
</div>
</div>

<div class="doc-info2">
<div class="choix">
<a href="#carte">carte</a>
<a href="#presentation">presentation</a>
<a href="#horaires">horaires</a>
</div>
     
    <?php
    include("calendrier.php");
    ?>

   <div class="doc-info3" id="carte">
    <h1>carte</h1>
   </div>
   <div class="doc-info3" id="presentation">
   <h1>presentation</h1>
   </div>
   <div  class="doc-info3" id="horaires">
   <h1>horaires</h1>
   </div>

    
   

</div>
</body>  
</html>