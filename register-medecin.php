<?php
include("util/connection.php");

if(isset($_POST["submit"])){
    $nom=$_POST["1"];
    $prenom=$_POST["2"];
    $specialite=$_POST["3"];
    $ville= $_POST["4"]  ;
    $email= $_POST["5"]  ;
    $password= $_POST["6"];
    $sexe= $_POST["7"] ;
 ////  /// ///////////////////////////////////////////////////

 $uploadDir = 'uploads/';
 $filename = uniqid() . '_' . $_FILES['image']['name'];
 $filepath = $uploadDir . $filename;
 
 //if (move_uploaded_file($_FILES['image']['tmp_name'], $filepath)) {
$query=mysqli_query($conn,"Insert into  medecin(nom,prenom,sexe,specialite,ville,email,password,image)Values('$nom','$prenom','$sexe','$specialite','$ville','$email','$password',' $filepath');");

if($query){

    echo"<script>alert('data inserted succssesfuly')</script>";
}
else 
     echo"<script>alert('data not inserted ')</script>";
} //}




?>

<head>
        <meta charset="UTF-8">
        <title>Login Page</title>
        <link href="/css/bootstrap.min.css" rel="stylesheet">
    </head>
    <body>
        
        <!-- Section: Design Block -->
        <section class="text-center">
        <!-- Background image -->
        <div class="p-5 bg-image" style="
                background-image: url('https://mdbootstrap.com/img/new/textures/full/171.jpg');
                height: 300px;
                "></div>
        <!-- Background image -->

        <div class="card mx-4 mx-md-5 shadow-5-strong" style="
                margin-top: -100px;
                background: hsla(0, 0%, 100%, 0.8);
                backdrop-filter: blur(30px);
                ">
            <div class="card-body py-5 px-md-5">

            <div class="row d-flex justify-content-center">
                <div class="col-lg-8">
                <h2 class="fw-bold mb-5">Sign up now</h2>
                <form method="post" enctype="multipart/form-data".>
                    <!-- 2 column grid layout with text inputs for the first and last names -->
                    <div class="row">
                    <div class="col-md-6 mb-4">
                        <div data-mdb-input-init class="form-outline">
                        <input type="text" id="form3Example1"name="1"  class="form-control"required />
                        <label class="form-label" for="form3Example1">First name</label>
                        </div>
                    </div>
                    <div class="col-md-6 mb-4">
                        <div data-mdb-input-init class="form-outline">
                        <input type="text" id="form3Example2" name="2"class="form-control"required />
                        <label class="form-label" for="form3Example2">Last name</label>
                        </div>
                    </div>
                    </div> </div>
                      <!-- sexe select -->
                      
                      <div data-mdb-input-init class="form-outline mb-4">
                      <label class="form-label" for="form3Example4" >Sexe : </label>
                      <select name="7" id="c">
                       <option value="male">male</option>
                       <option value="female">female</option>
                       
                     </select>

                        
                    </div>
                    <!-- specialiter input -->
                    <div data-mdb-input-init class="form-outline mb-4" >
                    <input type="text" id="form3Example4"name="3" class="form-control"required />
                    <label class="form-label" for="form3Example4">specialite</label>
                    </div>
                    <!-- ville input -->
                    <div data-mdb-input-init class="form-outline mb-4" >
                    <input type="text" id="form3Example4"name="4" class="form-control" required/>
                    <label class="form-label" for="form3Example4">Ville</label>
                    </div>
               <!-- image input -->
               <div data-mdb-input-init class="form-outline mb-4" >
                    <input type="file"accept=".jpg,.jpeg,.png" id="form3Example4"name="image" class="form-control"required />
                    <label class="form-label" for="form3Example4" value="">image</label>
                    </div>
                    <!-- Email input -->
                    <div data-mdb-input-init class="form-outline mb-4">
                    <input type="email" id="form3Example3" name="5"class="form-control" required/>
                    <label class="form-label" for="form3Example3">Email address</label>
                    </div>

                    <!-- Password input -->
                    <div data-mdb-input-init class="form-outline mb-4">
                    <input type="password" id="form3Example4"name="6" class="form-control"required />
                    <label class="form-label" for="form3Example4">Password</label>
                    </div>
                    

                    <!-- Checkbox -->
                    <div class="form-check d-flex justify-content-center mb-4">
                    <input class="form-check-input me-2" type="checkbox" value="" id="form2Example33" checked />
                    <label class="form-check-label" for="form2Example33">
                        Subscribe to our newsletter
                    </label>
                    </div>

                    <!-- Submit button -->
                    <button name="submit" type="submit" data-mdb-button-init data-mdb-ripple-init class="btn btn-primary btn-block mb-4">
                    Sign up
                    </button>

                    <!-- Register buttons -->
                    <div class="text-center">
                    <p>or sign up with:</p>
                    <button type="button" data-mdb-button-init data-mdb-ripple-init class="btn btn-link btn-floating mx-1">
                        <i class="fab fa-facebook-f"></i>
                    </button>

                    <button type="button" data-mdb-button-init data-mdb-ripple-init class="btn btn-link btn-floating mx-1">
                        <i class="fab fa-google"></i>
                    </button>

                    <button type="button" data-mdb-button-init data-mdb-ripple-init class="btn btn-link btn-floating mx-1">
                        <i class="fab fa-twitter"></i>
                    </button>

                    <button type="button" data-mdb-button-init data-mdb-ripple-init class="btn btn-link btn-floating mx-1">
                        <i class="fab fa-github"></i>
                    </button>
                    </div>
                </form>
                </div>
            </div>
            </div>
        </div>
        </section>
        <!-- Section: Design Block -->

        <script src="/js/jquery.min.js"></script>
        <script>
    </body>
</html>

