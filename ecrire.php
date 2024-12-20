<?php
include("fonctions.php");

session_start();

if(!isset($_SESSION['Nom']))
{
    header('Loaction: identification.php');
}




if(isset($_POST["ajouter"]))
{
$titre= $_POST["Titre"];
$categorie=$_POST["categorie"];

if (isset($_FILES["fichier"])) {
 
    
    $image = $_FILES["fichier"]["tmp_name"];
    $NomImage = $_FILES["fichier"]["name"];
    $tailleImage = $_FILES["fichier"]["size"];
    $typeImage = $_FILES["fichier"]["type"];


    $repertoire ="upload";
    $renommer=uniqid()."-".$NomImage;
    $destination = $repertoire."/".$renommer;

    
    $check= move_uploaded_file($image,$destination);
    if($check)
    {

        ajouterArticle($titre,$categorie,$destination);

    }
    else
    {
        echo "Erreur!";

    }
}


}
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Clean Blog - Start Bootstrap Theme</title>
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- Font Awesome icons (free version)-->
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
        <!-- Google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic" rel="stylesheet" type="text/css" />
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800" rel="stylesheet" type="text/css" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/styles.css" rel="stylesheet" />
    </head>
    <body>
        <!-- Navigation-->
        <?php 
                include("menu.php");
        ?>
        <!-- Page Header-->
        <header class="masthead" style="background-image: url('assets/img/post-bg.jpg')">
            <div class="container position-relative px-4 px-lg-5">
                <div class="row gx-4 gx-lg-5 justify-content-center">
                    <div class="col-md-10 col-lg-8 col-xl-7">
                        <div class="post-heading">
                            <h1>Man must explore, and this is exploration at its greatest</h1>
                            <h2 class="subheading">Problems look mighty small from 150 miles up</h2>
                            <span class="meta">
                                Posted by
                                <a href="#!">Start Bootstrap</a>
                                on August 24, 2023
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <!-- Post Content-->
        <article class="mb-4">
            <div class="container px-4 px-lg-5">
                <div class="row gx-4 gx-lg-5 justify-content-center">
                               
                <h1>Titre: <?php echo  $destination; ?></h1>
                            <form method="POST" action ="" enctype="multipart/form-data">

                                <div class="form-floating">
                                    <input class="form-control" id="name" name ="Titre"  type="text" placeholder="Titre" data-sb-validations="required" />
                                    <label for="name">Titre</label>
                                    <div class="invalid-feedback" data-sb-feedback="name:required">Le Titre est Obligatoire.</div>
                                </div>

                                <br/>

                                <div class="form-floating">
                                    
                                        <select class="form-control" id="categorie" name ="categorie">
                                        <option value=""></option>
                                        <option value="IA">IA</option>
                                        <option value="Développement WEB">Développement WEB</option>
                                        </select>
                                        <label for="name">Catégorie: </label>
                                    
                                </div>
                                <br/>

                                <div class="form-floating">
                                    <input class="form-control" id="fichier" name ="fichier"  type="file"  />
                                    <label for="name">Fichier</label>
                                 
                                </div>
                            
                                <input name="ajouter" id="ajouter" type="submit" value="Ajouter"/>
                            </form>
                
                </div>
            </div>
        </article>
        <!-- Footer-->
        <footer class="border-top">
            <div class="container px-4 px-lg-5">
                <div class="row gx-4 gx-lg-5 justify-content-center">
                    <div class="col-md-10 col-lg-8 col-xl-7">
                        <ul class="list-inline text-center">
                            <li class="list-inline-item">
                                <a href="#!">
                                    <span class="fa-stack fa-lg">
                                        <i class="fas fa-circle fa-stack-2x"></i>
                                        <i class="fab fa-twitter fa-stack-1x fa-inverse"></i>
                                    </span>
                                </a>
                            </li>
                            <li class="list-inline-item">
                                <a href="#!">
                                    <span class="fa-stack fa-lg">
                                        <i class="fas fa-circle fa-stack-2x"></i>
                                        <i class="fab fa-facebook-f fa-stack-1x fa-inverse"></i>
                                    </span>
                                </a>
                            </li>
                            <li class="list-inline-item">
                                <a href="#!">
                                    <span class="fa-stack fa-lg">
                                        <i class="fas fa-circle fa-stack-2x"></i>
                                        <i class="fab fa-github fa-stack-1x fa-inverse"></i>
                                    </span>
                                </a>
                            </li>
                        </ul>
                        <div class="small text-center text-muted fst-italic">Copyright &copy; Your Website 2023</div>
                    </div>
                </div>
            </div>
        </footer>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
    </body>
</html>
