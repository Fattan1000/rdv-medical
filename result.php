<?php
  include("util/connection.php");
  include("util/navbar.php");
  include("util/searchbar.php");
  ?>

  <!DOCTYPE html>
  <html lang="en">
  <head>
  <link rel="stylesheet" type="text/css" href="css/stylesheet_essai.css">
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <style>
        .barre_de_recherche{
            margin: 15px;
            margin-top: 15px;
            width: 1484px;
            padding-left: 269px;
        }
        .card{
            height: 180px;
            text-align: center;
            background-color:white ;
          }

      </style>
      <title>Search Medecin</title>
  </head>
  <body> 
   
<?php 
if (isset($_POST['submit']))
{
    $input=$_POST["search_button"];
    $query="SELECT id,nom,prenom,specialite,ville,image FROM medecin WHERE nom LIKE '{$input}%' OR prenom LIKE '{$input}%'";
    $result=mysqli_query($conn,$query);

    if(mysqli_num_rows($result)>0){?>
       <div id="search_result" style="background-color:white">
      <table class="table table-bordered table -striped mt-4">
     <?php  while($row =mysqli_fetch_assoc($result)){
        $nom=$row['nom'];
        $prenom=$row['prenom'];
        $specialite=$row['specialite'];
        $ville=$row['ville'];
        $image=$row['image'];
       
        ?>
        <tr>
        <div class="doctor-card">
    <img src="<?php echo $image?>"alt="Doctor Image" class="doctor-image">
    <div class="doctor-info">
        <h2 class="doctor-name"><?php echo"DR.$nom $prenom"?></h2><div class="plusreviews"><div class="rating">
            <span class="star">&#9733;</span>
            <span class="star">&#9733;</span>
            <span class="star">&#9733;</span>
            <span class="star">&#9733;</span>
            <span class="star">&#9733;</span>
            <span class="note">4.4</span>
        </div> <div>49 reviews</div>
    </div>
        <p class="doctor-specialty"> <?php echo $specialite?></p>
        <p class="doctor-city"><?php echo $ville?></p>
    </div>

    <button class="button" ><a style="color:white" href="rendezvous.php">Prendre rendez vous</a></button>
</div>

        </tr>



        <?php
    }?>
 
     
    </table>
    </div>



<?php
} else 
      echo"<h6 class='text-danger text-center mt-3'>no data found</h6>";

}
    ?>


	</body>
    

</html>

