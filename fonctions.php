<?php
  

function connexion()
{


    $serveur="127.0.0.1";
    $utilisateurBD="root";
    $motdepasseBD="";
    $nomBD="Blog";

    $connexionBD= mysqli_connect($serveur,$utilisateurBD,$motdepasseBD,$nomBD);
    if($connexionBD)
    {return $connexionBD;}
    else
    {return -1;}

   
}

function inscription($Nom,$motdepasse)
{


    $req="insert into user (Nom,motdepasse) values('$Nom','$motdepasse')";

    $connexionBD= connexion();
    $result= mysqli_query($connexionBD,$req);
    
}


function authentification($nom, $motdepasse)
{


  

    $connexionBD= connexion();
    $req="select * from user where nom='$nom' and motdepasse ='$motdepasse'";
    $result=mysqli_query($connexionBD,$req);
    if(mysqli_num_rows($result)>0)
    {

        $row= mysqli_fetch_assoc($result);
        $id= $row["iduser"];
        return $id;
    }
    else{
        return 0;
    }


}

function ajouterArticle($titre, $categorie,$URL)
{

    $connexionBD= connexion();
    $req="insert into articles (`Titre`, `categorie`, `urlimage`) values ('$titre','$categorie','$URL')";
    $result=mysqli_query($connexionBD,$req);
    

}

?>